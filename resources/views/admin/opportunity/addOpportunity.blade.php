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
								<h3 class="mb-0">Add Opportunity</h3>
							</div>
						</div><br>

						<form method="post"  action="{{ route('admin.addOpportunity')}}" enctype="multipart/form-data">						

							@csrf
							<div class="row g-3">
								<div class="col-lg-6">
									<div>
										<label class="form-label">Image (Only jpeg/jpg/png)</label>
										<div>
											<input type="file" name="image" class="form-control" required autofocus>
										</div>
									</div>
								</div>

								

								<div class="col-lg-6">
									<div>
										<label class="form-label">Preview Image (Only jpeg/jpg/png)</label>
										<div>
											<input type="file" name="redirect_url" class="form-control"  autofocus>
										</div><br>
									</div>
								</div>

								

								<div class="col-lg-6">
									<div>
										<label class="form-label">Title</label>
										<div>
											<input type="text" name="title" class="form-control" required  autofocus>
										</div><br>
									</div>
								</div>

								

								<div class="col-lg-6">
									<div>
										<label class="form-label">Descriptions</label>
										<div>
											<input type="text" name="description" class="form-control" required  autofocus>
										</div><br>
									</div>
								</div>

								

								<div class="col-lg-6">
									<div>
										<button type="submit" class="btn btn-primary btn-sm">Submit</button>
									</div><br>
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