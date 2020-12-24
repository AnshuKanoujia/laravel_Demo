@extends('genral.layouts.mainlayout')
@section('title') <title> Vehicles </title> 
<style>
.bottom-border{ border-bottom:2px solid #3c8dbc; }
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
           Update Vehicle  
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                <form role="form" action="{{url('update_taxi/'.$get_taxi->id)}}" method="post">
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
                        <div class="cost-title">Financial Info</div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="full_value">Full Value</label>
                                <input type="text" class="form-control" value="{{$get_taxi->full_value}}" maxlength="50"  onkeypress="return restrictAlphabets(event);"  required id="full_value" name="full_value" placeholder="Full Value">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="amortization_gap">Amortization Gap Year</label>
                              <input type="text" class="form-control" value="{{$get_taxi->amortization_gap}}"  minlength="1" maxlength="50"  onkeypress="return restrictAlphabets(event);"  required id="amortization_gap" name="amortization_gap" placeholder="Aortization Gap ">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="resell_value">Resell  Value</label>
                              <input type="text" class="form-control"  value="{{$get_taxi->resell_value}}" maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="resell_value" name="resell_value" placeholder="Resell  Value">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="amortization_total">Amortization Total</label>
                                <input type="text" class="form-control"  value="{{$get_taxi->amortization_total}}" maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="amortization_total" name="amortization_total" placeholder="Amortization Total">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="amortization_day_per_month">Amortization Day Per Month</label>
                              <input type="text" class="form-control" value="{{$get_taxi->amortization_day_per_month}}"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="amortization_day_per_month" name="amortization_day_per_month" placeholder="Amortization Day Per Month">
                            </div>
                          </div>
						              <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="amortization_value_per_day">Amortization Value  Per  Day</label>
                              <input type="text" class="form-control" value="{{$get_taxi->amortization_value_per_day}}"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="amortization_value_per_day" name="amortization_value_per_day" placeholder="Amortization Value  Per  Day">
                            </div>
                          </div>
                    </div>

                    <div class="box-body clearfix">
                        <div class="cost-title">Financial Achievement</div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="rides_per_day_for_taxi">Rides Per Day ( Taxi )</label>
                              <select class="form-control" id="rides_per_day_for_taxi" required name="rides_per_day_for_taxi">
                                <option   value="">--Select Per Day--</option>
                                @php($i=1)
                                @for($i=1;$i <=20; $i++)
                                <option value="{{$i}}" @if($get_taxi->rides_per_day_for_tour==$i) selected @endif >{{$i}}</option>
                                @endfor
                              </select>
                            </div>
                          </div>
                          
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="rides_per_day_for_tour">Rides Per Day ( Tour )</label>
                                <select class="form-control" id="rides_per_day_for_tour" required name="rides_per_day_for_tour">
                                  <option   value="">--Select Per Day--</option>
                                  @php($i=1)
                                  @for($i=1;$i <=20; $i++)
                                  <option value="{{$i}}" @if($get_taxi->rides_per_day_for_tour==$i) selected @endif >{{$i}}</option>
                                  @endfor
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="rides_per_day_for_airport_transfer">Rides Per Day ( Airport Transfer )</label>
                              <select class="form-control" id="rides_per_day_for_airport_transfer" required name="rides_per_day_for_airport_transfer">
                                <option   value="">--Select Per Day--</option>
                                @php($i=1)
                                @for($i=1;$i <=20; $i++)
                                <option value="{{$i}}" @if($get_taxi->rides_per_day_for_airport_transfer==$i) selected @endif >{{$i}}</option>
                                @endfor
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="taxi_value">Value Per Day (Taxi)</label>
                              <input type="text" class="form-control" value="{{$get_taxi->taxi_value}}"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="taxi_value" name="taxi_value" placeholder="Taxi Value Per Day">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="tour_value">Value Per Day (Tour)</label>
                              <input type="text" class="form-control" value="{{$get_taxi->tour_value}}"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="tour_value" name="tour_value" placeholder="Taxi Value Per Day">
                            </div>
                          </div>
                          
						              <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="airport_transfer_value">Value Per Day (Airport Transfer)</label>
                              <input type="text" class="form-control" value="{{$get_taxi->airport_transfer_value}}"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="airport_transfer_value" name="airport_transfer_value" placeholder="Airport Transfer Value Per Day">
                            </div>
                          </div>
                          <div class="col-sm-offset-6 col-md-offset-8 col-lg-offset-9 col-sm-6 col-md-4 col-lg-3">
                               <br/>
                               <button type="submit" class="btn btn-primary btn-block">Update Vehicle</button>
                          </div>
                    </div>
                       <!-- End of  The New  Copied Html   -->

                  <!-- <div class="box-body">
                        <div class="col-md-6">
                            
                            <div class="row">
                                 <div class="col-md-6">
                                 </div>
                                 <div class="col-md-6">
                                 </div>
                            </div>


                        </div>
                        <div class="col-md-6">
                            
                           


                              
                              
                        </div>
                 </div> -->
                 <!-- end  of  the Box -->
                 <!-- <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Vehicle</button>
                  </div> -->
                </form>
                </div><!-- /.box-header -->
               
              </div><!-- /.box -->

              

              

              

            

            
          </div>   <!-- /.row -->
        </section><!-- /.content -->



         

      </div><!-- /.content-wrapper -->
@endsection


@section('customjs')
   
<script>

$(document).ready(function(){
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

        // $('#rides_per_day_for_taxi').change(function(){
        //     var  rides_per_day_for_taxi=parseInt($(this).val()?$(this).val():0);
        //     var amortization_value_per_day=parseInt($("#amortization_value_per_day").val()?$("#amortization_value_per_day").val():0);
        //     $("#taxi_value").val(parseInt( amortization_value_per_day/rides_per_day_for_taxi/1000)*1000);
        // }); 
        // $('#rides_per_day_for_tour').change(function(){
        //   var  rides_per_day_for_tour=parseInt($(this).val()?$(this).val():0);
        //   var amortization_value_per_day=parseInt($("#amortization_value_per_day").val()?$("#amortization_value_per_day").val():0);
        //   $("#tour_value").val(parseInt( amortization_value_per_day/rides_per_day_for_tour/1000)*1000);
        // }); 
        // $('#rides_per_day_for_airport_transfer').change(function(){
        //   var  rides_per_day_for_airport_transfer=parseInt($(this).val()?$(this).val():0);
        //   var amortization_value_per_day=parseInt($("#amortization_value_per_day").val()?$("#amortization_value_per_day").val():0);
        //   $("#airport_transfer_value").val(parseInt( amortization_value_per_day/rides_per_day_for_airport_transfer/1000)*1000);
        // }); 

        $('#rides_per_day_for_taxi').change(function(){
            var  rides_per_day_for_taxi=parseInt($(this).val()?$(this).val():0);
            var amortization_value_per_day=parseInt($("#amortization_value_per_day").val()?$("#amortization_value_per_day").val():0);
            if(rides_per_day_for_taxi && amortization_value_per_day){
              $("#taxi_value").val(parseInt( amortization_value_per_day/rides_per_day_for_taxi/1000)*1000);
            }
            else
            {
             $("#taxi_value").val(""); 
            }
          
        }); 
        $('#rides_per_day_for_tour').change(function(){
          var  rides_per_day_for_tour=parseInt($(this).val()?$(this).val():0);
          var amortization_value_per_day=parseInt($("#amortization_value_per_day").val()?$("#amortization_value_per_day").val():0);
          if(amortization_value_per_day && rides_per_day_for_tour){

            $("#tour_value").val(parseInt( amortization_value_per_day/rides_per_day_for_tour/1000)*1000);
          }
          else
          {
            $("#tour_value").val("");
          }
        }); 
        $('#rides_per_day_for_airport_transfer').change(function(){
          var  rides_per_day_for_airport_transfer=parseInt($(this).val()?$(this).val():0);
          
          var amortization_value_per_day=parseInt($("#amortization_value_per_day").val()?$("#amortization_value_per_day").val():0);
          if(amortization_value_per_day && rides_per_day_for_airport_transfer){

          $("#airport_transfer_value").val(parseInt( amortization_value_per_day/rides_per_day_for_airport_transfer/1000)*1000);
          }
          else
          {
            $("#airport_transfer_value").val("");
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




