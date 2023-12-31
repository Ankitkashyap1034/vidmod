@extends('admin.layout.base')
@section('content')
<div class="container-fluid">
        @if ($errors->any())
            <!-- Common error section -->
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Language Listing</h4>
                    </div>
                    <div class="white_box_tittle list_header">
                            <button type="button" class="btn btn-info btn-sm info-btn mr-4"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Language</button>
                    </div>
                    <div class="QA_table mb_30" style="background: #fff; padding: 25px;">
                        <table class="table table lms_table_active" id="dataTable">
                            <thead>
                                <tr>
                                <th scope="col">S.no</th>
                                <th scope="col">Prefix</th>
                                <th scope="col">Language</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->prefix }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    @if($data->status == 1)
                                        <span class="text-success">Active</span>
                                    @else
                                        <span class="text-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->status == 0)
                                    <a href="{{ url('admin/language/status/'.$data->id) }}" class="btn btn-info btn-sm info-btn mr-4 activate-btn">Activate</a>
                                    @else
                                        <a href="{{ url('admin/language/status/'.$data->id) }}" class="btn btn-danger btn-sm info-btn deactivate-btn">Deactivate</a>
                                        @endif
                                    <button type="button" class="btn btn-info btn-sm info-btn mr-4 edit-language" data-bs-toggle="modal" data-bs-target="#edit-language" data-id="{{ $data->id }}">  Edit
                                    </button>
                                </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            Add Language
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </div>
                        <div class="modal-body">
                            <!-- Your form starts here -->
                            <form method="post" action="{{ route('admin.language.store') }}">
                            @csrf
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">Language Name</label>
                                    <div>
                                        <input type="hidden" value="ds">
                                        <input type="text" name="name" placeholder="Enter the language name" class="form-control" required autofocus/>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">Prefix</label>
                                    <div>
                                        <input type="text" name="prefix"
                                        class="form-control" required placeholder="Enter the prefix for this language name" autofocus />
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit"
                                    class="btn btn-primary btn-sm" style="width: 100%;">Submit</button>
                            </div>
                            <!-- Your form ends here -->
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- edit model --}}
            <!-- Modal -->
            <div class="modal fade" id="edit-language" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                Edit Language
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </div>
                        <div class="modal-body">
                            <!-- Your form starts here -->
                            <form method="post" action="{{ route('admin.language.update') }}">
                            @csrf
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">Language Name</label>
                                    <div>
                                        <input type="hidden" name="lang_id">
                                        <input type="text" id="name" name="name" placeholder="Enter the language name" class="form-control" required autofocus/>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">Prefix</label>
                                    <div>
                                        <input type="text" name="prefix"
                                        class="form-control" id="prefix"  required placeholder="Enter the prefix for this language name" autofocus />
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit"
                                    class="btn btn-primary btn-sm" style="width: 100%;">Submit</button>
                            </div>
                            <!-- Your form ends here -->
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- edit model --}}
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
    $(document).ready(function() {
        $('.edit-language').click(function() {
            var langId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: '/admin/language/edit-language/' + langId,
                success: function(response) {
                    if(response.status == true){
                        $('input[id="name"]').val(response.data.name);
                        $('input[id="prefix"]').val(response.data.prefix);
                        $('input[name="lang_id"]').val(response.data.id);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Fail');
                    console.log(xhr.status); // Log the HTTP status code
                    console.log(error);     // Log the error message
                }
            });
        });
    });
</script>
@endsection
