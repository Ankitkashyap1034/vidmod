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

								<h3 class="mb-0">Add Stock</h3>

							</div>

						</div><br>

						<form method="post"  action="{{ route('admin.addstock')}}" enctype="multipart/form-data">

							

							@csrf

							<div class="row g-3">

								<div class="col-lg-6">

									<div>

										<label class="form-label">Company Logo</label>

										<div>

											<input type="file" name="company_logo" class="form-control" autofocus>

										</div>

									</div>

								</div>

								

								<div class="col-lg-6">

									<div>

										<label class="form-label">Company Stock Symbol</label>

										<div>

											<input type="text" name="company_symbol" class="form-control"  autofocus required>

										</div><br>

									</div>

								</div>

								

									<div class="col-lg-6">

									<div>

										<label class="form-label">Company Name</label>

										<div>

											<input type="text" name="company_name" class="form-control"  autofocus required>

										</div><br>

									</div>

								</div>

								

									<div class="col-lg-6">

									<div>

										<label class="form-label">Current Market Price</label>

										<div>

											<input type="text" name="cmp" class="form-control"  autofocus required>

										</div>

									</div>

								</div>

								

								<div class="col-lg-6">

									<div>

										<label class="form-label">Gain/Loss</label>

										<div>

											<input type="text" name="gain_loss" class="form-control"  autofocus required>

										</div>

									</div>

								</div>

								

								<div class="col-lg-6">

									<div>

										<label class="form-label">Open</label>

										<div>

											<input type="text" name="open" class="form-control"  autofocus required>

										</div><br>

									</div>

								</div>

								

								<div class="col-lg-6">

									<div>

										<label class="form-label">Day High</label>

										<div>

											<input type="text" name="day_high" class="form-control"  autofocus required>

										</div><br>

									</div>

								</div>

								

								<div class="col-lg-6">

									<div>

										<label class="form-label">Day Low</label>

										<div>

											<input type="text" name="day_low" class="form-control"  autofocus required> 

										</div>

									</div>

								</div>

								

							

								

								<div class="col-lg-6">

									<div>

										<label class="form-label">Close</label>

										<div>

											<input type="text" name="close" class="form-control"  autofocus required>

										</div>

									</div>

								</div>

								

								<div class="col-lg-6">

									<div>

										<label class="form-label">Bid Quantity</label>

										<div>

											<input type="text" name="bid_quantity" class="form-control"  autofocus required>

										</div><br>

									</div>

								</div>

								

								<div class="col-lg-6">

									<div>

										<label class="form-label">Ask</label>

										<div>

											<input type="text" name="ask" class="form-control"  autofocus>

										</div>

									</div>

								</div>

								

							

								

								<div class="col-lg-6">

									<div>

										<label class="form-label">52 Week High</label>

										<div>

											<input type="text" name="week_high" class="form-control"  autofocus>

										</div><br>

									</div>

								</div>

								

									<div class="col-lg-6">

									<div>

										<label class="form-label">52 Week Low</label>

										<div>

											<input type="text" name="week_low" class="form-control"  autofocus>

										</div>

									</div>

								</div>

								

								<div class="col-lg-12">

								    <br>

								</div>

							

								<div class="col-lg-6">

									<div>

										<button type="submit" class="btn btn-primary">Submit</button>

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