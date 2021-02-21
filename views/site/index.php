<?php

use app\assets\frest\ChartAsset;

/* @var $this yii\web\View */

ChartAsset::register($this);

$this->title = Yii::t('app', 'Dashboard');

?>

<div class="row">
    <div class="col-sm-4 col-12 dashboard-users-success">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                        <i class="bx bx-briefcase-alt font-medium-5"></i>
                    </div>
                    <div class="text-muted line-ellipsis"><?= Yii::t('app', 'Products count') ?></div>
                    <h3 class="mb-0"><?= $countProducts ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-12 dashboard-users-success">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                        <i class="bx bx-user font-medium-5"></i>
                    </div>
                    <div class="text-muted line-ellipsis"><?= Yii::t('app', 'Customers count') ?></div>
                    <h3 class="mb-0"><?= $countCustomers ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-12 dashboard-users-success">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                        <i class="bx bxl-shopify font-medium-5"></i>
                    </div>
                    <div class="text-muted line-ellipsis"><?= Yii::t('app', 'Today\'s order') ?></div>
                    <h3 class="mb-0">17</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-12 dashboard-greetings">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= Yii::t('app', 'Best sold in a month') ?></h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div id="donut-chart" class="d-flex justify-content-center"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-12 dashboard-greetings">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= Yii::t('app', 'Goods') ?></h4>
            </div>
            <div class="card-content">
                <div class="card-body pl-0">
                    <div class="height-200">
                        <canvas id="horizontal-bar"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
