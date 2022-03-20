
<!DOCTYPE html>
<html lang="zxx">
<head>
<title> Đăng nhập admin</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="{{asset('public/backend/css1/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('public/backend/css1/snow.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('public/backend/css1/component.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('public/backend/css1/style_grid.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('public/backend/css1/style.css')}}" rel="stylesheet" type="text/css" media="all" />

<link href="{{asset('public/backend/css1/font-awesome.css')}}" rel="stylesheet"> 

<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
			
						<div class="pages_agile_info_w3l">
						
							   <div class="over_lay_agile_pages_w3ls">
								    <div class="registration">
								
												<div class="signin-form profile">
													<h2>Dăng nhập Admin</h2>
													@if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                @if (session('login_admin'))
                                                    <div class="alert alert-danger text-center">
                                                        {{ session('login_admin') }}
                                                    </div>
                                                @endif
													<div class="login-form">
														<form action="{{url('admin-dashboard')}}" method="post">
															@csrf
															<input type="text" name="admin_username" placeholder="Nhập username" >
															<input type="password" name="admin_password" placeholder="Nhập password" >
															<div class="tp">
																<input type="submit" value="Đăng nhập">
															</div>
														</form>
													</div>
													
												</div>
										</div>
									
											<div class="copyrights_agile">
												 <p>Nhóm 14</a> </p>
											</div>	
									
						    </div>
						</div>
				

          <script type="text/javascript" src="{{asset('public/backend/js1/jquery-2.1.4.min.js')}}"></script>
		  <script src="{{asset('public/backend/js1/modernizr.custom.js')}}"></script>
		
		   <script src="{{asset('public/backend/js1/classie.js')}}"></script>
		  <script src="{{asset('public/backend/js1/gnmenu.js')}}"></script>
		  <script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		 </script>
	


<script src="{{asset('public/backend/js1/screenfull.js')}}"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
<script src="{{asset('public/backend/js1/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/js1/scripts.js')}}"></script>
<script src="{{asset('public/backend/js1/snow.js')}}"></script>
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript" src="{{asset('public/backend/js1/bootstrap-3.1.1.min.js')}}"></script>


</body>
</html>