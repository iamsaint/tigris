<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace Tigris\Types;

use Tigris\Types\Base\BaseObject;
use Tigris\Types\Scalar\ScalarString;

/**
 * Class Venue
 * This object represents a venue.
 *
 * @package Tigris\Types
 * @link https://core.telegram.org/bots/api#venue
 *
 * @property Location $location Venue location.
 * @property string $title Name of the venue.
 * @property string $address Address of the venue.
 * @property string $foursquare_id Optional. Foursquare identifier of the venue.
 */
class Venue extends BaseObject
{
    /**
     * @inheritdoc
     */
    protected static function fields()
    {
        return [
            'location' => Location::class,
            'title' => ScalarString::class,
            'address' => ScalarString::class,
            'foursquare_id' => ScalarString::class,
        ];
    }
}