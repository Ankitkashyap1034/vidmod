@extends('admin.layout.base')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container">

        <div class="main_content_iner ">

            <div class="container-fluid p-0">

                <div class="row justify-content-center">

                    <div class="col-lg-12">

                        <div class="white_box mb_30">

                            <div class="box_header ">

                                <div class="main-title">

                                    <br><br>

                                    <h3 class="mb-0">Add Client/Admin</h3>

                                </div>

                            </div><br>

                            <form method="post" action="{{ route('admin.addclient') }}" enctype="multipart/form-data">



                                @csrf

                                <div class="row g-3">

                                    <div class="col-lg-6">

                                        <div>

                                            <label class="form-label">Upload Image:</label>

                                            <div>

                                                <input type="file" name="profile_pic" class="form-control" autofocus>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div>

                                            <label class="form-label">Name</label>

                                            <div>

                                                <input type="text" name="name" class="form-control" required
                                                    autofocus>

                                            </div><br>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div>

                                            <label class="form-label">User Type</label>

                                            <div>

                                                <input type="radio" name="reg_type" value="client" id="0">

                                                <label for="client">Client</label><br>

                                                <input type="radio" name="reg_type" value="sub-admin" id="1">

                                                <label for="sub-admin">Sub-Admin</label><br>

                                            </div><br>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div>

                                            <label class="form-label">Email-Id</label>

                                            <div>

                                                <input type="email" name="email" class="form-control"
                                                    value="{{ old('email') }}" autofocus>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div>

                                            <label class="form-label">Mobile No</label>

                                            <div>

                                                <input type="number" name="contact" id="contact" class="form-control"
                                                    value="{{ old('contact') }}" autofocus>

                                            </div>

                                            <div id="contact_error" style="color:red;"></div>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div>

                                            <label class="form-label">DOB</label>

                                            <div>

                                                <input type="date" name="dob" class="form-control" autofocus><br>

                                            </div><br>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div>

                                            <label class="form-label">Gender</label>

                                            <div>

                                                <input type="radio" name="gender" value="male">

                                                <label for="male" style="margin-right: 10px;">Male</label>

                                                <input type="radio" name="gender" value="female">

                                                <label for="female" style="margin-right: 10px;">Female</label>

                                                <input type="radio" name="other" value="other">

                                                <label for="other">Other</label>

                                            </div><br>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div>

                                            <label class="form-label">Street Address</label>

                                            <div>

                                                <input type="text" name="address" class="form-control" autofocus>

                                            </div>

                                        </div>

                                    </div>







                                    <div class="col-lg-6">

                                        <div>

                                            <label class="form-label">State</label>

                                            <div>

                                                <select class="form-control" aria-label="Default select example"
                                                    id="selectBox" name="state_id" onchange="stateBTN();">

                                                    @foreach ($states as $sat)
                                                        <option name="state" value="{{ $sat->id }}" id="selectState">
                                                            {{ $sat->state_title }}</option>
                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div>

                                            <label class="form-label">City</label>

                                            <div>

                                                <select class="form-control" aria-label="Default select example"
                                                    name="city_id" id="babuRao"></select>

                                            </div><br>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div>

                                            <label class="form-label">Zip Code</label>

                                            <div>

                                                <input type="number" name="zipcode" class="form-control" id="exampleInput"
                                                    autocomplete="one-time-code" placeholder="Enter Zip Code"><br>



                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">
                                    </div>




                                    <div class="col-lg-6">

                                        <label class="form-label">Password</label>

                                        <div class="input-group">

                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Enter Password" autocomplete="one-time-code" autofocus>

                                            <span class="input-group-text">

                                                <i class="fa fa-eye-slash" id="tooglePassword"></i>

                                            </span>

                                        </div>

                                    </div>



                                    <div class="col-lg-6" style="margin-top:-10px;">

                                        <label for="password">Confirm Password</label>

                                        <div class="form-group">

                                            <div class="input-group">

                                                <input type="password" name="cpassword" class="form-control"
                                                    id="cpassword" placeholder="Enter Password"
                                                    autocomplete="one-time-code" autofocus>

                                                <span class="input-group-text">

                                                    <i class="fa fa-eye-slash" id="ctooglePassword"></i>

                                                </span>

                                            </div>

                                            <div id="password_error" style="color:red;"></div>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <p>
                                            Password should be minimum of 8 characters<br>
                                            At least one capital letter[A-Z]<br>
                                            At least one special character[@#%!~]<br>
                                            At least one number<br>
                                        </p>

                                    </div>

                                    <div class="col-lg-6">
                                    </div>




                                    <div class="Terms">

                                        <div class="accordion accordion-flush" id="accordionFlushExample">

                                            <div class="accordion-item">

                                                <h2 class="accordion-header">

                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                        aria-expanded="false" aria-controls="flush-collapseOne">

                                                        Term & Condition

                                                    </button>

                                                </h2>

                                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">

                                                    <div class="accordion-body">

                                                        <p>1. Portfolio renewal at the time of maturity would attract new

                                                            advisory fees as well as Huddle Rate at that specific point in

                                                            time.</p>

                                                        <P>2. In case of non-achievement of Huddle rate at the time of

                                                            portfolio expiry due to uncontrolled nature of markets, the

                                                            portfolio shall be extended for next six months without any

                                                            additional advisory fees and additional huddle rate.</P>

                                                        <P>3. Terminating the contract would affect at nonrefundable fees

                                                            and proportionate huddle rate would be considered at the time of

                                                            seizure.</P>

                                                        <P>4. The equity market and index data displayed on the client

                                                            profile is updated every 15 minutes and may not be exact. Please

                                                            refer to the official NSE website for real-time data.</P>

                                                        <P>* The actual terms and conditions may vary according to nature of

                                                            your contract and current market guidelines</P>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-lg-12">

                                        <br>

                                    </div>



                                    <div class="col-lg-6">

                                        <div>

                                            <button type="submit" id="submit_button"
                                                class="btn btn-primary">Submit</button>

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







    <!--  Add Script To See Password And Confirm Password   -->





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let password = document.getElementById("password");

        let tooglePassword = document.getElementById("tooglePassword");

        let cpassword = document.getElementById("cpassword");

        let ctooglePassword = document.getElementById("ctooglePassword");

        var button = $('#submit_button');

        console.log(password);
        console.log(tooglePassword);



        tooglePassword.onclick = function() {

            if (password.type === "password") {

                password.type = "text";

            } else {

                password.type = "password";

            }



            tooglePassword.classList.toggle('fa-eye-slash');

            tooglePassword.classList.toggle('fa-eye');

        }



        ctooglePassword.onclick = function() {

            // alert('hy');

            if (cpassword.type === "password") {

                cpassword.type = "text";

            } else {

                cpassword.type = "password";

            }

            ctooglePassword.classList.toggle('fa-eye-slash');

            ctooglePassword.classList.toggle('fa-eye');

        }



        cpassword.addEventListener('input', function() {

            if (password.value != cpassword.value) {

                password_error.textContent = "Password Do Not Match";

                button.prop('disabled', true);

            } else {

                password_error.textContent = "";

                button.prop('disabled', false);

            }

        });
    </script>





    <script>
        $(document).ready(function() {

            console.log("Script is running");





            $('#contact').on('keyup', function() {



                var contact = $('#contact').val();

                var button = $('#submit_button');

                console.log(contact);



                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');



                var dataToSend = {

                    '_token': csrfToken,

                    contact: contact,

                };



                $.ajax({

                    url: "{{ route('admin.checkContact') }}",

                    method: 'POST',

                    cache: false,

                    data: dataToSend,

                    success: function(response) {

                        if (response.available) {

                            $('#contact_error').text("");

                            button.prop('disabled', false);

                        } else {

                            $('#contact_error').text("Mobile No Is Already Exist");

                            button.prop('disabled', true);

                        }







                    },

                    error: function(error) {

                        console.error("Error sending data: " + error);

                    }



                });





            });

        });
    </script>



    <script>
        function stateBTN() {

            var selectBox = document.getElementById("selectBox");

            var id = selectBox.options[selectBox.selectedIndex].value;

            // alert(id);



            $.ajax({

                url: "{{ route('admin.getCites') }}",

                type: "get",

                data: {

                    _token: '{{ csrf_token() }}',

                    id: id

                },

                success: function(data) {

                    console.log(data.cities);

                    var select = document.getElementById("babuRao");



                    select.innerHTML = "";

                    data.cities.forEach(element => {

                        var option = document.createElement("option");

                        option.value = element.id;

                        option.text = element.name;

                        select.appendChild(option);

                    });





                },



            });

        }
    </script>















    <script>
        document.addEventListener("change", function(event) {

            if (event.target.classList.contains("uploadProfileInput")) {

                var triggerInput = event.target;

                var currentImg = triggerInput.closest(".pic-holder").querySelector(".pic")

                    .src;

                var holder = triggerInput.closest(".pic-holder");

                var wrapper = triggerInput.closest(".profile-pic-wrapper");



                var alerts = wrapper.querySelectorAll('[role="alert"]');

                alerts.forEach(function(alert) {

                    alert.remove();

                });



                triggerInput.blur();

                var files = triggerInput.files || [];

                if (!files.length || !window.FileReader) {

                    return;

                }



                if (/^image/.test(files[0].type)) {

                    var reader = new FileReader();

                    reader.readAsDataURL(files[0]);



                    reader.onloadend = function() {

                        holder.classList.add("uploadInProgress");

                        holder.querySelector(".pic").src = this.result;



                        var loader = document.createElement("div");

                        loader.classList.add("upload-loader");

                        loader.innerHTML =

                            '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';

                        holder.appendChild(loader);



                        setTimeout(function() {

                            holder.classList.remove("uploadInProgress");

                            loader.remove();



                            var random = Math.random();

                            if (random < 0.9) {

                                wrapper.innerHTML +=

                                    '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>';

                                triggerInput.value = "";

                                setTimeout(function() {

                                    wrapper.querySelector('[role="alert"]').remove();

                                }, 3000);

                            } else {

                                holder.querySelector(".pic").src = currentImg;

                                wrapper.innerHTML +=

                                    '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>';

                                triggerInput.value = "";

                                setTimeout(function() {

                                    wrapper.querySelector('[role="alert"]').remove();

                                }, 3000);

                            }

                        }, 1500);

                    };

                } else {

                    wrapper.innerHTML +=

                        '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>';

                    setTimeout(function() {

                        var invalidAlert = wrapper.querySelector('[role="alert"]');

                        if (invalidAlert) {

                            invalidAlert.remove();

                        }

                    }, 3000);

                }

            }

        });
    </script>
@endsection
