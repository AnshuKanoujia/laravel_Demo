@extends('genral.layouts.mainlayout')
@section('title') <title>Update Driver </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Update Driver 
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="dashboard">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
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
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                <form role="form" action="{{url('update_driver/'.$get_driver->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" maxlength="30"  required  id="name" value="{{$get_driver->name}}" name="name" placeholder="Name..">
                            </div>
                           
                            <div class="form-group">
                              <label for="phone">Phone</label>
                              <input type="text" class="form-control" maxlength="12"  required  onkeypress="return restrictAlphabets(event);"  id="phone"  value="{{$get_driver->phone}}" name="phone" placeholder="Phone">
                            </div>

                            <!-- textarea -->
                            <div class="form-group">
                                <label for="address">Address Or <a href="#" data-toggle="modal" data-target="#my_map_Modal" style="cursor: pointer;">set to  map </a> </label>
                                <!-- <textarea class="form-control" style="resize: none;" required rows="4"  name="address" id="address"  placeholder="Address ...">{{$get_driver->address}}</textarea> -->
                                <input type="text" class="form-control" onFocus="geolocate()" list="custom_address"  value="{{$get_driver->address}}" id="address"  required name="address" placeholder="Address..">

                                <datalist id="custom_address"> 
                                 @if(count($get_all_address) > 0 )
                                    @foreach($get_all_address as $value)
                                    <option value="{{$value->address}}">
                                    @endforeach
                                 @endif
                                </datalist> 

                              </div>
                            <!-- radio -->
                            <label>Type</label>
                            <div class="form-group">
                                <label>
                                  <input type="radio" name="type" class="flat-red" @if ($get_driver->type =='contract') checked @endif  value="contract" checked/> Contract
                                </label>
                                <label>
                                  <input type="radio" name="type"   class="flat-red" @if ($get_driver->type =='employee') checked @endif  value="employee" /> Employee
                                </label>
                            </div>



                            <label>Rate</label>
                              <div class="form-group">
                                <label>
                                  <input type="radio" name="rate" class="flat-red" @if ($get_driver->rate =='daily') checked @endif value="daily" checked readonly="readonly"/> Daily
                                </label>
                                <label>
                                  <input type="radio" name="rate"  class="flat-red" @if ($get_driver->rate =='monthly') checked @endif value="monthly" readonly="readonly" /> Monthly
                                    
                                </label>
                              </div>
                           

                               

                            
                        </div>
                      
                        <div class="col-md-6">
                             <div class="form-group">
                               <label for="email">Email</label>
                               <input type="email" class="form-control"  id="email" value="{{$get_driver->email}}"  name="email" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <label for="image">Image</label>
                                 <div class="row">
                                     <div class="col-md-6">
                                     <input type="file" id="image"   name="image">
                                     </div>
                                     <div  class="col-md-6">
                                       <img src="{{ URL::asset('public/images/'.$get_driver->image)}}"  style="height:auto; width:80px; " alt="image path Not Found.... " />
                                     </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                <label for="license_no">License No</label>
                                <input type="text" class="form-control"  required id="license_no" value="{{$get_driver->license_no}}" name="license_no" placeholder="License No">
                              </div> 
                              <div class="form-group">
                                <label for="join_date">Join Date</label>
                                <input type="text" class="form-control"  required  name="join_date" value="{{$get_driver->join_date}}" id="join_date"  placeholder="Join Date">
                              </div>
                             
                              <!--<div class="form-group">
                                <label for="seat">No of Seat</label>
                                <input type="text" class="form-control" id="seats" name="seats" placeholder="Seats">
                              </div> -->
                              
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Update Driver</button>
                        </div>
                 </div>
                  
                </form>
                </div><!-- /.box-header -->
               
              </div><!-- /.box -->


               </div>   <!-- /.row -->
        </section><!-- /.content -->

        

      </div><!-- /.content-wrapper -->


            <!-- Modal -->
<div class="modal fade" id="my_map_Modal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select Address</h4>
        </div>
        <form action="{{url('booking')}}"  method="post" >
        {{ csrf_field() }}
          <div class="modal-body" style="padding:0px; " >
            <input type="hidden"  name="event_date"  id="event_date" />
            <div id="myMap" style="height:435px;  width:100%; position: static; "></div>
            <input id="map_address" type="text" style="width:600px; display:none; "/><br/>
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

@endsection


@section('customjs')

    

    <script type="text/javascript"> 
     var latitude = JSON.parse("{{$get_driver->latitude}}");
     var longitude = JSON.parse("{{$get_driver->longitude}}");
       

     
      var map;
      var marker;
      var myLatlng = new google.maps.LatLng(latitude,longitude);
      var geocoder = new google.maps.Geocoder();
      var infowindow = new google.maps.InfoWindow();

      var placeSearch, autocomplete;


      function initialize(){

        autocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), {types: ['geocode']});


        ///
        var mapOptions = {
          zoom: 18,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

        marker = new google.maps.Marker({
          map: map,
          position: myLatlng,
          draggable: true
        });

        geocoder.geocode({'latLng': myLatlng }, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {
                  $('#latitude,#longitude').show();
                  $('#map_address').val(results[0].formatted_address); 
                  // $('#address').val(results[0].formatted_address);
                  $('#latitude').val(marker.getPosition().lat());
                  $('#longitude').val(marker.getPosition().lng());
                  infowindow.setContent(results[0].formatted_address);
                  infowindow.open(map, marker);
              }
          }
        });

        google.maps.event.addListener(marker, 'dragend', function() {

        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                $('#map_address').val(results[0].formatted_address); 
                $('#address').val(results[0].formatted_address);
                $('#latitude').val(marker.getPosition().lat());
                $('#longitude').val(marker.getPosition().lng());
                infowindow.setContent(results[0].formatted_address);
                infowindow.open(map, marker);
            }
          }
        });
      });

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



     $(function () {
        
         //Datemask yyyy-mm-dd
         $("#join_date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
         var pickerOptsGeneral = { format: "yyyy-mm-dd", autoclose: true, minView: 2, maxView: 2,defaultDate: moment().subtract(1, 'days'), useCurrent: false };
         $('#join_date').datetimepicker(pickerOptsGeneral).on('changeDate',function(ev){});


        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

       
      });
     
     
       //  for chnage the Driver Type  And Set  Automaticaly  Rate of the Driver 
            $(document).ready(function(){
                var gettype=$("input[type=radio][name='type']:checked").val();
                if(gettype=='contract')
                {
                $("input[type=radio][name='rate'][value='monthly']").prop('checked', false);
                $("input[type=radio][name='rate'][value='daily']").prop('checked', true); 
                }
                else if(gettype=='employee')
                {  
                $("input[type=radio][name='rate'][value='daily']").prop('checked', false);
                $("input[type=radio][name='rate'][value='monthly']").prop('checked', true);
                }
                else
                {
                
                $("input[type=radio][name='rate'][value='daily']").prop('checked', true);
                }
                $("input[type=radio][name='type']").change(function(){
                var gettype=this.value; 
                    if(gettype=='contract')
                    {
                    $("input[type=radio][name='rate'][value='monthly']").prop('checked', false);
                    $("input[type=radio][name='rate'][value='daily']").prop('checked', true); 
                    }
                    else if(gettype=='employee')
                    {  
                    $("input[type=radio][name='rate'][value='daily']").prop('checked', false);
                    $("input[type=radio][name='rate'][value='monthly']").prop('checked', true);
                    }
                    else
                    {
                    
                    $("input[type=radio][name='rate'][value='daily']").prop('checked', true);
                    }
                }); 
            });


             //     restrict Alphabets  
      function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8 ||
            (x>=35 && x<=40)|| x==46)
            return true;
          else
            return false;
      }


     </script>
    
@endsection




