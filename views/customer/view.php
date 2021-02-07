<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'first_name',
                'last_name',
                'middle_name',
                'birth_date:date',
                'gender',
                'p_number',
                'phone',
                'experience',
                'start_time',
                'address',
                [
                    'attribute' => 'user_id',
                    'value' => $model->user->username ?? '',
                ],
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ]) ?>

</div>