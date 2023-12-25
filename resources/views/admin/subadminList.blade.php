@extends('admin.layouts.app')

@section('content')
<style>
    /* The switch - the box around the slider */
    .switch {
        font-size: 14px;
        position: relative;
        display: inline-block;
        width: 3.5em;
        height: 2em;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        inset: 0;
        border: 2px solid #414141;
        border-radius: 50px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 21px;
        width: 1.4rem;
        left: 0.2rem;
        bottom: 2px;
        background-color: #c80000;
        border-radius: inherit;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .switch input:checked+.slider {
        box-shadow: 0 0 20px #c80000;
        border: 2px solid #414141;
    }

    .switch input:checked+.slider:before {
        transform: translateX(1.5em);
    }
    .td {}

    .checks {
        padding: 0 0 0 21px !important;
    }

    .table_body {
        overflow-x: scroll;

    }

    .table_body table {
        overflow-x: scroll;
        width: 100%;
        display: block;
        white-space: nowrap;

    }
</style>

<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>All Users</h5>

                </div>
                <div class="panel-body table_body">


                    <table class="table table-dashed table-hover digi-dataTable all-product-table table-striped" id="allProductTable" style="overflow-x: scroll;table-layout: fixed;">
                        <thead>
                            <tr>
                                <th class="no-sort" style="width: 42px;padding: 0 0 0 21px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="markAllProduct">
                                    </div>
                                </th>
                                <th style="width: 40px;">S.No</th>
                                <th>User Name</th>
                                <th>User Address</th>
                                <th>User Emails</th>
                                <th>Action</th>
                               

                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                          
                            @foreach ($subadmin as $item)
                          


                            <tr>
                                <td class="checks">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td class="checks">{{ $i++ }}</td>
                                <td class="{{ $item->name ? '' : 'text-danger' }}">
                                    <a href="">{{ $item->name ?? 'Na' }}</a>
                                </td>
                                <td class="{{ $item->address ? '' : 'text-danger' }}">
                                    {{ $item->address ?? 'Na' }}</td>
                                <td class="{{ $item->email ? 'text-center' : 'text-center text-danger' }}">
                                    <a href="mailto:{{ $item->email}}">{{ $item->email ?? 'Na' }}</a>
                                </td>
                                <td class="{{ $item->invested_money ? 'text-center' : 'text-center text-danger' }}">
                                    {{ $item->invested_money ?? 'Na' }}
                                </td>                             
                                <td> 
                                    <a href="">Edit</a>
                                    <a href="">Delete</a>
                                </td>
                                

                              
                            </tr>
                        </tbody>
                      
                        @endforeach


                    </table>



                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="table-bottom-control"></div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection