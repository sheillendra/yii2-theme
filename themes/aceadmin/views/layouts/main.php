<?php
use sheillendra\aceadmin\assets\AceAsset;
use sheillendra\aceadmin\assets\AceHeadAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use sheillendra\bootstrap\NavBar;
use yii\bootstrap\Collapse;
use yii\widgets\Breadcrumbs;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AceAsset::register($this);
AceHeadAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<body class="navbar-fixed">
		<?php $this->beginBody() ?>

		<?= $this->render('@sheillendra/aceadmin/views/layouts/partial/navbar.php');?>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">

				<?= $this->render('@sheillendra/aceadmin/views/layouts/partial/sidebar.php');?>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<!-- <ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">More Pages</a>
							</li>
							<li class="active">User Profile</li>
						</ul> --><!-- .breadcrumb -->
						<?= Breadcrumbs::widget([
							'encodeLabels'=>false,
							'homeLink'=>['label'=>'<i class="icon-home home-icon"></i> Home','url'=>['/site']],
							'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
						]) ?>
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<?= $content;?>
				
				</div><!-- /.main-content -->

				<?= $this->render('@sheillendra/aceadmin/views/layouts/partial/theme_setting.php');?>

			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>