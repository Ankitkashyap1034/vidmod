@extends('admin.layouts.app')

@section('content')

<style>
    /* The switch - the box around the slider */
</style>

<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>All Users</h5>

                </div>
                <div class="QA_table mb_30" style="background: #fff; padding: 25px;">

                    <table class="table table lms_table_active" id="dataTable">
                        <thead>
                            <tr>

                                <th>S.No</th>
                                <th>User Name</th>
                                <th>User Address</th>
                                <th>User Emails</th>



                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($user as $data)

                            <tr>
                                <td class="checks">{{ $loop->iteration }}</td>
                                <td class="{{ $data->name ? '' : 'text-danger' }}">
                                    {{ $data->name ?? 'Na' }}
                                </td>
                                <td class="{{ $data->address ? '' : 'text-danger' }}">
                                    {{ $data->address ?? 'Na' }}
                                </td>
                                <td class="{{ $data->email ? 'text-center' : 'text-center text-danger' }}">
                                    <a href="mailto:{{ $data->email}}">{{ $data->email ?? 'Na' }}</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

@endsection