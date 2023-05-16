<?php

/** @var array $arr_products */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php
            // Create a new instance of the search model
            $searchModel = new app\models\ProductSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->pagination = false; // Disable pagination for simplicity

            // Get the sorted and filtered product data
            $products = $dataProvider->getModels();
            ?>

            <!-- Sorting fields -->
            <div>
                <?php $sort = $dataProvider->getSort(); ?>
                <?= $sort->link('name',['label'=>'Название']) ?> |
                <?= $sort->link('price',['label'=>'Цена']) ?> |
                <?= $sort->link('id_category',['label'=>'Категории']) ?> |
                <?= $sort->link('country_pr',['label'=>'Страна поставщика']) ?> |

            </div>

            <?php foreach ($products as $product): ?>
                <div class="col-lg-4">
                    <img src="/web/uploads/<?= $product->photo ?>" width="250" height="270" alt="img">
                    <h2><a href="/web/site/product_details?id=<?= $product->id ?>"><?= $product->name ?> </a></h2>
                    <p>Цена: <?= $product->price ?> </p>
                    <?php
                    if (!Yii::$app->user->isGuest):
                        echo '
                    <form method="post" action='.Url::to(['basket/add']).'>      
                    <input type="hidden" name="id" value='.$product->id.'>
                    '.Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken).'
                    <button type="submit">Добавить в корзину</button>
                    </form>
                    ';
                    endif;
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

