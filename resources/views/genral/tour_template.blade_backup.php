@extends('genral.layouts.mainlayout')
@section('title') <title>Tour Template </title> 
<style type="text/css">
  .all_items_wrapper .col{  
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;    
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
  }
  .all_items_wrapper .row{
    margin: 0;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    position: relative;
  }
  .cost-title {
    padding: 15px;
    font-size: 21px;
    margin-bottom: 25px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}
.all_items_wrapper .remove-invoice-item {
    display: inline-block;
    vertical-align: top;
    position: absolute;
    top: 0;
    right: 0;
    max-width: 39px;
    padding: 9px 11px;
    height: auto;
    cursor: pointer;
}
img {
    max-width: 100%;
    width: 100%;
}
.all_items_wrapper > .row > .col:last-child {
    padding-right: 40px;
}
.all_items_wrapper label {
    color: #4a4a4a;
    font-weight: 600;
    font-size: 14px;
}
.CurrencyTypeBox .form-group {
    max-width: 321px;
}
.CurrencyTypeBox {
    margin: 0;
    padding: 0 15px;
}
</style>


@endsection
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add Tour Template
            <small>Preview</small>
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
                <form role="form" action="{{url('add_tour_template')}}" method="post">
                {{ csrf_field() }}
                  <div class="box-body clearfix">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="hidden" name="activity_type" id="activity_type" value="5">
                        <label for="activity_name">Tour Name</label>
                        <input type="text" class="form-control" maxlength="200" required  id="activity_name" name="activity_name" placeholder="Tour Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="time_duration">Tour duration (ex transport)</label>
                        <input type="text" class="form-control" required  maxlength="2" onkeypress="return restrictAlphabets(event);"  id="time_duration" name="time_duration" placeholder="Tour duration (ex transport)">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tourFreq">Tour Frequency</label>
                        <input type="text" class="form-control" required maxlength="70" list="freq_list" id="tourFreq" name="tourFreq" placeholder="Tour Frequency">
                        @if(count($get_Freq) > 0 )
                          <datalist   id="freq_list" >
                          @foreach($get_Freq as $value)
                              <option>{{ucfirst($value->tourFreq)}}
                          @endforeach
                          </datalist>
                          @endif
                      
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="origin">Origin</label>
                        <input type="text" class="form-control" required  list='region_list' id="Origin" name="origin" placeholder="Origin" autocomplete="off">
                        @if(count($pickup_drop_list) > 0 )
                          <datalist   id="region_list" >
                          @foreach($pickup_drop_list as $value)
                              <option>{{ucfirst($value->region)}}
                          @endforeach
                          </datalist>
                          @endif
                      </div>
                    </div>
                  </div>
                  <div class="box-body clearfix">
                    <div class="cost-title">Group costs</div>
                    <div class="row CurrencyTypeBox">
                      <div class="col">
                        <div class="form-group">
                          <label for="">Select Currency</label>
                          <select class="form-control"  name="group_currency" onchange="updteCurrentType(event)">
                            <option value="">Select Currency</option>
                            <option value="IDR">IDR</option>
                            <option value="INR" selected >INR</option>
                            <option value="EUR">EUR</option>
                            <option value="USD">USD</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="all_items_wrapper">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="">Component</label>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Component" name="group_component[]" required>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="">Cost</label>
                          </div>
                          <div class="form-group">
                            <div class="input-group ">
                              <div class="input-group-addon">
                                <span class="input-group-text">IDR</span>
                              </div>
                              <input type="text" class="form-control formatCurrency cost_input"  placeholder="Cost" name="group_cost[]" required  onkeypress="return isNumber(this, event)">
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="">Max pax</label>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Max pax" name="group_maxpax[]" required onkeypress="return isNumber(this, event)">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="">Beneficiary</label>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Beneficiary" name="group_beneficiary[]" required>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="">Commission</label>
                          </div>
                          <div class="form-group">
                            <div class="input-group ">
                              <div class="input-group-addon">
                                <span class="input-group-text">IDR</span>
                              </div>
                              <input type="text" class="form-control formatCurrency commission_input"  placeholder="Commission" name="group_commission[]" required onkeypress="return isNumber(this, event)">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row adder-row">
                        <div class="col-sm-12">
                          <div class="item-adder">
                            <button type="button" class="btn btn-default"><span class="fa fa-plus"> Add Item </span></button>
                          </div>
                        </div>
                        <div class="col-sm-12 total-row text-right">
                          <div class="form-group form-inline">
                            <label for="origin">Total Cost</label>
                            <input type="text" class="form-control totalCosts" required  id="group_TotalCosts" name="group_TotalCosts" placeholder="Total cost" readonly>
                          </div>
                          <div class="form-inline">
                            <label for="origin">Total Commission</label>
                            <input type="text" class="form-control totalCommission" required  id="group_TotalCommission" name="group_TotalCommission" placeholder="Total commission" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                 </div>
                  <div class="box-body clearfix">
                    <div class="cost-title">Pax costs</div>
                    <div class="row CurrencyTypeBox">
                      <div class="col">
                        <div class="form-group">
                          <label for="">Select Currency</label>
                          <select class="form-control" name="pax_currency" onchange="updteCurrentType(event)">
                            <option value="">Select Currency</option>
                            <option value="IDR">IDR</option>
                            <option value="INR" selected >INR</option>
                            <option value="EUR">EUR</option>
                            <option value="USD">USD</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="all_items_wrapper">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="">Component</label>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Component" name="pax_component[]" required>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="">Cost</label>
                          </div>
                          <div class="form-group">
                            <div class="input-group ">
                              <div class="input-group-addon">
                                <span class="input-group-text">IDR</span>
                              </div>
                              <input type="text" class="form-control formatCurrency cost_input"  placeholder="Cost" name="pax_cost[]" required  onkeypress="return isNumber(this, event)">
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="">Min Age</label>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Max pax" name="pax_min_age[]" required onkeypress="return isNumber(this, event)">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="">Beneficiary</label>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Beneficiary" name="pax_beneficiary[]" required>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="">Commission</label>
                          </div>
                          <div class="form-group">
                            <div class="input-group ">
                              <div class="input-group-addon">
                                <span class="input-group-text">IDR</span>
                              </div>
                              <input type="text" class="form-control  formatCurrency commission_input"  placeholder="Commission" name="pax_commission[]" required onkeypress="return isNumber(this, event)">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row adder-row">
                        <div class="col-sm-12">
                          <div class="item-adder">
                            <button type="button" class="btn btn-default"><span class="fa fa-plus"> Add Item </span></button>
                          </div>
                        </div>
                        <div class="col-sm-12 total-row text-right">
                          <div class="form-group form-inline">
                            <label for="origin">Total Cost</label>
                            <input type="text" class="form-control totalCosts" required  id="pax_TotalCosts" name="pax_TotalCosts" placeholder="Total cost" readonly>
                          </div>
                          <div class="form-inline">
                            <label for="origin">Total Commission</label>
                            <input type="text" class="form-control totalCommission" required  id="pax_TotalCommission" name="pax_TotalCommission" placeholder="Total commission" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                 </div>
                 <div class="box-footer">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="col-sm-12 text-right  ">
                          <button type="butotn" class="btn btn-default">Cancel</button>
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                </div><!-- /.box-header -->
              </div><!-- /.box -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->

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
          autocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), {types: ['geocode']});
   
          //  Select Address To  the  Marker  ## START ##
          var mapOptions = {
            zoom: 18,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          console.log(mapOptions)
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
$(document)
.on('click','.item-adder button',function(e){
e.preventDefault();
console.log('clicled')
var $wraper=$(this).closest('.all_items_wrapper')
var newElem=$wraper.find('.row:first-child').clone(true);
newElem.find('.col').each(function(){
  $(this).find('.form-group:first-child').remove();
})
newElem.find('.col:last-child .form-group').append('<span class="remove-invoice-item"> <img src="public/images/delete.png" alt="del"> </span>');
newElem.find('.remove-invoice-item').click(function(){
  $(this).closest('.row').slideUp(300,function(){
    $(this).remove();
  })
})
$wraper.find('.adder-row').before(newElem);
})
.on('copy paste cut','.formatCurrency',function(e){
e.preventDefault();
})
.on('blur','.formatCurrency',function(){
var $this=$(this);
var newVal=$this.val();
if(newVal){
  newVal=newVal.replace(/,/g,'');
  var newCmaVal=new Intl.NumberFormat('en-Us',{}).format(newVal);
  $this.val(newCmaVal)
}
})
.on('change keyup','.commission_input',function(){
var commission_input=0;
$(this).closest('.all_items_wrapper').find('.commission_input').each(function(){
  var $this=$(this);
  var newVal=$this.val();
  if(newVal){
    newVal=parseFloat(newVal.replace(/,/g,''));
    commission_input+=newVal;
  }
})
console.log(commission_input)
$(this).closest('.all_items_wrapper').find('.totalCommission').val( new Intl.NumberFormat('en-Us',{}).format(commission_input))
})
.on('change keyup','.cost_input',function(){
var cost_input=0;
$(this).closest('.all_items_wrapper').find('.cost_input').each(function(){
  var $this=$(this);
  var newVal=$this.val();
  if(newVal){
    newVal=parseFloat(newVal.replace(/,/g,''));
    cost_input+=newVal;
  }
})
console.log(cost_input)
$(this).closest('.all_items_wrapper').find('.totalCosts').val(new Intl.NumberFormat('en-Us',{}).format(cost_input))
})
.on('focus','.formatCurrency',function(){
var $this=$(this);
var newVal=$this.val();
if(newVal){
  newVal=newVal.replace(/,/g,'');
  $this.val(newVal)
}
})
function isNumber(txt, evt) {
var charCode = (evt.which) ? evt.which : evt.keyCode;
if (charCode == 46) {
  //Check if the text already contains the . character
  if (txt.value.indexOf('.') === -1) {
    return true;
  } else {
    return false;
  }
} else {
  if (charCode > 31 &&
    (charCode < 48 || charCode > 57))
    return false;
}
return true;
}    
function updteCurrentType(event){
$(event.target).closest('.box-body').find('.input-group-text').text($(event.target).val())
}
</script>
    
    <!-- page script -->
    <script type="text/javascript">
      
            // $(function () {
      //   $('#example1').dataTable({
      //     "ordering": false,
      //     "bPaginate": true,
      //     "bLengthChange": true,
      //     "bFilter": true,
      //     "bSort": false,
      //     "bInfo": true,
      //     "bAutoWidth": false
      //   });
      // });


    /*   restrict Alphabets   */
      function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8 ||
            (x>=35 && x<=40)|| x==46)
            return true;
          else
            return false;
      }
 


/*  delete Custom Activity */
      function delete_custom_activity(rowId)
      {
          if(confirm('Do you want  to  delete this?'))
          {
              $.ajax({
                  type: "POST",
                  url: "{{url('delete_custom_activity')}}",
                  data: {'row_id':rowId,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      //console.log(result);
                      if(result=='200'){
                        $('#row_'+rowId).remove(); 
                        $('.alertmessage').html('<span class="text-success">Custom Activity deleted...</span>');  
                      }
                      else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  }
              });
          }
      }

    </script>
@endsection




