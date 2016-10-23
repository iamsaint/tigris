<?php
/**
 * @author Sergey Vasilev <doozookn@gmail.com>
 */

use Tigris\Types\Inline\InlineQueryResult\InlineQueryResultCachedMpeg4Gif;
use Tigris\Types\Inline\InlineQueryResult;

class InlineQueryResultCachedMpeg4GifTest extends PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $a = InlineQueryResultCachedMpeg4Gif::parse([]);
        $this->assertInstanceOf(\Tigris\Types\Inline\InlineQueryResult\InlineQueryResultCachedMpeg4Gif::class, $a);
        $this->assertInstanceOf(InlineQueryResult::class, $a);

        $this->assertSame('mpeg4_gif', $a::TYPE);
    }
}