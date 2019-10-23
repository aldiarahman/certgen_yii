<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\Kegiatan;

/* @var $this yii\web\View */
/* @var $model app\models\Sertifikat */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sertifikats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sertifikat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nomor_sertifikat',
            'jenis_anggota',
            [
                'attribute'=>'nama_peserta',
                'value'=>$model->user->nama
            ],
            [
                'attribute'=>'nama_kegiatan',
                'value'=>$model->kegiatan->namakegiatan
            ],
        ],
    ]) ?>

</div>
