<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    
</p>


INSTALLATION
------------

After pulling from git hub run:

~~~
composer install
~~~

Then configure database `.env` in root

```php
db_username = postgres
db_password =
db_name = sqb
db_port = 5432
db_host = localhost
```

after configuring run: 

~~~
php yii migrate
~~~

to fill the table currency you have to run
~~~
yii fill-currency
~~~

`yii fill-currency` will get data from API. If in the table doesn't exist any data it will get data for the last 30 days.
In another case, it will add data from the last added data's date till today

Recommended adding this command to cron job