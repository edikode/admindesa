<!-- start: HEADER -->
<div class="navbar navbar-inverse navbar-fixed-top">
	<!-- start: TOP NAVIGATION CONTAINER -->
	<div class="container">
		<div class="navbar-header"style="width: 700px;">
			<!-- start: RESPONSIVE MENU TOGGLER -->
			<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				<span class="clip-menu-3"></span>
			</button>
			<!-- end: RESPONSIVE MENU TOGGLER -->
			<!-- start: LOGO -->
			<a class="navbar-brand" href="{{url('admin')}}">
				<img src="{{asset('upload/gambar/'. Auth::user()->logo_desa)}}" height="55px">
			</a>
			<h3 style="margin-top:5px;margin-bottom:0px;color:white">{{Auth::user()->nama_desa}}</h3>
			<p style="margin:0px;color:white">{{Auth::user()->alamat_kantor}} <br>{{Auth::user()->telepon}}</p>
			<!-- end: LOGO -->
		</div>
		<div class="navbar-tools">
			<!-- start: TOP NAVIGATION MENU -->
			<ul class="nav navbar-right">						
				<!-- start: USER DROPDOWN -->
				@if (Auth::guest())
				<li class="dropdown" style="margin-top: 8px;">
					<a href="{{url('login')}}">
						<i class="clip-user"></i>
						&nbsp;Login
					</a>
				</li>	
				@else
				<li class="dropdown current-user">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<img src="{{asset('upload/gambar/'. Auth::user()->foto)}}" class="circle-img" alt="" width="30">
						<span class="username">{{ Auth::user()->name }}</span>
						<i class="clip-chevron-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">
								<i class="clip-user"></i>
								&nbsp;Profil
							</a>
						</li>
						<li>
							<a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="clip-exit"></i>
								&nbsp;Log Out
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
						</li>
					</ul>
				</li>
				@endif
				<!-- end: USER DROPDOWN -->
			</ul>
			<!-- end: TOP NAVIGATION MENU -->
		</div>
	</div>
	<!-- end: TOP NAVIGATION CONTAINER -->
</div>
<!-- end: HEADER -->