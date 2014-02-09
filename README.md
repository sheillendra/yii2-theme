yii2-theme
=========

yii2 Custom Theme, can handle for All modules


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist sheillendra/yii2-theme "*"
```

or add

```
"sheillendra/yii2-theme": "*"
```

to the require section of your `composer.json` file.


Application
-------

Change your application config (backend or frontend)
```
'view'=>[
	'theme' => [
		'class'=>'sheillendra\theme\components\Theme',
		'active'=>'theme_1',
		'pathMap' => [ 
			'@app/views' => [ 
				'@webroot/themes/theme_1/views',
				'@webroot/themes/theme_2/views',
				'@webroot/themes/theme_3/views',
				...
			]
		],
	],
	...
],
```

folder structure

```
      backend/
          ...
          views/
          web/
             ...
             themes/
                 themes_1/
                     assets/
                     views/
                         layout/
                         controller_name/
                         ...
                 themes_2/
                 themes_3/
```

Module
------------

folder structure :

```
      your_module_name/
          ...
          views/
          themes/
             themes_1/
                 assets/
                 views/
                     layout/
                     controller_name/
                     ...
             themes_2/
             themes_3/
```

module init :

```
    public function init()
    {
        parent::init();
        \Yii::$app->view->theme->pathMap[your_module_name.'/views'] = [your_module_name.'/themes/'.\Yii::$app->view->theme->active.'/views'];
        // custom initialization code goes here
    }
```