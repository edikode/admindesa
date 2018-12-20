@if(count($errors) > 0)
	<div class='successHandler alert alert-danger display'>
		{{-- @foreach($errors->all() as $error) --}}
		<i class='glyphicon glyphicon-remove'></i> Terjadi Kesalahan Pada Inputan
		{{-- @endforeach --}}
	</div>
@elseif(Session::has('pesan_sukses'))
	<div class='successHandler alert alert-success display'>
		<i class='icon-ok'></i> {{ Session::get('pesan_sukses')}}
	</div>
@elseif(Session::has('pesan_error'))
	<div class='successHandler alert alert-danger display'>
		<i class='glyphicon glyphicon-remove'></i> {{ Session::get('pesan_error')}}
	</div>
@endif