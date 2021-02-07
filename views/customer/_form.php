<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['id' => 'save-customer', 'action' => Url::to(['customer/save', 'id' => $model->id]), 'method' => 'post']); ?>

    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
                'options'       => ['placeholder' => Yii::t('app', 'Birth date'), 'autocomplete' => 'off'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format'    => 'yyyy-mm-dd',
                ]
            ]); ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'p_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'gender')->inline(true)->radioList([1 => Yii::t('app', "Male"), 2 => Yii::t('app', "Female")]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'experience')->textInput() ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'start_time')->widget(DatePicker::classname(), [
                'options'       => ['placeholder' => Yii::t('app', 'Birth date'), 'autocomplete' => 'off'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format'    => 'yyyy-mm-dd',
                ]
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add') : Yii::t('app', 'Edit'), ['id' => 'save-customer-form', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>