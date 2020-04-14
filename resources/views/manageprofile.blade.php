@extends('layouts.theme')
@section('title','Manage Profiles')
@section('main-wrapper')

	<div class="container">
		<div class="manage-profile">

		<div align="center">
				<h2>Manage Profiles:</h2>
				
		</div>
		<hr>
		<div class="row">
				@if(!isset($result))
				 <p>No Profiles Are Available For You</p>
				@endif
				<div align="center"><p id="msg"></p></div>

			<form action="{{ route('mus.pro.update',Auth::user()->id) }}" method="POST">
				{{ csrf_field() }}
			
			@if(isset($result->screen1))
			<div class="col-md-3  col-sm-4  col-xs-6">
				<div class="btm-20 manage-profile-block">

				<img class="imageprofile @if(Session::has('nickname')) {{ Session::get('nickname') == $result->screen1 ? "imgactive" : "" }} @endif" title="{{ $result->screen1 }}" src="{{ url('images/avtar/02.png') }}" alt="">
				<br>
				<input class="screen2 form-control" type="text" disabled="disabled" value="{{ $result->screen1 }}">
				</div>

			</div>
			@endif

			@if(isset($result->screen2))
			<div class="col-md-3 col-sm-4 col-xs-6">
				<div class="btm-20 manage-profile-block">
			<img class="img-fluid imageprofile @if(Session::has('nickname')) {{ Session::get('nickname') == $result->screen2 ? "imgactive" : "" }} @endif"  onclick="changescreen('{{ $result->screen2 }}')" title="{{ $result->screen2 }}" src="{{ url('images/avtar/02.png') }}" alt="{{ $result->screen2 }}" >
				<br>
				<input class="screen2 form-control" name="screen2" type="text" value="{{ $result->screen2 }}">
			</div>
				</div>
			@endif


			@if(isset($result->screen3))
			<div class="col-md-3  col-sm-4  col-xs-6">
				<div class="btm-20 manage-profile-block">
				<img class="imageprofile @if(Session::has('nickname')) {{ Session::get('nickname') == $result->screen3 ? "imgactive" : "" }} @endif" onclick="changescreen('{{ $result->screen3 }}')" title="{{ $result->screen3 }}" src="{{ url('images/avtar/02.png') }}" alt="{{ $result->screen3 }}">
				<br>
				<input class="screen2 form-control" name="screen3" type="text" value="{{ $result->screen3 }}">
				</div>
			</div>
			@endif

			@if(isset($result->screen4))
			<div class="col-md-3  col-sm-4  col-xs-6">
				<div class="btm-20 manage-profile-block">
				<img class="imageprofile @if(Session::has('nickname')) {{ Session::get('nickname') == $result->screen4 ? "imgactive" : "" }} @endif" onclick="changescreen('{{ $result->screen4 }}')" title="{{ $result->screen4 }}" src="{{ url('images/avtar/02.png') }}" alt="{{ $result->screen4 }}">
				<br>
				<input class="screen2 form-control" name="screen4" type="text" value="{{ $result->screen4 }}">
				</div>
			</div>
			@endif
 
			@if(isset($result->screen5))
			<div style="margin-top: 15px;" class="col-md-3">
				<img class="imageprofile @if(Session::has('nickname')) {{ Session::get('nickname') == $result->screen5 ? "imgactive" : "" }} @endif" onclick="changescreen('{{ $result->screen5 }}')" title="{{ $result->screen5 }}" src="{{ url('images/avtar/02.png') }}" alt="{{ $result->screen4 }}">
				<br>
				<input class="screen2 form-control" name="screen5" type="text" value="{{ $result->screen5 }}">
			</div>
			@endif

			@if(isset($result->screen6))
			<div class="col-md-4">
				<img class="imageprofile @if(Session::has('nickname')) {{ Session::get('nickname') == $result->screen6 ? "imgactive" : "" }} @endif" onclick="changescreen('{{ $result->screen6 }}')" title="{{ $result->screen6 }}" src="{{ url('images/avtar/02.png') }}" alt="{{ $result->screen6 }}">
				<br>
				<input class="screen2 form-control" name="screen6" type="text" value="{{ $result->screen6 }}">
			</div>
			@endif
		  @if(isset($result))

			<div class="mg15 col-md-12  col-sm-12 col-xs-12 col-md-offset-5">
 
				<div class="manage-profile-btn">
				<button type="submit" class="btn btn-lg btn-primary" value="Done"><i class="fa fa-check"></i> Done</button>

				</div>
			</div>
			@endif
				
			</form>
		</div>
	</div>
	</div>

@endsection

@section('custom-script')
	<script>
		function changescreen(screen){
			$.ajax({
				type : 'GET',
				data : {screen : screen},
				url  : '{{ url('/changescreen/'.Auth::user()->id) }}',
				success : function(data){
					console.log(data);
					
					$('#msg').html(data);

					

					setTimeout(function(){ 
						location.reload();
					}, 700);


				}
			});
		}
	</script>
@endsection