
<style type="text/css">
  .date-time {
    font-size: 12px;
    font-weight: 400 !important;
    padding-bottom: 10px;
    padding-right: 10px;
    color: #9ab434;
}
</style>
<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{url('/')}}/storage/logo/Drivvy_logo.png" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right">
        {{-- <li class="nav-item dropdown border-left">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email"></i>
              <span class="count bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <h6 class="p-3 mb-0">Messages</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="{{asset('admin/images/faces/face4.jpg')}}" alt="image" class="rounded-circle profile-pic">
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                  <p class="text-muted mb-0"> 1 Minutes ago </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="{{asset('admin/images/faces/face2.jpg')}}" alt="image" class="rounded-circle profile-pic">
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                  <p class="text-muted mb-0"> 15 Minutes ago </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="{{asset('admin/images/faces/face3.jpg')}}" alt="image" class="rounded-circle profile-pic">
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                  <p class="text-muted mb-0"> 18 Minutes ago </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <p class="p-3 mb-0 text-center">4 new messages</p>
            </div>
        </li> --}}

        <li class="nav-item dropdown border-right">
        <?php $notifications = App\Models\Notifications::getNotifications(); ?>   
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell"></i> 
                @foreach($notifications as $notify)
                @if($notify->read_status == 0)
                <span class="count bg-danger"></span>
                @endif
                @endforeach
            </a> 
            
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              @foreach($notifications as $notify)
                  @if($notify->read_status == 0)
                  <div class="note-box read">
                      <div class="dropdown-divider"></div>     
                      <a class="dropdown-item preview-item" href="{{ route('admin.user.notification-view', ['notify' => $notify->notification_id, 'id' => $notify->user_id]) }}">
                          <div class="preview-thumbnail">
                              <div class="preview-icon rounded-circle">
                                  <i class="mdi mdi-bell text-success"></i>
                              </div>
                          </div>
                          <div class="preview-item-content">
                              <p class="preview-subject mb-1">{{ $notify->type }}</p>
                              <p class="text-muted ellipsis mb-0">{{ $notify->message }}</p>
                          </div>
                          <div class="read text-end">
                              <i class="mdi mdi-circle text-success"></i>
                          </div>
                      </a>
                      <p class="mb-0 date-time text-end">{{ $notify->created_at->diffForHumans() }}</p>
                  </div>
               
                  @endif
              @endforeach
              <div class="dropdown-divider"></div>
              <p class="p-3 mb-0 text-center"><a href="{{ route('admin.user.notifications') }}" class="text-white">See all notifications</a></p>
          </div>

        </li>


        <li class="nav-item dropdown">
          <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
              <div class="navbar-profile">
                  <!-- User's First Name -->
                  <span>{{$user->first_name}}</span>&nbsp;&nbsp;
                  
                  <!-- User's Profile Image -->
                  <img class="img-xs rounded-circle"
                       src="{{ isset($user) && !is_null($user->profile_picture) 
                              ? asset('storage/users/' . $user->profile_picture) 
                              : asset('storage/users/user-image.webp') }}"
                       onerror="this.src = '{{ asset('admin/images/faces/face15.jpg') }}'"
                       alt="User profile picture">
                  
                  <!-- Username Display -->
                  <p class="mb-0 d-sm-block navbar-profile-name">
                      {{ UserNameById(authId()) }}
                  </p>

                  <!-- Dropdown Icon -->
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
              </div>
          </a>


          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
            <h6 class="p-3 mb-0">Profile</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item" href="{{route('admin.profile')}}">
                <div class="preview-thumbnail">
                  <div class="preview-icon rounded-circle">
                    <i class="mdi mdi-account text-success"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject mb-1">Settings</p>
                </div>
            </a>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item" href="{{route('logout')}}">
              <div class="preview-thumbnail">
                <div class="preview-icon rounded-circle">
                  <i class="mdi mdi-logout text-danger"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject mb-1">Log out</p>
              </div>
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-format-line-spacing"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->