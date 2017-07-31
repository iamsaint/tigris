<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace Tigris\Helpers;

class ArrayHelper
{
    /**
     * @param $data
     * @param $key
     * @param mixed|null $default
     * @return mixed|null
     */
    public static function getValue($data, $key, $default = null)
    {
        if (!is_array($data)) {
            return $default;
        }

        if (null === $key) {
            throw new \InvalidArgumentException('Key is not set');
        }

        return isset($data[$key]) ? $data[$key] : $default;
    }
}