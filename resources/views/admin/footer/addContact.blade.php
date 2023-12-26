@extends('admin.layout.base')

@section('content')

    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4> Add Footer Contact </h4>
                        </div>
                        <div class="QA_table mb_30" style="background: #fff; padding: 25px;">
                            <form method="post" action="{{ route('admin.Add-Footer-Contact') }}" enctype="multipart/form-data">



                                @csrf

                                <div class="row g-3">

                                    <div class="col-lg-12 mb-3">

                                        <div>

                                            <label class="form-label">Company Email</label>

                                            <div>

                                                <input type="text" name="company_email" class="form-control" autofocus placeholder="Enter your Company Email">

                                            </div>

                                        </div>
                                    </div>



                                    <div class="col-lg-12">

                                        <div>

                                            <label class="form-label">Personal Email</label>

                                            <div>

                                                <input type="text" name="email" class="form-control" autofocus
                                                    required  placeholder="Enter your Personal Email">

                                            </div><br>

                                        </div>

                                    </div>



                                    <div class="col-lg-12">

                                        <div>

                                            <label class="form-label">Mobile no.</label>

                                            <div>

                                                <input type="text" name="phone" class="form-control" autofocus
                                                    required placeholder="Enter Mobile No.">

                                            </div><br>

                                        </div>

                                    </div>



                                    <div class="col-lg-12 mb-3">

                                        <div>

                                            <label class="form-label">Address</label>

                                            <div>

                                                <textarea type="text" name="address" class="form-control" placeholder="Enter Address"></textarea>

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
