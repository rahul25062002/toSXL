<?php

/** @var yii\web\View $this */
use yii\bootstrap5\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Welcome to ToSXL!</h1>
      <?php
      echo Yii::$app->user->isGuest?'<div class="nav-item">'
                    . Html::beginForm(['/site/login'])
                    . Html::submitButton(
                        'Login ',
                        ['class' => 'nav-link btn btn-link ',
                        'style' => 'color: blue;padding:10px;border:1px solid blue;margin:auto;',
                        ]
                    )
                    . Html::endForm()
                    . '</div>':'<div class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout' ,
                        'style' => 'color: red;padding:10px;border:1px solid red;margin:auto;',
                        ]
                    )
                    . Html::endForm()
                    . '</div>';
      
      ?>
    </div>

    <div class="body-content">

        <div class="row">
            <!-- <div class="col-lg-4">Welcome</div> -->
        </div>

    </div>
</div>
