<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section class="row">
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body text-center bg-transparent miscellaneous">
                        <h1 class="error-title mt-1"><?= Html::encode($this->title) ?></h1>
<!--                        <a href="--><?//= bu() ?><!--" class="btn btn-primary round glow m-2 btn-lg">--><?//= Yii::t('app', 'BACK TO HOME') ?><!--</a>-->
                        <?= Html::a(Yii::t('app', 'Back'), 'javascript: void(0);', ['class' => 'btn btn-primary round glow m-2 btn-lg', 'onclick'=>'window.history.back()', 'title' => 'Назад']) ?>
                        <div class="text-center">
                            <?= Html::img(bu('themes/frest/app-assets/images/pages/maintenance-2.png'), ['class' => 'img-fluid']) ?>
                        </div>
                        <p class="pb-2"><?= nl2br(Html::encode($message)) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
