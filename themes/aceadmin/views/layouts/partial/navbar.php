<?php

use yii\helpers\Html;
use yii\helpers\Url;
use sheillendra\bootstrap\Nav;
use sheillendra\bootstrap\NavBar;

NavBar::begin([
	'id'=>'navbar',
	'fixed' => true,
	'brandLabel' => '<small><i class="icon-leaf"></i> Americ </small>',
	'brandUrl' => '//js:void();',
	'brandOptions'=>['style'=>'height: 45px;'],
	'containerOptions'=>[
		'id'=>'navbar-container',
		'class'=>'navbar-container',
	],
	'headerOptions'=>[
		'class'=>'pull-left',
	],
	'collapse'=>false,
	'notCollapseOptions'=>[
		'class'=>'navbar-header pull-right',
		'role'=>'navigation',
	],
]);

	$menuItems = [
		[
			'label' => '<i class="icon-tasks"></i><span class="badge badge-grey">4</span>',
			'options'=>['class'=>'grey'],
			'items'=>[
				[
					'label'=>'<i class="icon-ok"></i> 4 Tasks to complete ',
					'options'=>['class'=>'dropdown-header'],
					'url'=>'#',
				],
				[
					'label'=>'<div class="clearfix"><span class="pull-left">Software Update</span><span class="pull-right">65%</span></div><div class="progress progress-mini "><div class="progress-bar " style="width:65%"></div></div>',
					'url'=>'#',
				],
				[
					'label'=>' See tasks with details <i class="icon-arrow-right"></i>',
					'url'=>'#',
				],
			],
			'showCaret'=>false,
			'dropdownMenuOptions'=>['class'=>'pull-right dropdown-navbar dropdown-caret dropdown-close dropdown-menu'],
		],
		['label' => '<i class="icon-bell-alt icon-animated-bell"></i><span class="badge badge-important">8</span>', 'url' =>'//javascript:void();','options'=>['class'=>'purple'],],
		['label' => '<i class="icon-envelope icon-animated-vertical"></i><span class="badge badge-success">5</span>', 'url' =>'//javascript:void();','options'=>['class'=>'green'],],
	];

//	$upColl = Yii::$app->mongodb->getCollection('users_photo');
//	$upColl->insert(['userid' => Yii::$app->user->identity->id, 'photo' => 'asfdasdfasdfasfasd']);

//'<img alt="'.Yii::$app->user->identity->username.'\'s Photo" src="assets/avatars/user.jpg" class="nav-user-photo">

	$menuItems[] = [
		'label' => Html::img(Url::toRoute(['/user/profile/get', 'id'=>'530cc89a90a9e26c1100002f'],true), ['class'=>'nav-user-photo','alt'=>Yii::$app->user->identity->username]).'<span class="user-info"><small>Welcome,</small>'.Yii::$app->user->identity->username.'</span>',
		'options'=>['class'=>'light-blue'],
		'caretHtml'=>'<i class="icon-caret-down"></i>',
		'items'=>[
			[
				'label'=>'Profile',
				'url' => ['/user/profile']
			],
			'<li class="divider"></li>',
			[
				'label'=>'Logout',
				'url' => ['/user/auth/logout']
			],
		],
		'dropdownMenuOptions'=>['class'=>'user-menu pull-right dropdown-yellow dropdown-caret dropdown-close dropdown-menu'],
	];

	echo Nav::widget([
		'options' => ['class' => 'nav ace-nav'],
		'encodeLabels'=>false,
		'items' => $menuItems,
	]);

NavBar::end();
?>

<!--
<div class="navbar navbar-default" id="navbar">
	<script type="text/javascript">
		try{ace.settings.check('navbar' , 'fixed')}catch(e){}
	</script>

	<div class="navbar-container" id="navbar-container">
		<div class="navbar-header pull-left">
			<a href="#" class="navbar-brand">
				<small>
					<i class="icon-leaf"></i>
					Ace Admin
				</small>
			</a>
		</div>

		<div class="navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="grey">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="icon-tasks"></i>
						<span class="badge badge-grey">4</span>
					</a>

					<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<i class="icon-ok"></i>
							4 Tasks to complete
						</li>

						<li>
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">Software Update</span>
									<span class="pull-right">65%</span>
								</div>

								<div class="progress progress-mini ">
									<div style="width:65%" class="progress-bar "></div>
								</div>
							</a>
						</li>

						<li>
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">Hardware Upgrade</span>
									<span class="pull-right">35%</span>
								</div>

								<div class="progress progress-mini ">
									<div style="width:35%" class="progress-bar progress-bar-danger"></div>
								</div>
							</a>
						</li>

						<li>
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">Unit Testing</span>
									<span class="pull-right">15%</span>
								</div>

								<div class="progress progress-mini ">
									<div style="width:15%" class="progress-bar progress-bar-warning"></div>
								</div>
							</a>
						</li>

						<li>
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">Bug Fixes</span>
									<span class="pull-right">90%</span>
								</div>

								<div class="progress progress-mini progress-striped active">
									<div style="width:90%" class="progress-bar progress-bar-success"></div>
								</div>
							</a>
						</li>

						<li>
							<a href="#">
								See tasks with details
								<i class="icon-arrow-right"></i>
							</a>
						</li>
					</ul>
				</li>

				<li class="purple">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="icon-bell-alt icon-animated-bell"></i>
						<span class="badge badge-important">8</span>
					</a>

					<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<i class="icon-warning-sign"></i>
							8 Notifications
						</li>

						<li>
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">
										<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
										New Comments
									</span>
									<span class="pull-right badge badge-info">+12</span>
								</div>
							</a>
						</li>

						<li>
							<a href="#">
								<i class="btn btn-xs btn-primary icon-user"></i>
								Bob just signed up as an editor ...
							</a>
						</li>

						<li>
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">
										<i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
										New Orders
									</span>
									<span class="pull-right badge badge-success">+8</span>
								</div>
							</a>
						</li>

						<li>
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">
										<i class="btn btn-xs no-hover btn-info icon-twitter"></i>
										Followers
									</span>
									<span class="pull-right badge badge-info">+11</span>
								</div>
							</a>
						</li>

						<li>
							<a href="#">
								See all notifications
								<i class="icon-arrow-right"></i>
							</a>
						</li>
					</ul>
				</li>

				<li class="green">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="icon-envelope icon-animated-vertical"></i>
						<span class="badge badge-success">5</span>
					</a>

					<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<i class="icon-envelope-alt"></i>
							5 Messages
						</li>

						<li>
							<a href="#">
								<img src="assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
								<span class="msg-body">
									<span class="msg-title">
										<span class="blue">Alex:</span>
										Ciao sociis natoque penatibus et auctor ...
									</span>

									<span class="msg-time">
										<i class="icon-time"></i>
										<span>a moment ago</span>
									</span>
								</span>
							</a>
						</li>

						<li>
							<a href="#">
								<img src="assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
								<span class="msg-body">
									<span class="msg-title">
										<span class="blue">Susan:</span>
										Vestibulum id ligula porta felis euismod ...
									</span>

									<span class="msg-time">
										<i class="icon-time"></i>
										<span>20 minutes ago</span>
									</span>
								</span>
							</a>
						</li>

						<li>
							<a href="#">
								<img src="assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
								<span class="msg-body">
									<span class="msg-title">
										<span class="blue">Bob:</span>
										Nullam quis risus eget urna mollis ornare ...
									</span>

									<span class="msg-time">
										<i class="icon-time"></i>
										<span>3:15 pm</span>
									</span>
								</span>
							</a>
						</li>

						<li>
							<a href="inbox.html">
								See all messages
								<i class="icon-arrow-right"></i>
							</a>
						</li>
					</ul>
				</li>

				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
						<span class="user-info">
							<small>Welcome,</small>
							Jason
						</span>

						<i class="icon-caret-down"></i>
					</a>

					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="#">
								<i class="icon-cog"></i>
								Settings
							</a>
						</li>

						<li>
							<a href="#">
								<i class="icon-user"></i>
								Profile
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="#">
								<i class="icon-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>

-->