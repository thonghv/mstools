<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Đăng Nhập Quẩn Trị Hệ Thống</title>
		<meta name="description" content="User login page" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/bootstrap-responsive.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.0.1/css/font-awesome.css" />
		<!-- page specific plugin styles -->

		<!-- bookstore styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/ace.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/ace-responsive.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/admin/ace-skins.min.css">
		<!--[if lt IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

	</head>

	<body class="login-layout">
	
		<div class="container-fluid" id="main-container">
			<div id="main-content">
				<div class="row-fluid">
					<div class="span12" style = "margin-top: 130px;">
<div class="row-fluid">
	<div class="center">
		<h1><i class=""></i> <span class="red">&nbsp;&nbsp;&nbsp; MsTools - </span> <span class="white">Quản Trị Hệ Thống</span></h1>
	</div>
</div>						
<div class="login-container">

<div class="space-6"></div>

<div class="row-fluid">

<div class="position-relative">


	<div id="login-box" class="visible widget-box no-border" style="width:400px;">

		<div class="widget-body">
		 <div class="widget-main" >
			<h4 class="header lighter bigger"><i class="icon-coffee green"></i> Thông Tin Đăng Nhập</h4>
             <?php if (isset($error)&&$error!="") {?>
			  <h6 style="color:#F00;"><?php  echo "$error" ?></h6>
            <?php } ?>
			<div class="space-6"></div>
			
			<form enctype="multipart/form-data" action="<?php echo base_url(); ?>login/checklogin" method="post">
				 <fieldset>
					<label>
						<span class="block input-icon input-icon-right">
							<input type="text" class="span12" placeholder="Username" id="username" name="Username"/>
							<i class="icon-user"></i>
						</span>
					</label>
					<label>
						<span class="block input-icon input-icon-right">
							<input type="password" class="span12" placeholder="Password"  id="password" name="Password"/>
							<i class="icon-lock"></i>
						</span>
					</label>
					<div class="space"></div>
					<div class="row-fluid">
						<button class="span4 btn btn-small btn-primary">Đăng Nhập</button>
					</div>
					
				  </fieldset>
			</form>
		 </div><!--/widget-main-->
         
			
</div><!--/position-relative-->
	
</div>


</div>


					</div><!--/span-->
				</div><!--/row-->
			</div>
		</div><!--/.fluid-container-->


		<!-- basic scripts -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript">
		window.jQuery || document.write("<script src='<?php echo base_url();?>/public/js/jquery-1.9.1.min.js'>\x3C/script>");
		</script>


		<!-- page specific plugin scripts -->
		

		<!-- inline scripts related to this page -->
		
		<script type="text/javascript">
		
function show_box(id) {
 $('.widget-box.visible').removeClass('visible');
 $('#'+id).addClass('visible');
}

		</script>

	</body>
</html>
