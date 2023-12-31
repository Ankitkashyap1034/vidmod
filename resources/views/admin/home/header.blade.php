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
								<h3 class="mb-0">Header Setting</h3>
							</div>
						</div>
						<br>
						<form method="post" action="{{ route('admin.home.header.store') }}" enctype="multipart/form-data">
							@csrf
							<div class="row g-3">
								<div class="col-lg-6 mb-4">
									<div>
										<img class="img-fluid" width="220px" src="{{asset('/header/'.$headerData->logo)}}" alt="Logo Photo"><br>
										<label class="form-label">Header Logo</label>
										<div>
											<input type="file" name="logo_img" class="form-control" autofocus />
										</div>
									</div>
								</div>
							</div>
							<div class="row g-3">
								<div class="col-lg-6">
									<div>
										<label class="form-label">Languages</label>
										<div>
											<input type="text" name="language" class="form-control" autofocus />
										</div>
										<br>
									</div>
								</div>
							</div>
							<div class="row g-3">
								{{-- <div class="col-lg-6">
									<div>
										<label class="form-label">Description</label>
										<div>
											<textarea name="description" class="form-control" autofocus required></textarea>
										</div>
										<br>
									</div>
								</div> --}}
								{{-- <br> --}}
								{{-- <div class="col-lg-6"></div> --}}
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
