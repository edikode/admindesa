<div class="navbar-content">
	<div class="main-navigation navbar-collapse collapse">
		<div class="navigation-toggler">
			<i class="clip-chevron-left"></i>
			<i class="clip-chevron-right"></i>
		</div>
		<ul class="main-navigation-menu">
			<li class="{{ set_active('home') }}">
				<a href="{{ url('home') }}"><i class="icon-laptop"></i>
					<span class="title">Home</span>
					<span class="selected"></span>					
				</a>
			</li>			
			<li class="{{ set_active(['data-peraturan-desa', Request::is('data-peraturan-desa/*')]) }}">
				<a href="javascript:void(0)"><i class="clip-book"></i>
					<span class="title">Administrasi Umum</span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu">					
					<li class="{{ set_active(['data-peraturan-desa', Request::is('data-peraturan-desa/*')]) }}">
						<a href="{{ url('/data-peraturan-desa') }}"><span class='title'>Data Peraturan Desa</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Data Keputusan Kepala Desa</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Data Inventaris KekayaanDesa</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Data Aparat Pemerintah Desa</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Data Tanah Milik Desa/Tanah Kas Desa</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Data Tanah di Desa</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Agenda</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Ekspedisi</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Lembaran Desa dan Buku Berita Desa</span></a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="javascript:void(0)"><i class="clip-book"></i>
					<span class="title">Administrasi Penduduk</span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu">					
					<li class="">
						<a href="#"><span class='title'>Data Induk Penduduk Desa</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Data Mutasi Penduduk Desa</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Data Rekapitulasi Jumlah Penduduk Akhir Bulan</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Data Penduduk Sementara</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Kartu Tanda Penduduk dan Buku Kartu Keluarga </span></a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="javascript:void(0)"><i class="clip-book"></i>
					<span class="title">Admin Pembangunan</span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu">					
					<li class="">
						<a href="#"><span class='title'>Rencana Kerja Pembangunan Desa</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Kegiatan Pembangunan</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Inventaris hsl hsl Pembangunan</span></a>
					</li>
					<li class="">
						<a href="#"><span class='title'>Kader Pendampingan dan Pemberdayaan Masyarakat</span></a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="javascript:void(0)"><i class="clip-book"></i>
					<span class="title">Administrasi Lainnya</span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu">					
					<li class="">
						<a href="#"><span class='title'>Belum ada</span></a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="#"><i class="clip-users"></i>
					<span class="title">Pengguna</span>
					<span class="selected"></span>
				</a>
			</li>
			<li>
				<a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                 	document.getElementById('logout-form').submit();">
                    <i class="clip-exit"></i>
					<span class="title">Keluar</span>
					<span class="selected"></span>
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
			</li>				
		</ul>
	</div>
</div>