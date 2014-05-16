<?php
use yii\helpers\Html;
use yii\helpers\Url;


/**
 * @var yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */
if ($name=='Not Found (#404)'){
	echo $this->render('error_404',['name'=>$name,'message'=>$message]);
}else{
$this->title = $name;
$this->params['breadcrumbs'][]=$name;
?>

<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->

			<div class="error-container">
				<div class="well">
					<h1 class="grey lighter smaller">
						<span class="blue bigger-125">
							<i class="icon-random"></i>
						</span>
						<?= Html::encode($this->title) ?>
					</h1>

					<hr />
					<div class="alert alert-danger">
						<?= nl2br(Html::encode($message)) ?>
					</div>
					<h3 class="lighter smaller">
						But we are working
						<i class="icon-wrench icon-animated-wrench bigger-125"></i>
						on it!
					</h3>

					<div class="space"></div>

					<div>
						<h4 class="lighter smaller">Meanwhile, try one of the following:</h4>

						<ul class="list-unstyled spaced inline bigger-110 margin-15">
							<li>
								<i class="icon-hand-right blue"></i>
								Read the faq
							</li>

							<li>
								<i class="icon-hand-right blue"></i>
								Give us more info on how this specific error occurred!
							</li>
						</ul>
					</div>

					<hr />
					<div class="space"></div>

					<div class="center">
						<a href="#" class="btn btn-grey">
							<i class="icon-arrow-left"></i>
							Go Back
						</a>

						<a href="<?=Url::to('/dashboard');?>" class="btn btn-primary">
							<i class="icon-dashboard"></i>
							Dashboard
						</a>
					</div>
				</div>
			</div>

			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
<?php
	}
?>