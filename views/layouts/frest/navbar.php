<?php

use yii\helpers\Html;
?>

    <!-- NAVBAR -->
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center" style="margin-left:32px">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                            class="ficon bx bx-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block">
                                <a class="btn btn-outline-success" href="<?= \yii\helpers\Url::to(['/sell/index']) ?>"
                                   data-toggle="tooltip" data-placement="top" title="<?= Yii::t('app', 'New order') ?>">
                                    <i class="bx bx-plus"></i>
                                    <?= Yii::t('app', 'New order') ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item nav-toggle dropdown-language">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top">
                                <div class="custom-control custom-switch custom-switch-secondary">
                                    <input type="checkbox" class="custom-control-input layout-name" name="layoutOptions"
                                           value="true" id="customSwitch15">
                                    <label class="custom-control-label" for="customSwitch15">
                                        <span class="switch-icon-left"><i class="bx bx-bulb"></i></span>
                                        <span class="switch-icon-right"><i class="bx bxs-bulb"></i></span>
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                        class="ficon bx bx-fullscreen"></i></a></li>
                        <!--                    <li class="nav-item p-2">--><?php //Yii::t('app', 'Rate: {rate} {name}', ['rate' => number_format(MoneyRate::current()), 'name' => 'сум'])?><!--</li>-->
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            switch (Yii::$app->language){
                                case "en-US":
                                    echo '<i class="flag-icon flag-icon-us mr-50"></i> English';
                                    break;
                                case "uz-UZ":
                                    echo '<i class="flag-icon flag-icon-uz mr-50"></i> Ўзбекча';
                                    break;
                                case "ru-RU":
                                    echo '<i class="flag-icon flag-icon-ru mr-50"></i> Русский';
                                    break;

                                default :
                                    echo '<i class="flag-icon flag-icon-us mr-50"></i> English';
                            }
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <?= Html::a('<i class="flag-icon flag-icon-us mr-50"></i> English', ['site/language', 'lang' => 'en-US'], ['class' => 'dropdown-item'] ) ?>
                            <?= Html::a('<i class="flag-icon flag-icon-uz mr-50"></i> Ўзбекча', ['site/language', 'lang' => 'uz-UZ'], ['class' => 'dropdown-item']) ?>
                            <?= Html::a('<i class="flag-icon flag-icon-ru mr-50"></i> Русский', ['site/language', 'lang' => 'ru-RU'], ['class' => 'dropdown-item']) ?>
                        </div>
                    </li>
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name"><?= Yii::$app->user->identity->username ?? '' ?></span>
                                    <span class="user-status text-muted"><?= Yii::$app->user->identity->username ?? '' ?></span>
                                </div>
                                <span><img class="round" src="<?= bu('themes/frest/app-assets/images/portrait/small/avatar-s-11.jpg') ?>" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0">
                                <a class="dropdown-item" href="#"><i class="bx bx-user mr-50"></i><?= Yii::t('app', 'Edit Profile') ?></a>
                                <a class="dropdown-item" href="#"><i class="bx bx-envelope mr-50"></i> <?= Yii::t('app', 'My Inbox') ?></a>
                                <div class="dropdown-divider mb-0"></div>
                                <!-- logout -->
                                <?= Html::a('<i class="bx bx-power-off mr-50"></i> ' . Yii::t('app', 'Logout'), ['/site/logout'], ['class' => 'dropdown-item', 'data' => ['method' => 'post']]) ?>
                            </div>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
</nav>
<?php
$this->registerJs(<<<JS
$("#customSwitch15").click(function(e){
    $.ajax({
        url:window.baseUrl+'site/dark',
        type: 'POST',
        data:{
          menu_dark: 1
        },
        success: function(response) {
            if(response === 1){
                $( "body" ).addClass( "dark-layout" );
                $( "body" ).removeClass( "pace-done" );
            }else{
                $( "body" ).addClass( "pace-done" );
                $( "body" ).removeClass( "dark-layout" );
            }
        }
    })
});

$(".nav-link-expand").click(function(e){
    var elem = document.documentElement;
    if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
});
JS
);
?>