@extends('genral.layouts.mainlayout')
@section('title') <title>Pickup And Drop </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Pickup / Drop Points
            <small>New</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('dashboard')}}">Forms</a></li>
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
                <form role="form" action="{{url('update_pickup_drop/'.$edit_data->id)}}" method="post" autocomplete="on" >
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">
                           

                            <div class="form-group">
                              <label for="source_address"> Address</label> 
                              <input type="text" class="form-control" required value="{{$edit_data->address}}"  id="address" name="address" placeholder="Address">
                           </div>

                           <div class="form-group">
                              <label for="region">Region</label>

                              <input type="text" class="form-control" required value="{{$edit_data->region}}" id="region" list='region_list' name="region" placeholder="Region Name">
                              @if(count($pickup_drop_list) > 0 )
                              <datalist   id="region_list" >
                              @foreach($pickup_drop_list as $value)
                                 <option >{{ucfirst($value->region)}}
                              @endforeach
                                 
                              </datalist >
                              @endif
                              </div>
                           

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="destination_address"> <a href="#" data-toggle="modal" data-target="#map_Modal" style="cursor: pointer;">Pick Address to  map </a></label>
                                <input type="text" class="form-control" value="{{$edit_data->pick_address}}" required  onFocus="geolocate()" readonly id="pick_address" name="pick_address" placeholder="Pick Address">
                            </div>
                              
                    
                              <!-- <div class="bootstrap-timepicker">
                              <div class="form-group">
                                <label for="time">Flight Time</label>
                                <input type="text" class="form-control timepicker" required id="time" name="time" placeholder="Flight Time">
                              </div>
                              </div> -->
                              
                            
                              
                    </div>
                 </div>
                 <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Update Points</button>
                </div>
                  
                </form>
                </div><!-- /.box-header -->
               

               
              </div><!-- /.box -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->


   
<!--  destination Address Modal -->
<div class="modal fade" id="map_Modal" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content" style="position: static;">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Select  destination Address</h4>
         </div>
         <form action="{{url('booking')}}"  method="post" >
            {{ csrf_field() }}
            <div class="modal-body" style="padding:0px; " >
               <div id="myMap" style="height:435px;  width:100%;     position: static; "></div>
               <input id="map_address" type="text" style="width:600px; display:none;  "/><br/>
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

        var latitude='{{$edit_data->pick_latitude}}';
        var longitude='{{$edit_data->pick_longitude}}'; 
        var map; 
        var marker; 
        var myLatlng = new google.maps.LatLng(latitude?latitude:-2.825029207213317,longitude?longitude:107.9635024965206);
        var geocoder = new google.maps.Geocoder(); 
        var infowindow = new google.maps.InfoWindow();    
   
        var placeSearch, autocomplete;
        var options = {
            types: ['(cities)'],
            componentRestrictions: {country: "ID"}
          };
   
        function initialize(){
   
          //  use  For Auto Complete Addresss 
          autocomplete = new google.maps.places.Autocomplete(document.getElementById('pick_address'), options);
   
         
            
          
          //  Select Address To  the  Marker  ## START ##
          var mapOptions = {
            zoom: 9,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            types: ['(cities)'],
            componentRestrictions: {country: "ID"}
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
                    // $('#source_address').html(results[0].formatted_address);  //  default address fill 
                   
   
                    $('#latitude2,#longitude2').show();
                   
                  
                    $('#latitude').val(marker.getPosition().lat());
                    $('#longitude').val(marker.getPosition().lng());
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
         
            $('#pick_address').val(results[0].formatted_address); 
            $('#latitude').val(marker.getPosition().lat());
            $('#longitude').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
            }
            }
            });
          });
         
   
        //  Select Address To  the  Marker  ## END ##
   
   
      }
   
   
      google.maps.event.addDomListener(window, 'load', initialize);

      //  END of The Google  Map 


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



     


     
     

   

    
   
     
    </script>

@endsection




