

@extends('genral.layouts.mainlayout')
@section('title') 
<title>Update Taxi Booking</title>
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
                          
                            
         <div class="row">
       
         <div class="col-md-3">
            <div id="custom-picker"></div>
         </div>
         <div class="col-md-9">

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

            <!-- general form elements -->
            <div class="box box-success">
               <div class="box-header">
                    <!-- javascript:void(0)  id="bookingform" -->
                  <form role="form"  action="{{url('update_booking_taxi/'.$booking_deatils->id)}}" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="box-body">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="booking_start_date">Booking Starting Date</label>
                              <input type="hidden" class="form-control" required value="{{$booking_deatils->booking_type}}" id="booking_type"  name="booking_type" placeholder="booking_type">
                             <input type="text" class="form-control" required value="{{date('d/m/Y', strtotime($booking_deatils->booking_start_date))}}" id="booking_start_date" name="booking_start_date" readonly>
                           </div>
                          
                           <div class="form-group">
                              <label for="guest_name">Guest Name</label>
                              <input type="text" class="form-control" onkeypress="return restrictNumerics(event);" required value="{{$booking_deatils->guest_name}}"  maxlength="20" id="guest_name"  name="guest_name" placeholder="Guest Name">
                           </div>
                         
                           <div class="form-group">
                              <label for="guest_email">Guest Email</label>
                              <input type="email" class="form-control" maxlength="30" value="{{$booking_deatils->guest_email}}" required id="guest_email"  name="guest_email" placeholder="Guest Email">
                           </div>
                           <div class="form-group">
                              <label for="guest_whatsapp">Guest Whatsapp</label>
                              <input type="text" class="form-control" maxlength="10" value="{{$booking_deatils->guest_whatsapp}}" onkeypress="return restrictAlphabets(event);" required id="guest_whatsapp"  name="guest_whatsapp" placeholder="Guest Whatsapp">
                           </div>
                         
                           <div class="form-group">
                              <label for="special_request">Special Request</label>
                              <textarea class="form-control" name="special_request" value="{{$booking_deatils->special_request}}"  style="resize:none;" rows="2"      id="special_request"  placeholder="special_request ..."></textarea>
                           </div>
                          
                        </div>
                        <div class="col-md-6">
                           
                           <div class="row">
                              <div class="col-md-6">
                                <div class="bootstrap-timepicker">
                                    <div class="form-group bootstrap-timepicker">
                                       <label for="tour_start_time">Trip Start Time</label>
                                       <input type="text" class="form-control timepicker" value="{{$booking_deatils->tour_start_time}}" required id="tour_start_time"   name="tour_start_time" placeholder="Tour Start Time">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="children_below">Children</label>
                                    <input type="text" class="form-control" maxlength="5" value="{{$booking_deatils->children_below}}"  required  id="children_below" onkeypress="return restrictAlphabets(event);  " name="children_below" placeholder="Children below">
                                 </div>
                              </div>
                              <div class="col-md-6">
                               <div class="bootstrap-timepicker">
                                    <div class="form-group bootstrap-timepicker">
                                       <label for="driver_approx_time">Driver Aprox Time</label> 
                                       <input type="text" class="form-control driver_approx_time" value="{{$booking_deatils->tour_start_time}}" required id="driver_approx_time"   name="driver_approx_time" placeholder="Driver Approx Time">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="passengers">No Of Passengers</label>
                                    <input type="text" class="form-control"  maxlength="20"  value="{{$booking_deatils->passengers}}"  required id="passengers"  onkeypress="return restrictAlphabets(event);" name="passengers" placeholder="Number of passengers">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="taxi_cost">Taxi Cost</label>
                              <input type="text" class="form-control" maxlength="20" required  value="{{$booking_deatils->taxi_cost}}" id="taxi_cost" onkeypress="return restrictAlphabets(event);  " name="taxi_cost" placeholder="Taxi Cost">
                           </div>
                          
                          
                           <div class="form-group">
                              <label for="source_address">Source Address</label> Or <a href="#" data-toggle="modal" data-target="#source_map_Modal" style="cursor: pointer;">set to  map </a>
                              <input type="text" class="form-control" onFocus="geolocate()" value="{{$booking_deatils->source_address}}" list="custom_address" required id="source_address"  name="source_address" placeholder="Source Address...">
                              <datalist id="custom_address"> 
                                 @if(count($get_all_address) > 0 )
                                    @foreach($get_all_address as $value)
                                    <option value="{{$value->address}}">
                                    @endforeach
                                 @endif
                                </datalist> 
                                
                           </div>
                           <div class="form-group">
                              <label for="destination_address">Destination address</label> Or <a href="#" data-toggle="modal" data-target="#destination_map_Modal" style="cursor: pointer;">set to  map </a>
                              <input type="text" class="form-control"  value="{{$booking_deatils->destination_address}}"  onFocus="geolocate2()" list="custom_address"  required id="destination_address"  name="destination_address" placeholder="Destination address...">
                           </div>
                          
                        </div>
                        
                        <button type="submit" class="btn btn-primary next-step pull-right">Update Booking</button>

                     </div>
                  </form>
               </div>
               <!-- /.box-header -->
            </div>
            <!-- /.box -->
         </div>
      </div>
                              
                                 
                              
                              


                              
                             
                             
                          
                       
      
      <!-- /.row -->
   </section>
   <!-- /.content -->
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
               <div id="myMap" style="height:435px;  width:100%;     position: static; "></div>
               <input id="map_address" type="text" style="width:600px; display:none;"/><br/>
               <input type="hidden" id="latitude" placeholder="Latitude"/>
               <input type="hidden" id="longitude" placeholder="Longitude"/>
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
      <div class="modal-content" style="position: static; ">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Select  destination Address</h4>
         </div>
         <form action="{{url('booking')}}"  method="post" >
            {{ csrf_field() }}
            <div class="modal-body" style="padding:0px; " >
               <div id="myMap2" style="height:435px;  width:100%;     position: static; "></div>
               <input id="map_address2" type="text" style="width:600px; display:none; "/><br/>
               <input type="hidden" id="latitude2" placeholder="Latitude"/>
               <input type="hidden" id="longitude2" placeholder="Longitude"/>
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
   $(document).ready(function () {
          // var n2 = $("#newdate").val();
          // console.log(n2)
          var daysval = $("#booking_start_date").val();
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
   
                $(".comiseo-daterangepicker").css("display","none !important");
                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);
                
   
            });
            $(".prev-step").click(function (e) {
   
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
          if((x>=48 && x<=57) || x==8)
            return true;
          else
            return false;
      }
   
   /* Restriction for Numeric value  */
				
		function restrictNumerics(e){
          var x=e.which||e.keycode; 
          if((x>=65 && x<=90) || x==8 ||
            (x>=97 && x<=122)|| x==95)
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
      });  
     var m= new Date();
     var c= m.getTime(); 
     var b=c-(30 * 60 * 1000);  
  

       getValue = new Date(b);
       $('.driver_approx_time').timepicker({  showInputs: false });
       //console.log(getValue)
   //$('.driver_approx_time').timepicker('setTime', getValue);
        // $('#timepickerTo').val(getValue);

     // //var  newtime=new Date(.getTime()-30 * 60 * 1000); 
     // alert(newtime);
     // $('.driver_approx_time').timepicker('setTime', newtime);
         
      // $('.driver_approx_time').timepicker('setTime', later);


  // $('.timepicker').timepicker({ 
   //   showInputs: false
      //minuteStep: 15
   // }); 

  // $(".timepicker").timepicker().on('changeTime.timepicker', function (e) {
   //   var newhour =(e.time.hours)+1;
     
      // $('.driver_approx_time').timepicker({ 
      //    showInputs: false,
      //    stepMinute: 15
         
      //     });

// $('.driver_approx_time').timepicker({  
//     minuteStep: 15 });
     

     // $('.driver_approx_time').timepicker({ showInputs: false });

      // change:function() {
      //    var getValue = $(".timepicker").val(); alert(getValue); 
      //    var get = new Date();
      //    get.setTime(getValue);

      //    var dt = new Date(get);

      //    var newDate = dt.setMinutes(dt.getMinutes() + 30 * 60 * 1000);
      //    getValue = new Date(newDate);

      //    $('#timepickerTo').val(getValue);

     
      // }
   //}); 

   //$('.driver_approx_time').timepicker({ showInputs: false });




      
      
    });
     $('#bookingform').submit(function(e){
          e.preventDefault(); 
          var formdata = $(this).serialize();
          $.ajax({
                  type: "POST",
                  url: "{{url('update_taxi_booking')}}",
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
@endsection

