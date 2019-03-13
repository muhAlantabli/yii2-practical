<?php

namespace app\components;

use yii\base\Component;
use yii\di\Instance;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\caching\Cache;
use yii\helpers\Json;

class Exchange extends Component
{
    /**
     * @var string remote host
     */
    public $host = 'https://openexchangerates.org/api/latest.json?app_id=';

    /**
     * api authentication key
     *
     * @var string
     */
    public $authKey;

    /**
     * @var bool cache results or not
     */
    public $enableCaching = false;

    /**
     * @var string cache component id
     */
    public $cache = 'cache';

    public function init()
    {
        if (empty($this->host)) {
            throw new InvalidConfigException('Host must be set.');
        }

        if (empty($this->authKey)) {
            throw new InvalidConfigException('Auth key must be set.');
        }

        if ($this->enableCaching) {
            $this->cache = Instance::ensure($this->cache, Cache::className());
        }

        return parent::init();
    }

    /**
     * get exchange rate for given currency
     * @param string $source
     * @param string $destination
     */
    public function getRate($source, $destination)
    {
        $this->validateCurrency($source);
        $this->validateCurrency($destination);

        $cacheKey = $this->generateCacheKey($source, $destination);
        if (!$this->enableCaching || ($result = $this->cache->get($cacheKey)) === false) {
            $result = $this->getRemoteRate($source, $destination);
            if ($this->enableCaching) {
                $this->cache->set($cacheKey, $result);
            }
        }

        return $result;
    }

    /**
     * currency validator
     *
     * @param string $currency
     */
    public function validateCurrency($currency)
    {
        if (!empty($currency) && !preg_match('#^[A-Z]{3}$#s', $currency)) {
            throw new InvalidParamException('wrong currency format.');
        }
    }

    /**
     * Generate cache key using complex formula
     *
     * @param string $source
     * @param string $destination
     */
    public function generateCacheKey($source, $destination)
    {
        return [__CLASS__, $source, $destination];
    }

    /**
     * here we are fetching data ;)
     *
     * @param string $source
     * @param string $destination
     * @return string rate
     */
    public function getRemoteRate($source, $destination)
    {
        $url = $this->host . $this->authKey . '&base=' . $source . '&symbols=' . $destination;
        
        // Open CURL session:
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Get the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $response = json_decode($json, true);

        if (!isset($response['rates'][$destination])) {
            throw new \RuntimeException('Rate not found');
        }

        return $response['rates'][$destination];
    }
}
