<?php

namespace app\models;


use yii\redis\ActiveRecord;

class Currency extends ActiveRecord
{
    public static function tableName()
    {
        return 'currency';
    }

    public function rules()
    {
        return [
            [['valute_id','num_code','char_code','name','value','date',],'safe']
        ];
    }
}
