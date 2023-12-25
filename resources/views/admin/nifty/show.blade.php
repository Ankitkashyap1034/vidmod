@extends('admin.layout.base')

@section('content')
 <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4> Nifty Sensex </h4>
                    </div>
                    <div class="QA_table mb_30" style="background: #fff; padding: 25px;">
                     
                        <table class="table table lms_table_active" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Sensex</th> 
                                    <th scope="col">Sensex Rate</th> 
                                    <th scope="col">Nifty</th>
                                    <th scope="col">Nifty Rate</th>                                                            
                                    <th scope="col">Action</th>  
                                                                                           
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($nifty as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $data->sensex }}</td>
                                        <td>{{ $data->sensex_rate }}</td>                                    
                                        <td>{{ $data->nifty }}</td>
                                        <td>{{ $data->nifty_rate }}</td>
                                        <td class="d-flex">                                          
                                            <a href="#" data-url="{{ route('admin.edit_nifty', $data->id) }}" class="btn btn-success btn-sm mr-2 show-details">Edit</a>                                            
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
    <div class="modal-content" style="width:124%";>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Nifty Sensex</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="niftyfoam" action="{{ route('admin.save_nifty') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-control border-0 px-0">
                        <label class="form-label">Sensex</label>
                        <input type="text" name="sensex" id="sensex" class="form-control"  autofocus>
                    </div><br><br>
                </div>

                <div class="col-lg-6">
                    <div class="form-control border-0 px-0">
                        <label class="form-label">Sensex Rate</label>
                        <input type="text" name="sensex_rate" id="sensex_rate" class="form-control"  autofocus>
                    </div><br><br>
                </div>
                
                
                <div class="col-lg-6">
                    <div class="form-control border-0 px-0">
                        <label class="form-label">Nifty</label>
                        <input type="text" name="nifty" id="nifty" class="form-control"  autofocus><br><br>
                    </div><br><br>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-control border-0 px-0">
                        <label class="form-label">Nifty Rate</label>
                        <input type="text" name="nifty_rate" id="nifty_rate" class="form-control" autofocus><br><br>
                    </div><br><br>
                </div><br><br>                
            
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save</button>-->
            </div>

        </form>      
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
    //   alert(url);
       
       $.ajax({
          url : url,
          method: 'GET',
          success:function(response){
              
              $('#sensex_rate').val(response.sensex_rate);
              $('#nifty').val(response.nifty);
              $('#sensex').val(response.sensex);
              $('#nifty_rate').val(response.nifty_rate);
              $('#id').val(response.id);
             
              
              
              $('#userShowModal').modal('show');
              
              var dataStringfy = JSON.stringify(response);
              console.log(dataStringfy);
              
              
              
          },
          error:function(error){
               console.error("An error occurred:", error);
               
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