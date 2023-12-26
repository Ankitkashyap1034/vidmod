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
								<h3 class="mb-0">Edit Profile</h3>
							</div>
						</div>
						<br>
						<form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
							@csrf
							<div class="row g-3">
								<div class="col-lg-6 mb-4">
									<div>
										<img class="img-fluid" width="80px" src="{{ asset('storage/profiles-img/' . Auth::user()->profile_img) }}" alt="Profile Photo"><br>
										<label class="form-label">Profile Image</label>
										<div>
											<input type="file" name="profile_photo" class="form-control" autofocus>
										</div>
									</div>
								</div>
							</div>
							<div class="row g-3">
								<div class="col-lg-6">
									<div>
										<label class="form-label">Name</label>
										<div>
											<input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" autofocus>
										</div>
										<br>
									</div>
								</div>
							</div>
							<div class="row g-3">
								<div class="col-lg-6">
									<div>
										<label class="form-label">Email</label>
										<div>
											<input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" autofocus readonly>
										</div>
										<br>
									</div>
								</div>
								<br>
								<div class="col-lg-6"></div>
								<div class="col-lg-6">
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