<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace Tigris\Types;

use Tigris\Types\Base\BaseObject;
use Tigris\Types\Interfaces\ReplyMarkupInterface;
use Tigris\Types\Scalar\ScalarBoolean;

/**
 * Class ReplyKeyboardMarkup
 *
 * @package Tigris\Types
 * @link https://core.telegram.org/bots/api#replykeyboardmarkup
 *
 * @property Keyboard $keyboard
 * @property ScalarBoolean $resize_keyboard
 * @property ScalarBoolean $one_time_keyboard
 * @property ScalarBoolean $selective
 */
class ReplyKeyboardMarkup extends BaseObject implements ReplyMarkupInterface
{
    /**
     * Constructor
     * 
     * @param Keyboard $keyboard
     * @param bool $resizeKeyboard
     * @param bool $oneTimeKeyboard
     * @param bool $selective
     * @return static
     */
    public static function create($keyboard, $resizeKeyboard = false, $oneTimeKeyboard = false, $selective = false)
    {
        $data = [
            'keyboard' => $keyboard,
            'resize_keyboard' => $resizeKeyboard,
            'one_time_keyboard' => $oneTimeKeyboard,
            'selective' => $selective,
        ];
        return static::build($data);
    }
    
    /**
     * @inheritdoc
     */
    protected static function fields()
    {
        return [
            'keyboard' => Keyboard::class,
            'resize_keyboard' => ScalarBoolean::class,
            'one_time_keyboard' => ScalarBoolean::class,
            'selective' => ScalarBoolean::class,
        ];
    }
}