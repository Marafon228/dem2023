<?php

/** @var array $product */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="body-content">

        <div class="row">

                <div class="col-lg-4">
                    <img src="/web/uploads/<?= $product->photo ?>" width="250" height="270" alt="img">

                    <h2><?= $product->name ?> </h2>
                    <p>Цена: <?= $product->price ?> </p>
                    <?php
                    if (!Yii::$app->user->isGuest){
                        echo '
                    <form method="post"
                                          action='.Url::to(['basket/add']).'>      
                    <input type="hidden" name="id" value='.$product->id.'>
                    '.Html::hiddenInput(
                                Yii::$app->request->csrfParam,
                                Yii::$app->request->csrfToken
                            ).'
                    <button type="submit">                                           
                    Добавить в корзину
                    </button>
                    </form>
                    ';
                    }

                    ?>
                    <h2>Характеристики</h2>
                    <p>Страна производитель: <?= $product->country_pr ?></p>
                    <p>Цвет: <?= $product->color ?></p>
                    <p>Вид товара: <?= $product->category->name ?></p>
                </div>
        </div>

    </div>
</div>
