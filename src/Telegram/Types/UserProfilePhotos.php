<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace Tigris\Telegram\Types;

use Tigris\Telegram\Types\Arrays\PhotoSizeArray;
use Tigris\Telegram\Types\Arrays\PhotoSizeMatrix;
use Tigris\Telegram\Types\Base\BaseObject;
use Tigris\Telegram\Types\Scalar\ScalarInteger;

/**
 * This object represent a user's profile pictures.
 *
 * @package Tigris\Types
 * @link https://core.telegram.org/bots/api#userprofilephotos
 *
 * @property integer $total_count Total number of profile pictures the target user has.
 * @property PhotoSizeMatrix $photos Requested profile pictures (in up to 4 sizes each).
 */
class UserProfilePhotos extends BaseObject
{
    /**
     * @inheritdoc
     */
    public static function fields()
    {
        return [
            'total_count' => ScalarInteger::class,
            'photos' => PhotoSizeMatrix::class,
        ];
    }
}