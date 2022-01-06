<?php
namespace Test\Plugin;

use Gallery\Plugin\Plugin as PluginInterface;
use Gallery\Plugin\Models\Plugin as PluginModel;

class TestPlugin extends PluginInterface
{


    /**
     * 插件模型
     * @var PluginModel
     */
    public $model;

    /**
     * 插件状态
     * @var int -1:not installed 0:installed, 1:activated 2:develop
     */
    public $status;


    /**
     * 作者
     * @return string
     */
    public static function author()
    {
        return 'edgardong';
    }

    public static function version()
    {
        return '1.0.0';
    }

    /**
     * 插件标识，采用下划线命名法（由字母、数字和下划线组成，
     * 且字母开头），不同插件的标识不能相同，建议由类名生成。
     * @return string
     */
    public static function name()
    {
        return getPluginName(static::class);
    }

    /**
     * 作者主页
     * @return string
     */
    public static function authorUrl()
    {
        return 'https://www.quzhaota.cn/';
    }

    /**
     * 插件名称
     * @return string
     */
    public static function title()
    {
        return static::name();
    }

    /**
     * 国际化插件名称，由语言代码与名称组成，如：
     * [
     *   'en' => 'Hello World',
     *   'jp' => 'こんにちは世界'
     * ]
     * @return array
     */
    public static function titleI18n()
    {
        return null;
    }

    /**
     * 插件描述，150字以内，可包含html标签
     * @return string
     */
    public static function description()
    {
        return null;
    }

    /**
     * 国际化插件描述，150字以内，可包含html标签，结构与
     * 国际化标题相同
     * @return string
     */
    public static function descriptionI18n()
    {
        return null;
    }


    /**
     * 插件详情页
     * @return string
     */
    public static function detailUrl()
    {
        return null;
    }

    /**
     * 插件配置页
     * @return string
     */
    public static function settingUrl()
    {
        return null;
    }

}
