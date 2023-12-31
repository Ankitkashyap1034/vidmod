@extends('admin.layout.base')
@section('content')
<div class="container">
      @if ($errors->any())
      <!-- Common error section -->
      <div class="alert alert-danger">
            <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
            </ul>
      </div>
      @endif
      <div class="main_content_iner ">
            <div class="container-fluid p-0">
                  <div class="row justify-content-center">
                        <div class="col-lg-12">
                              <div class="white_box mb_30">
                                    <div class="box_header ">
                                          <div class="main-title">
                                                <br><br>
                                                <h3 class="mb-0">Select Language</h3>
                                          </div>
                                    </div>
                                    <br>
                                    <form method="post" action="{{route('admin.home.hero.store')}}" class="mb-4">
                                          @csrf
                                          <div class="row g-3">
                                                <div class="col-lg-6">
                                                      <div>
                                                            <label class="form-label">Title</label><span>*</span>
                                                            <div>
                                                                  <input type="text" name="title" class="form-control" autofocus required value="" />
                                                            </div>
                                                            <br>
                                                      </div>
                                                </div>
                                                <div class="col-lg-6"></div>
                                                <div class="col-lg-6 mb-4">
                                                      <div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                      </div>
                                                      <br>
                                                </div>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection