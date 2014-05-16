<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace sheillendra\aceadmin\assets;

use yii\web\AssetBundle;
use yii\web\View;

class AceHeadAsset extends AssetBundle
{
	public $sourcePath = '@sheillendra/aceadmin/views/assets';
	public $css = [];
	public $js = [
		'js/ace-extra.min.js',
	];
	public $jsOptions=['position'=>View::POS_HEAD];
	public $depends = [];
}
