  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav" style="margin-right: auto !important;">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">Dashboard</span>
          <div class="badge badge-danger">new</div>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements-1" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">Profile</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements-1">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{route('admin.profile')}}">Edit Profile</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="typcn typcn-document-text menu-icon"></i>
          <span class="menu-title">Homepage</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.homepage.hero')}}">Header</a></li>
          </ul>
           <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.homepage.header')}}">Hero Section</a></li>
          </ul>
        </div>
        {{-- <div class="collapse" id="ui-basic">
         
        </div> --}}
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements-7" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">Ongoing Opportunity</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements-7">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="#">Add Opportunity</a></li>

          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements-6" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">Account Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements-6">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="#">Add Client/Sub-Admin</a></li>

          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements-2" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">Add Stocks</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements-2">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="#">Add</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements-9" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">Contact</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements-9">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="#">Listing</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements-9" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">Footer</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements-9">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="#"> Contact-Listing</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements-10" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">Transaction</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements-10">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="#">Add</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Listing</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements-11" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">Withdraw Request</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements-11">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="#">Listing</a></li>
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="typcn typcn-mortar-board menu-icon"></i>
          <span class="menu-title">Log Out</span>
        </a>
      </li>



    </ul>
  </nav>