<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Eskay Imvestment Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('admin/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
  
  <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/admin.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('admin/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/card.css') }}" />
    



  

  

</head>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('admin.layout.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      @include('admin.layout.sidebar')
      <!-- partial -->
      <div class="main-panel">
          @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
  <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
  <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('admin/js/template.js') }}"></script>
  <script src="{{ asset('admin/js/settings.js') }}"></script>
  <script src="{{ asset('admin/js/todolist.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.buttons.min.js') }}"></script>
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
        color: 'orange',
        theme: 'light',
        messageColor: 'black',
    });

    </script>
@endif

 

  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>

