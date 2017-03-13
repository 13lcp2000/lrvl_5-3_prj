@extends('layouts.principal')
@section('content')
@include('alerts.success')

			<div class="contacto-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="" /></a>
					<p>Movie Theater</p>
				</div>
				<!--div class="search v-search">
					<form>
						<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
						<input type="submit" value="">
					</form>
				</div-->
			<div class="clearfix"></div>
			</div>


			<!---contacto-->
			<div class="main-contact">
			 <h3 class="head">contacto</h3>
			 <p>WE'RE ALWAYS HERE TO HELP YOU</p>
			 <div class="contacto-form">
				{!!Form::open(['route'=>'correo.store','method'=>'POST'])!!}
					 	<div class="col-md-6 contact-left">
					 		{!!Form::text('name',null,['placeholder' => 'Nombre'])!!}
					 		{!!Form::text('email',null,['placeholder' => 'Email'])!!}
						</div>
						<div class="col-md-6 contact-right">
							{!!Form::textarea('mensaje',null,['placeholder' => 'Mensaje'])!!}
						</div>
						{!!Form::submit('SEND')!!}
				{!!Form::close()!!}
		     </div>
			</div>



							<!--div class="footer">
								<h6>Disclaimer : </h6>
								<p class="claim">This is a freebies and not an official website, I have no intention of disclose any movie, brand, news.My goal here is to train or excercise my skill and share this freebies.</p>
								<a href="example@mail.com">example@mail.com</a>
								<div class="copyright">
									<p> Template by  <a href="http://w3layouts.com">  W3layouts</a></p>
								</div>
							</div>
	</div-->

@stop