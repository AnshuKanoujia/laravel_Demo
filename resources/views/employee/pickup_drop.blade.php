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
                <form role="form" action="{{url('add_pickup_drop')}}" method="post" autocomplete="on" >
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">
                           

                            <div class="form-group">
                              <label for="source_address"> Address</label> 
                              <input type="text" class="form-control" required   id="address" name="address" placeholder="Address">
                           </div>

                           <div class="form-group">
                              <label for="region">Region</label>

                              <input type="text" class="form-control" required  id="region" list='region_list' name="region" placeholder="Region Name">
                              @if(count($pickup_drop_list) > 0 )
                              <datalist   id="region_list" >
                              @foreach($pickup_drop_list as $value)
                                 <option>{{ucfirst($value->region)}}
                              @endforeach
                                 
                              </datalist >
                              @endif
                              </div>
                           

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="destination_address"> <a href="#" data-toggle="modal" data-target="#map_Modal" style="cursor: pointer;">Pick Address to  map </a></label>
                                <input type="text" class="form-control" required  onFocus="geolocate()" readonly id="pick_address" name="pick_address" placeholder="Pick Address">
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
                    <button type="submit" class="btn btn-primary pull-right">Add Points</button>
                </div>
                  
                </form>
                </div><!-- /.box-header -->
               

               
              </div><!-- /.box -->

              

              

              

            

            
          </div>   <!-- /.row -->
        </section><!-- /.content -->



         <!-- Main content -->
         <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Pickup And Drop Points</h3>  <div class="pull-right alertmessage"></div> 
                </div><!-- /.box-header -->
                <div class="box-body">
                @if(isset($pickup_drop_list))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      
                        <th>Address</th>
                        <th>Pick Address</th>
                        <th>Region</th>
                       
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($pickup_drop_list as $value)
                      <tr id="row_{{$value->id}}">
                        
                        <td>{{$value->address}}</td>
                        <td>{{$value->pick_address}}</td>
                        <td>{{$value->region}}</td>
                        <td><!-- <a href="javascript:void(0);" title="delete" onclick="delete_pickup_drop({{$value->id}});"  ><i class="fa fa-trash text-danger"></i></a> -->&nbsp;&nbsp;<a href="{{url('edit_pickup_drop/'.$value->id)}}" title="edit" ><i class="fa fa-edit text-success"></i></a></td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                    
                  </table>
                  @endif
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
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
        var map; 
        var marker; 
        var myLatlng = new google.maps.LatLng(20.268455824834792,85.84099235520011);
        var geocoder = new google.maps.Geocoder(); 
        var infowindow = new google.maps.InfoWindow();    
   
        var placeSearch, autocomplete;
   
   
        function initialize(){
   
          //  use  For Auto Complete Addresss 
          autocomplete = new google.maps.places.Autocomplete(document.getElementById('pick_address'), {types: ['geocode']});
   
         
            
          
          //  Select Address To  the  Marker  ## START ##
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



      $(function () {
        
        $('#example1').dataTable({
          "ordering": false,
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });


      function delete_pickup_drop(rowId)
      {
          if(confirm('Do you want  to  delete this?'))
          {
              $.ajax({
                  type: "POST",
                  url: "{{url('delete_pickup_drop')}}",
                  data: {'row_id':rowId,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      //console.log(result);
                      if(result=='200'){
                        $('#row_'+rowId).remove(); 
                        $('.alertmessage').html('<span class="text-success">Address deleted...</span>');  
                      }
                      else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  }
              });
          }
      }

     

   

    
   
      $(function () {
         //Timepicker
         $(".timepicker").timepicker({
            showInputs: false
          });
      });
    </script>

@endsection




