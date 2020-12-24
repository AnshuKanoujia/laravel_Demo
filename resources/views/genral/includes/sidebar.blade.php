 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <!-- <img src="{{ URL::asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" /> -->
              <img src="{{ URL::asset('images/users') }}/{{session()->get('image')?session()->get('image'):''}}" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
              <p>@if(!empty(Session::has('name'))) Eezata @else Taxi Booking  @endif </p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li >
              <a href="{{url('dashboard')}}">
                <i class="fa fa-dashboard"></i><span>Dashboard</span> <i class="fa pull-right"></i>
              </a>
            </li>
            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Layout Options</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
              </ul>
            </li> -->
            <!-- <li>
              <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li> -->
            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Charts</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
              </ul>
            </li> -->
            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
              </ul>
            </li> -->
            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('booktaxi')}}"><i class="fa fa-circle-o"></i>Add Taxi</a></li>
                <li><a href="{{url('drivers')}}"><i class="fa fa-circle-o"></i>Driver</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li> -->

            @if(Session::get('users_roll_type')=='1'  || Session::get('users_roll_type')=='3' )
            <li>
              <a href="{{url('booktaxi')}}">
                <i class="fa fa-truck"></i> <span>Add Vehicle</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>
            <li>
              <a href="{{url('third_party_vehicle')}}">
                <i class="fa fa-truck"></i> <span>Third Party Vehicle</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>
            @endif
            @if(Session::get('users_roll_type')=='1' ||  Session::get('users_roll_type')=='3' )
              <li>
                <a href="{{url('drivers')}}">
                  <i class="fa fa-user"></i> <span>Driver</span>
                  <i class="fa  pull-right"></i>
                </a>
              </li>
            @endif
            <li>
              <a href="{{url('flight')}}">
                <i class="fa fa-fighter-jet"></i> <span>Flight</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>
			
            <li>
              <a href="{{url('address')}}">
                <i class="fa fa-map-marker"></i> <span>Address</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>
			      <li>
              <a href="{{url('pickup_drop')}}">
                <i class="fa fa-map-marker"></i> <span>Pickup / Drop Points</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>
            <li>
              <a href="{{url('add_day')}}">
              <i class="fa fa-calendar"></i> <span>Tour Length</span>
                <i class="fa pull-right"></i>
              </a>
            </li>
            <!--<li>
              <a href="{{url('pickup_drop')}}">
                <i class="fa fa-map-marker"></i> <span>Add Region</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>-->
            @if(Session::get('users_roll_type')=='1')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Activities</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="{{url('activities_types')}}" ><i class="fa fa-circle-o"></i> Customization activities type</a></li>
              </ul>
            </li>
            @endif

            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Templating</span> 
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('tour_tamplating')}}" ><i class="fa fa-circle-o"></i> Add Tour Template</a></li>
                <li><a href="{{url('tour_tamplates')}}" ><i class="fa fa-circle-o"></i> All Tour Template</a></li>
                <li><a href="{{url('custom_activities')}}" ><i class="fa fa-circle-o"></i> Other Templating</a></li>
                
              </ul>
            </li>



            <li>
              <a href="{{url('taxi_bookings')}}">
                <i class="fa fa-ticket"></i> <span>Taxi Bookings</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>

            <li>
              <a href="{{url('tour_bookings')}}">
                <i class="fa fa-ticket"></i> <span>Tour Bookings</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>

            @if(Session::get('users_roll_type')=='1')
            <li>
              <a href="{{url('registration')}}">
                <i class="fa fa-users"></i> <span>Employee</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>
            @endif 
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-tag"></i> <span>Rental  Booking</span> 
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('new_accessories')}}" ><i class="fa fa-tag"></i> Add Inventory </a></li>
                <li><a href="{{url('accessories')}}" ><i class="fa fa-tag"></i> All Inventory</a></li>
                <li><a href="{{url('all_request')}}" ><i class="fa fa-ticket"></i> All Rental Booking Request </a></li>
                <li><a href="{{url('new_rental_bookings')}}" ><i class="fa fa-ticket"></i> New Rental Booking</a></li>
                <li><a href="{{url('rental_bookings')}}" ><i class="fa fa-ticket"></i> All Rental Booking</a></li>
              </ul>
            </li>

            
            <!-- <li>
              <a href="{{url('gettodaydetails')}}">
                <i class="fa fa-ticket"></i> <span>Today Details</span>
                <i class="fa  pull-right"></i>
              </a>
            </li> -->

            <li>
              <a href="{{url('booking_structure')}}">
                <i class="fa fa-ticket"></i><span>Day Layout</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>
            <li>
              <a href="{{url('financial_layout')}}">
                <i class="fa fa-ticket"></i><span>Financial Layout</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>
            <li>
              <a href="{{url('banana_accounts')}}">
                <i class="fa fa-ticket"></i><span>Banana Accounts</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>

            <li>
              <a href="{{url('term_condition')}}">
                <i class="fa fa-list"></i><span>Terms and conditions</span>
                <i class="fa  pull-right"></i>
              </a>
            </li>
            
            <!-- <li>
              <a href="{{url('table')}}">
                <i class="fa fa-table"></i> <span>Data Tables</span>
                <i class="fa  pull-right"></i>
              </a>
              
            </li>
            <li>
              <a href="{{url('calender')}}">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>  -->
            <!-- <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li> -->
            


            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li> -->
            <!-- <li><a href="documentation/index.html"><i class="fa fa-book"></i> Documentation</a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li> -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>