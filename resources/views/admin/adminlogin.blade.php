<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <title>Eskay Login</title>
  <style>
    .admin-login.main_content {
      padding-left: unset;
      padding-bottom: unset;
    }


    .main_content .main_content_iner {
      transition: .5s;
      margin: 20px 30px 30px;
    }

    .main_content {
      padding-left: 270px;
      width: 100%;
      padding-top: 0 !important;
      transition: .5s;
      position: relative;
      min-height: 100vh;
      padding-bottom: 90px;
      overflow: hidden;
    }

    .admin-login {
      display: grid;
      align-items: center;
    }

    .cs_modal {
      background-color: #fef1f2;
    }

    .modal-content {
      position: relative;
      display: flex;
      flex-direction: column;
      width: 100%;
      pointer-events: auto;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, .2);
      border-radius: 0.3rem;
      outline: 0;
    }

    .admin-login .modal-content .modal-header {
      flex-direction: column;
    }

    .cs_modal .modal-header {
      background-color: #641515;
      padding: 23px 30px;
      border-bottom: 0 solid transparent;
      align-items: center;
    }

    .cs_modal .modal-body {
      padding: 35px 30px !important;
      background: #fff;
      border-radius: 5px;
    }

    .admin-login .modal-content .modal-header img {
      width: 150px;
      margin-bottom: 5px;
    }

    .cs_modal .modal-header h5 {
      font-size: 22px;
      color: white;
      font-weight: 600;
    }

    .form-control:focus {
      border-color: #76e476 !important;
      box-shadow: unset;
    }

    .icon-sec {
      float: right;
      margin-right: 10px;
      margin-left: -25px;
      margin-top: -57px;
      position: relative;
      z-index: 2;
    }

    .main_content.dashboard_part .btn_1.full_width {
      height: 50px !important;
      background-color: #641515 !important;
      color: #fff !important;
      line-height: unset !important;
    }

    .cs_modal .modal-body .btn_1 {
      width: 100%;
      display: block;
      margin-top: 20px;
    }

    .cs_modal .modal-body input,
    .cs_modal .modal-body .nice_Select {
      height: 50px;
      padding: 10px 20px;
      border: 1px solid #f1f3f5;
      font-size: 14px;
      font-weight: 500;
      margin-bottom: 21px;
    }

    .AccSign a {
      color: #641515;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="admin-login main_content dashboard_part">
    <div class="main_content_iner">
      <div class="container-fluid p-0">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row justify-content-center">
              <div class="col-lg-4">
                <div class="modal-content cs_modal">
                  <div class="modal-header justify-content-center">
                    <img src="https://eskayinvestments.in/assets/img/logo/logo_eskayinvestments_crop.png" alt="Eskay">
                    <h5 class="modal-title">Admin Log in</h5>
                  </div>

                  <div class="modal-body">
                    <form action="{{ route('admin.loginn') }}" method="post">
                      @csrf

                      <div class="">
                        <input type="text" name="email" class="form-control" placeholder="Enter your email" required>
                      </div>

                      <div class="">
                        <input type="password" id="EyePassword" class="form-control" name="password" value="secret">
                        <span class="icon-sec">
                          <i class="fas fa-eye-slash" id="toggle-password"></i>
                        </span>


                      </div>

                      <input type="submit" class="btn_1 full_width text-center" value="Log in">

                    </form>

                    <div class="AccSign">
                      <a href="{{ route('forgetPassword')}}" class="text-center d-block">Fogot Password?</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    console.log('Hello');

    const passwordField = document.getElementById("EyePassword");
    const toggleButton = document.getElementById("toggle-password");
    console.log(passwordField, toggleButton);
    toggleButton.addEventListener("click", function() {
      if (passwordField.type === "password") {
        passwordField.type = "text";
      } else {
        passwordField.type = "password";
      }
    });
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
  @if (Session::has('success'))
  <script>
    iziToast.success({
      //title: 'Success',
      message: "{{ Session::get('success') }}",
      position: 'topRight',
      timeout: 4000,
      displayMode: 0,
      color: 'green',
      theme: 'light',
      messageColor: 'black',
    });
  </script>
  @elseif (Session::has('error'))
  <script>
    iziToast.warning({
      //title: 'Success',
      message: "{{ Session::get('error') }}",
      position: 'topRight',
      timeout: 4000,
      displayMode: 0,
      color: 'red',
      theme: 'light',
      messageColor: 'black',
    });
  </script>
  @endif
</body>

</html>