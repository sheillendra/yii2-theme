<?php
use sheillendra\bootstrap\Nav;
use yii\helpers\Url;
?>
<a class="menu-toggler" id="menu-toggler" href="#">
	<span class="menu-text"></span>
</a>

<div class="sidebar sidebar-fixed" id="sidebar">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="icon-signal"></i>
			</button>

			<button class="btn btn-info">
				<i class="icon-pencil"></i>
			</button>

			<button class="btn btn-warning">
				<i class="icon-group"></i>
			</button>

			<button class="btn btn-danger">
				<i class="icon-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- #sidebar-shortcuts -->

	<?php

	$item_rows=Yii::$app->db->createCommand('SELECT * FROM `tbl_menu` ORDER BY `parent`, `sort`;')->queryAll();

	$items=[];
	foreach($item_rows AS $row ){
		$sidebarActive=isset($this->params['sidebarActive'])?$this->params['sidebarActive']:'';
		if(!$row['parent']){
			$items[$row['id']]['label']=$row['label'];
			$items[$row['id']]['icon']=$row['icon'];
			$items[$row['id']]['url']=Url::toRoute([$row['link']],true);
			$items[$row['id']]['active'] = $row['id'] == $sidebarActive;
		}else{
			if(isset($items[$row['parent']])){
				$items[$row['parent']]['dropdownMenuOptions']=['class'=>'submenu'];
				$items[$row['parent']]['items'][$row['id']]['label']=$row['label'];
				$items[$row['parent']]['items'][$row['id']]['url']=Url::toRoute([$row['link']],true);
				$items[$row['parent']]['url']='#';
				$items[$row['parent']]['items'][$row['id']]['icon']='icon-double-angle-right';
				if($row['id'] == $sidebarActive){
					$items[$row['parent']]['items'][$row['id']]['options'] = ['class'=>'active'];
					$items[$row['parent']]['active'] = true;
					$items[$row['parent']]['options'] = ['class'=>'open'];
				}
			}else{
				continue;
			}
		}
	}

	echo Nav::widget([
		'options'=>['class'=>'nav nav-list'],
		'items'=>$items,
		'encodeLabels'=>false,
		'itemOptions'=>[
			'labelTemplate'=>'<span class="menu-text">{label}</span>',
			'caretHtml'=>'<b class="arrow icon-angle-down"></b>',
			'data-toggle'=>false,
		],
	]);

?>

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>