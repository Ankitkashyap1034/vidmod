@extends('admin.layout.base')

@section('content')

    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4> Contact Listing </h4>
                        </div>
                    
                        <div class="QA_table mb_30" style="background: #fff; padding: 25px;">
                            <a href="{{route('admin.Add-Footer-Contact')}}" class="btn btn-info mb-3" style="float:right">Add Footer Contact</a>
                            <table class="table table lms_table_active" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Mobile No</th>
                                        <th scope="col">Company Email</th>
                                        <th scope="col">Personal Email</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($footers as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->address}} </td>
                                            <td>{{ $data->phone }}</td>
                                            <td>{{ $data->company_email }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                               <button type="button" class="btn btn-primary btn-sm  primary-btn mr-4" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $data->id }}">Edit</button>
                                          
                                                <a href="{{ route('admin.Delete-Footer-Contact', $data->id) }}"
                                                    class="btn btn-danger btn-sm danger-btn mr-4"
                                                    onclick="return confirm('Are you sure you want to delete this plan?')">Delete</a>

                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Message</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form method="post" action="{{ route('admin.Edit-Footer-Contact',$data->id) }}" enctype="multipart/form-data">



                                                        @csrf
                        
                                                        <div class="row g-3">
                        
                                                            <div class="col-lg-12 mb-3">
                        
                                                                <div>
                        
                                                                    <label class="form-label">Company Email</label>
                        
                                                                    <div>
                        
                                                                        <input type="text" name="company_email" class="form-control" autofocus placeholder="Enter your Company Email" value="{{$data->company_email}}">
                        
                                                                    </div>
                        
                                                                </div>
                                                            </div>
                        
                        
                        
                                                            <div class="col-lg-12">
                        
                                                                <div>
                        
                                                                    <label class="form-label">Personal Email</label>
                        
                                                                    <div>
                        
                                                                        <input type="text" name="email" class="form-control" autofocus
                                                                            required  placeholder="Enter your Personal Email" value="{{$data->email}}">
                        
                                                                    </div><br>
                        
                                                                </div>
                        
                                                            </div>
                        
                        
                        
                                                            <div class="col-lg-12">
                        
                                                                <div>
                        
                                                                    <label class="form-label">Mobile no.</label>
                        
                                                                    <div>
                        
                                                                        <input type="text" name="phone" class="form-control" autofocus
                                                                            required placeholder="Enter Mobile No." value="{{$data->phone}}">
                        
                                                                    </div><br>
                        
                                                                </div>
                        
                                                            </div>
                        
                        
                        
                                                            <div class="col-lg-12 mb-3">
                        
                                                                <div>
                        
                                                                    <label class="form-label">Address</label>
                        
                                                                    <div>
                        
                                                                        <textarea type="text" name="address" class="form-control" placeholder="Enter Address">{{$data->address}}</textarea>
                        
                                                                    </div>
                        
                                                                </div>
                        
                                                            </div>
                        
                                                            <div class="col-lg-12 ">
                        
                                                                <div>
                        
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                        
                                                                </div><br>
                        
                                                            </div>
                        
                        
                        
                                                        </div>
                        
                                                    </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes

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
