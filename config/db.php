<?php


return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host='. env('db_host').';port='. env('db_port') .';dbname=' . env('db_name'),
    'username' => env('db_username'),
    'password' => env('db_password'),
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
