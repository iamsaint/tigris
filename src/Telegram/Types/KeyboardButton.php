<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace Tigris\Telegram\Types;

use Tigris\Telegram\Types\Base\BaseObject;

/**
 * Class KeyboardButton
 *
 * @package Tigris\Types
 * @link https://core.telegram.org/bots/api#keyboardbutton
 *
 * @property string $text Text of the button. If none of the optional fields are used, it will be sent to the bot as a message when the button is pressed.
 * @property boolean $request_contact Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only.
 * @property boolean $request_location Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only.
 */
class KeyboardButton extends BaseObject
{
    const REQUEST_CONTACT = 'request_contact';
    const REQUEST_LOCATION = 'request_location';

    /**
     * @param $text
     * @param null $request
     * @return null|static
     */
    public static function create($text, $request = null)
    {
        if (empty($text)) {
            throw new \InvalidArgumentException('Empty button text');
        }
        
        switch ($request) {
            case null:
            case static::REQUEST_CONTACT:
            case static::REQUEST_LOCATION:
                break;
            default:
                throw new \InvalidArgumentException('Invalid $request value: ' . $request);
        }
        $data = compact('text');
        if ($request) {
            $data[$request] = true;
        }
        return static::build($data);
    }
}