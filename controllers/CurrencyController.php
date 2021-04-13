<?php

namespace app\controllers;


use app\models\Currency;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class CurrencyController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                ],
            ],
        ];
    }


    public function actionIndex($id, $from = null, $to = null)
    {
        Yii::$app->response->format = env('response');
        $q = Currency::find()->select('valute_id, value, date')->where([
            'valute_id' => $id,
        ]);
        if ($from && $to) {
            $q->andWhere(['between', 'date', $from, $to]);
        }
        return $q->orderBy('date DESC')->all();
    }
}
