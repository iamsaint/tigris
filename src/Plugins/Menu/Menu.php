<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace Tigris\Plugins\Menu;

use Tigris\Bot;
use Tigris\Helpers\ArrayHelper;
use Tigris\Types\Arrays\KeyboardButtonMatrix;
use Tigris\Types\ReplyKeyboardMarkup;

class Menu
{
    protected static $instances = [];

    /** @var string */
    public $id;
    /** @var string */
    public $title;
    /** @var MenuItem[][]*/
    public $items;

    /**
     * Menu constructor.
     */
    protected function __construct()
    {
    }

    /**
     * @param string $id
     * @param string $title
     * @param MenuItem[] $items
     * @return static
     */
    public static function register($id, $title, $items)
    {
        $instance = new static;
        $instance->id = $id;
        $instance->title = $title;
        $instance->items = $items;
        static::$instances[$id] = $instance;
        return $instance;
    }

    /**
     * @param $id
     * @return Menu|null
     */
    public static function get($id)
    {
        return ArrayHelper::getValue(static::$instances, $id);
    }

    /**
     * @param $chatId
     * @param $menuId
     */
    public static function send($chatId, $menuId)
    {
        $menu = static::get($menuId);
        if (!$menu) {
            throw new \BadMethodCallException('Menu is missing: ' . $menuId);
        }

        $session = Bot::getInstance()->getChatSession($chatId);
        $session->setState(MenuHandler::STATE_PREFIX . $menuId);

        Bot::getInstance()->getApi()->sendMessage($chatId, $menu->title, null, null, null, null,
            ReplyKeyboardMarkup::create($menu->toKeyboard(), false, true)
        );
    }

    /**
     * @param $text
     * @return MenuItem
     */
    public static function item($text)
    {
        return MenuItem::create($text);
    }

    /**
     * @return KeyboardButtonMatrix
     */
    public function toKeyboard()
    {
        $matrix = [];
        foreach ($this->items as $row) {
            $newRow = [];
            foreach ($row as $item) {
                $newRow[] = $item->toKeyboardButton();
            }
            $matrix[] = $newRow;
        }
        return KeyboardButtonMatrix::create($matrix);
    }
}