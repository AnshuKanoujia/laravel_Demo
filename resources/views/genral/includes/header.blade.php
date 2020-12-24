<div class="wrapper">
 <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo"><b>
         @if(session()->get('users_roll_type')=='1')
               Admin
           @elseif(session()->get('users_roll_type')=='2')
               Employee
           @elseif(session()->get('users_roll_type')=='3')
               Managers 
         @endif
        </b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
        
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            
              <!-- Messages: style can be found in dropdown.less-->
              <!--<li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                 
                  
                   
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{ URL::asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            Support Team 
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{ URL::asset('admin/dist/img/user3-128x128.jpg') }}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{ URL::asset('admin/dist/img/user4-128x128.jpg') }}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{ URL::asset('admin/dist/img/user3-128x128.jpg') }}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{ URL::asset('admin/dist/img/user4-128x128.jpg') }}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>-->
              
              @if(session()->get('users_roll_type')=='1')
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning notification_counting">
                    {{count((array)App\Tour_bookings::get_all_delete_request_booking())}}
                  </span>
                </a>
                @if(count((array)App\Tour_bookings::get_all_delete_request_booking()) )
                <ul class="dropdown-menu">
                  <li class="header">You have <strong class="notification_counting">{{count((array)App\Tour_bookings::get_all_delete_request_booking())}} delete request </strong> notifications</li>
                  <li>
                  
                    <ul class="menu">
                      @foreach(App\Tour_bookings::get_all_delete_request_booking()  as $value)
                        <li id="delete_notification_id_{{$value->id}}_{{$value->booking_type}}">
                          <a href="{{url('delete_booking_request_details/'.$value->booking_id.'/'.$value->booking_type)}}">
                           <!-- {{ucfirst($value->booking_type)}} :  -->
                            <i class="fa fa-car text-aqua" title="{{$value->booking_id}}"></i>{{ucfirst($value->booking_id)}} 
                            <span class=""> :{{ucfirst($value->booking_type)}} delete by {{ucfirst($value->delete_request_by_name)}}</span>
                          </a>
                        </li>
                      @endforeach   
                    </ul>
                  </li>
                
                </ul>
               @endif

              </li>
              @endif
             
              <!--<li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                  
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- <img src="{{ URL::asset('admin/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"/> -->
                  <img src="{{ URL::asset('images/users') }}/{{session()->get('image')?session()->get('image'):''}}" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">@if(!empty(Session::has('name'))) Eezata @else Taxi Booking  @endif</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <!-- <img src="{{ URL::asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" /> -->
                    <img src="{{ URL::asset('images/users') }}/{{session()->get('image')?session()->get('image'):''}}" class="user-image" alt="User Image"/>
                    <p>
                    {{session()->get('name')?session()->get('name'):''}} - 
                    @if(session()->get('users_roll_type') && session()->get('users_roll_type')=='1')
                    Admin
                    @elseif(session()->get('users_roll_type') && session()->get('users_roll_type')=='2')
                    Employee
                    @else
                    Managers
                    @endif
                      <small>Member since {{date("F, Y",strtotime(session()->get('join_date')))}}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{url('user-details/'.session()->get('user_id'))}}"  class="btn btn-default btn-flat">Profile</a> 
                      <a href="{{url('edit_user/'.session()->get('user_id'))}}"  class="btn btn-default btn-flat">Edit Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{url('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>