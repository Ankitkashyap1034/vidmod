@extends('admin.layout.base')
@section('content')
<div class="container">
	<div class="main_content_iner ">
		<div class="container-fluid p-0">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="white_box mb_30">
						<div class="box_header ">
							<div class="main-title">
								<br><br>
								<h3 class="mb-0">Home Page Setting</h3>
							</div>
						</div>
						<br>
						<form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
							@csrf
							<div class="row g-3">
								<div class="col-lg-6 mb-4">
									<div>
										<img class="img-fluid" width="220px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWGfh6pjJP8rXcbljcag3EF-PWRJxF9qAbDw&usqp=CAU" alt="Profile Photo"><br>
										<label class="form-label">Home Banner Image</label>
										<div>
											<input type="file" name="home_banner" class="form-control" autofocus required>
										</div>
									</div>
								</div>
							</div>
							<div class="row g-3">
								<div class="col-lg-6">
									<div>
										<label class="form-label">Title</label>
										<div>
											<input type="text" name="title" class="form-control" autofocus required>
										</div>
										<br>
									</div>
								</div>
							</div>
							<div class="row g-3">
								<div class="col-lg-6">
									<div>
										<label class="form-label">Sub title</label>
										<div>
											<input name="sub_title" class="form-control" autofocus required />
										</div>
										<br>
									</div>
								</div>
								<br>
								{{-- <div class="col-lg-6"></div>
								<div class="col-lg-6">
									<div>
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
									<br>
								</div> --}}
							</div>
							<div class="row g-3">
							<div class="col-lg-6 mb-2">
								<div>
									<img class="img-fluid" width="220px" src="https://i.insider.com/5c8ad18901df72475263ddb4?width=1136&format=jpeg" alt="Profile Photo"><br>
									<label class="form-label">Hero Image</label>
									<div>
										<input type="file" name="hero_image" class="form-control" autofocus required>
									</div>
									<br>
								</div>
							</div>
							<div class="col-lg-6"></div>
							<div class="col-lg-6">
								<div>
									<label class="form-label">Hero Background gradiant color</label>
									<div>
										<input name="background_gradiant_colour" class="form-control" autofocus required />
									</div>
									<br>
								</div>
							</div>
							
							<div class="col-lg-6"></div>
							<div class="col-lg-6 mb-2">
								<div>
									<label class="form-label">Button Text</label>
									<div>
										<input name="button_text" class="form-control" autofocus required />
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