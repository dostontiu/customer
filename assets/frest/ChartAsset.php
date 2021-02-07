<?php

namespace app\assets\frest;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ChartAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/frest/app-assets/vendors/css/vendors.min.css',
        'themes/frest/app-assets/vendors/css/charts/apexcharts.css',
    ];

    public $js = [
        'themes/frest/app-assets/vendors/js/charts/apexcharts.min.js',
        'themes/frest/app-assets/js/scripts/charts/chart-apex.js',
        'themes/frest/app-assets/vendors/js/charts/chart.min.js',
        'themes/frest/app-assets/js/scripts/charts/chart-chartjs.js',
    ];

    public $depends = [
        'app\assets\frest\VendorsAsset',
    ];

}
