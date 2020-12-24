@extends('genral.layouts.mainlayout')
@section('title') 
<title>dashboard </title>
<style type="text/css">
   [class^="icon-"], [class*=" icon-"] {
   background-image: url("public/admin/bootstrap/glyphicons/glyphicons-halflings.png");
   }
   .comiseo-daterangepicker-presets,.comiseo-daterangepicker-triggerbutton,.comiseo-daterangepicker-buttonpanel{
   display: none !important;
   }
   .comiseo-daterangepicker{
   display: block !important;
   }
   .custom-none{
   display:none !important;
   }
   .ui-datepicker-multi-2 .ui-datepicker-group {
   width: 100% !important;
   display: block;
   }
   .ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
   border: 1px solid #fcefa1;
   background: #00a65a !important;
   color:#363636;
   }
   .comiseo-daterangepicker-calendar {
   border-left-width: 0 !important;
   padding-left: 0 !important;
   }
   .comiseo-daterangepicker {
   width: 19% !important;
   left: 245px !important;
   top:106px !important;
   }
   .sidebar-collapse .comiseo-daterangepicker {
   width:24% !important;
   left:15px !important;
   top:106px !important;
   }
   #custom-picker{display: block !important}
   .ui-datepicker-inline{
   width:100% !important;
   }
   #booking_start_date{
   background: #eaeaea;
   }
   .ui-datepicker-today {
   background:#3c8dbc;
   pointer-events: auto !important;
   opacity: 1 !important;
   }
   .ui-datepicker-today span{
   color: #fff !important;
   }
   @media only screen and (max-width:768px){
   .col-md-9{
    margin-top: 480px;
   }
   .sidebar-collapse .comiseo-daterangepicker {
   width: 95% !important;
   left: 15px !important;
   top: 190px !important;
   }
   }
.fc-time-grid-event > .fc-content {
  color:#000;
}
.sep-div{
 border-bottom: 1px solid
#ccc;
padding: 7px 0px;
font-weight: 600;
text-transform: uppercase;
font-size: 14px;
margin: 0 0px 5px 0px;
color: #015d93;
}
.popover-content {
    padding: 0px 0px 8px 14px;
}
button.close {
    padding: 4px 7px !important;
    color:#fff !important;
    opacity: 1 !important;

}
label{
  padding:0px 2px;
  font-weight:600 !important;

}
.ui-dialog{
z-index:9999 !important;
box-shadow: 0px 2px 12px -2px #000;
-moz-box-shadow: 0px 2px 12px -2px #000;
-webkit-box-shadow: 0px 2px 12px -2px #000;
border-radius: 6px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
}
.popover-title {
font-size: 16px !important;
background-color: #3c8dbc !important;
border-bottom: 1px solid #ebebeb;
color:#fff;
font-weight: 500;
letter-spacing: .5px;
}
.popover {
  border: 0px !important;
  -webkit-box-shadow: 0 5px 16px rgba(0,0,0,.7) !important;
  box-shadow: 0 5px 16px rgba(0,0,0,.7) !important;
}
.list-inline{
margin-top:10px;
}
.mb-10{
  margin-bottom:10px;
}
.bg-1{background-color: #f8cbad;}
  .bg-2{background-color: #bdd7ee;}
  .bg-3{background-color: #ffd966;}
  .fc-event, .fc-event:hover, .ui-widget .fc-event {    color: #4e4e4e;}
  .fc-slats table tbody tr:not(.fc-minor) {
  background: #f0f0f0;
  }
  .fc-slats table tbody tr.fc-minor {
  background: #e1e1e1;
  }
  .fc-unthemed .fc-popover, .fc-unthemed .fc-row, .fc-unthemed hr, .fc-unthemed tbody, .fc-unthemed td, .fc-unthemed th, .fc-unthemed thead {
  border-color: #ffffff;
  }
  th.fc-widget-header {
  background: #a5a5a5;
  padding: 5px;
  text-align: left;
  color: #fff;
  font-weight: 600;
  font-size: 16px;
  }
  span.lbl-name {
  display: inline-block;
  vertical-align: top;
  font-size: 13px;
  font-weight: 400;
  margin-right: 7px;
  max-width: 96px;
  width: 100%;
  }
  .popover-content p,#checkpopup p{margin:0;line-height:12px;}
  .popover-content p label{font-size:13px;}
  h4#modalTitle {
  font-weight: 600;
  }
  .popover-content input[type="radio"],#checkpopup input[type="radio"]{
    margin-right:5px !important;
    margin: 0px 0 0;
  }
  div#modalBody h4{
  border-bottom: 1px solid #ddd;
  padding-bottom: 7px;
  margin-top: 21px;
  color: #111;
  }
  div#modalBody h4:first-child{
  margin-top: 0;
  }
  #modalBody label{
  cursor: pointer;
  }
  .modal {
  -webkit-transition: all 0.75s ease;
  transition: all 0.75s ease;
  }
  #confirm-diving{
    z-index:999999 !important;
  }
</style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Booking
         <small>Calender</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Dashboard</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="wizard">
         <div class="wizard-inner">
            <div class="connecting-line"></div>
              <ul class="nav nav-tabs" role="tablist" style="display:none;">
                 <li role="presentation" class="active">
                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                    <span class="round-tab">
                    <i class="glyphicon glyphicon-folder-open"></i>
                    </span>
                    </a>
                 </li>
                 <li role="presentation" class="disabled">
                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                    <span class="round-tab">
                    <i class="glyphicon glyphicon-pencil"></i>
                    </span>
                    </a>
                 </li>
                 <li role="presentation" class="disabled">
                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                    <span class="round-tab">
                    <i class="glyphicon glyphicon-picture"></i>
                    </span>
                    </a>
                 </li>
                 <li role="presentation" class="disabled">
                    <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                    <span class="round-tab">
                    <i class="glyphicon glyphicon-ok"></i>
                    </span>
                    </a>
                 </li>
              </ul>
         </div>
         <div>
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="step1">
                  <div class="row">
                     @if(Session::has('msg'))
                     {!!  Session::get("msg") !!}
                     @endif
                     @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                     @endif
                     <div class="col-md-3">
                        <div id="custom-picker"></div>
                     </div>
                     <div class="col-md-9">
                        <!-- general form elements -->
                        <div class="box box-success">
                           <div class="box-header">
                              <?php if($booking_deatils['bookingtype']=='tour'){ $action='add_booking'; }elseif($booking_deatils['bookingtype']=='taxi'){$action='add_booking_taxi'; }?>
                              <form role="form" id="bookingform" action="javascript:void(0)" method="POST" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                 <div class="box-body">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="booking_start_date">Booking Starting Date</label>
                                          <input type="hidden" class="form-control" required value="{{$booking_deatils['bookingtype']}}" id="booking_type"  name="booking_type" placeholder="booking_type">
                                          <input type="text" class="form-control" required value="{{$booking_deatils['bookingdate']}}" id="booking_start_date" name="booking_start_date" readonly>
                                       </div>
                                       @if($booking_deatils['bookingtype']=='taxi')
                                       <!-- <div class="form-group">
                                          <label for="taxi_id">Taxi</label>
                                          <select class="form-control" required name="taxi_id" id="taxi_id">
                                            <option   value="">--Select Taxi--</option>
                                            @foreach($booking_deatils['get_all_Taxies'] as $row)
                                             <option   value="{{$row->id}}"  >{{$row->title}}&nbsp;-{{$row->taxi_no}}</option>
                                            @endforeach
                                          </select>
                                          </div> -->
                                       <!-- <div class="form-group">
                                          <label for="start_taxi_meter">Starting Taxi Meter</label>
                                          <input type="text" class="form-control" id="start_taxi_meter"  onkeypress="return restrictAlphabets(event);" name="start_taxi_meter" placeholder="Number of passengers">
                                          </div> -->
                                       @endif
                                       <div class="form-group">
                                          <label for="guest_name">Guest Name</label>
                                          <input type="text" class="form-control" required  maxlength="20" id="guest_name"  name="guest_name" placeholder="Guest Name">
                                       </div>
                                       @if($booking_deatils['bookingtype']=='tour')
                                       <div class="form-group">
                                          <label for="arrival_flight_no">Flight No Arrival</label>
                                          <select class="form-control" required name="arrival_flight_no" id="arrival_flight_no" onchange="get_arrival_time_scheduled(this);" >
                                             <option   value="">--Select Flight--</option>
                                             @foreach($booking_deatils['get_all_flights'] as $row)
                                             <option   value="{{$row->id}}"  >{{$row->flight_no}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                       <div class="form-group">
                                          <label for="departure_flight_no">Flight No Departure</label>
                                          <select class="form-control" name="departure_flight_no" required  onchange="get_departure_time_scheduled(this);"  id="departure_flight_no" >
                                             <option   value="">--Select Flight--</option>
                                             @foreach($booking_deatils['get_all_flights'] as $row)
                                             <option   value="{{$row->id}}"  >{{$row->flight_no}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                       @endif
                                       <div class="form-group">
                                          <label for="guest_email">Guest Email</label>
                                          <input type="email" class="form-control" maxlength="30" required id="guest_email"  name="guest_email" placeholder="Guest Email">
                                       </div>
                                       <div class="form-group">
                                          <label for="guest_whatsapp">Guest Whatsapp</label>
                                          <input type="text" class="form-control" maxlength="12" onkeypress="return restrictAlphabets(event);" required id="guest_whatsapp"  name="guest_whatsapp" placeholder="Guest Whatsapp">
                                       </div>
                                       @if($booking_deatils['bookingtype']=='taxi')
                                       <div class="form-group">
                                          <label for="special_request">Special Request</label>
                                          <textarea class="form-control" name="special_request"  style="resize:none;" rows="2"      id="special_request"  placeholder="special_request ..."></textarea>
                                       </div>
                                       @endif
                                    </div>
                                    <div class="col-md-6">
                                       <div class="bootstrap-timepicker">
                                          <div class="form-group bootstrap-timepicker">
                                             <label for="tour_start_time">Tour Start Time</label>
                                             <input type="text" class="form-control timepicker" required id="tour_start_time"   name="tour_start_time" placeholder="Tour Start Time">
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-6">
                                             @if($booking_deatils['bookingtype']=='tour')
                                             <div class="form-group">
                                                <label for="no_of_day">Number of Day</label>
                                                <input type="text" class="form-control" required  onkeyup="setsize(this)" onkeypress="return count_day(event);"  id="no_of_day" name="no_of_day" placeholder="No of Day">
                                             </div>
                                             @endif
                                             <div class="form-group">
                                                <label for="children_below">Children Below</label>
                                                <input type="text" class="form-control" maxlength="5" required  id="children_below" onkeypress="return restrictAlphabets(event);  " name="children_below" placeholder="Children below">
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             @if($booking_deatils['bookingtype']=='tour')
                                             <div class="form-group">
                                                <label for="no_of_night">Number of Night</label>
                                                <input type="text" class="form-control" required id="no_of_night" onkeyup="setsize(this)"  onkeypress="return count_day(event);"  onkeypress="return restrictAlphabets(event);"  name="no_of_night" placeholder="No of Night">
                                             </div>
                                             @endif
                                             <div class="form-group">
                                                <label for="passengers">No Of Passengers</label>
                                                <input type="text" class="form-control"  maxlength="20" required id="passengers"  onkeypress="return restrictAlphabets(event);" name="passengers" placeholder="Number of passengers">
                                             </div>
                                          </div>
                                       </div>
                                       @if($booking_deatils['bookingtype']=='taxi')
                                       <!-- <div class="form-group">
                                          <label for="driver_id">Driver</label>
                                          <select class="form-control" name="driver_id" required id="driver_id">
                                            <option   value="">--Select Driver--</option>
                                            @foreach($booking_deatils['get_all_drivers'] as $row)
                                             <option   value="{{$row->id}}"  >{{$row->name}}</option>
                                            @endforeach
                                          </select>
                                          </div> -->
                                       <!-- <div class="form-group">
                                          <label for="passengers">End Taxi Meter</label>
                                          <input type="text" class="form-control" id="passengers"  onkeypress="return restrictAlphabets(event);" name="passengers" placeholder="Number of passengers">
                                          </div> -->
                                       @endif
                                       @if($booking_deatils['bookingtype']=='tour')
                                       <div class="bootstrap-timepicker">
                                          <div class="form-group">
                                             <label for="arrival_flight_time">Scheduled Arrival</label>
                                             <input type="text" class="form-control timepicker" required id="arrival_flight_time"   name="arrival_flight_time" placeholder="Scheduled Arrival">
                                          </div>
                                       </div>
                                       <div class="bootstrap-timepicker">
                                          <div class="form-group">
                                             <label for="departure_flight_time">Scheduled Departure</label>
                                             <input type="text" class="form-control timepicker" required id="departure_flight_time"  name="departure_flight_time" placeholder="Scheduled Departure">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="special_request">Special Request</label>
                                          <textarea class="form-control" name="special_request" maxlength="200" style="resize:none;" rows="3"      id="special_request"  placeholder="special_request ..."></textarea>
                                       </div>
                                       @endif
                                       @if($booking_deatils['bookingtype']=='taxi')
                                       <div class="form-group">
                                          <label for="source_address">Source Address</label> Or <a href="#" data-toggle="modal" data-target="#source_map_Modal" style="cursor: pointer;">set to  map </a>
                                          <textarea class="form-control" required  style="resize:none;" rows="3" name="source_address" onFocus="geolocate()"   id="source_address"  placeholder="Source Address ..."></textarea>
                                       </div>
                                       <div class="form-group">
                                          <label for="destination_address">Destination address</label> Or <a href="#" data-toggle="modal" data-target="#destination_map_Modal" style="cursor: pointer;">set to  map </a>
                                          <textarea class="form-control" style="resize:none;" rows="3"  name="destination_address" required  onFocus="geolocate2()"  id="destination_address"  placeholder="Destination address ..."></textarea>
                                       </div>
                                       @endif
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <!-- /.box-header -->
                        </div>
                        <!-- /.box -->
                     </div>
                  </div>
                  <ul class="list-inline pull-right">
                     <li><button type="submit" class="btn btn-primary next-step pull-right fCalendar-wrapper">Booking Now</button></li>
                  </ul>
                </div>
               
                <div class="tab-pane " role="tabpanel" id="step2">
                  <div class="box box-success">
                    <div class="box-header">
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="box box-solid">
                        @if(count($booking_deatils['get_all_activities_types']))
                              <?php $a ='1'; ?>
                             @foreach($booking_deatils['get_all_activities_types'] as $value)
                            
                              <div class="box-header with-border">
                                 <h4 class="box-title">{{ucfirst($value->title)}}</h4>
                              </div>
                              <div class="box-body">
                                 <div id="external-events<?php if($a=='1') {}else{ echo $a; } ?>" class="external-events">
                                 @if(count($booking_deatils['get_all_activities']))
                                   @foreach($booking_deatils['get_all_activities'] as $row)
                                       @if($row->activity_type==$value->id)
                                       <div class="external-event bg-{{$a}}" data-time="{{$row->time_duration?$row->time_duration:''}}" >{{$row->activity_name}}</div>
                                       @endif
                                       
                                    @endforeach
                                   @endif
                                 </div>
                              </div>
                              <?php $a++; ?>   
                             @endforeach
                            @endif
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="box box-solid">
                          <div class="box-body ">
                            <div class="text-right">
                            <a href="JavaScript:Void(0);" class="btn btn-primary">Make Offer</a>
                            <a href="JavaScript:Void(0);" class="btn btn-primary">Edit Tour</a>
                            <a href="" class="btn btn-success" data-toggle="modal" data-target="#confirmTour">Confirm Tour</a>
                          </div>
                            <div id="fCalendar"></div>
                           
                            <div id="popoverContent" class="hide">
                              <form id="save_event">
                               <div class="row">
                                  <div class="col-sm-12">
                                    <h4 class="sep-div">Option</h4>
                                    <p><span class="lbl-name">Lunch:</span>
                                      <label for="lunchY"><input type="radio" name="lunchYN" id="lunchY" checked>Yes</label>
                                      <label for="lunchN"><input type="radio" name="lunchYN" id="lunchN">No</label>
                                    </p>
                                    <p><span class="lbl-name">Snorkelling:</span>
                                      <label for="lunchsklY"><input type="radio" name="lunchskl" id="lunchsklY" checked>Yes</label>
                                      <label for="lunchsklN"><input type="radio" name="lunchskl" id="lunchsklN">No</label>
                                    </p>
                                    <p>
                                      <span class="lbl-name">Special meal:</span>
                                      <label for="spMeal1"><input type="radio" name="spMeal" id="spMeal1">No N__3</label>
                                      <label for="spMeal2"><input type="radio" name="spMeal" id="spMeal2">Vege. N</label>
                                      <label for="spMeal3"><input type="radio" name="spMeal" id="spMeal3" checked>Chick. N</label>
                                    </p>
                                    <h4 class="sep-div">Transport</h4>
                                    <p>
                                      <span class="lbl-name">Self-drive:</span>
                                      <label for="selfDrvN"><input type="radio" name="selfDrvYN" id="selfDrvN">No</label>
                                      <label for="selfDrvY"><input type="radio" name="selfDrvYN" id="selfDrvY" checked>Yes</label>
                                    </p>
                                    <h4 class="sep-div">Activities</h4>
                                    <p>
                                      <span class="lbl-name">Diving:</span>
                                      <label><input type="radio" name="actDivingYN" checked="">No</label>
                                      <label class="d-yes"><input type="radio" name="actDivingYN" id="dyes" >Yes</label>
                                    </p>
                                    <p>
                                      <span class="lbl-name">Fishing:</span>
                                      <label for="actFishN">
                                        <input type="radio" name="actFishYN" id="actFishN" checked="">No
                                      </label> 
                                      <label for="actFishY">
                                        <input type="radio" name="actFishYN" id="actFishY">Yes
                                      </label>
                                    </p>
                                    <p class="float-right"><button onClick="saveEvent(this);" type="button" class="btn save-btn btn-success" >save</button></p>
                                  </div>
                                </div>
                              </form>
                              
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                         <!-- /.row -->
                    <ul class="list-inline pull-right">
                       <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                       <li><button type="button" class="btn btn-primary">Submit</button></li>
                    </ul>
                  </div>
                </div>
              
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<div class="modal fade" id="confirm-diving" role="dialog">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Diving</h4>
        </div>
        <form id="diving_form">
          <div class="modal-body">
         
            <div id="checkpopup">
              <p><span class="lbl-name">Experienced:</span>
                <label for="expY"><input type="radio" name="expY" id="expY" checked="">Yes</label>
                <label for="expN"><input type="radio" name="expY" id="expN">No</label>
              </p>
              <p><span class="lbl-name">No. of Dives:</span>
                <label for="diveY"><input type="radio" name="diveY" id="diveY" checked="">One</label>
                <label for="diveN"><input type="radio" name="diveY" id="diveN">Two</label>
              </p>
              <p>
                <span class="lbl-name">No of divers:</span>
                <label for="diverY"><input type="radio" name="diverY" id="diverY" checked="">1</label>
              </p>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" onClick="savediving(this);" class="btn btn-success">Save changes</button>
          </div>
        </form>
      </div>
   </div>
</div>

<div class="modal fade" id="confirmTour" role="dialog">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" style="color:#000 !important">&times;</button>
            <h4 class="modal-title">Send Offer to customer</h4>
         </div>
         <div class="modal-body">
          <p class="text-left"> The offer will be sent to the customer via </p>
          <label class="mb-10"><input type="checkbox"> Email (LeonTan123@example.com </label>
          <label><input type="checkbox"> WhatsApp (+60 123 456 789) </label>
         
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success" id="save">Save changes</button>
      </div>
      </div>
   </div>
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="goback" role="dialog">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Action</h4>
         </div>
         <div class="modal-body">
            <p class="text-center">If You want to change date <a href="dashboard">go back</a> to date selection page</p>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="source_map_Modal" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content"  style="position: static;" >
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Select source Address</h4>
         </div>
         <form action="{{url('booking')}}"  method="post" >
            {{ csrf_field() }}
            <div class="modal-body" style="padding:0px; " >
               <div id="myMap" style="height:435px;  width:100%;position: static; "></div>
               <input id="map_address" type="text" style="width:600px;"/><br/>
               <input type="text" id="latitude" placeholder="Latitude"/>
               <input type="text" id="longitude" placeholder="Longitude"/>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!--  destination Address Modal -->
<div class="modal fade" id="destination_map_Modal" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content" style="position: static;">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Select  destination Address</h4>
         </div>
         <form action="{{url('booking')}}"  method="post" >
            {{ csrf_field() }}
            <div class="modal-body" style="padding:0px; " >
               <div id="myMap2" style="height:435px;  width:100%;     position: static; "></div>
               <input id="map_address2" type="text" style="width:600px; "/><br/>
               <input type="text" id="latitude2" placeholder="Latitude"/>
               <input type="text" id="longitude2" placeholder="Longitude"/>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
            </div>
         </form>
      </div>
   </div>
</div>

@endsection
@section('customjs')
<script type="text/javascript">
  var daysval = ""
   $(document).ready(function () {
     // $('#closepopover').click(function(){
      //   $('.popover').hide()
      // }

          // var n2 = $("#newdate").val();
          // console.log(n2)
          daysval = $("#booking_start_date").val();
          var startDate= new Date(daysval.split('/')[2]+ '-' + daysval.split('/')[1] + '-' + daysval.split('/')[0]);
          $("#custom-picker").daterangepicker({
                datepickerOptions : {
                numberOfMonths : 2,
                inline: true,
                altFormat: 'dd/mm/yy',
                //altField: '#newdate',
                minDate:new Date(startDate),
                maxDate:null
                
            }, });
            
          $("#no_of_day").blur(function(){
              var txtval = $(this).val()-parseInt(1);
              daysval = $("#booking_start_date").val(),
              startDate= new Date(daysval.split('/')[2]+ '-' + daysval.split('/')[1] + '-' + daysval.split('/')[0]),
              endDate= new Date(startDate.setDate(startDate.getDate() +  parseInt(txtval)));
              console.log(daysval, startDate, endDate);
              $("#custom-picker").daterangepicker('setRange', {start:new Date(daysval.split('/')[2]+ '-' + daysval.split('/')[1] + '-' + daysval.split('/')[0]), end:endDate});
            
           
               
          });
          $(".ui-state-default").click(function(){
             $('#goback').modal('show')
          });
          $("body").removeClass("wysihtml5-supported skin-blue");
          $("body").addClass("wysihtml5-supported skin-blue sidebar-collapse");
         //wysihtml5-supported skin-blue sidebar-collapse
   
     
            $(".next-step").click(function (e) {
                $(".comiseo-daterangepicker").addClass("custom-none");
                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);
                
   
            });
            $(".prev-step").click(function (e) {
   
                 $(".comiseo-daterangepicker").removeClass("custom-none");
                 var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);
   
            });
        });
   
        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
            $(".comiseo-daterangepicker").css("display","none !important");
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }
            
   
        
        var map; var map2; 
        var marker; var marker2;
        var myLatlng = new google.maps.LatLng(20.268455824834792,85.84099235520011);
        var geocoder = new google.maps.Geocoder(); 
        var infowindow = new google.maps.InfoWindow();    
   
        var placeSearch, autocomplete;
   
   
        function initialize(){
   
            //  use  For Auto Complete Addresss 
            autocomplete = new google.maps.places.Autocomplete(document.getElementById('source_address'), {types: ['geocode']});
     
            autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('destination_address'), {types: ['geocode']});
              
            
            //  Select Address To  the  Marker  ## START ##
            var mapOptions = {
              zoom: 18,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
     
            map = new google.maps.Map(document.getElementById("myMap"), mapOptions);
            map2 = new google.maps.Map(document.getElementById("myMap2"), mapOptions);
     
            marker = new google.maps.Marker({
              map: map,
              position: myLatlng,
              draggable: true
            });
     
            marker2 = new google.maps.Marker({
              map: map2,
              position: myLatlng,
              draggable: true
            });
     
            geocoder.geocode({'latLng': myLatlng }, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                  if (results[0]) {
                     $('#latitude,#longitude').show();
                      $('#map_address').val(results[0].formatted_address);
                      // $('#source_address').html(results[0].formatted_address);  //  default address fill 
                      $('#latitude').val(marker.getPosition().lat());
                      $('#longitude').val(marker.getPosition().lng());
     
                      $('#latitude2,#longitude2').show();
                      $('#map_address2').val(results[0].formatted_address);
                      // $('#destination_address').html(results[0].formatted_address);   //  default address fill  
                      $('#latitude2').val(marker.getPosition().lat());
                      $('#longitude2').val(marker.getPosition().lng());
                      infowindow.setContent(results[0].formatted_address);
                      infowindow.open(map, marker);
                  }
              }
            });
     
             //  For Fisrt map Marker 
            google.maps.event.addListener(marker, 'dragend', function() {
              geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {
              $('#map_address').val(results[0].formatted_address); 
           
              $('#source_address').val(results[0].formatted_address); 
              $('#latitude').val(marker.getPosition().lat());
              $('#longitude').val(marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
              }
              }
              });
            });
            //  For Second  map Marker 
            google.maps.event.addListener(marker2, 'dragend', function() {
                  geocoder.geocode({'latLng': marker2.getPosition()}, function(results, status) {
                  if (status == google.maps.GeocoderStatus.OK) {
                  if (results[0]) {
                  $('#map_address2').val(results[0].formatted_address);
                
                  $('#destination_address').val(results[0].formatted_address); 
                  $('#latitude2').val(marker2.getPosition().lat());
                  $('#longitude2').val(marker2.getPosition().lng());
                  infowindow.setContent(results[0].formatted_address);
                  infowindow.open(map2, marker2);
                  }
                  }
                  });
               });
     
          //  Select Address To  the  Marker  ## END ##
        }
   
   
        google.maps.event.addDomListener(window, 'load', initialize);
   
      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle(
                {center: geolocation, radius: position.coords.accuracy});
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
      function geolocate2() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle(
                {center: geolocation, radius: position.coords.accuracy});
            autocomplete2.setBounds(circle.getBounds());
          });
        }
      }
       //  End oF the Google  map  Selction 
   
      //get Arrival Time  Scheduled   OF Flight 
      function  get_arrival_time_scheduled(flight)
      {
           $.ajax({
                  type: "POST",
                  url: "{{url('get_arrival_time_scheduled')}}",
                  data: {'flight_id':flight.value,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      // console.log(result);
                      if(result){
                        $('#arrival_flight_time').val(result);    
                      }
                      else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  }
              });
   
      }
      function  get_departure_time_scheduled(flight)
      {
           $.ajax({
                  type: "POST",
                  url: "{{url('get_arrival_time_scheduled')}}",
                  data: {'flight_id':flight.value,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      // console.log(result);
                      if(result){
                        $('#departure_flight_time').val(result);    
                      }
                      else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  }
              });
   
      }
   
   
     /*code: 48-57 Numbers
        8  - Backspace,
        35 - home key, 36 - End key
        37-40: Arrow keys, 46 - Delete key*/
        function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8 ||
            (x>=35 && x<=40)|| x==46)
            return true;
          else
            return false;
      }
   
    //   Count total day  OF Tour  At End  of them 
    
    function  count_day(e)
    {  
          var x=e.which||e.keycode; 
          if((x >=48 && x<=57) || x==8 || (x>=35 && x<=40)|| x==46)
          {
           
            
            return true;
            
          }
          else
          {
            return false;
          }
   
    }
    $(function () {
      $(".timepicker").timepicker({
          showInputs: false
      })
    });
     $('#bookingform').submit(function(e){
          e.preventDefault(); 
         
          //{{url($action)}}
          var formdata = $(this).serialize();
          $.ajax({
                  type: "POST",
                  url: "{{url($action)}}",
                  // data: {'row_id':rowId,"_token":"{{ csrf_token() }}"},
                  data: formdata, // here $(this) refers to the ajax object not form
                  success: function(result){
                      console.log(result);
                      if(result=='200'){
                        console.log('Submit');
                        $('.alertmessage').html('<span class="text-success">Submit ...</span>');
                      }
                      else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  }
              });
    });
</script>

<script>
var currentEvent;
$(function () {
/* initialize the external events
-----------------------------------------------------------------*/
function init_events(ele) {
 ele.each(function () {
   // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
   // it doesn't need to have a start or end
   var eventObject = {
     title: $.trim($(this).text()) // use the element's text as the event title
   }
   // store the Event Object in the DOM element so we can get to it later
   $(this).data('eventObject', eventObject)
   // make the event draggable using jQuery UI
   $(this).draggable({
     zIndex        : 1070,
     revert        : true, // will cause the event to go back to its
     revertDuration: 0  //  original position after the drag
   })
 })
}
init_events($('.external-events div.external-event'))
/* initialize the calendar
-----------------------------------------------------------------*/
//Date for the calendar events (dummy data)
var popTemplate = [
    '<div class="popover" style="max-width:600px;width:380px">',
    '<div class="arrow"></div>',
    '<div class="popover-header">',
    '<button id="closepopover" type="button" class="close" aria-hidden="true" >&times;</button>',
    '<h3 class="popover-title"></h3>',
    '</div>',
    '<div class="popover-content"></div>',
    '</div>'].join('');

    var sttDtt = $('#booking_start_date').val();
    
    console.log(sttDtt)
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    
    $('#fCalendar').fullCalendar({
        viewRender: renderViewColumns,
        defaultView: 'agendaWeek',
        defaultDate: new Date(),
        //defaultDate: '31-01-2020',
        selectable: true,
       
        columnFormat: {
          month: 'ddd', // Mon
          //week: 'ddd MMM d',
          week: 'MMM d', // Mon 7
          day: 'dddd M/d',  // Monday 9/7
          agendaDay: 'dddd d'
        },
        allDayText: 'Time',
        editable  : true,
        droppable : true, 
      // this allows things to be dropped onto the calendar !!!
      drop  : function (date, allDay) { 
        var $this = $(this);
        // this function is called when something is dropped
        // retrieve the dropped element's stored Event Object
        var originalEventObject = $this.data('eventObject');
       // we need to copy it, so that multiple events don't have a reference to the same object
       var copiedEventObject = $.extend({}, originalEventObject);
        // assign it the date that was reported
        copiedEventObject.start           = date;
        copiedEventObject.allDay          = false;
        copiedEventObject.backgroundColor = $this.css('background-color');
        copiedEventObject.borderColor     = $this.css('border-color');
      // render the event on the calendar
      // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
      $('#fCalendar').fullCalendar('renderEvent',copiedEventObject,true);
      },
      select: function (event, jsEvent, view) {
          closePopovers();
          popoverElement = $(jsEvent.target);
          $(jsEvent.target).popover({
              title: 'the title',
              content: function () {
                  return $("#popoverContent").html();
              },
              template: popTemplate,
              placement: 'top',
              html: 'true',
              trigger: 'click',
              animation: 'true',
              container: 'body'
          }).popover('show');
      },
      
      eventClick:  function(event, jsEvent, view) {
        currentEvent=event;
        //console.log(currentEvent)
        popoverElement = $(jsEvent.currentTarget);
        $('.popover-title').html(event.title);
        $('.popover-content').html(event.description);
          //$('#modalTitle').html(event.title);
          // $('#modalBody').html(event.description);
          // $('#eventUrl').attr('href',event.url);
          // $('#fullCalModal').modal();
          // $('#fCalendar').fullCalendar('updateEvent', event);
            
          // $('#fCalendar').fullCalendar('updateEvent', currentEvent);

           

          $(".close").click(function(){
               $(this).closest(".popover").hide();
              })  
          $('.d-yes input[type="radio"]').click(function () {
              if ($(this).is(':checked')) {
                  $('#confirm-diving').modal('show');
              } else {
                   $('#confirm-diving').modal('hide');
              }
          });
          
      },
      eventRender: function (event, element) {
            element.popover({
                // title: '$(".popover-title").html(event.title)',
                title: 'title',
                content: function () {
                    return $("#popoverContent").html();
                },
                template: popTemplate,
                placement: 'top',
                html: 'true',
                trigger: 'click',
                animation: 'true',
                container: 'body'
            });
      },
    }) 

     
    
    var popoverElement;

    function renderViewColumns(view, element) {
      element.find('th.fc-day-header.fc-widget-header').each(function() {
        var theDate = moment($(this).data('date')); /* th.data-date="YYYY-MM-DD" */
        $(this).html(buildDateColumnHeader(theDate));
    });

    function buildDateColumnHeader(theDate) {
      var container = document.createElement('div');
      var DDD = document.createElement('div');
      var ddMMM = document.createElement('div');
      // DDD.textContent = theDate.format('ddd').toUpperCase();
      ddMMM.textContent = theDate.format('DD MMM');
      // container.appendChild(DDD);
      container.appendChild(ddMMM);
      return container;
    }
  }
  function closePopovers() {
      $('.popover').not(this).popover('hide');
  }
  $('body').on('click', function (e) {
      // close the popover if: click outside of the popover || click on the close button of the popover
      if (popoverElement && ((!popoverElement.is(e.target) && popoverElement.has(e.target).length === 0 && $('.popover').has(e.target).length === 0) || (popoverElement.has(e.target) && e.target.id === 'closepopover'))) {

          // $('.popover').popover('hide'); 
          closePopovers();
      }
  }); 

  $("#save").click(function () {
    var eventsFromCalendar = $('#fCalendar').fullCalendar('clientEvents');
    // alert(eventsFromCalendar);
    console.log(eventsFromCalendar);
  }); 
   
/* ADDING EVENTS */
var currColor = '#3c8dbc' //Red by default
//Color chooser button
var colorChooser = $('#color-chooser-btn')
$('#color-chooser > li > a').click(function (e) {
 e.preventDefault()
 //Save color
 currColor = $(this).css('color')
 //Add color effect to button
 $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
})
$('#add-new-event').click(function (e) {
   e.preventDefault()
   //Get value and make sure it is not null
   var val = $('#new-event').val()
   if (val.length == 0) {
     return
   }
   //Create events
   var event = $('<div />')
   event.css({
     'background-color': currColor,
     'border-color'    : currColor,
     'color'           : '#fff'
   }).addClass('external-event')
   event.html(val)
   $('.external-events').prepend(event)
   //Add draggable funtionality
   init_events(event)
   //Remove event from text input
   $('#new-event').val('')
})
})
$(document).on('click','.fCalendar-wrapper',function(){
  if($('#step2').hasClass('active')){
    console.log('rendered');
    $('#fCalendar').fullCalendar('render');
    // alert()
  }
})

    function saveEvent(popoverclick){
         // alert('call');
         $(popoverclick).closest(".popover").hide();
         //console.log($(popoverclick));

         var fromdata=$("#save_event").serializeArray();

         $( fromdata ).each(function( index,elemnt ) {
           key=elemnt['name'];
           console.log(key);
           currentEvent[key]=elemnt['value'];
        });
        $('#fCalendar').fullCalendar('updateEvent', currentEvent);
   }
   function savediving(divingclick){
         $(divingclick).closest(".modal").hide();
         var fromdata=$("#diving_form").serializeArray();

         $( fromdata ).each(function( index,elemnt ) {
           key=elemnt['name'];
           console.log(key);
           currentEvent[key]=elemnt['value'];
        });
         
        
         $('#fCalendar').fullCalendar('updateEvent', currentEvent);
   }
    
</script>
<script src="{{ URL::asset('public/admin/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>

@endsection

