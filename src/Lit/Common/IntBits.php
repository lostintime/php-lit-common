<?php

namespace Lit\Utils;

/**
 * Utility class - helps using int value as a "bit flags" container
 * @author lostintime
 */
class IntBits
{
    /**
     * @var int
     */
    protected $value;

    /**
     * @param int $value
     */
    public function __construct($value = 0)
    {
        $this->setValue($value);
    }

    /**
     * @param int $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $bits
     * @return bool
     */
    public function hasBits($bits)
    {
        return self::hasBitsInValue($bits, $this->value);
    }

    /**
     * @param int $bits
     */
    public function setBits($bits)
    {
        $this->value = self::setBitsToValue($bits, $this->value);
    }

    /**
     * @param int $bits
     */
    public function unsetBits($bits)
    {
        $this->value = self::unsetBitsInValue($bits, $this->value);
    }

    /**
     * @static
     * @param int $bits
     * @param int $value
     * @return int
     */
    public static function setBitsToValue($bits, $value)
    {
        return $value | $bits;
    }

    /**
     * @static
     * @param int $bits
     * @param int $value
     * @return bool
     */
    public static function hasBitsInValue($bits, $value)
    {
        return ($bits & $value) == $bits;
    }

    /**
     * @static
     * @param int $bits
     * @param int $value
     * @return int
     */
    public static function unsetBitsInValue($bits, $value)
    {
        return ($value & (~$bits));
    }
}
