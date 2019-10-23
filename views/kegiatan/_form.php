<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Kegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kegiatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kodekegiatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namakegiatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'tanggal_kegiatan')->widget(DatePicker::className(),[
            'dateFormat' => 'yyyy-MM-dd'
    ])->textInput() ?>

    <?= $form->field($model, 'penyelenggara')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_template')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
