<?php

/** @var yii\web\View $this */
/** @var array $products */

use yii\bootstrap5\Carousel;
use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


$carouselItems = [];
foreach ($products as $product){
    $carouselItems[] = [
        'content' => '<img src="/web/uploads/'. $product->photo .'"/>',
        'caption' => '<h4>'. $product->name .'</h4><p>'. $product->price .'</p>',
        'captionOptions' => ['class' => ['d-none', 'd-md-block']],
        'options' => [],
    ];
}
?>
<div class="site-about">
    <img src="/web/logo/logo.PNG" alt="logo" height="128" width="355">
    <p>Девиз ....</p>
    <?php
    echo Carousel::widget([
        'items' => $carouselItems]);
    ?>
</div>
