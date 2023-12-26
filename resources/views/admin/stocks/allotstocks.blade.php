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
								<h3 class="mb-0">Allot Stock</h3>
							</div>
						</div><br>
						<form method="post"  action="{{ route('admin.allotstocksSave')}}">
							@csrf
							 <input type="hidden" name="user_id" value="{{ $user->id }}">
							<div class="row g-3">
								<div class="col-lg-6">
									<div>
										<label class="form-label">Stock Select</label>
										<div>
											<select class="form-control" name="stock_id" required>
											    <option value="">--Nothing Selected--</option>
											    @php
											    $stocks = \App\Models\Stock::orderBy('company_name', 'asc')->get();
											    @endphp
											    
											    @foreach($stocks as $stock)
											        <option value="{{ $stock->id }}">{{ $stock->company_name }}</option>
											    @endforeach
											 </select>
											
										</div>
									</div>
								</div>
								
								<div class="col-lg-6">
									<div>
										<label class="form-label">Quantity</label>
										<div>
											<input type="text" name="qty" id="qty" class="form-control" required autofocus>
										</div><br>
									</div>
								</div>
								
								<div class="col-lg-6">
									<div>
										<label class="form-label">Average Price</label>
										<div>
											<input type="text" name="avg_price" id="avg_price" class="form-control" required autofocus>
										</div><br>
									</div>
								</div>
								
								<div class="col-lg-6">
									<div>
										<label class="form-label">Current Market Price</label>
										<div>
											<input type="text" name="cmp" id="cmp" class="form-control" required autofocus>
										</div><br>
									</div>
								</div>
								
								<div class="col-lg-6">
									<div>
										<label class="form-label">Investment Amount</label>
										<div>
											<input type="text" name="invest_amount" id="invest_amount" class="form-control" required autofocus>
										</div><br>
									</div>
								</div>
								
								<div class="col-lg-6">
									<div>
										<label class="form-label">Current Price</label>
										<div>
											<input type="text" name="current_amount" id="current_amount" class="form-control" required autofocus>
										</div><br>
									</div>
								</div>
								
								<div class="col-lg-6">
									<div>
										<label class="form-label">Profit/Loss</label>
										<div>
											<input type="text" name="profit_loss_number" id="profit_loss_number" class="form-control" required autofocus>
										</div><br>
									</div>
								</div>
								
								<div class="col-lg-6">
									<div>
										<label class="form-label">Profit/Loss %</label>
										<div>
											<input type="text" name="profit_loss_percent" id="profit_loss_percent" class="form-control" required autofocus>
										</div><br>
									</div>
								</div>
								
								
								
								<div class="col-lg-6">
								    <br>
								</div>
								
									<!--<div class="col-lg-6">-->
									<!--    <div>-->
    					<!--					<label class="form-label">Tenure</label>-->
         <!--   									 <div style="display:flex;align-items:center;">-->
         <!--                                               <label for="Tenure">Year</label><br>-->
         <!--                                               <select class="form-control" name="tenure_in_year" style="width:65%; margin-left:8px" required>-->
         <!--                                                   <option value="0">0</option>-->
         <!--                                                   <option value="1">1</option>-->
         <!--                                                   <option value="2">2</option>-->
         <!--                                                   <option value="3">3</option>-->
         <!--                                                   <option value="4">4</option>-->
         <!--                                                   <option value="5">5</option>-->
         <!--                                                   <option value="6">6</option>-->
         <!--                                                   <option value="7">7</option>-->
         <!--                                                   <option value="8">8</option>-->
         <!--                                                   <option value="9">9</option>-->
         <!--                                                   <option value="10">10</option>-->
         <!--                                               </select>-->
                                        
         <!--                                               <label for="Tenure" style="margin-left:37px">Month</label>-->
         <!--                                               <select class="form-control" name="tenure_in_month" style="width:65%; margin-left:8px" required>-->
         <!--                                                   <option value="0">0</option>-->
         <!--                                                   <option value="1">1</option>-->
         <!--                                                   <option value="2">2</option>-->
         <!--                                                   <option value="3">3</option>-->
         <!--                                                   <option value="4">4</option>-->
         <!--                                                   <option value="5">5</option>-->
         <!--                                                   <option value="6">6</option>-->
         <!--                                                   <option value="7">7</option>-->
         <!--                                                   <option value="8">8</option>-->
         <!--                                                   <option value="9">9</option>-->
         <!--                                                   <option value="10">10</option>-->
         <!--                                               </select>-->
         <!--                                           </div>-->
									<!--        </div>-->
								 <!--       </div>-->
								
								
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const qty                 = document.getElementById('qty');
    const avg_price           = document.getElementById('avg_price');
    const cmp                 = document.getElementById('cmp');
    const invest_amount       = document.getElementById('invest_amount');
    const current_amount      = document.getElementById('current_amount');
    const profit_loss_percent = document.getElementById('profit_loss_percent');
    const profit_loss_number  = document.getElementById('profit_loss_number');
    
    console.log(qty); console.log(avg_price); console.log(cmp); console.log(qty); console.log(invest_amount); console.log(current_amount); console.log(profit_loss_percent); console.log(profit_loss_number);
    
    qty.addEventListener('input', calculateValues);
    avg_price.addEventListener('input', calculateValues);
    cmp.addEventListener('input', calculateValues);
    
    function calculateValues(){
       const qtyValue = parseFloat(qty.value);
       const avg_priceValue = parseFloat(avg_price.value);
       const cmpValue = parseFloat(cmp.value);
       
       // Calculate Investment Amount
       const invest_amount = qtyValue * avg_priceValue;
       $('#invest_amount').val(invest_amount);
       console.log(invest_amount);
       
       // Calculate Current Amount
       const current_amount = qtyValue * cmpValue;
       $('#current_amount').val(current_amount);
       console.log(current_amount);
       
       // Calculate Profit/Loss In Percentage
       const profit_loss_number = current_amount - invest_amount;
       $('#profit_loss_number').val(profit_loss_number);
       console.log(profit_loss_number);
       
       // Calculate Profit/Loss In Number 
       const profit_loss_percent = profit_loss_number/current_amount * 100;
       const profit_loss_percent2 = profit_loss_percent.toFixed(2); // Format to two decimal places
       $('#profit_loss_percent').val(profit_loss_percent2);
       console.log(profit_loss_percent);
    }
</script>



@endsection