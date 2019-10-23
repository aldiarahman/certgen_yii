<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sertifikat */

$this->title = 'Create Sertifikat';
$this->params['breadcrumbs'][] = ['label' => 'Sertifikats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sertifikat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
