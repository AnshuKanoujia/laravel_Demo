@extends('genral.layouts.mainlayout')
@section('title') 

<title>Update Third Party Vehicle </title>
<style>
.cost-title{
    padding: 0px;
    font-size: 21px;
    margin-bottom: 15px; 
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
}
</style>
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Update Third Party Vehicle 
            <small>Update</small>
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
                <form role="form" action="{{url('update_third_party_vehicle/'.$get_taxi->id)}}" method="post">
                {{ csrf_field() }}

                  <!-- Start OF The  Copy  Html  -->
                  <div class="box-body clearfix">
                  <div class="cost-title">Genral Specification</div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="title">Taxi title</label>
                              <input type="text" class="form-control" required maxlength="20" id="title" value="{{$get_taxi->title}}" name="title" placeholder="Name">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="make">Make</label>
                                <select class="form-control" name="make" required id="make"   >
                                  <option   value="">--Select Make--</option>
                                  <option   value="Maruti Suzuki" @if($get_taxi->make=='Maruti Suzuki') {{ 'selected' }} @endif >Maruti Suzuki</option>
                                  <option   value="Hyundai" @if($get_taxi->make=='Hyundai') {{ 'selected' }} @endif  >Hyundai</option>
                                  <option   value="BMW" @if($get_taxi->make=='BMW') {{ 'selected' }} @endif  >BMW</option>
                                  <option   value="Volvo" @if($get_taxi->make=='Volvo') {{ 'selected' }} @endif  >Volvo</option>
                                  <option   value="Toyota" @if($get_taxi->make=='Toyota') {{ 'selected' }} @endif  >Toyota</option>
                                  <option   value="Honda" @if($get_taxi->make=='Honda') {{ 'selected' }} @endif  >Honda</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="model">Model</label>
                              <select class="form-control" id="model" required name="model">
                                <option   value="">--Select Model--</option>
                                <option   value="Aura" @if($get_taxi->model=='Aura') {{ 'selected' }} @endif  >Aura</option>
                                <option   value="Baleno" @if($get_taxi->model=='Baleno') {{ 'selected' }} @endif>Baleno</option>
                                <option   value="Eeco" @if($get_taxi->model=='Eeco') {{ 'selected' }} @endif>Eeco</option>
                                <option   value="Creta" @if($get_taxi->model=='Creta') {{ 'selected' }} @endif >Creta</option>
                                <option   value="Xcent 2020" @if($get_taxi->model=='Xcent 2020') {{ 'selected' }} @endif>Xcent 2020</option>
                                <option   value="Creta 2020" @if($get_taxi->model=='Creta 2020') {{ 'selected' }} @endif >Creta 2020</option>
                                <option   value="Innova"  @if($get_taxi->model=='Innova') {{ 'selected' }} @endif >Innova</option>
                                <option   value="Fortuner" @if($get_taxi->model=='Fortuner') {{ 'selected' }} @endif >Fortuner</option>
                                <option   value="S60 2019" @if($get_taxi->model=='S60 2019') {{ 'selected' }} @endif>S60 2019</option>
                                <option   value="XC60" @if($get_taxi->model=='XC60') {{ 'selected' }} @endif>XC60</option>
                                <option   value="Honda" @if($get_taxi->model=='Honda') {{ 'selected' }} @endif>M Series</option>
                              </select>
                            </div>
                          </div>
                          
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="model_year">Year Model</label>
                              <select class="form-control" required id="model_year" name="model_year">
                                <option   value="">--Select Model Year--</option>

                                <?php $year = date('Y'); $last_year=date('Y')-30; ?>
                                  @for ($i = $last_year; $i <= $year ; $i++)
                                  <option value="{{ $i }}" @if($get_taxi->model_year==$i) {{ 'selected' }} @endif >{{ $i }}</option>
                                  @endfor
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="category">Category</label>
                              <input type="text" class="form-control" required  id="category"  value="{{$get_taxi->category}}" name="category" placeholder="category">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="luggage">Luggage Capacity</label>
                              <select class="form-control" id="luggage" required  name="luggage">
                              <option   value="">--Luggage Capacity--</option>
                              <option   value="1"  @if($get_taxi->luggage=='1') {{ 'selected' }} @endif >Yes</option>
                              <option   value="0"  @if($get_taxi->luggage=='0') {{ 'selected' }} @endif >No</option>
                            </select>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="seat">No of Seat</label>
                                <input type="text" class="form-control" required maxlength="50" onkeypress="return restrictAlphabets(event);" value="{{$get_taxi->seats}}"  id="seats" name="seats" placeholder="Seats">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="taxino">Taxi No</label>
                              <input type="text" class="form-control" required id="taxi_no"  value="{{$get_taxi->taxi_no}}" name="taxi_no" placeholder="Taxi no">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="registration_no">Registration No</label>
                              <input type="text" class="form-control" id="registration_no" required  value="{{$get_taxi->registration_no}}" name="registration_no" placeholder="Registration no">
                            </div>
                          </div>
                    </div>

                    <div class="box-body clearfix">
                        <div class="cost-title">Financial +  Third Party Info</div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label for="owner_name">Owner Name</label>
                                  <input type="text" class="form-control"  maxlength="50" value="{{$get_taxi->owner_name}}"  required id="owner_name" name="owner_name" placeholder="Owner Name ">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="internal_airport_pickup">Airport  Pickup Price (Inernal)</label>
                              <input type="text" class="form-control" value="{{$get_taxi->internal_airport_pickup}}"  maxlength="50"  onkeypress="return restrictAlphabets(event);"  required id="internal_airport_pickup" name="internal_airport_pickup" placeholder="(Internal) Airport Pickup Price">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="full_day_price_internal">Full Day Price (Internal)</label>
                                <input type="text" class="form-control" value="{{$get_taxi->full_day_price_internal}}"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="full_day_price_internal" name="full_day_price_internal" placeholder="Full Day Price (Internal)">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="owner_phone">Owner Phone</label>
                                <input type="text" class="form-control" value="{{$get_taxi->owner_phone}}"  maxlength="10" minlength="10" onkeypress="return restrictAlphabets(event);"  required id="owner_phone" name="owner_phone" placeholder="Owner Phone">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label for="external_airport_pickup">Airport  Pickup Price (External)</label>
                                  <input type="text" class="form-control" value="{{$get_taxi->external_airport_pickup}}"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="external_airport_pickup" name="external_airport_pickup" placeholder="(External) Airport Pickup Price">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="full_day_price_external">Full Day Price (External)</label>
                                <input type="text" class="form-control" value="{{$get_taxi->full_day_price_external}}" maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="full_day_price_external" name="full_day_price_external" placeholder="Full Day Price (External)">
                              </div>
                          </div>
                          <div class="col-sm-offset-4 col-md-offset-4  col-lg-offset-4 col-sm-4 col-md-4 col-lg-4">
                            <label>
                                <input type="checkbox" class="minimal" @if($get_taxi->driver_included=='1') checked @endif value="1" name="driver_included" />&nbsp;&nbsp; Driver Included
                            </label>
                          </div>
                          <div class="col-sm-4 col-md-4 col-lg-4">
                               <br/>
                               <button type="submit" class="btn btn-primary btn-block">Update Vehicle</button>
                          </div>
                    </div>

                     
                  <!-- End of  The New  Copied Html-->
                  <!--<div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add A Vehicle</button>
                  </div>-->
                </form>
                </div><!-- /.box-header -->
               
              </div><!-- /.box -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->



      </div><!-- /.content-wrapper -->
@endsection


@section('customjs')
    
    <!-- page script -->
    <script type="text/javascript">
      $(function () {

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

        

        $("#full_value").keyup(function(){
          var full_value=parseInt($(this).val()?$(this).val():0);
          var resell_value=parseInt($('#resell_value').val()?$('#resell_value').val():0); 
          if(full_value >= resell_value)
          {
            $(this).css('border','1px solid seagreen');
          }
          else
          {
            $(this).css('border','1px solid red')
          }
          $("#amortization_total").val(full_value-resell_value);
        });

        $("#resell_value").keyup(function(){
          var resell_value=parseInt($(this).val()?$(this).val():0);
          var full_value=parseInt($('#full_value').val()?$('#full_value').val():0); 
          if(full_value >= resell_value)
          {
            $(this).css('border','1px solid seagreen');
          }
          else
          {
            $(this).css('border','1px solid red');
          }
          $("#amortization_total").val(full_value-resell_value);
        });

        $("#amortization_day_per_month").keyup(function(){
            var amortization_total=parseInt($('#amortization_total').val()?$('#amortization_total').val():0);
            var amortization_day_per_month=parseInt($(this).val()?$(this).val():0);
            if(amortization_total>=amortization_day_per_month)
            {
              $(this).css('border','1px solid seagreen');
            }
            else
            {
              $(this).css('border','1px solid red')
            }
            $("#amortization_value_per_day").val(parseInt(amortization_total/(amortization_day_per_month*36)/1000)*1000);
        });

        $('#rides_per_day_for_taxi').change(function(){
            var  rides_per_day_for_taxi=parseInt($(this).val()?$(this).val():0);
            var amortization_value_per_day=parseInt($("#amortization_value_per_day").val()?$("#amortization_value_per_day").val():0);
            $("#taxi_value").val(parseInt( amortization_value_per_day/rides_per_day_for_taxi/1000)*1000);
        }); 
        $('#rides_per_day_for_tour').change(function(){
          var  rides_per_day_for_tour=parseInt($(this).val()?$(this).val():0);
          var amortization_value_per_day=parseInt($("#amortization_value_per_day").val()?$("#amortization_value_per_day").val():0);
          $("#tour_value").val(parseInt( amortization_value_per_day/rides_per_day_for_tour/1000)*1000);
        }); 
        $('#rides_per_day_for_airport_transfer').change(function(){
          var  rides_per_day_for_airport_transfer=parseInt($(this).val()?$(this).val():0);
          var amortization_value_per_day=parseInt($("#amortization_value_per_day").val()?$("#amortization_value_per_day").val():0);
          $("#airport_transfer_value").val(parseInt( amortization_value_per_day/rides_per_day_for_airport_transfer/1000)*1000);
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




