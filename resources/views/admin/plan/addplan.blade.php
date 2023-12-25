@extends('admin.layout.base')

@section('content')
<div class="container">
    <br>
    <h2>Add Plans:</h2>
    <form action="{{route('admin.addplan')}}" method="post" enctype="multipart/form-data">
        
        @csrf
        <div class="form-group"><br>        



            <label for="exampleInput">Huddle Rate</label>
            <input type="text" name="huddle_rate" class="form-control" id="exampleInput" autocomplete="one-time-code" placeholder="Enter Huddle Rate With %" required><br>

            <label>Advisory Fee:</label><br>
            <input type="numeric" name="adv_fees" class="form-control" id="exampleInput" autocomplete="one-time-code" placeholder="Enter Advisory Fee With %" required><br>

            <label>Tenure</label>

            <div style="display:flex;align-items:center;">
                <label for="Tenure">Year</label><br>
                <select class="form-control" name="tenure_in_year" style="width:65%; margin-left:8px">
                    <option value="0 yr">0</option>
                    <option value="1 yr">1</option>
                    <option value="2 yr">2</option>
                    <option value="3 yr">3</option>
                    <option value="4 yr">4</option>
                    <option value="5 yr">5</option>
                    <option value="6 yr">6</option>
                    <option value="7 yr">7</option>
                    <option value="8 yr">8</option>
                    <option value="9 yr">9</option>
                    <option value="10 yr">10</option>
                </select>

                <label for="Tenure" style="margin-left:37px">Month</label>
                <select class="form-control" name="tenure_in_month" style="width:65%; margin-left:8px">
                    <option value="0 mos">0</option>
                    <option value="1 mos">1</option>
                    <option value="2 mos">2</option>
                    <option value="3 mos">3</option>
                    <option value="4 mos">4</option>
                    <option value="5 mos">5</option>
                    <option value="6 mos">6</option>
                    <option value="7 mos">7</option>
                    <option value="8 mos">8</option>
                    <option value="9 mos">9</option>
                    <option value="10 mos">10</option>
                </select>
            </div>

                
           <br><br> <button type="submit" class="btn btn-primary">Submit</button><br>
    </form>
</div><br>

<script>
    function togglePasswordVisibility(){
        var passwordInput = document.getElementById('password');
        var passwordIcon = document.getElementById('passwordIcon');
        console.log(passwordInput); console.log(passwordIcon);

        if(passwordInput.type === "password"){
            passwordInput.type = "text";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");

        }else{
            passwordInput.type = "password";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        }

    }
</script>
@endsection