@extends('genral.layouts.mainlayout')
@section('title') <title>Update Users</title>
 <style>
  .dropzone {
    min-height: 150px;
    border: 2px dotted rgba(0, 0, 0, 0.3);
    background: white;
    padding: 20px 59px;
}


 .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}


 </style>
@endsection



@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Update Users
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
                <form role="form" action="{{url('update_user/'.$get_user->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" onkeypress="return restrictNumerics(event);" value="{{$get_user->name?$get_user->name:''}}" maxlength="20"   id="name" name="name" placeholder="Name..">
                            </div>

                            <div class="form-group">
                              <label for="phone">Phone</label>
                              <input type="text" class="form-control" maxlength="10" value="{{$get_user->phone?$get_user->phone:''}}" onkeypress="return restrictAlphabets(event);" id="phone"   name="phone" placeholder="phone">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                               <input type="text" class="form-control"   id="password" name="password" placeholder="password">
                            </div>
                            <div class="form-group">
                              <label for="confirm_password">Confirm Password</label>
                              <input type="text" class="form-control"  id="confirm_password" name="confirm_password" placeholder="confirm_password">
                            </div>

                        </div>

                        <div class="col-md-6">
                             <div class="form-group">
                               <label for="email">Email</label>
                               <input type="email" class="form-control"  value="{{$get_user->email?$get_user->email:''}}" id="email" name="email" placeholder="email..">
                              </div>
                              <!-- textarea -->
                            <div class="form-group">
                                <label for="address">Address</label> Or <a href="#" data-toggle="modal" data-target="#my_map_Modal" style="cursor: pointer;">set to  map </a>
                                <!-- <textarea class="form-control" required style="resize: none;" rows="4" name="address" id="address" onFocus="geolocate()"  placeholder="Address ..."></textarea> -->
                                <input type="text" class="form-control" value="{{$get_user->address?$get_user->address:''}}" onFocus="geolocate()"   id="address"   name="address" placeholder="Address.."/>
                            </div>
                            <div class="form-group">
                                <label for="join_date">Join Date</label>
                                <input type="text" class="form-control" value="{{$get_user->join_date?$get_user->join_date:''}}"  name="join_date" id="join_date" placeholder="join Date" >
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file"  id="image" name="image"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                @if($get_user->image)
                                <img src="{{ URL::asset('public/images/users/'.$get_user->image)}}"  style="height:auto; width:80px; " alt="image path Not Found.... " />
                                @endif
                                </div>
                            </div>

                            <!-- radio -->
                            <label>User Type</label>
                                    <div class="form-group">
                                        <label>
                                        <input type="radio" name="roll_id" @if($get_user->roll_id=='3') checked @endif class="flat-red"  value="3"  /> Managers
                                        </label>
                                        <label>
                                        <input type="radio" name="roll_id" @if($get_user->roll_id=='2') checked @endif  class="flat-red" value="2"  /> Employee
                                        </label>
                                    </div>
                              

                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Update Users</button>
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
                <div id="myMap" style="height:435px;  width:100%;     position: static; "></div>
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

var latitude='{{$get_user->latitude?$get_user->latitude:'20.268455824834792'}}'; 
var longitude='{{$get_user->latitude?$get_user->longitude:'85.84099235520011'}}';

  /* Start  The  map  Address    Code  */
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
     

   
  


      //     restrict Alphabets  
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
        (x>=97 && x<=122)|| x==95 || x==32)
        return true;
        else
        return false;
      }

       

    </script>
@endsection
