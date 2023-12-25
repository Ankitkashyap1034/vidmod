@extends('admin.layouts.app')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

<h2>stocks Table</h2>
                        <div class="table-responsive">
                           
                                <table id="myDataTable" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Stock Name</th>
                                        <th>Company Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                   @foreach($stocks as $stck)
                                    <tr>
                                        <td data-title="Order ID">{{$i++;}}</td>
                                        <td data-title="Date">{{$stck->stock_name}}</td>
                                        <td data-title="abp">{{$stck->company_name}}</td>
                                        <td data-title="acp">
                                            

                                        <a href="{{route('admin.edit_stock', ['id' => $stck->id ])}}">📝</a>
                                        <a href=""></a>
                                        </td>
                                       </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>

                   

                       

{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myDataTable').DataTable();
    });
</script>

@endsection
