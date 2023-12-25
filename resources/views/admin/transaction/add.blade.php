@extends('admin.layout.base')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
	<div class="main_content_iner ">
		<div class="container-fluid p-0">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="white_box mb_30">
						<div class="box_header ">
							<div class="main-title">
								<br><br>
								<h3 class="mb-0">Add Transaction</h3>
							</div>
						</div>
						<br>
						<form method="post"  action="{{ route('admin.transaction_add')}}" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" id="client_id">
							<div class="row g-3">

								<div class="col-lg-6">
									<div>
										<label class="form-label">Client Name</label>
										<div>
                                        <input type="text" name="client_name" id="client_name" class="form-control"  autofocus required>
										<div id="client_list">

										</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div>
										<label class="form-label">Client Mobile</label>
										<div>
											<input type="text" name="client_mobile" id="client_mobile" class="form-control"  autofocus required>
										</div>
										<br>
									</div>
								</div>

								<div class="col-lg-6">
									<div>
										<label class="form-label">Amount</label>
										<div>
											<input type="text" name="amount" class="form-control"  autofocus required>
										</div>
										<br>
									</div>
								</div>

								<div class="col-lg-6">
									<div>
										<label class="form-label">Mode</label>
										<div>
											<select name="mode" class="form-control">
                                                <option selected>--Selected--</option>
                                                <option value="cash">Cash</option>
                                                <option value="upi">UPI</option>
												<option value="a/c">A/C Transfer</option>
                                            </select>
										</div>
									</div>
								</div>

                                <div class="col-lg-6">
									<div>
										<label class="form-label">Remarks</label>
										<div>
											<input type="text" name="remarks" class="form-control"  autofocus required>
										</div>
										<br>
									</div>
								</div>

								
								<div class="col-lg-12">
									<br>
								</div>
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


<!-- Add Script To Show Client Name And his mobile no -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function(){
		$('#client_name').on('keyup', function(){
			$('#client_list').show();
			var value = $(this).val();
			// alert(value);
			var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
			if(value != ''){
				$.ajax({
					url: "{{ route('admin.search_client') }}",
					type: "POST",
					headers : {'X-CSRF-TOKEN': csrfToken},
					data:{
						value:value
					},

					success:function(data){
						$('#client_list').html(data.ul);

					},
					error:function(data){
						console.log(data);
					}
				});
			}else{
				$('#client_list').empty();
			}
			

		});
	});
</script>


<script>
	$(document).on('click', '.list-group-item-developer', function(){
		var name = $(this).attr('list-name');
		var contact = $(this).data('contact');
		var client_id = $(this).data('id');

		console.log(name); console.log(contact); console.log(client_id);

		$('#client_name').val(name);
		$('#client_mobile').val(contact);
		$('#client_id').val(client_id);
		$('#client_list').hide();
	});
</script>







@endsection
