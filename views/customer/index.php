<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customer list');
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->formatter->nullDisplay = '&mdash;';

$columns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{update}',
        'header' => '@',
        'buttons' => [
            'update' => function ($url, $model) {
                return Html::a(
                    '<span class="bx bx-sm bxs-pencil"></span>', 'javascript:void(0)',
                    ['data' => ['id' => $model->id],
                        'title' => Yii::t('app', 'Edit'),
                        'aria-label' => Yii::t('app', 'Edit'),
                        'class' => 'update-customer'
                    ]
                );
            }
        ],
    ],
    [
        'attribute' => 'first_name',
        'format' => 'raw',
        'filterInputOptions' => ['class' => 'form-control  form-control-sm'],
        'value' => function($model){
            return Html::button($model->first_name ?? 'name', [
                'class' => 'view-button btn btn-link',
                'data-id' => $model->id,
                'title' => Yii::t('app', 'View'),
                'aria-label' => Yii::t('app', 'View'),
                'style' => 'display: contents',
            ]);
        },
    ],
    [
        'attribute' => 'last_name',
        'format' => 'text',
        'filterInputOptions' => ['class' => 'form-control  form-control-sm'],
    ],
    [
        'attribute' => 'middle_name',
        'format' => 'text',
        'filterInputOptions' => ['class' => 'form-control  form-control-sm'],
    ],
    [
        'attribute' => 'address',
        'format' => 'text',
        'filterInputOptions' => ['class' => 'form-control  form-control-sm'],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{delete}',
        'header' => Yii::t('app', 'Delete'),
        'buttons' => [
            'delete' => function ($url, $model) {
                return Html::a(
                    '<span class="bx bx-sm bxs-trash"></span>', ['delete', 'id' => $model->id],
                    [
                        'data' => [
                            'method' => 'POST',
                            'confirm' => Yii::t('app', 'Are you sure to delete this <b>{item}</b>?', ['item' => $model->first_name]),
                            'pjax' => false
                        ],
                        'title' => Yii::t('app', 'Delete'),
                        'aria-label' => Yii::t('app', 'Delete'),
                    ]);
            },
        ],
    ],

];

?>

<div class="customer-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'condensed' => true,
        'hover' => true,
        'panel' => [
            'type' => GridView::TYPE_ACTIVE,
            'before' => '{summary}',
            'after' => false,
            'summaryOptions' => [
                'class' => 'float-left',
                'style' => 'display: table; height: 38px;'
                ]
        ],
        'toolbar' => [
            '<div style="align-self: center;">&nbsp;' .
            Html::button('<i class="bx bx-plus-medical"></i>', ['class' => 'btn pl-2 pr-2 btn-success create']).
            '&nbsp; &nbsp; {toggleData} &nbsp; {export}</div>'
        ],
        'panelTemplate' => '{panelBefore}{items}{panelAfter}{panelFooter}',
        'exportConfig' => [
            GridView::EXCEL => [
                'label' => '&nbsp;&nbsp;Excel',
            ],
        ],
        'export' => [
            'icon' => 'fas fa-external-link-alt',
            'fontAwesome' => true,
        ],
        'showPageSummary' => true,
        'summaryOptions' => [
            'class' => 'summary',
            'style' => 'display: table-cell; vertical-align:middle;'
        ],
        'pager' => [
            'class' => 'yii\bootstrap4\LinkPager'
        ],
        'columns' => $columns,
    ]); ?>
        
</div>



<div class="modal fade in create-update" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <b><?= Yii::t('app', 'Create') ?></b>
                </h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal" title="">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="create-update-form">
                <?= $this->render('_form', ['model' => $model]) ?>
            </div>
        </div>
    </div>
</div>

<!--for view-->
<div class="modal fade in" id="view-modal-body" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" ><?= Yii::t('app', 'View') ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body" id="view-modal"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    <?php ob_start() ?>
    $(document).on('click', '.update', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'get',
            url: '<?= Url::to(["customer/update"]) ?>',
            data: {id: id},
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $(document).on('click', '.create', function () {
        $.ajax({
            type: 'get',
            url: '<?= Url::to(["customer/create"]) ?>',
            success: function (res) {
                $('#create-update-form').html(res);
                $('.create-update').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $(document).on('click', '#save-form', function (e) {
        e.preventDefault();
        var form = $('#save');
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function (res) {
                if (res.success === true) {
                    $('.create-update').modal('hide');
                    $.pjax.reload({container: '#crud-datatable-pjax'});
                } else {
                    $('#create-update-form').html(res.view);
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    $(document).on('click', '.view-button', function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'get',
            url: '<?= Url::to(["customer/view"]) ?>',
            data: {id: id},
            success: function (res) {
                $('#view-modal').html(res);
                $('#view-modal-body').modal('show');
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

    <?php $this->registerJs(ob_get_clean()) ?>
</script>