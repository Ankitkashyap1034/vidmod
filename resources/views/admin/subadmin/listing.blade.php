@extends('admin.layout.base')

@section('content')

<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4> Sub-Admin Listing </h4>
                    </div>
                    <div class="QA_table mb_30" style="background: #fff; padding: 25px;">
                     
                        <table class="table table lms_table_active" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Profile Image</th>
                                    <th scope="col">Name</th>                                    
                                    <th scope="col">email</th>
                                    <th scope="col">mobile</th> 
                                    <th scope="col">Action</th>                                                        
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($admin as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                        <div class="img-div  text-center" style="margin: 0 auto">
                                            @if($data->profile_photo)
                                            <a href="{{ asset('docs/'.$data->profile_photo) }}" download="{{ $data->profile_photo }}">
                                                <img src="{{asset('docs/'.$data->profile_photo)}}" alt="" style="width:74px height:85px;border-radius: 50%;">
                                                @else
                                                
                                                <img src="{{ asset('assets/img/s1.jpg') }}">
                                                @endif
                                        </div>
                                        </td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>  
                                        <td>{{$data->mobile}}</td>                                       
                                        
                                        <td>
                                              <a href="#" data-url="{{ route('admin.view_subadmin', $data->mobile) }}" class="btn btn-info btn-sm mr-2 show-details">View</a>

                                              <a href="{{ route('admin.delete_subadmin', $data->mobile) }}" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm mr-2">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Sub-Admin Details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control rounded-end" readonly autocomplete="off">
                </div>
            </div>
            
            
            <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Email-Id</label>
                    <input type="text" id="email" class="form-control rounded-end" readonly autocomplete="off"><br><br>
                </div><br><br>
            </div><br><br>
            
            <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Mobile No</label>
                    <input type="text" id="mobile" class="form-control rounded-end" readonly autocomplete="off"><br><br>
                </div><br><br>
            </div><br><br>
            
            <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">DOB</label>
                    <input type="text"  id="birthDate" class="form-control rounded-end" readonly autocomplete="off">
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="form-control border-0 px-0">
                    <label class="form-label">Gender</label>
                    <input type="text" id="gender" class="form-control rounded-end" readonly autocomplete="off"><br><br>
                </div><br><br>
            </div><br><br>
            
            
            
            <!--<div class="col-lg-6">-->
            <!--    <div class="form-control border-0 px-0">-->
            <!--        <label class="form-label">State</label>-->
            <!--        <input type="text" name="state_id" id="state_id" class="form-control rounded-end" readonly autocomplete="off"><br><br>-->
            <!--    </div><br><br>-->
            <!--</div><br><br>-->
            
            <!--<div class="col-lg-6">-->
            <!--    <div class="form-control border-0 px-0">-->
            <!--        <label class="form-label">City</label>-->
            <!--        <input type="text" name="city_id" id="city_id" class="form-control rounded-end" readonly autocomplete="off">-->
            <!--    </div>-->
            <!--</div>-->
            
        </div>
      </div>
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
                   
                   
                   $('#name').val(response.name);
                   $('#email').val(response.email);
                   $('#mobile').val(response.mobile);
                   $('#birthDate').val(response.birthDate);
                   $('#gender').val(response.gender);
                  
                   
                   
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







<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>


@endsection