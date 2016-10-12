<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace Tigris\Types\Inline\InlineQueryResult;

use Tigris\Types\Scalar\ScalarFloat;
use Tigris\Types\Scalar\ScalarInteger;
use Tigris\Types\Scalar\ScalarString;

/**
 * Represents a location on a map. By default, the location will be sent by the user.
 * Alternatively, you can use input_message_content to send a message with the specified content instead of the location.
 *
 * @package Tigris\Types\Inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultlocation
 *
 * @property float $latitude Location latitude in degrees.
 * @property float $longitude Location longitude in degrees.
 * @property string $title Location title.
 * @property string $thumb_url Optional. Url of the thumbnail for the result.
 * @property integer $thumb_width Optional. Thumbnail width.
 * @property integer $thumb_height Optional. Thumbnail height.
 */
class InlineQueryResultLocation extends AbstractInlineQueryResult
{
    const TYPE = 'location';

    protected static function extraFields()
    {
        return [
            'latitude' => ScalarFloat::class,
            'longitude' => ScalarFloat::class,
            'title' => ScalarString::class,
            'thumb_url' => ScalarString::class,
            'thumb_width' => ScalarInteger::class,
            'thumb_height' => ScalarInteger::class,
        ];
    }
}