@extends('admin.layout.base')

@section('content')

<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4> Plans Listing </h4>
                    </div>
                    <div class="QA_table mb_30" style="background: #fff; padding: 25px;">
                     
                        <table class="table table lms_table_active" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Tenure</th>
                                    <th scope="col">Huddle Rate</th>                                    
                                    <th scope="col">Advisory Fee</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>                              
                                   
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($plan as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>                                           
                                                {{ $data->tenure_in_year . ' ' .  $data->tenure_in_month}} 
                                                                                      
                                        </td>
                                        <td>{{$data->huddle_rate}}</td>
                                        <td>{{$data->adv_fees}}</td> 
                                        <td>
                                            @if($data->status == 'active')
                                            <button class="btn btn-success btn-sm">{{ $data->status }}</button>
                                                @else
                                                 <button class="btn btn-danger btn-sm">{{ $data->status }}</button>
                                            @endif
                                            
                                        </td>
                                        
                                        <td class="d-flex">
                                            @if($data->status == 'active')
                                                 <a href="{{ route('admin.deleteplans', $data->id) }}" class="btn btn-info btn-sm info-btn mr-4" onclick="return confirm('Are you sure you want to Unlist this plan?')">UNLIST</a>
                                                @elseif($data->status == 'inactive')
                                                <a href="{{ route('admin.deleteplans', $data->id) }}" class="btn btn-info btn-sm info-btn mr-4" onclick="return confirm('Are you sure you want to list this plan?')">LIST</a>
                                            @endif

                                            <a href="{{ route('admin.plans_delete', $data->id) }}" class="btn btn-danger btn-sm danger-btn mr-2" onclick="return confirm('Are you sure you want to Delete this plan?')">Delete</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>


@endsection