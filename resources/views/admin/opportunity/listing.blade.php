@extends('admin.layout.base')



@section('content')
    <div class="main_content_iner">

        <div class="container-fluid p-0">

            <div class="row justify-content-center">

                <div class="col-12">

                    <div class="QA_section">

                        <div class="white_box_tittle list_header">

                            <h4> Opportunity Listing </h4>

                        </div>

                        <div class="QA_table mb_30" style="background: #fff; padding: 25px;">



                            <table class="table table lms_table_active" id="dataTable">

                                <thead>

                                    <tr>

                                        <th scope="col">S.no</th>

                                        <th scope="col">Image</th>

                                        <th scope="col">Preview Image</th>

                                        <th scope="col">Pdf Link</th>


                                        <th scope="col">Title</th>

                                        <th scope="col">Desciption</th>

                                        <th scxope="col">Status</th>

                                        <th scope="col">Action</th>



                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach ($opportunity as $data)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>

                                            <td>

                                                <a href="{{ asset('banners/' . $data->image) }}"
                                                    download="{{ $data->image }}">

                                                    <img src="{{ asset('banners/' . $data->image) }}"
                                                        style="width:74px; height:85px; border-radius:50%;">

                                                </a>

                                            </td>

                                            <td>

                                                <a href="{{ asset('mou/' . $data->redirect_url) }}"
                                                    download="{{ $data->redirect_url }}">

                                                    <img src="{{ asset('mou/' . $data->redirect_url) }}"
                                                        style="width:74px; height:85px; border-radius:50%;">

                                                </a>

                                            </td>

                                            <td>

                                                {{ Str::limit($data->redirect_url, 15) }}

                                                <i class="fa fa-info-circle" data-toogle="tooltip"
                                                    title="{{ $data->redirect_url }}"></i>



                                            </td>

                                            <td>{{ $data->title }}</td>

                                            <td>{{ $data->description }}</td>

                                            <td>
                                                @if ($data->status == 'active')
                                                    <button class="btn btn-success btn-sm">{{ $data->status }}</button>
                                                @else
                                                    <button class="btn btn-danger btn-sm">{{ $data->status }}</button>
                                                @endif
                                            </td>



                                            <td>
                                                @if ($data->status == 'active')
                                                    <a href="{{ route('admin.opportunity_delete', $data->id) }}"
                                                        class="btn btn-info btn-sm info-btn mr-4"
                                                        onclick="return confirm('Are you sure you want to Unlist this Opportunity?')">UNLIST</a>
                                                @elseif($data->status == 'inactive')
                                                    <a href="{{ route('admin.opportunity_delete', $data->id) }}"
                                                        class="btn btn-info btn-sm info-btn mr-4"
                                                        onclick="return confirm('Are you sure you want to list this Opportunity?')">LIST</a>
                                                @endif
                                                <button type="button" class="btn btn-info btn-sm info-btn mr-4"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop{{ $data->id }}">
                                                    Edit
                                                </button>

                                            </td>

                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{ $data->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update
                                                            opportunity</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Your form starts here -->
                                                        <form method="post" action="{{route('admin.Opportunity_update',$data->id)}}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label class="form-label">Image (Only
                                                                        jpeg/jpg/png)</label>
                                                                    <div>
                                                                        <input type="file" name="image"
                                                                            class="form-control" required autofocus>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label class="form-label">Preview Image (Only
                                                                        jpeg/jpg/png)</label>
                                                                    <div>
                                                                        <input type="file" name="redirect_url"
                                                                            class="form-control" autofocus>
                                                                    </div><br>
                                                                </div>
                                                            </div>



                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label class="form-label">Title</label>
                                                                    <div>
                                                                        <input type="hidden" value="{{$data->id}}">
                                                                        <input type="text" name="title"
                                                                            class="form-control" required autofocus value="{{$data->title}}">
                                                                    </div><br>
                                                                </div>
                                                            </div>



                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label class="form-label">Descriptions</label>
                                                                    <div>
                                                                        <input type="text" name="description"
                                                                            class="form-control" required autofocus value="{{$data->description}}">
                                                                    </div><br>
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
