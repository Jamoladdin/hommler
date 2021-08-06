<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]) ?>

    <hr>

    <?=Html::beginForm(['goods/index'],'get') ?>
    <p>
        <?=Html::checkbox('image', $columns['image'] ? true : false) ?>
        <?=Html::label('Image'); ?>
    </p>
    <p>
        <?=Html::checkbox('sku', $columns['sku'] ? true : false) ?>
        <?=Html::label('SKU'); ?>
    </p>
    <p>
        <?=Html::checkbox('name', $columns['name'] ? true : false) ?>
        <?=Html::label('Name'); ?>
    </p>
    <p>
        <?=Html::checkbox('number', $columns['number'] ? true : false) ?>
        <?=Html::label('Number'); ?>
    </p>
    <p>
        <?=Html::checkbox('type', $columns['type'] ? true : false) ?>
        <?=Html::label('Type'); ?>
    </p>
    <?=Html::submitButton('Do', ['class' => 'btn btn-primary',]) ?>
    <?= Html::endForm() ?>

    <hr>

    <p>
        <?= Html::a('Create Goods', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <hr>

    <?=Html::beginForm(['goods/multiple'],'post')?>
    <?=Html::submitButton('Delete multiple', ['class' => 'btn btn-danger',])?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            [
                'attribute' => 'image',
                'visible' => $columns['image'] ? true : false,
            ],
            [
                'attribute' => 'sku',
                'visible' => $columns['sku'] ? true : false,
            ],
            [
                'attribute' => 'name',
                'visible' => $columns['name'] ? true : false,
            ],
            [
                'attribute' => 'number',
                'visible' => $columns['number'] ? true : false,
            ],
            [
                'attribute' => 'type',
                'visible' => $columns['type'] ? true : false,
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>
    <?= Html::endForm() ?>
</div>
