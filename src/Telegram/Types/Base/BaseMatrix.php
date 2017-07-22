<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace Tigris\Telegram\Types\Base;

use Tigris\Telegram\Types\Interfaces\TypeInterface;
use Tigris\Traits\JsonTrait;

abstract class BaseMatrix extends BaseArray implements TypeInterface
{
    use JsonTrait;

    const ENTITY_CLASS = null;
    
    /**
     * @inheritdoc
     */
    public static function parse($data)
    {
        if (static::ENTITY_CLASS == null) {
            throw new \LogicException('Please override ENTITY_CLASS constant in ' . __CLASS__);
        }

        if ($data instanceof TypeInterface) {
            return $data;
        }

        $result = new static;

        if (empty($data) || !is_array($data)) {
            return $result;
        }

        foreach ($data as $item) {
            // calling parent constructor to build a row of entities
            $result->append(parent::parse($item));
        }

        return $result;
    }
}