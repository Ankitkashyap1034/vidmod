
@extends('admin.layout.base')

@section('content')

<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>User Plans Listing </h4>
                    </div>
                    <div class="QA_table mb_30" style="background: #fff; padding: 25px;">
                     
                        <table class="table table lms_table_active" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Plans Tenure</th>
                                    <th scope="col">Plans Huddle Rate</th>
                                    <th scope="col">Plans Advisory Fee</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($userplans as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @php
                                             $user = \App\Models\User::where('id', $data->user_id)->first();
                                            @endphp
                                            @if($user)
                                                {{ $user->name }}
                                                @else
                                                User not Found
                                            @endif
                                        </td>
                                        <td>  {{ $data->tenure_in_year . ' ' . $data->tenure_in_month }}  </td>
                                        <td>  {{ $data->huddle_rate }}  </td>
                                        <td> {{ $data->adv_fees }}   </td>
                                        
                                        <td>
                                              @if($data->status == '0')
                                                 Pending
                                                     @elseif($data->status == '1')
                                                     Active
                                                        @else
                                                        Reject

                                              @endif
                                            
                                        </td>
                                        
                                        <td class="d-flex">
                                           @if($data->status == '1')
                                             <button class="btn btn-info btn-sm mr-2" disabled>Payment</button>

                                             <a href="{{ route('admin.plans_reject', $data->id) }}" class="btn btn-danger btn-sm danger-btn mr-2" onclick="return confirm('Are you sure you want to Unlist this plan?')">Reject</a>
                                               @elseif($data->status == '2')
                                                    
                                               @else
                                                <a href="#" data-url="{{ route('admin.plans_accept', $data->id) }}" class="btn btn-info btn-sm mr-2 show-details">Payment</a>
                                                <a href="{{ route('admin.plans_reject', $data->id) }}" class="btn btn-danger btn-sm danger-btn mr-2" onclick="return confirm('Are you sure you want to Unlist this plan?')">Reject</a>
                                            @endif

                                            
                                        </td>
                                    </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="userShowModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:134%;";>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Plan Details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.save_plans') }}" method="POST">
        @csrf
      <div class="modal-body">
       
       <div class="row">
           <input type="hidden" name="id" id="id">
           <input type="hidden" name="user_id" id="user_id">
           <div class="col-lg-6">
               <div class="form-control border-0 px-0">
                   <label class="form-label">Start Date</label>
                   <input type="date" name="start_date"  class="form-control rounded-end" required autocomplete="off"><br><br>
               </div><br><br>
           </div><br><br>
           
           <div class="col-lg-6">
               <div class="form-control border-0 px-0">
                   <label class="form-label">End Date</label>
                   <input type="date" name="end_date" class="form-control rounded-end" required autocomplete="off"><br><br>
               </div>
           </div><br><br>

           <div class="col-lg-6">
               <div class="form-control border-0 px-0">
                   <label class="form-label">Plan Tenure</label>
                   <input type="text" name="tenure_in_year" id="tenure_in_year" class="form-control rounded-end" readonly autocomplete="off"><br><br>
               </div>
           </div><br><br>
           
           <div class="col-lg-6">
               <div class="form-control border-0 px-0">
                   <label class="form-label">Amount</label>
                   <input type="number" name="amount" class="form-control rounded-end" required  autocomplete="off"><br><br>
               </div><br><br>
           </div><br><br>

           <div class="col-lg-6">
				<div class="form-control border-0 px-0">
					<label class="form-label">Mode</label>
					<div class="form-control border-0 px-0">
							<select name="mode" class="form-control" autofocus required>
                                <option selected value="" autofocus>--Selected--</option>
                                <option value="cash" autofocus>Cash</option>
                                <option value="upi" autofocus>UPI</option>
                                <option value="a/c transfer" autofocus>A/C Transfer</option>
                            </select>
					</div>
				</div>
			</div>
                       
         
       
           
         </div>
            </div><br><br>
            
            <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm">Submit</button>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <!--<button type="button" class="btn btn-primary">Save</button>-->
            </div>

    </form>
      

    </div>
  </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $('.show-details').on('click', function(e){
        e.preventDefault();
        var url = $(this).data('url');
        // alert(url);

        $.ajax({
               url: url,
               method: 'GET',
               success:function(response){

                $('#id').val(response.id);
                $('#user_id').val(response.user_id);
                $('#client_name').val(response.name);

                var tenure = response.tenure_in_year + ' ' + response.tenure_in_month ;
                console.log(tenure);
                $('#tenure_in_year').val(tenure);

                var dataString = JSON.stringify(response);
                console.log(dataString);
                $('#userShowModal').modal('show');

               },
               error:function(errro){
                alert(error);
               }
        });
               
    });
</script>

@endsection