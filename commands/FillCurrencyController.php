<?php

namespace app\commands;

use app\models\Currency;
use DateInterval;
use DatePeriod;
use DateTime;
use GuzzleHttp\Client;
use yii\console\Controller;
use yii\console\ExitCode;


class FillCurrencyController extends Controller
{
    public function actionIndex()
    {
        $client = new Client();

        $model = Currency::find()->orderBy('date desc')->one();
        $period = [];
        $today = new DateTime('now');
        if ($model === null)
            $period = new DatePeriod(
                new DateTime('-30 days'),
                new DateInterval('P1D'),
                $today
            );
        else
            if ($today->format('Y-m-d') !== $model->date)
                $period = new DatePeriod(
                    new DateTime($model->date ? $model->date : new DateTime('now')),
                    new DateInterval('P1D'),
                    $today
                );
        foreach ($period as $key => $value) {

            $res = $client->request('GET', 'http://www.cbr.ru/scripts/XML_daily.asp', [
                'query' => [
                    'date_req' => $value->format('d/m/Y')
                ]
            ]);
            $body = $res->getBody()->getContents();
            $responseXml = simplexml_load_string($body);
            foreach ($responseXml as $valute) {
                $newModel = new Currency();
                $newModel->name = (string)$valute->Name;
                $newModel->num_code = (int)$valute->NumCode;
                $newModel->char_code = (string)$valute->CharCode;
                $newModel->value = (string)$valute->Value;
                $newModel->valute_id = (string)$valute->attributes()->ID;
                $newModel->date = $value->format('Y-m-d');
                $newModel->save();
            }
        }


        return ExitCode::OK;
    }

    public function actionRemove()
    {
        $model = Currency::deleteAll(['date' => (new DateTime('now'))->format('Y-m-d')]);
        $model = Currency::deleteAll(['date' => (new DateTime('+1 day'))->format('Y-m-d')]);
    }
}
