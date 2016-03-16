<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@yield('meta')
	
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('/assets/backend/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/assets/backend/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/assets/backend/css/core.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/assets/backend/css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/assets/backend/css/colors.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('/assets/backend/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/backend/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/backend/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/backend/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('/assets/backend/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/backend/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/backend/js/plugins/editors/summernote/summernote.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/backend/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/backend/js/plugins/media/fancybox.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('/assets/backend/js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/backend/js/pages/datatables_basic.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/backend/js/pages/editor_summernote.js') }}"></script>

	<script type="text/javascript" src="{{ asset('/assets/backend/js/script.js') }}"></script>
	<!-- /theme JS files -->

</head>

<body>
	
	@if (Auth::guest())
        
    @else
		<!-- Main navbar -->
		<div class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ url('/adminpanel') }}"><img src="{{ asset('/assets/backend/images/logo_light.png') }}" alt=""></a>

				<ul class="nav navbar-nav visible-xs-block">
					<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
					<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
				</ul>
			</div>

			<div class="navbar-collapse collapse" id="navbar-mobile">
				<ul class="nav navbar-nav">
					<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-git-compare"></i>
							<span class="visible-xs-inline-block position-right">Git updates</span>
							<span class="badge bg-warning-400">9</span>
						</a>
						
						<div class="dropdown-menu dropdown-content">
							<div class="dropdown-content-heading">
								Git updates
								<ul class="icons-list">
									<li><a href="#"><i class="icon-sync"></i></a></li>
								</ul>
							</div>

							<ul class="media-list dropdown-content-body width-350">
								<li class="media">
									<div class="media-left">
										<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
									</div>

									<div class="media-body">
										Drop the IE <a href="#">specific hacks</a> for temporal inputs
										<div class="media-annotation">4 minutes ago</div>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
									</div>
									
									<div class="media-body">
										Add full font overrides for popovers and tooltips
										<div class="media-annotation">36 minutes ago</div>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
									</div>
									
									<div class="media-body">
										<a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
										<div class="media-annotation">2 hours ago</div>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
									</div>
									
									<div class="media-body">
										<a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
										<div class="media-annotation">Dec 18, 18:36</div>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
									</div>
									
									<div class="media-body">
										Have Carousel ignore keyboard events
										<div class="media-annotation">Dec 12, 05:46</div>
									</div>
								</li>
							</ul>

							<div class="dropdown-content-footer">
								<a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
							</div>
						</div>
					</li>
				</ul>

				<p class="navbar-text"><span class="label bg-success-400">Online</span></p>

				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-bubbles4"></i>
							<span class="visible-xs-inline-block position-right">Messages</span>
							<span class="badge bg-warning-400">2</span>
						</a>
						
						<div class="dropdown-menu dropdown-content width-350">
							<div class="dropdown-content-heading">
								Messages
								<ul class="icons-list">
									<li><a href="#"><i class="icon-compose"></i></a></li>
								</ul>
							</div>

							<ul class="media-list dropdown-content-body">
								<li class="media">
									<div class="media-left">
										<img src="{{ asset('/assets/backend/images/users/placeholder.jpg') }}" class="img-circle img-sm" alt="">
										<span class="badge bg-danger-400 media-badge">5</span>
									</div>

									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold">James Alexander</span>
											<span class="media-annotation pull-right">04:58</span>
										</a>

										<span class="text-muted">who knows, maybe that would be the best thing for me...</span>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<img src="{{ asset('/assets/backend/images/users/placeholder.jpg') }}" class="img-circle img-sm" alt="">
										<span class="badge bg-danger-400 media-badge">4</span>
									</div>

									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold">Margo Baker</span>
											<span class="media-annotation pull-right">12:16</span>
										</a>

										<span class="text-muted">That was something he was unable to do because...</span>
									</div>
								</li>

								<li class="media">
									<div class="media-left"><img src="{{ asset('/assets/backend/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></div>
									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold">Jeremy Victorino</span>
											<span class="media-annotation pull-right">22:48</span>
										</a>

										<span class="text-muted">But that would be extremely strained and suspicious...</span>
									</div>
								</li>

								<li class="media">
									<div class="media-left"><img src="{{ asset('/assets/backend/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></div>
									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold">Beatrix Diaz</span>
											<span class="media-annotation pull-right">Tue</span>
										</a>

										<span class="text-muted">What a strenuous career it is that I've chosen...</span>
									</div>
								</li>

								<li class="media">
									<div class="media-left"><img src="{{ asset('/assets/backend/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></div>
									<div class="media-body">
										<a href="#" class="media-heading">
											<span class="text-semibold">Richard Vango</span>
											<span class="media-annotation pull-right">Mon</span>
										</a>
										
										<span class="text-muted">Other travelling salesmen live a life of luxury...</span>
									</div>
								</li>
							</ul>

							<div class="dropdown-content-footer">
								<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
							</div>
						</div>
					</li>

					<li class="dropdown dropdown-user">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{ asset('/assets/backend/images/users') }}{{ Auth::user()->foto ? '/'.Auth::user()->foto : '/placeholder.jpg'}}" alt="" class="img-circle img-sm">
							<span>{{ ucfirst(trans(Auth::user()->name)) }}</span>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
							<li><a href="#"><i class="icon-coins"></i> My balance</a></li>
							<li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
							<li><a href="{{ url('/adminpanel/logout') }}"><i class="icon-switch2"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!-- /main navbar -->
    @endif


	<!-- Page container -->
	<div class="page-container @yield('class_page_container')">

		<!-- Page content -->
		<div class="page-content">

			@if (Auth::guest())
				
				@yield('form_login')

				@yield('form_reset_pass')

			@else
				<!-- Main sidebar -->
				<div class="sidebar sidebar-main">
					<div class="sidebar-content">

						<!-- User menu -->
						<div class="sidebar-user">
							<div class="category-content">
								<div class="media">
									<a href="#" class="media-left"><img src="{{ asset('/assets/backend/images/users') }}{{ Auth::user()->foto ? '/'.Auth::user()->foto : '/placeholder.jpg'}}" class="img-circle img-sm" alt=""></a>
									<div class="media-body">
										<span class="media-heading text-semibold">{{ ucfirst(trans(Auth::user()->name)) }}</span>
										<div class="text-size-mini text-muted">
											<i class="icon-pin text-size-small"></i> &nbsp;Tempat
										</div>
									</div>

									<div class="media-right media-middle">
										<ul class="icons-list">
											<li>
												<a href="{{ url('/adminpanel/users/'.Auth::user()->id.'/edit') }}"><i class="icon-cog3"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /user menu -->


						<!-- Main navigation -->
						<div class="sidebar-category sidebar-category-visible">
							<div class="category-content no-padding">
								<ul class="navigation navigation-main navigation-accordion">

									<!-- Main -->
									<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
									<li class="{{ Request::segment(2) === '' ? 'active' : null }}"><a href="{{ url('/adminpanel') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
									<li class="{{ Request::segment(2) === 'users' ? 'active' : null }}"><a href="{{ url('/adminpanel/users') }}"><i class="icon-users"></i> <span>Manage Users</span></a></li>
									<li class="{{ Request::segment(2) === 'pages' ? 'active' : null }}">
										<a href="#"><i class="icon-stack2"></i> <span>Pages</span></a>
										<ul>
											@foreach ($pages as $page)
											<li><a href="{{ url('/adminpanel/pages/'.$page->id.'/edit') }}">{{ $page->page }}</a></li>
											@endforeach
										</ul>
									</li>
									<li class="{{ Request::segment(2) === 'gallery' ? 'active' : null }}"><a href="{{ url('/adminpanel/gallery') }}"><i class="icon-images2"></i> <span>Gallery</span></a></li>
									<li class="{{ Request::segment(2) === 'article' ? 'active' : null }}"><a href="{{ url('/adminpanel/article') }}"><i class="icon-stack"></i> <span>Manage Article</span></a></li>

								</ul>
							</div>
						</div>
						<!-- /main navigation -->

					</div>
				</div>
				<!-- /main sidebar -->


				<!-- Main content -->
				<div class="content-wrapper">

					<!-- Page header -->
					<div class="page-header">
						<div class="page-header-content">
							<div class="page-title">
								<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Adminpanel</span> - @yield('title')</h4>
							</div>
						</div>

						<div class="breadcrumb-line">
							<ul class="breadcrumb">
								<li><a href="{{ url('/adminpanel') }}"><i class="icon-home2 position-left"></i> Home</a></li>
								<li class="active">@yield('title')</li>
							</ul>
						</div>
					</div>
					<!-- /page header -->
					@yield('header_content')

					@yield('content')

				</div>
				<!-- /main content -->
			@endif

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>