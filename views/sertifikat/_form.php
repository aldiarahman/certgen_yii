<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\Kegiatan;

/* @var $this yii\web\View */
/* @var $model app\models\Sertifikat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sertifikat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomor_sertifikat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_anggota')->dropDownList([ 'Pemateri' => 'Pemateri', 'Peserta' => 'Peserta', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_user')->dropDownList(
            ArrayHelper::map(User::find()->all(),'id','nama'),
            ['prompt' => 'Pilih User']
    ) ?>

    <?= $form->field($model, 'id_kegiatan')->dropDownList(
        ArrayHelper::map(Kegiatan::find()->all(),'id','namakegiatan'),
        ['prompt' => 'Pilih Kegiatan']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
