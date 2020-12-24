@extends('genral.layouts.mainlayout')
@section('title') <title>Update Address</title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
         Update Address
            <small>New</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
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
                <form role="form" action="{{url('update_address/'.$get_address->id)}}" method="post" autocomplete="on" >
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">

                            <div class="form-group">
                              <label for="address">Address</label> Or <a href="#" data-toggle="modal" data-target="#map_Modal" style="cursor: pointer;">set to  map </a>
                              <input type="text" class="form-control" value="{{$get_address->address}}" required  onFocus="geolocate()" id="address" name="address" placeholder="Address">

                        
                           </div>
                           
                           <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Update Address</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                       </div>
                 </div>
                
                  
                </form>
                </div><!-- /.box-header -->
               

               
              </div><!-- /.box -->

              

              

              

            

            
          </div>   <!-- /.row -->
        </section><!-- /.content -->



        

      </div><!-- /.content-wrapper -->
@endsection

<div class="modal fade" id="map_Modal" role="dialog">
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
               <input id="map_address" value="{{$get_address->address}}" type="hidden" style="width:600px;"/><br/>
               <input type="hidden" value="{{$get_address->latitude}}" id="latitude" placeholder="Latitude"/>
               <input type="hidden" value="{{$get_address->longitude}}" id="longitude" placeholder="Longitude"/>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
            </div>
         </form>
      </div>
   </div>
</div>


@section('customjs')
   

    <script type="text/javascript">

        //  Edit  lat  Long 
        var lat='{{$get_address->latitude}}'; 
        var long='{{$get_address->longitude}}'; 

        var map; 
        var marker; 
        var myLatlng = new google.maps.LatLng(lat?lat:-2.825029207213317,long?long:107.9635024965206);
        var geocoder = new google.maps.Geocoder(); 
        var infowindow = new google.maps.InfoWindow();    
   
        var placeSearch, autocomplete;
        var options = {
            types: ['(cities)'],
            componentRestrictions: {country: "ID"}
          };
   
        function initialize(){
   
          //  use  For Auto Complete Addresss 
          autocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), options);
   
          
            
          
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
            $('#address').val(results[0].formatted_address); 
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


      //  END of The Google  Map 

      
    </script>

@endsection




