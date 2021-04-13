<?php

use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CurrencySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="currency-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <?php  echo $form->field($model, 'from')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Date from ...'],
                'pluginOptions' => [
                    'autoclose'=>true
                ]
            ])->label('Date from') ?>
        </div>
        <div class="col-md-6">
            <?php  echo $form->field($model, 'to')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Date to ...'],
                'pluginOptions' => [
                    'autoclose'=>true
                ]
            ])->label('Date to') ?>
        </div>
    </div>
    <?= $form->field($model, 'valute_id') ?>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['index'],['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
