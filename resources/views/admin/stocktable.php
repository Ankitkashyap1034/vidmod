@extends('admin.layouts.app')

@section('content')

<div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Stock Name</th>
                                        <th>Company Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                   @foreach($stocks as $stck)
                                    <tr>
                                        <td data-title="Order ID">{{$i++;}}</td>
                                        <td data-title="Date">{{$stck->stock_name}}</td>
                                        <td data-title="abp">{{$stck->company_name}}</td>
                                        <td data-title="acp"></td>
                                       </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>


                   @endsection
