<?php

namespace app\assets\frest;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class VueAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/vue.js',
        'js/vuex.js',
        'js/axios.min.js',
        'js/vue-multiselect.min.js',
        'js/lodash.min.js',
        'js/vue-date-picker-locale-ru.min.js',
        'js/vuejs-datepicker.min.js',
    ];

    public $css = [
        'css/vue-multiselect.min.css',
        'css/sell.css',
        'css/buy.css',
    ];

    public $depends = [
        'app\assets\frest\VendorsAsset',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
