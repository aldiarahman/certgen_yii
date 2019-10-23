<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SertifikatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sertifikats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sertifikat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sertifikat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nomor_sertifikat',
            'jenis_anggota',
            ['attribute' => 'nama_peserta','value' => 'user.nama'],
            ['attribute' => 'nama_kegiatan','value' => 'kegiatan.namakegiatan'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
