<?php

$items = [
    ['label' => '<i class="bx bx-detail"></i> ' . Yii::t('app', 'New order'), 'url' => ['/sell/index'], 'active' => $this->context->route == 'sell/edit' || $this->context->route == 'sell/index'],
    ['label' => Yii::t('app', 'Product management'),
        'url' => '',
        'template' => '<a href="{url}" ><i class="bx bxs-cube"></i>{label}</a>',
        'options' => ['class' => 'nav-item has-sub'],
        'items' => [
            ['label' => '<i class="bx bxs-bowling-ball"></i> ' . Yii::t('app', 'Goods'), 'url' => ['/good/index']],
            ['label' => '<i class="bx bx-alarm"></i> ' . Yii::t('app', 'Write-offs'), 'url' => ['/expense-good/index']],
        ],
    ],
    ['label' => Yii::t('app', 'Customer'),
        'url' => '',
        'template' => '<a href="{url}" ><i class="bx bxs-user-check"></i>{label}</a>',
        'options' => ['class' => 'nav-item has-sub'],
        'items' => [
            ['label' => '<i class="bx bx-user-circle"></i> ' . Yii::t('app', 'Customer list'), 'url' => ['/customer/index']],
            ['label' => '<i class="bx bx-archive"></i> ' . Yii::t('app', 'Balance customer'), 'url' => ['/balance-customer/index']],
        ],
    ],
];

?>
<!-- NAVIGATION - MENU -->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="<?= bu() ?>">
                    <div style="background: url('<?= bu('themes/frest/app-assets/images/logo/frest-logo.png') ?>') no-repeat; background-position: -65px -54px;"
                         class="brand-logo"></div>
                    <h2 class="brand-text mb-0"><b><?= Yii::t('app', 'Product') ?></b></h2>
                </a></li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" id="menu-left" data-toggle="collapse">
                    <i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <?=\yii\widgets\Menu::widget([
            'options' => ['class' => 'navigation navigation-main treeview', 'id' => 'main-menu-navigation'],
//            'linkTemplate' => '<li class="nav-item"><a href="{url}">{label}</a></li>',
//            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id),
//            'items' => \mdm\admin\components\Helper::filter($items),
            'items' => $items,
            'submenuTemplate' => "\n<ul class='menu-content'>\n{items}\n</ul>\n",
            'encodeLabels' => false, //allows you to use html in labels
            'activateParents' => true,   ]);  ?>
    </div>
</div
<?php
$this->registerJs(<<<JS
$("#menu-left").click(function(e){
    $.ajax({
        url:window.baseUrl+'site/menu-left',
        type: 'POST',
        data:{
          menu_lefts: 1
        },
        success: function(response) {
        }
    });
});

JS
);
?>
