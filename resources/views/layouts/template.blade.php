<!DOCTYPE html>
<html lang="en" class="no-js">  
<head>
  <title>Administrasi Desa - @yield('title')</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta content="Permendagri" name="description" />
  <meta content="http://edi-profile.co.nf" name="author" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Satisfy" rel="stylesheet">
   <link rel="shortcut icon" href="{{ asset('assets/images/foto.png') }}" />

  <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"  media="screen">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main-responsive.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/skin.css') }}" id="skin_color">
  <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/skins/all.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/css/datepicker.css') }}">

  <!-- UNTUK TABEL DATA -->   
  <link rel="stylesheet" href="{{ asset('assets/plugins/DataTables/media/css/DT_bootstrap.css') }}" />
</head>

<body>
  @include('layouts/header')
  <div class="main-container">
    @include('layouts/menu')
    <div class="main-content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              @yield('bread')
            </ol>
            <div class="page-header clearfix">
              <div class="row">
                <div class="col-sm-10"><h1>@yield('title')</h1></div>            
                <div class="col-sm-2">
                  @yield('button') 
                </div>            
              </div>  
            </div>        
          </div>
        </div>
          @yield('main')     
      </div>
    </div>
  </div>
  @include('layouts/footer')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- UNTUK FORM -->
  <script src="{{ asset('assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
  {{-- input radio --}}
  <script src="{{ asset('assets/plugins/iCheck/jquery.icheck.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jQuery-Tags-Input/jquery.tagsinput.js') }}"></script>
  {{-- untuk ckeditor textarea --}}
  <script src="{{ asset('assets/functions/ckeditor/ckeditor.js') }}"></script>
  <!-- untuk data table -->   
  <script type="text/javascript" src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/plugins/DataTables/media/js/DT_bootstrap.js') }}"></script>
  <script src="{{ asset('assets/js/table-data.js') }}"></script>
  <script src="{{ asset('assets/js/form-elements.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>
    jQuery(document).ready(function() {
      Main.init();
      // UIModals.init();
      TableData.init();
      // FormWizard.init();
      FormElements.init();
    });
  </script>

  <script type="text/javascript">
    function konfirmasiHapus() {
			if(confirm("Apakah anda ingin menghapus data ini ?"))
				return true;
			else
				return false;
		}
  </script>

</body>
  
</html>
