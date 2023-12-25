@extends('admin.layout.base')

@section('content')
 <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4> Transaction List </h4>
                    </div>
                    <div class="QA_table mb_30" style="background: #fff; padding: 25px;">
                     
                        <table class="table table lms_table_active" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Transaction Date</th>   
                                    <th scope="col">Type</th>                                    
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Mobile No</th>                                    
                                    <th scope="col">Amount</th>    
                                    <th scope="col">Mode</th>      
                                    <th scope="col">Remarks</th>   
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($transaction as $data)
                                    <tr>
                                        <td> {{$loop->iteration}} </td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->type }}</td>
                                        <td> {{$data->client_name}}                                                                                 
                                        </td>
                                        
                                      
                                        <td>
                                            {{ $data->client_mobile}}
                                        </td>
                                        <td>
                                            {{ $data->amount}}
                                        </td> 
                                        <td>{{$data->mode}}</td>
                                        <td>
                                            {{ $data->remarks}}
                                        </td>
                                        <!-- <td class="d-flex">  -->

                                            <!-- <a href="{{ route('admin.stocksupdate', $data->id) }}" class="btn btn-success btn-sm success-btn mr-2" >Edit</a>
                                            
                                            <a href="#" data-url="{{ route('admin.viewDetailsModal', $data->id) }}" class="btn btn-info mr-2 show-details">View</a> -->

                                        <!-- </td> -->
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
        <h5 class="modal-title" id="exampleModalLabel">Vechicle Details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            
            <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" id="company_name" class="form-control rounded-end" readonly autocomplete="off"><br><br>
                </div><br><br>
            </div><br><br>
            
            <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Current Market Price</label>
                    <input type="text" name="cmp" id="cmp" class="form-control rounded-end" readonly autocomplete="off"><br><br>
                </div>
            </div><br><br>
            
            <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Gain/Loss</label>
                    <input type="text" name="gain_loss" id="gain_loss" class="form-control rounded-end" readonly autocomplete="off"><br><br>
                </div><br><br>
            </div><br><br>
            
            <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Open</label>
                    <input type="text" name="open" id="open" class="form-control rounded-end" readonly autocomplete="off">
                </div>
            </div>
            
             <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Day High</label>
                    <input type="text" name="day_high" id="day_high" class="form-control rounded-end" readonly autocomplete="off"><br><br>
                </div><br><br>
            </div><br><br>
            
            <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Day Low</label>
                    <input type="text" name="day_low" id="day_low" class="form-control rounded-end" readonly autocomplete="off">
                </div>
            </div>
            
              <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Close</label>
                    <input type="text" name="close" id="close" class="form-control rounded-end" readonly autocomplete="off"><br><br>
                </div><br><br>
            </div><br><br>
            
             <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Bid Quantity</label>
                    <input type="text" name="bid_quantity" id="bid_quantity" class="form-control rounded-end" readonly autocomplete="off">
                </div>
            </div>
            
             <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Ask</label>
                    <input type="text" name="ask" id="ask" class="form-control rounded-end" readonly autocomplete="off"><br><br>
                </div><br><br>
            </div><br><br>
            
            <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">52 Week High</label>
                    <input type="text" name="week_high" id="week_high" class="form-control rounded-end" readonly autocomplete="off">
                </div>
            </div>
            
             <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">52 Week Low</label>
                    <input type="text" name="week_low" id="week_low" class="form-control rounded-end" readonly autocomplete="off">
                </div>
            </div>
            
        
            
        </div>
      </div><br><br>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save</button>-->
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