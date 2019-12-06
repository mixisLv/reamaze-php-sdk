<?php

/**
 * reamaze-sdk-api
 *
 * @author    Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params;

use mixisLv\Reamaze\Exceptions\ApiException;

abstract class BaseParams
{
    /**
     * BaseParams constructor.
     * @param array $params
     * @throws ApiException
     */
    public function __construct(array $params = [])
    {
        foreach ($params as $property => $value) {
            $this->__set($property, $value);
        }
    }

    /**
     * __set
     *
     * @param $property
     * @param $value
     * @throws ApiException
     */
    public function __set($property, $value)
    {
        if (!property_exists($this, $property)) {
            throw new ApiException(get_class($this) . ' does not accepts property: ' . $property);
        }

        if (method_exists($this, $functionName = 'sanitize' . ucfirst($property))) {
            $this->$property = $this->$functionName($value);
        } else {
            $this->$property = $value;
        }
    }

    /**
     * __get
     *
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }

    /**
     * sanitizePage
     *
     * @param $value
     * @return int
     */
    protected function sanitizePage($value)
    {
        return max(1, (int)$value);
    }

    /**
     * paramsArray
     *
     * @return array
     */
    public function paramsArray()
    {
        return [];
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
