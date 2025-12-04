<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/fontawesome.min.css',
        'css/magnific-popup.min.css',
        'css/swiper-bundle.min.css',
        'css/style.css',
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapPluginAsset::class,
    ];

    public $js = [
        'js/classes/Alert.js',
        'js/classes/AjaxFormSenderClass.js',
        'js/classes/AjaxResponseClass.js',
        'js/classes/AnimatedButton.js',
        'js/classes/AjaxSender.js',
        'js/classes/Helper.js',
        'js/swiper-bundle.min.js',
        'js/bootstrap.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.counterup.min.js',
        'js/jquery-ui.min.js',
        'js/imagesloaded.pkgd.min.js',
        'js/isotope.pkgd.min.js',
        'js/main.js',
    ];
}
