## Simple Register/Login/Search Laravel Application

#Installation
```sh 
#install

php composer.phar install

```

#Configiguration
```php
// app/config/database.php

'default' => 'mysql'

'connections' => array(

...
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => '127.0.0.1',
			'database'  => 'laravel_database',
			'username'  => 'root',
			'password'  => '',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

```

# Unit/Functional Testing
```sh 

phpunit

```




