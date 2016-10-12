<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace Tigris\Types\Inline\InputMessageContent;

use Tigris\Types\Scalar\ScalarString;

/**
 * Represents the content of a contact message to be sent as the result of an inline query.
 *
 * @package Tigris\Types\Inline
 * @link https://core.telegram.org/bots/api#inputcontactmessagecontent
 *
 * @property string $phone_number Contact's phone number.
 * @property string $first_name Contact's first name.
 * @property string $last_name Optional. Contact's last name.
 */
class InputContactMessageContent extends AbstractInputMessageContent
{
    protected static function fields()
    {
        return [
            'phone_number' => ScalarString::class,
            'first_name' => ScalarString::class,
            'last_name' => ScalarString::class,
        ];
    }
}