@extends('admin.layouts.app')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .SubAdmin {
            padding-block: 3rem;
            background-color: #f3f9fbcf;
        }


        .SubAdmin .AdminSubConent {
            padding: 35px 30px !important;
            background: #fff;
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

        .AdminAboutSidebar {
            padding: 35px 30px !important;
            background: #fff;
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

        .SubAdmin .AdminSubConent input,
        .SubAdmin .AdminSubConent select {
            height: 45px;
            padding: 10px 20px;
            border: 1px solid #f1f3f5;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 21px;
            width: 100%;
        }


        .form-control:focus {
            border-color: #000035 !important;
            box-shadow: unset;
        }

        .btn_1.full_width {
            height: 45px;
            background-color: #000035 !important;
            color: #fff !important;
            line-height: unset !important;
            border-radius: 5px;
        }

        .pic-holder {
            height: 150px;
            width: 150px;

            position: relative;
        }


        .pic-holder .upload-file-block,
        .pic-holder .upload-loader {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(90, 92, 105, 0.7);
            color: #ff0505;
            font-size: 12px;
            font-weight: 600;
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }


        .profile-pic-wrapper {
            display: flex;
            justify-content: center;
        }

        .pic-holder img {
            height: 100%;
            width: 100%;
            border-radius: 12px;

        }

        .AboutContent {
            margin-top: 2rem;
        }

        .AboutContent h5 {
            font-size: 22px;
            font-weight: 700;
            line-height: 16px;

        }


        .abtConent {
            height: 100px;
            margin-top: 20px;
        }


        .abtConent textarea {
            width: 100%;
            height: 100%;
            border-radius: 5px;
        }
    </style>

    <h2>Add Sub-admin</h2>


    <section class="SubAdmin">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <aside class="AdminSubConent">
                        <form action="{{ route('admin.subadmin') }}" method="POST" enctype="multipart/form-data">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <label class="error m-auto row text-danger mb-3">{{ $error }}</label>
                                @endforeach
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <input type="text" name="name" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <input type="text" name="mobile" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-lg-6">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Re-enter password">
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <select name="type" id="">
                                            <option value="sub-admin">sub-admin</option selected>
                                            <option value="admin">admin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" class="btn_1 full_width text-center" value="add-subadmin">
                                </div>
                            </div>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).on("change", ".uploadProfileInput", function() {
            var triggerInput = this;
            var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
            var holder = $(this).closest(".pic-holder");
            var wrapper = $(this).closest(".profile-pic-wrapper");
            $(wrapper).find('[role="alert"]').remove();
            triggerInput.blur();
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) {
                return;
            }
            if (/^image/.test(files[0].type)) {
                // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() {
                    $(holder).addClass("uploadInProgress");
                    $(holder).find(".pic").attr("src", this.result);
                    $(holder).append(
                        '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
                    );

                    // Dummy timeout; call API or AJAX below
                    setTimeout(() => {
                        $(holder).removeClass("uploadInProgress");
                        $(holder).find(".upload-loader").remove();
                        // If upload successful
                        if (Math.random() < 0.9) {
                            $(wrapper).append(
                                '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
                            );

                            // Clear input after upload
                            $(triggerInput).val("");

                            setTimeout(() => {
                                $(wrapper).find('[role="alert"]').remove();
                            }, 3000);
                        } else {
                            $(holder).find(".pic").attr("src", currentImg);
                            $(wrapper).append(
                                '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
                            );

                            // Clear input after upload
                            $(triggerInput).val("");
                            setTimeout(() => {
                                $(wrapper).find('[role="alert"]').remove();
                            }, 3000);
                        }
                    }, 1500);
                };
            } else {
                $(wrapper).append(
                    '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
                );
                setTimeout(() => {
                    $(wrapper).find('role="alert"').remove();
                }, 3000);
            }
        });


        $("#imag").change(function() {
            // add your logic to decide which image control you'll use
            var imgControlName = "#ImgPreview";
            readURL(this, imgControlName);
            $('.preview1').addClass('it');
            $('.btn-rmv1').addClass('rmv');
        });
        $("#removeImage1").click(function(e) {
            e.preventDefault();
            $("#imag").val("");
            $("#ImgPreview").attr("src", "");
            $('.preview1').removeClass('it');
            $('.btn-rmv1').removeClass('rmv');
        });
    </script>
@endsection
