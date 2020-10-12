<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!doctype html>
<?php $base_url = load_class('Config')->config['base_url'];?>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo TITLE_NAME;?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
		<!-- Bace Css for this template -->
		<link href="<?php echo $base_url.ASSETS_PATH; ?>/css/base.css" rel="stylesheet">
	</head>
	<body>
		<!--Main Section Start-->
		<div class="main-section error-page">
			<!--Mid Wrapper Start-->
			<section class="mid-wrapper">
		      <div class="eliments-wrap" data-origin="<?php echo isset($origin)?$origin:''; ?>">
		        <div class="container">
		          <div class="error-page-outer">
		            <div class="empty_wrap">
		              <div class="empty_mid">
		                <h2>Oooops!</h2>
		                <span>Something went wrong!</span>
		                <p>It’s not you it’s us! Please try again soon.</p>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </section>
			<!--Mid Wrapper End--> 
		</div>
		<!--Main Section End--> 
	</body>
</html>
<?php exit; ?>