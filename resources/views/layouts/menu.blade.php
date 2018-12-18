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
			<li class="{{ set_active([
				'data-peraturan-desa', Request::is('data-peraturan-desa/*'),
				'data-inventaris-kekayaan-desa', Request::is('data-inventaris-kekayaan-desa/*'),
				'data-aparat-pemerintah-desa', Request::is('data-aparat-pemerintah-desa/*'),
				'data-agenda', Request::is('data-agenda/*'),
				'data-tanah-kas-desa', Request::is('data-tanah-kas-desa/*'),
				'data-tanah-di-desa', Request::is('data-tanah-di-desa/*'),
				'data-ekspedisi', Request::is('data-ekspedisi/*'),
				'data-lembaran-desa', Request::is('data-lembaran-desa/*'),
				'data-keputusan-kepala-desa', Request::is('data-keputusan-kepala-desa/*')
			]) }}">
				<a href="javascript:void(0)"><i class="clip-book"></i>
					<span class="title">Administrasi Umum</span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu">					
					<li class="{{ set_active(['data-peraturan-desa', Request::is('data-peraturan-desa/*')]) }}">
						<a href="{{ url('/data-peraturan-desa') }}"><span class='title'>Data Peraturan Desa</span></a>
					</li>
					<li class="{{ set_active(['data-keputusan-kepala-desa', Request::is('data-keputusan-kepala-desa/*')]) }}">
						<a href="{{ url('/data-keputusan-kepala-desa') }}"><span class='title'>Data Keputusan Kepala Desa</span></a>
					</li>
					<li class="{{ set_active(['data-inventaris-kekayaan-desa', Request::is('data-inventaris-kekayaan-desa/*')]) }}">
						<a href="{{ url('/data-inventaris-kekayaan-desa') }}"><span class='title'>Data Inventaris Kekayaan Desa</span></a>
					</li>
					<li class="{{ set_active(['data-aparat-pemerintah-desa', Request::is('data-aparat-pemerintah-desa/*')]) }}">
						<a href="{{ url('/data-aparat-pemerintah-desa') }}"><span class='title'>Data Aparat Pemerintah Desa</span></a>
					</li>
					<li class="{{ set_active(['data-tanah-kas-desa', Request::is('data-tanah-kas-desa/*')]) }}">
						<a href="{{ url('/data-tanah-kas-desa') }}"><span class='title'>Data Tanah Milik Desa/Tanah Kas Desa</span></a>
					</li>
					<li class="{{ set_active(['data-tanah-di-desa', Request::is('data-tanah-di-desa/*')]) }}">
						<a href="{{ url('/data-tanah-di-desa') }}"><span class='title'>Data Tanah di Desa</span></a>
					</li>
					<li class="{{ set_active(['data-agenda', Request::is('data-agenda/*')]) }}">
						<a href="{{ url('/data-agenda') }}"><span class='title'>Agenda</span></a>
					</li>
					<li class="{{ set_active(['data-ekspedisi', Request::is('data-ekspedisi/*')]) }}">
						<a href="{{ url('/data-ekspedisi') }}"><span class='title'>Ekspedisi</span></a>
					</li>
					<li class="{{ set_active(['data-lembaran-desa', Request::is('data-lembaran-desa/*')]) }}">
						<a href="{{ url('/data-lembaran-desa') }}"><span class='title'>Lembaran Desa dan Buku Berita Desa</span></a>
					</li>
				</ul>
			</li>
			<li class="{{ set_active([
				'data-induk-penduduk-desa', Request::is('data-induk-penduduk-desa/*'),
				'data-mutasi-penduduk-desa', Request::is('data-mutasi-penduduk-desa/*'),
				'data-rekapitulasi-penduduk', Request::is('data-rekapitulasi-penduduk/*'),
				'data-penduduk-sementara', Request::is('data-penduduk-sementara/*'),
				'data-ktp-dan-kk', Request::is('data-ktp-dan-kk/*')
			]) }}">
				<a href="javascript:void(0)"><i class="clip-book"></i>
					<span class="title">Administrasi Penduduk</span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu">					
					<li class="{{ set_active(['data-induk-penduduk-desa', Request::is('data-induk-penduduk-desa/*')]) }}">
						<a href="{{ url('/data-induk-penduduk-desa') }}"><span class='title'>Data Induk Penduduk Desa</span></a>
					</li>
					<li class="{{ set_active(['data-mutasi-penduduk-desa', Request::is('data-mutasi-penduduk-desa/*')]) }}">
						<a href="{{ url('/data-mutasi-penduduk-desa') }}"><span class='title'>Data Mutasi Penduduk Desa</span></a>
					</li>
					<li class="{{ set_active(['data-rekapitulasi-penduduk', Request::is('data-rekapitulasi-penduduk/*')]) }}">
						<a href="data-rekapitulasi-penduduk"><span class='title'>Data Rekapitulasi Jumlah Penduduk Akhir Bulan</span></a>
					</li>
					<li class="{{ set_active(['data-penduduk-sementara', Request::is('data-penduduk-sementara/*')]) }}">
						<a href="{{ url('/data-penduduk-sementara') }}"><span class='title'>Data Penduduk Sementara</span></a>
					</li>
					<li class="{{ set_active(['data-ktp-dan-kk', Request::is('data-ktp-dan-kk/*')]) }}">
						<a href="{{ url('/data-ktp-dan-kk') }}"><span class='title'>Buku Kartu Tanda Penduduk dan Kartu Keluarga </span></a>
					</li>
				</ul>
			</li>
			<li class="{{ set_active([
				'rencana-kerja-pembangunan-desa', Request::is('rencana-kerja-pembangunan-desa/*'),
				'kegiatan-pembangunan', Request::is('kegiatan-pembangunan/*'),
				'inventaris-hasil-pembangunan', Request::is('inventaris-hasil-pembangunan/*'),
				'kader-pendamping-masyarakat', Request::is('kader-pendamping-masyarakat/*')
			]) }}">
				<a href="javascript:void(0)"><i class="clip-book"></i>
					<span class="title">Admin Pembangunan</span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu">					
					<li class="{{ set_active(['rencana-kerja-pembangunan-desa', Request::is('rencana-kerja-pembangunan-desa/*')]) }}">
						<a href="{{ url('/rencana-kerja-pembangunan-desa') }}"><span class='title'>Rencana Kerja Pembangunan Desa</span></a>
					</li>
					<li class="{{ set_active(['kegiatan-pembangunan', Request::is('kegiatan-pembangunan/*')]) }}">
						<a href="{{ url('/kegiatan-pembangunan') }}"><span class='title'>Kegiatan Pembangunan</span></a>
					</li>
					<li class="{{ set_active(['inventaris-hasil-pembangunan', Request::is('inventaris-hasil-pembangunan/*')]) }}">
						<a href="{{ url('/inventaris-hasil-pembangunan') }}"><span class='title'>Inventaris hsl hsl Pembangunan</span></a>
					</li>
					<li class="{{ set_active(['kader-pendamping-masyarakat', Request::is('kader-pendamping-masyarakat/*')]) }}">
						<a href="{{ url('/kader-pendamping-masyarakat') }}"><span class='title'>Kader Pendampingan dan Pemberdayaan Masyarakat</span></a>
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