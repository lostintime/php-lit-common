<?php

namespace Lit\Common;

/**
 * Simple key-value Registry implementation
 * @author lostintime
 */
class Registry implements \ArrayAccess
{

    /**
     * @var array
     */
    private $data;

    /**
     * @param array|null $data
     */
    public function __construct($data = null)
    {
        if (is_array($data)) {
            $this->init($data);
        } else {
            $this->data = array();
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * init collection from an array
     * @param array $data
     */
    public function init($data)
    {
        if (is_array($data)) {
            unset($this->data);
            $this->data = $data;
        }
    }

    /**
     * setts param
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * returns param value
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    /**
     * removes param from collection
     * @param string $key
     */
    public function remove($key)
    {
        if (isset($this->data[$key])) {
            unset($this->data[$key]);
        }
    }

    /**
     * check key exists (ArrayAccess implementation)
     * @param mixed $offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * gets item value from collection (ArrayAccess implementation)
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * setts item value (ArrayAccess implementation)
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    /**
     * removes item from collection
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    /**
     * returns json representation
     * @return string
     */
    public function toJson()
    {
        return \json_encode($this->data);
    }

    /**
     * returns http query representation
     * @return string
     */
    public function toHttpQuery()
    {
        return \http_build_query($this->data);
    }

}
