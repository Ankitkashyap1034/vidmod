@extends('admin.layout.base')

@section('content')
 <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4> Client Portfolio List </h4>
                    </div>
                    <div class="QA_table mb_30" style="background: #fff; padding: 25px;">
                     
                        <table class="table table lms_table_active" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Assign Date</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Company Symbol</th>                                    
                                    <th scope="col">Company Name</th>    
                                    <th scope="col">CMP</th>      
                                    <th scope="col">Gain\Loss</th>       
                                    <th scope="col">Action</th>                              
                                   
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($user as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            @php
                                            $user_name = DB::table('users')->where('id',$data->user_id)->first();
                                           
                                            @endphp
                                            @if ($user_name)
                                                {{ $user_name->name }}
                                            @else
                                                User not found
                                            @endif
                                            
                                           
                                            
                                        </td>
                                      
                                        <td>
                                            @php
                                            $stocks = DB::table('stocks')->where('id',$data->stock_id)->first();
                                            @endphp
                                            {{ $stocks->company_symbol}}
                                        </td>
                                        <td>
                                            @php
                                            $stocks = DB::table('stocks')->where('id',$data->stock_id)->first();
                                            @endphp
                                            {{ $stocks->company_name}}
                                        </td> 
                                        <td>{{$data->cmp}}</td>
                                        <td>
                                            @php
                                            $stocks = DB::table('stocks')->where('id',$data->stock_id)->first();
                                            @endphp
                                            {{ $stocks->gain_loss}}
                                        </td>
                                        <td class="d-flex"> 
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{$data->id}}">View</button>
                                            {{--  <!-- <a href="{{ route('admin.stocksupdate', $data->id) }}" class="btn btn-success btn-sm success-btn mr-2" >Edit</a>  --}}
                                            
                                            {{--  <a href="#" data-url="{{ route('admin.viewDetailsModal', $data->id) }}" class="btn btn-info mr-2 show-details">View</a>  --}}

                                        </td>
                                    </tr>

                                    <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">View Details</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <form>
                                                <div class="mb-3">
                                                  <label for="recipient-name" class="col-form-label">Assign Date</label>
                                                  <input type="text" class="form-control" id="recipient-name" value="{{$data->created_at}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Client Name</label>
                                                    <input type="text" class="form-control" id="recipient-name" value=" {{ $user_name->name ?? '' }}">
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Company Name</label>
                                                    <input type="text" class="form-control" id="recipient-name" value="{{ $stocks->company_name}}">
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Company Symbol</label>
                                                    <input type="text" class="form-control" id="recipient-name" value="{{ $stocks->company_symbol}}">
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Current Market Price</label>
                                                    <input type="text" class="form-control" id="recipient-name" value="{{$data->cmp}}">
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Gain/Loss</label>
                                                    <input type="text" class="form-control" id="recipient-name" value="{{ $stocks->gain_loss}}">
                                                  </div>
                                    
                                                
                                              </form>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary">Send message</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Assign Date</label>
              <input type="text" class="form-control" id="recipient-name" value="{{$data->created_at}}">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Client Name</label>
                <input type="text" class="form-control" id="recipient-name" value=" {{ $user_name->name }}">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Company Name</label>
                <input type="text" class="form-control" id="recipient-name" value="{{ $stocks->company_name}}">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Company Symbol</label>
                <input type="text" class="form-control" id="recipient-name" value="{{ $stocks->company_symbol}}">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Current Market Price</label>
                <input type="text" class="form-control" id="recipient-name" value="{{$data->cmp}}">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Gain/Loss</label>
                <input type="text" class="form-control" id="recipient-name" value="{{ $stocks->gain_loss}}">
              </div>

            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
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
<script>
    var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')

  
  modalBodyInput.value = recipient
})
</script>


@endsection