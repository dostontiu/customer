<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap4\Breadcrumbs; ?>
<!-- CONTENT -->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper mt-2">

        <div class="content-header row">
            <div class="content-header-left col-12 m-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">

                        <h4 style="border:0; padding-left:10px"
                            class="content-header-title float-left mb-0"><?= (empty($this->params['breadcrumbs'])) ? '' : end($this->params['breadcrumbs']) ?></h4>
                        <div class="breadcrumb-wrapper col-12">
                            <?php
                            echo Breadcrumbs::widget([
                                'options' => ['class' => 'breadcrumb p-0 mb-0'],
                                'homeLink' => [
                                    'label' => '<li class=\'breadcrumb-item display-inline\'><i class="bx bx-home-alt"></i> ' . Yii::t("app", "Home") . '</li>',
                                    'url' => Yii::$app->homeUrl,
                                    'encode' => false,
                                ],
                                'itemTemplate' => "<li class='breadcrumb-item display-inline'><a>{link}</a></li>\n", // template for all links
                                'activeItemTemplate' => "<li class='breadcrumb-item display-inline active'><a>{link}</a></li>\n",
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]);
                            ?>
                        </div>
                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                            <div class="alert mb-0 mt-2 alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <h4><i class="icon fa fa-check"></i><?=Yii::t('app', 'Saved')?>!</h4>
                                <?= Yii::$app->session->getFlash('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (Yii::$app->session->hasFlash('error')): ?>
                            <div class="alert mb-0 mt-2 alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <h4><i class="bx bx-error bx-md"></i><?=Yii::t('app', 'Error')?>!</h4>
                                <?= Yii::$app->session->getFlash('error') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <?= $content ?>
        </div>

    </div>

</div>
<!--/ CONTENT -->
