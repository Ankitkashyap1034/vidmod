
@extends('admin.layout.base')

@section('content')

<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>User Opportunity Listing </h4>
                    </div>
                    <div class="QA_table mb_30" style="background: #fff; padding: 25px;">
                     
                        <table class="table table lms_table_active" id="dataTable">
                            <thead>
                                <tr>
                                <th scope="col">S.no</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Preview Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($useropps as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @php
                                            $user = DB::table('users')->where('id',$data->user_id)->first();
                                            @endphp

                                            @if($user)
                                                {{ $user->name}}
                                                @else 
                                                No Record
                                            @endif

                                        </td>
                                        <td> <a href="{{ asset('banners/'.$data->image) }}" download="{{ $data->image }}">
                                                    <img src="{{ asset('banners/'.$data->image) }}" alt="image" style="width:74px;height:85px;border-radius:50%;">
                                                </a>
                                        </td>
                                        
                                        

                                        <td>  
                                        <a href="{{ asset('banners/'.$data->preview_img) }}" download="{{ $data->preview_img }}">
                                                    <img src="{{ asset('banners/'.$data->preview_img) }}" alt="image" style="width:74px;height:85px;border-radius:50%;">
                                                </a>
                                        </td>
                                        <td>  {{ $data->title }}  </td>
                                        <td> {{ $data->description }}   </td>
                                        
                                        <td>
                                              @if($data->status == '0')
                                                 Pending
                                                     @elseif($data->status == '1')
                                                     Approve
                                                        @else
                                                        Reject

                                              @endif
                                            
                                        </td>
                                        
                                        <td class="d-flex">
                                           @if($data->status == '1')
                                             <button class="btn btn-info btn-sm mr-2" disabled>Payment</button>

                                             <a href="{{ route('admin.oppo_reject', $data->id) }}" class="btn btn-danger btn-sm danger-btn mr-2" onclick="return confirm('Are you sure you want to Unlist this Opportunity?')">Reject</a>
                                               @elseif($data->status == '2')
                                                    
                                               @else
                                                <a href="#" data-toggle="modal" data-target="#oppo_accept{{$data->id}}" class="btn btn-info btn-sm mr-2 ">Payment</a>
                                                <a href="{{ route('admin.oppo_reject', $data->id) }}" class="btn btn-danger btn-sm danger-btn mr-2" onclick="return confirm('Are you sure you want to Unlist this plan?')">Reject</a>
                                            @endif

                                            
                                        </td> 
                                    </tr>

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
                                        <!-- Payment Modal Start -->
                                        <div class="modal fade" id="oppo_accept{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content" style="width:134%;";>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">User Opportunity Details</h5>
                                                    <button type="button" class="close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.oppo_accept') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                <div class="modal-body">
                                                
                                                <div class="row">
                                                    <input type="hidden" name="id" value="{{$data->id}}">
                                                    <input type="hidden" name="user_id" value="{{$data->user_id}}">

                                                        
                                                        <div class="col-lg-6">
                                                            <div >
                                                                <label class="form-label">Tenure (In Months)</label>
                                                                <input type="text" name="tenure" id="tenure_{{ $data->id }}" class="form-control" required autocomplete="off" autofocus>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div >
                                                                <label class="form-label">Mode</label>
                                                                <div >
                                                                        <select name="mode" class="form-control" autofocus required>
                                                                            <option selected value="" autofocus>--Selected--</option>
                                                                            <option value="cash" autofocus>Cash</option>
                                                                            <option value="upi" autofocus>UPI</option>
                                                                            <option value="a/c transfer" autofocus>A/C Transfer</option>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-lg-6">
                                                            <div >
                                                                <label class="form-label">Start Date</label>
                                                                <input type="date" name="start_date" class="form-control" required autocomplete="off" autofocus>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div >
                                                                <label class="form-label">End Date</label>
                                                                <input type="date" name="end_date"  class="form-control"  autocomplete="off" autofocus>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-lg-6">
                                                            <div >
                                                                <label class="form-label">Amount</label>
                                                                <input type="number" name="amount" id="amount_{{ $data->id }}" class="form-control" required  autocomplete="off" autofocus>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div >
                                                                <label class="form-label">Rate Of Intrest</label>
                                                                <input type="text" name="intrest" id="intrest_{{ $data->id }}" class="form-control" required  autocomplete="off" autofocus>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div >
                                                                <label class="form-label">Future Value</label>
                                                                <input type="text" name="future_value" id="future_value_{{ $data->id }}" class="form-control" required  autocomplete="off">
                                                            </div>
                                                        </div>
                                                        
                                                         <div class="col-lg-6">
                                                            <div >
                                                                <label class="form-label">Document Type</label>
                                                                <div >
                                                                        <select name="document_type" class="form-control" autofocus required>
                                                                            <option selected value="" autofocus>--Selected--</option>
                                                                            <option value="mou" autofocus>MOU</option>
                                                                            <option value="poa" autofocus>POA</option>
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-6">
                                                            <div >
                                                                <label class="form-label">Document Upload (Only PDF Format)</label>
                                                                <input type="file" name="document_file" class="form-control" required  autocomplete="off">
                                                            </div>
                                                        </div>


                                                                                                                    
                                                    
                                                
                                                    
                                                    </div>
                                                        </div><br><br>
                                                        
                                                        <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                                        <button type="button" class="btn btn-secondary btn-sm" >Close</button>
                                                        <!--<button type="button" class="btn btn-primary">Save</button>-->
                                                        </div>

                                                </form>
                                                

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Payment Modal End -->

                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            // Function to calculate future value
                                            function calculateFutureValue(id) {
                                                const amount = parseFloat($('#amount_' + id).val()) || 0;
                                                const tenure = parseFloat($('#tenure_' + id).val()) || 0;
                                                const intrest = parseFloat($('#intrest_' + id).val()) || 0;
                                                console.log(amount); console.log(tenure); console.log(intrest); 

                                                const futureValue = amount * (1 + intrest * tenure);
                                                $('#future_value_' + id).val(futureValue.toFixed(2));
                                                console.log(futureValue);
                                            }

                                            // Attach event listeners to relevant input fields
                                            $('input[id^="amount_"], input[id^="tenure_"], input[id^="intrest_"]').on('input', function() {
                                                const id = $(this).attr('id').split('_')[1];
                                                calculateFutureValue(id);
                                            });

                                            $('.btn-secondary').on('click', function(){
                                                location.reload(true);
                                            });

                                            $('.close').on('click', function(){
                                                location.reload(true);
                                            });

                                        </script>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>




@endsection