@extends('admin.layout.base')

@section('content')
 <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>USer Withdraw Request List </h4>
                    </div>
                    <div class="QA_table mb_30" style="background: #fff; padding: 25px;">
                     
                        <table class="table table lms_table_active" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Request Date</th>   
                                    <th scope="col">Client Name</th>                                    
                                    <th scope="col">Bank Name</th>
                                    <th scope="col">A/C No</th>                                    
                                    <th scope="col">Amount</th>    
                                    <th scope="col">Remarks</th> 
                                    <th scope="col">Status</th> 
                                    <th scope="col">Action</th>   
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($withdraw as $data)
                                    <tr>
                                        <td>{{ $loop->iteration}} </td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            @php
                                            $user = DB::table('users')->where('id',$data->user_id)->first();
                                            @endphp

                                            @if($user)
                                                {{ $user->name}}
                                                @else
                                                No Data Found
                                            @endif
                                        </td>
                                        <td> {{$data->bank_name}}</td>
                                        <td> {{$data->acc_number}}</td>
                                        <td> {{$data->amount}}</td>
                                        <td> {{$data->remark}}</td>
                                        <td>
                                            @if( $data->status == '0')
                                                Pending
                                                @elseif($data->status == '1')
                                                Accepted
                                                    @else
                                                    Reject
                                            @endif
                                        </td>

                                     
                                        <td class="d-flex">

                                            @if($data->status == '0')
                                              <a href="" class="btn btn-success btn-sm  mr-2" >View</a>

                                              <a href="#" data-toggle="modal" data-target="#request_reject{{ $data->id }}" class="btn btn-danger btn-sm mr-2 ">Reject</a>                                              
                                            
                                                @elseif($data->status == '2')
                                                <a href="" class="btn btn-success btn-sm  mr-2" >View</a>

                                                <button class="btn btn-danger btn-sm mr-2 " disabled>Reject</button>
                                            @endif
                                           

                                        </td>
                                    </tr>

                                    {{-- Reject Modal Start --}}

                                    <div class="modal" id="request_reject{{$data->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content" style="margin-left:216px; width:492px; border-radius:10%">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Reject Request</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <!-- Your Form -->
                                                    <form action="{{ route('admin.withdraw_reject') }}" method="post">
                                                        @csrf  
            
                                                        <input type="hidden" name="id" value="{{ $data->id }}">
                        
                                                        
                                                        <div class="form-group">
                                                            <label for="question">Reason</label>
                                                            <input type="text" class="form-control"  name="reject_reason" required>
                                                        </div>            
                                                        
            
                                                        
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                     </div>



                                    {{-- Reject Modal End --}}
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
                   
                   
                   $('#company_name').val(response.company_name);
                   $('#cmp').val(response.cmp);
                   $('#gain_loss').val(response.gain_loss);
                   $('#open').val(response.open);
                   $('#day_high').val(response.day_high);
                   $('#day_low').val(response.day_low);
                   $('#close').val(response.close);
                   $('#bid_quantity').val(response.bid_quantity);
                   $('#ask').val(response.ask);
                   $('#week_high').val(response.week_high);
                   $('#week_low').val(response.week_low);
                   
                   
                   
                    $('#userShowModal').modal('show');
                   
                   
                   var dataString = JSON.stringify(response);
                   console.log(dataString);
                   
               },
               error:function(error){
                   alert(error);
               }
                
            });
            
        });
        
        
   
</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>


@endsection