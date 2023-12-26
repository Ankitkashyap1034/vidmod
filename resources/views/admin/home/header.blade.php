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
										<label class="form-label">Main Heading</label>
										<div>
											<input type="text" name="heading" class="form-control" autofocus required>
										</div>
										<br>
									</div>
								</div>
							</div>
							<div class="row g-3">
								<div class="col-lg-6">
									<div>
										<label class="form-label">Description</label>
										<div>
											<textarea name="description" class="form-control" autofocus required></textarea>
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