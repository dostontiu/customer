<?php

namespace app\assets\frest;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'themes/frest/app-assets/css/bootstrap.css',
        'themes/frest/app-assets/css/bootstrap-extended.css',
        'themes/frest/app-assets/css/colors.css',
        'themes/frest/app-assets/css/components.css',
        'themes/frest/app-assets/css/themes/dark-layout.css',
        'themes/frest/app-assets/css/themes/semi-dark-layout.css',

        'themes/frest/app-assets/css/core/menu/menu-types/vertical-menu.css',
        'themes/frest/app-assets/css/pages/dashboard-analytics.css',
        'themes/frest/app-assets/vendors/css/extensions/sweetalert2.min.css',

        'themes/frest/app-assets/css/pages/app-todo.css',

        // Custom Css
        'themes/frest/assets/css/style.css',
    ];

    public $js = [
        'themes/frest/app-assets/js/core/app-menu.js',
        'themes/frest/app-assets/js/core/app.js',
        'themes/frest/app-assets/js/scripts/components.js',
        'themes/frest/app-assets/js/scripts/footer.js',
        'themes/frest/app-assets/vendors/js/extensions/sweetalert2.all.min.js',
        'js/sc_globals.js',
    ];

    public $depends = [
        'app\assets\frest\VendorsAsset',
        'yii\bootstrap4\BootstrapAsset',
//        'rmrevin\yii\fontawesome\CdnFreeAssetBundle',
    ];
}
