    @extends('genral.layouts.mainlayout')
    @section('title') <title>dashboard </title> 
 
    <style type="text/css">
  
    [class^="icon-"], [class*=" icon-"] {
        background-image: url("admin/bootstrap/glyphicons/glyphicons-halflings.png");
    }
    .fc-basic-view td.fc-day-number, .fc-basic-view td.fc-week-number span {
          padding-top: 2px;
          padding-bottom: 2px;
          font-size: 12px;
          cursor:pointer;
      }
      div.fc.fc-unthemed  {
          font-size: 60%;
          border: 1px solid #eee;
      }
      div.fc.fc-unthemed h2{
          font-size: 18px
      }
      div.fc.fc-unthemed  th {
        font-size: 12px !important;
    }  
    .nav-tabs-custom>.nav-tabs>li.active>a{
      background-color: #3c8dbc !important;
      color:#fff !important;
      font-weight: 800 !important;
    }

    .warning-box{
      -webkit-animation: warns 0.6s linear 0s infinite alternate;
      animation: warns 0.6s linear 0s infinite alternate;
    }
    @-webkit-keyframes warns{
      to{
        background-color: #dd4b39;
      }
      from{
        background-color: #ffc0b8;
      }
    }
    @keyframes warns{
      to{
        background-color: #dd4b39;
      }
      from{
        background-color: #ffc0b8;
      }
    }

    </style>
    @endsection
    @section('content')
    <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Dashboard
                <small>Control panel</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
              </ol>
            </section>

            <!-- Main content -->
            <section class="content" style="min-height: 0px; ">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>@if($all_taxis > 99) {{$all_taxis}} <sup style="font-size: 20px">+</sup>@else {{$all_taxis}} @endif </h3>
                      <p>Total Taxi Booking</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{url('taxi_bookings')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>@if($all_tours > 99) {{$all_tours}} <sup style="font-size: 20px">+</sup>@else {{$all_tours}} @endif </h3>
                      <p>Total Tour Booking</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{url('tour_bookings')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>{{$all_request}}</h3>
                      <p>Booking Request </p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{url('all_request')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                   <!-- small box -->
                   <div class="small-box bg-red <?=$assignTaxi == null ? 'warning-box' : ''?> ">
                    <div class="inner">
                      <h3> Go To</h3>
                      <p class="text">{{ $taxiAssignMsg }}</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-car"></i>
                    </div>
                    <!-- @if($assignTaxi != null )
                    <a href="{{url('edit_assign_taxi/'.$assignTaxi->id)}}" class="small-box-footer">Click here<i class="fa fa-arrow-circle-right"></i></a>
                    @else
                    <a href="assign_taxi" class="small-box-footer">Click here <i class="fa fa-arrow-circle-right"></i></a>
                    @endif -->
                    <a href="assign_taxi" class="small-box-footer">Click here <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
              </div><!-- /.row -->

            </section><!-- /.content -->


            <!-- Main content -->
            <section class="content">
            <div class="row">
              <div class="col-md-12 alert_message">
              <!-- {$booking_tour_details}}
              {{$booking_taxi_details}}
              {{$booking_count}} -->
             
                
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
                  
                </div>
              </div>
              <div class="row">
            
                <div class="col-md-12">
               

                  <div class="box box-primary">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-2">
                          
                        </div>
                        <div class="col-md-4">
                          <h4 class="mb-25 text-center"> Booking Calender </h4>
                          <div class="booking"><div id="datepicker"></div></div>
                        </div>
                        <div class="col-md-4">
                          <h4 class="mb-25 text-center"> Notification Calender </h4>
                          <div class="notification">
                            <div id="notification-calendar"></div>
                      
                            
                          </div>
                            
                        </div>

                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <div id='datetimepicker3'>
                              
                            </div>
                        </div>

                          </div>
                      
                    </div><!-- /.box-body -->
                  </div><!-- /. box -->
                </div><!-- /.col -->
              </div><!-- /.row -->
            </section><!-- /.content -->


          </div><!-- /.content-wrapper -->


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Select Booking Type</h4>
            </div>
            <form action="{{url('booking')}}"  method="get">
            {{ csrf_field() }}
              <div class="modal-body">
                <input type="hidden"  name="event_date"  id="event_date" />
                <center>
                <button type="submit" class="btn btn-success" name="booking_type" value="taxi">Taxi Booking </button>
                <button type="submit" class="btn btn-primary" name="booking_type" value="tour">Tour Booking </button>
                </center>
              </div>
            
            </form>
          </div>
        </div>
    </div>
    <div class="modal fade" id="notificationModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
           <!-- <div class="modal-header">
            </div> -->
            <div class="notifications-style-div">
              <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs "><!-- pull-right-->
                      
                      <li class="active taxitab"><a href="#taxi-tab" data-toggle="tab">Taxi</a></li>
                      <li class="tourtab"><a href="#tour-tab" data-toggle="tab">Tour</a></li>
                      
                      <li class="pull-left header"> Notification Listing</li>
                      <li class=" alert_notification_modal">  </li>
                      <li class="pull-right "><button type="button" class="close" data-dismiss="modal">&times;</button></li>
                    </ul>
                    <div class="tab-content">
                      <!-- Morris chart - Sales -->
                      
                    </div>
              </div><!-- /.nav-tabs-custom  &times;-->


            </div>
          
          </div>
        </div>
      </div>
      <!-- <div class="modal fade" id="actionModal" role="dialog">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Booking Details &nbsp; <span class="alert_actionModal"></span></h4> 
            </div>
            <div class="modal-body">
                
             
            </div>
            
          </div>
        </div>
      </div> -->



      <div class="modal fade" id="resources_Modal" role="dialog">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"> Assign  [ Driver / Taxi ] &nbsp;&nbsp;&nbsp; <span class="alert_resources_Modal"></span></h4>
            </div>
            <div class="modal-body">
                
             
            </div>
            
          </div>
        </div>
      </div>


      @endsection

    @section('customjs')

   
    <script src="{{ URL::asset('admin/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>    

    <script type="text/javascript">

        var  _tour_bookings='<?php echo $booking_tour_details?$booking_tour_details:''; ?>';
        var bookings_tour_object = JSON.parse(_tour_bookings);
        var  _taxi_bookings='<?php echo $booking_taxi_details?$booking_taxi_details:''; ?>';
        var bookings_taxi_object = JSON.parse(_taxi_bookings);
        var  cv='<?php echo $booking_count; ?>';
        
        $(document).ready(function(){

            
          // console.log(' Tour  template id '+($.session.get("tour_template_id")!="")?$.session.get("tour_template_id"):' HY');

            $('#datepicker').fullCalendar({
                // height: 320,
                width: '100%',
                header: {
                    left: 'prev,next today',
                    right: 'title',
                    center: ''
                },
                defaultDate:  new Date(),
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                dayClick: function (date, jsEvent, view) {
                    $('#myModal').modal('show');
                    $('#event_date').val(moment(date).format('DD/MM/YYYY'))
                },
                eventClick: function (event) {
                    alert('event');
                },
                // eventConstraint: {
                //     start: moment().format('YYYY-MM-DD'),
                //     end: '2100-01-01' // hard coded goodness unfortunately
                // }
                
            })

            var data = JSON.parse(cv);

            $('#notification-calendar').fullCalendar({
                // height: 320,
                width: '100%',
                header: {
                    left: 'prev,next today',
                    right: 'title',
                    center: ''
                },
                defaultDate:  new Date(),
                editable: false,
                dragable:false,
                eventLimit: true, // allow "more" link when too many events
                events: data,
                dayClick: function (date, jsEvent, view) {
                    notificationCalendarClick(date)
                },
                eventRender: function(event, element, view) {
                    let allDate = moment(event.start).format('YYYY-MM-DD'),
                        nextDate = moment(new Date(new Date().setDate(new Date().getDate() + 1))).format('YYYY-MM-DD'),
                        nextDateBackgroundStatus = allDate == nextDate && event.title != "";
                        if(nextDateBackgroundStatus){
                            $('#notification-calendar .fc-day[data-date="' + allDate + '"]').css('background', '#13acd7');
                        }
                    return  nextDateBackgroundStatus ? $('<sup class="badge badge-dark">' + event.title + '</sup>')  :  $('<sup class="badge badge-dark">' + event.title + '</sup>');
                },
                eventClick: function (event) {
                    // alert('event');
                }
            })

            
    }); 


    function notificationCalendarClick(date){
                 
                 var date= moment(date).format('YYYY-MM-DD'); 
                 get_booking_events_details(date); 
                  //  Change  date  Forat  to display om model 
                  const months = ["JAN", "FEB", "MAR","APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
                  let current_datetime = new Date(date)
                  let formatted_date = current_datetime.getDate() + "-" +months[current_datetime.getMonth()] + "-" + current_datetime.getFullYear();
                  $('.notifications-style-div .header').html(formatted_date); 
    }




    function  get_booking_events_details(date)
    {
          // console.log(booking_id+'---'+booking_type)
          if(date)
          {
            $.ajax({
                  type: "POST",
                  url: "{{url('get_booking_events_details')}}",
                  data: {'start_date':date,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                    //  console.log(result);
                      if(result){

                        // booking_type = booking_type.charAt(0).toUpperCase()+booking_type.slice(1);
                        $('#notificationModal .tab-content').html(result);  
                        $('#notificationModal').modal('show');  
                        $('.taxitab').addClass('active'); 
                        $('.tourtab').removeClass('active'); 

                      }
                      else{ displayMessage("Somthing event wrong!...",'alert_notification_modal','danger'); }
                  }
              });
          }
          else
          {
            displayMessage("Somthing event wrong!...",'alert_notification_modal','danger');
          }
    }

    function get_taxi_and_driver(start_date_time,end_date_time,booking_id,row_id)
    {
      //  console.log(start_date_time+'----'+end_date_time+'---'+booking_id+'-----'+row_id)
       if(start_date_time  && end_date_time)
          {
            //displayMessage("Success...",'alert_actionModal','success');
            $.ajax({
                  type: "POST",
                  url: "{{url('get_taxi_and_driver')}}",
                  data: {'start_date_time':start_date_time,'end_date_time':end_date_time,'booking_id':booking_id,'row_id':row_id,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      //  console.log(result); 
                      if(result){
                        $('#resources_Modal .modal-body').html(result);  
                        $("#resources_Modal").modal();  
                      }
                      else{ displayMessage("Somthing event wrong!...",'alert_actionModal','danger'); }
                  }
              });
          }
          else
          {
            displayMessage("Somthing event wrong!...",'alert_actionModal','danger');
          }

    }
     

    // assign  the  Taxi And  Driver 
    function assign_taxi_driver(event)
    {
      let  driving_type=$( 'input[name=type_of_driving]:checked' ).val(); 
      //console.log(driving_type)
      
      let row_id=$('#row_id').val(); 
      let booking_type=$('#booking_type').val(); 
      let taxi=$('#taxi').val(); 

      let driver=$('#driver').val(); 

      let tour_start=$('#tour_start').val(); 
      let tour_end_date =$('#tour_end_date').val(); 
      let tour_end_time=$('#tour_end_time').val(); 
      
      let drop_driver=$('#drop_driver').val(); 
      let pickup_driver=$('#pickup_driver').val(); 
      let drop_time=$('#drop_time').val(); 
      let pickup_time=$('#pickup_time').val(); 

      let resources=$('#resources').val(); 

     var new_end_time= moment(tour_end_time, ["h:mm A"]).format("HH:mm:ss");
     if(tour_end_date && tour_end_time){ var  tour_end=tour_end_date+' '+new_end_time }
      //  console.log(tour_start)
      //  console.log(tour_end_date)
      //  console.log(tour_end_time)
      //  console.log(new_end_time)
      //  console.log(tour_end); 
      //console.log('-row_id-'+row_id+'-booking_type-'+booking_type+'-taxi-'+taxi+'-driver-'+driver+'-tour_start_time-'+tour_start_time+'-drop_driver-'+drop_driver+'-pickup_driver-'+pickup_driver+'-drop_time-'+drop_time+'-pickup_time-'+pickup_time); 
      if(booking_type=='tour')
      {
        
          if(driving_type=='self_driving' && taxi && resources && drop_driver && pickup_driver && drop_time && pickup_time )
          {
               alert("Tour :  self driving : success");  
          }
          else if(driving_type=='cab'  && taxi && resources && driver &&  ( tour_start!=tour_end ) )
          {
               //alert("success"); 
               $(event).html(' Wait....');
               console.log('success')
               // Driver  & Taxi  Assign :  Case ::   ---  'CAB' A single driver / Taxi  Assign 
               $.ajax({
                  type: "POST",
                  url: "{{url('taxi_driver_assign_for_tour')}}",
                  data: {'row_id':row_id,'booking_type':booking_type,'taxi':taxi,'driver':driver,'end_date':tour_end,'end_time':new_end_time,'resources':resources,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                        console.log(result);
                        $(event).html(' Submit');
                        $("#resources_Modal").modal('hide'); 
                        $('#events_row_'+row_id+' .taxi_staus').html('<select name="booking_status" id="booking_status" onchange="update_booking_status(this,`'+row_id+'`)">\
                                    <option value="booking">Booking</option>\
                                    <option selected value="drive_time">Drive Time</option>\
                                    <option value="delayed">Delayed</option>\
                                    <option value="completed">Complete</option>\
                                </select>'); 
                        displayMessage("Taxi  And  Driver Assigned....",'alert_notification_modal','success');
                      // $('#modal').hide();
                      // if(result){
                      //   $('#resources_Modal .modal-body').html(result);  
                      //   $("#resources_Modal").modal();  
                      // }
                      // else{ displayMessage("Somthing event wrong!...",'alert_resources_Modal','danger'); }
                  }
              });
          }
          else if(tour_start==tour_end)
          {
            
            $("#tour_end_time").css("border", "1px solid red");
            displayMessage("start time and end time can not be same.",'alert_resources_Modal','danger');
          }
          else
          {
            borderred_highlight();
            displayMessage("All  * fields Are  required...",'alert_resources_Modal','danger');
          }

      }
      else if(booking_type=='taxi')
      {
          if(driving_type=='self_driving' && taxi && resources && drop_driver && pickup_driver && drop_time && pickup_time )
          {
            alert("taxi :  self driving : success");   
          }
          else if(driving_type=='cab'  && taxi && resources && driver &&  ( tour_start!=tour_end )  )
          {
              //alert("taxi :  cab : success"); 
              //alert("success"); 
              $(event).html(' Wait....');
               console.log('taxi :  cab : success')
               // Driver  & Taxi  Assign :  Case ::   ---  'CAB' A single driver / Taxi  Assign 
               $.ajax({
                  type: "POST",
                  url: "{{url('taxi_driver_assign_for_taxi')}}",
                  data: {'row_id':row_id,'booking_type':booking_type,'taxi':taxi,'driver':driver,'end_date':tour_end,'end_time':new_end_time,'resources':resources,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                        console.log(result);
                        $(event).html(' Submit');
                        var a=new_end_time.substring(0, 5); 
                        
                        console.log(moment(a, 'HH:mm').format('h:m A'));
                        $("#resources_Modal").modal('hide'); 
                        $('#events_row_'+row_id+' .new_end_time').html('<span class="label label-danger">'+moment(a, 'HH:mm').format('h:m A')+'</span>'); 
                        $('#events_row_'+row_id+' .taxi_staus').html('<select name="booking_status" id="booking_status" onchange="update_booking_status(this,`'+row_id+'`)">\
                                    <option value="booking">Booking</option>\
                                    <option selected value="drive_time">Drive Time</option>\
                                    <option value="delayed">Delayed</option>\
                                    <option value="completed">Complete</option>\
                                </select>'); 
                        displayMessage("Taxi  And  Driver Assigned....",'alert_notification_modal','success');
                      
                  }
              }); 
          }
          else if(tour_start==tour_end)
          {
            
            $("#tour_end_time").css("border", "1px solid red");
            displayMessage("start time and end time can not be same.",'alert_resources_Modal','danger');
          }
          else
          {
            borderred_highlight();
            displayMessage("All  * fields Are  required...",'alert_resources_Modal','danger');
          }
      }
        
      
    }

    function tConvert (time) {
        // Check correct time format and split into components
        time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

        // if (time.length > 1) { // If time format correct
        //   time = time.slice (1);  // Remove full string match value
        //   time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
        //   time[0] = +time[0] % 12 || 12; // Adjust hours
        // }
        //return time.join (''); // return adjusted time or original string
        return time; 
      }


    function  borderred_highlight()
    {
      $("input").each(function() {
                    if ($(this).val() == "") {
                      $(this).css("border", "1px solid red");
                    }
                    if ($(this).val() !== "") {
                      $(this).css("border", "1px solid green");
                    }
                  });
                  $("select").each(function() {
                    if ($(this).val() == "") {
                      $(this).css("border", "1px solid red");
                    }
                    if ($(this).val() !== "") {
                      $(this).css("border", "1px solid green");
                    }
                  });
    }

    function update_booking_status(event,row_id)
    {
      if(event.value && row_id)
      {
        $.ajax({
                  type: "POST",
                  url: "{{url('update_booking_status')}}",
                  data: {'row_id':row_id,'status':event.value,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      console.log(result);
                      displayMessage("Status Updated....",'alert_notification_modal','success');
                }
              });
      }
      else
      {
        
        displayMessage("somthing went Wrong !!!!!",'alert_notification_modal','danger');
      }

    }
    
    function displayMessage(message,class_name,type) {
	           $("."+class_name).html('<span class="text-'+type+'">'+message+'</span>');
             setInterval(function() { $(".text-"+type).fadeOut(); }, 4000);
    }

   
$(function(){
  $(".timepicker").timepicker({
              showInputs: false
          });


  });  






</script>

    @endsection

