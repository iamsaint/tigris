<?php
/**
 * @author Sergey Vasilev <doozookn@gmail.com>
 */
use Tigris\Telegram\Types\Arrays\UpdateArray;
use Tigris\Telegram\Types\Base\BaseArray;
use Tigris\Telegram\Types\CallbackQuery;
use Tigris\Telegram\Types\Inline\ChosenInlineResult;
use Tigris\Telegram\Types\Inline\InlineQuery;
use Tigris\Telegram\Types\Message;
use Tigris\Telegram\Types\Updates\Update;
use Tigris\Telegram\Types\User;

class UpdateArrayTest extends PHPUnit_Framework_TestCase
{
    public function testParse()
    {
        $a = UpdateArray::parse([
            [
                'update_id' => 10,
                'message' => [
                    'message_id' => 100,
                    'date' => 11251261,
                ],
                'edited_message' => [
                    'message_id' => 90,
                    'date' => 11454326,
                ],
                'inline_query' => [
                    'id' => '122',
                    'from' => [
                        'id' => 100,
                        'first_name' => 'Tigris',
                        'last_name' => 'Bot',
                        'username' => '@tigrisbot',
                    ],
                    'query' => 'query',
                ],
                'chosen_inline_result' => [
                    'result_id' => '123',
                    'from' => [
                        'id' => 100,
                        'first_name' => 'Tigris',
                        'last_name' => 'Bot',
                        'username' => '@tigrisbot',
                    ],
                    'query' => 'query',
                ],
                'callback_query' => [
                    'id' => '123',
                    'from' => [
                        'id' => 100,
                        'first_name' => 'Tigris',
                        'last_name' => 'Bot',
                        'username' => '@tigrisbot',
                    ],
                    'chat_instance' => 'chat',
                ],
            ],
            [
                'update_id' => 10,
                'message' => [
                    'message_id' => 100,
                    'date' => 11251261,
                ],
                'edited_message' => [
                    'message_id' => 90,
                    'date' => 11454326,
                ],
                'inline_query' => [
                    'id' => '122',
                    'from' => [
                        'id' => 100,
                        'first_name' => 'Tigris',
                        'last_name' => 'Bot',
                        'username' => '@tigrisbot',
                    ],
                    'query' => 'query',
                ],
                'chosen_inline_result' => [
                    'result_id' => '123',
                    'from' => [
                        'id' => 100,
                        'first_name' => 'Tigris',
                        'last_name' => 'Bot',
                        'username' => '@tigrisbot',
                    ],
                    'query' => 'query',
                ],
                'callback_query' => [
                    'id' => '123',
                    'from' => [
                        'id' => 100,
                        'first_name' => 'Tigris',
                        'last_name' => 'Bot',
                        'username' => '@tigrisbot',
                    ],
                    'chat_instance' => 'chat',
                ],
            ],
        ]);

        $this->assertInternalType('array', $a);

        $this->assertInstanceOf(Update::class, $a[0]);
        $this->assertInstanceOf(Update::class, $a[1]);

        $this->assertInstanceOf(Message::class, $a[0]->message);
        $this->assertInstanceOf(Message::class, $a[1]->message);

        $this->assertInstanceOf(Message::class, $a[0]->edited_message);
        $this->assertInstanceOf(Message::class, $a[1]->edited_message);

        $this->assertInstanceOf(InlineQuery::class, $a[0]->inline_query);
        $this->assertInstanceOf(InlineQuery::class, $a[1]->inline_query);


        $this->assertInstanceOf(ChosenInlineResult::class, $a[0]->chosen_inline_result);
        $this->assertInstanceOf(ChosenInlineResult::class, $a[1]->chosen_inline_result);

        $this->assertInstanceOf(CallbackQuery::class, $a[0]->callback_query);
        $this->assertInstanceOf(CallbackQuery::class, $a[1]->callback_query);

        $this->assertInstanceOf(User::class, $a[0]->inline_query->from);
        $this->assertInstanceOf(User::class, $a[1]->inline_query->from);

        $this->assertInstanceOf(User::class, $a[0]->chosen_inline_result->from);
        $this->assertInstanceOf(User::class, $a[1]->chosen_inline_result->from);

        $this->assertInstanceOf(User::class, $a[0]->callback_query->from);
        $this->assertInstanceOf(User::class, $a[1]->callback_query->from);

        $z = UpdateArray::parse(null);
        $this->assertNull($z);

    }
}