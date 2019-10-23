<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KegiatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kegiatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kegiatan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kegiatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kodekegiatan',
            'namakegiatan',
            [
                    'attribute' => 'tanggal_kegiatan',
                    'value' => 'tanggal_kegiatan',
                    'filter' => \yii\jui\DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'tanggal_kegiatan',
                            'dateFormat' => 'yyyy-MM-dd'
                    ]),
                    'format' => 'html',
            ],
            'penyelenggara',
            //'file_template',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
