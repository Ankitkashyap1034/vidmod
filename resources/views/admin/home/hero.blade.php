@extends('admin.layout.base')
@section('content')
<div class="container">
	@if ($errors->any())
	<!-- Common error section -->
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="main_content_iner ">
		<div class="container-fluid p-0">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="white_box mb_30">
						<div class="box_header ">
							<div class="main-title">
								<br><br>
								@php
								$languageName = DB::table('language',$homeHero->lang_prefix)->first();
								@endphp
								<h3 class="mb-0">Home Page hero Setting ({{$languageName->name}})</h3>
							</div>
						</div>
						<br>
						<form method="post" action="{{route('admin.home.hero.store')}}" enctype="multipart/form-data" class="mb-4">
							@csrf
							<div class="row g-3">
								<div class="col-lg-6">
									<div>
										<label class="form-label">Title</label><span>*</span>
										<div>
											<input type="hidden" name="home_hero_id" valu="{{$homeHero->id}}" />
											<input type="text" name="title" class="form-control" autofocus required value="{{ $homeHero->title }}" />
										</div>
										<br>
									</div>
								</div>
								<div class="col-lg-6">
									<div>
										<label class="form-label">Sub title</label><span>*</span>
										<div>
											<input name="sub_title" class="form-control" autofocus required value="{{ $homeHero->sub_title }}" />
										</div>
										<br>
									</div>
								</div>
								<br>
							</div>
							<div class="row g-3">
								<!-- <div class="col-lg-6 mb-2"> -->
								<!-- <div>
										<img class="img-fluid" width="170px" height="100px" src="{{ asset('storage/home/hero/' . $homeHero->hero_image) }}" alt="Profile Photo"><br>
										<label class="form-label">Hero Image</label><span>*</span>
										<div>
											<input type="file" name="hero_image" class="form-control" autofocus>
										</div>
										<br>
									</div> -->
								<!-- </div> -->
								<!-- <div class="col-lg-6"></div> -->
								<!-- <div class="col-lg-6 mb-2">
									<div>
										<label class="form-label">Hero Background gradiant color</label>
										<span>(select 3 colors)</span><span>*</span>
										<div>
											{{-- <input name="background_gradiant_colour" class="form-control" autofocus required /> --}}
											<input type="color" id="color" name="color1" value="{{ $homeHero->color1 }}" required />
											<input type="color" id="color" name="color2" value="{{ $homeHero->color2 }}" required />
											<input type="color" id="color" name="color3" value="{{ $homeHero->color3 }}" required />
										</div>
										<br>
									</div>
								</div> -->

								<div class="col-lg-6 mb-2">
									<div>
										<label class="form-label">Button Text</label><span>*</span>
										<div>
											<input name="button_text" class="form-control" autofocus required value="{{ $homeHero->button_text }}" />
										</div>
										<br>
									</div>
								</div>

								<div class="col-lg-6 mb-2">
									<div>
										<label class="form-label">Security Text</label><span>*</span>
										<div>
											<input name="mini_security_title" class="form-control" autofocus required value="{{ $homeHero->mini_security_title }}" />
										</div>
										<br>
									</div>
								</div>
								<!-- <div class="col-lg-6"></div> -->
								<div class="col-lg-6 mb-1">
									<div>
										<label class="form-label">Hero Section Descritpion</label><span>*</span>
										<div>
											<textarea id="editor" rows="10" cols="30" name="hero_description"></textarea>
										</div>
										<br>
									</div>
								</div>
								<div class="col-lg-6"></div>
								<div class="col-lg-6 mb-4">
									<div>
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
									<br>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection