<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Sistem Informasi Akademik SMK </title>
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="and Validation" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
    <script src="assets/js/ace-extra.min.js"></script>
  </head>

    <body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">SIAK</span>
									<span class="white" id="id-text2">Login Siswa</span>
								</h1>
							
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
										

									<div class="space-6"></div>
<!-- role="form" -->
                                       <form id="loginform" class="form-signin" role="form" action="proseslogin.php" method="GET">
                                        
                                         <div style="margin-bottom: 25px" class="input-group">
                                                                
                                                                <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or HP No">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                                        
                                                            </div>
                                                        
                                                    <div style="margin-bottom: 25px" class="input-group">
                                                                
                                                                <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                            </div>
                                                   
                                                    
                                
                                
                                                        <div style="margin-top:10px" class="form-group">
                                                            <!-- Button -->
                                
                                                            <div class="col-sm-12 controls">
                                                              <button class="btn btn-primary btn-block" name="login" value="login"><i class="glyphicon glyphicon-log-in form-control-feedback"> </i> &nbsp;Login</button><br>
                                      </form>

                                     </div> <!-- /container -->
                                </div>
                            </div>
                         
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
</div>
</div>

                    
                        
<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>

    
    