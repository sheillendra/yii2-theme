<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace sheillendra\aceadmin\assets;

use yii\web\AssetBundle;

class AceAsset extends AssetBundle
{
	public $sourcePath = '@sheillendra/aceadmin/views/assets';
	public $css = [
		'css/ace.min.css',
		'css/font-awesome.min.css',
		'css/ace-fonts.css',
	];
	public $js = [
		'js/ace.min.js',
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

	public $publishOptions =['forceCopy'=>true];
}
