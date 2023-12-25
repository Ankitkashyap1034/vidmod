@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <canvas id="myChart"></canvas>
        </div>
<div class="col-md-6">
    <span>
    here is the details of the our coustomer <a href="">{{$userdetails->name}}</a> 
    {{-- the @if(){{}}@else{{}}@endif --}}
    The Profit {{$userdetails->name}} made is {{}}
</span>

</div>
    </div>
  
    
    <div class="col-md-12">
        <button>POA</button>
        <button>MOU</button>
    
    </div>
</div>



<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>




@endsection