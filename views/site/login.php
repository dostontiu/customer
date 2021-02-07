<?php

    /* @var $this yii\web\View */
    /* @var $form yii\bootstrap\ActiveForm */

    /* @var $model LoginForm */

    use app\models\LoginForm;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Html;

    $this->title = Yii::t('app', 'Login');
    $this->params['breadcrumbs'][] = $this->title;
?>

<section id="auth-login" class="row flexbox-container">
    <div class="col-xl-8 col-11">
        <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- left section-login -->
                <div class="col-md-6 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="text-center mb-2"><?=Yii::t('app', 'Welcome')?></h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="d-flex flex-md-row flex-column justify-content-around">
                                    <!--                                    <a href="#"-->
                                    <!--                                       class="btn btn-social btn-google btn-block font-small-3 mr-md-1 mb-md-0 mb-1">-->
                                    <!--                                        <i class="bx bxl-google font-medium-3"></i><span-->
                                    <!--                                                class="pl-50 d-block text-center">Google</span></a>-->
                                    <!--                                    <a href="#" class="btn btn-social btn-block mt-0 btn-facebook font-small-3">-->
                                    <!--                                        <i class="bx bxl-facebook-square font-medium-3"></i><span-->
                                    <!--                                                class="pl-50 d-block text-center">Facebook</span></a>-->
                                </div>
                                <div class="divider">
                                    <div class="divider-text text-uppercase text-muted"><small><?=Yii::t('app', 'Login')?></small>
                                    </div>
                                </div>
                                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                                <div class="form-group mb-50">
                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(Yii::t('app', 'Login')) ?>
                                </div>

                                <div class="form-group">
                                    <?= $form->field($model, 'password')->passwordInput()->label(Yii::t('app', 'Password')) ?>
                                </div>
                                <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                    <div class="text-left">
                                        <div class="checkbox checkbox-sm">
                                            <?= $form->field($model, 'rememberMe')->checkbox()->label(Yii::t('app', 'Remember me')) ?>
                                        </div>
                                    </div>
                                </div>
                                <?= Html::submitButton(Yii::t('app', 'Login').'<i id="icon-arrow" class="bx bx-right-arrow-alt"></i>', ['class' => 'btn btn-primary glow w-100 position-relative', 'name' => 'login-button']) ?>
                                <?php ActiveForm::end(); ?>
                                <hr>
                                <!--                                <div class="text-center"><small class="mr-25">Don't have an account?</small><a href="auth-register.html"><small>Sign up</small></a></div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right section image -->
                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                    <div class="card-content">
                        <img class="img-fluid" src="<?=bu('themes/frest/app-assets/images/pages/login.png')?>" alt="branding logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
