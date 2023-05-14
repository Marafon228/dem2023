<?php

/** @var array $arr_products */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="body-content">

        <div class="row">
            <?php foreach ($arr_products as $product): ?>
            <div class="col-lg-4">
                <img src="/web/uploads/<?= $product->photo ?>" width="250" height="270" alt="img">

                <h2><a href="/web/site/product_details?id=<?=$product->id ?>"><?= $product->name ?> </a></h2>
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
            </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>
