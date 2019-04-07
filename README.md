City Switch
===================
Warning: component is under cunstruction. Do not use it.

Component for switching city on site. You can display a personificated info associated to selected city (for example address or phone in that city). It uses cookies, so pay attention to that fact, that by changing city you do not change page web address.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require andrewdanilov/yii2-city-switch "dev-master"
```

or add

```
"andrewdanilov/yii2-city-switch": "dev-master"
```

to the require section of your `composer.json` file.

Then you need to run migrations, to create cities table
```
yii migrate --migrationPath=@andrewdanilov/cityswitch/migrations
```

Usage
-----

Add to bootstrap section in main config of your backend:

```php
return [
	...
	'bootstrap' => [
		...
		'cityswitch' => [
			'class' => andrewdanilov\cityswitch\backend\Bootstrap,
			// data which you want to be associated with each city
			// in addition to city alias (`city`) and city name (`city_name`)
			'data' => [
				'address' => 'City address',
				'phone' => 'City phone',
				'coords' => 'City address coordinates',
			],
		],
	],
];
```
This needs to edit cities data in backend of your site. Backend url would be:
```
admin/cityswitch
```

To display city switcher menu, use:
```php
<?= \andrewdanilov\cityswitch\CitySwitchMenu::widget() ?>
```

To display current city value:
```php
<?= \andrewdanilov\cityswitch\CitySwitchValue::widget(['param' => 'phone']) ?>
```