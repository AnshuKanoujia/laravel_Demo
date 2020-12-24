@extends('genral.layouts.mainlayout')
@section('title') <title>Flights </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Update Flight 
            <small>New</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a >Forms</a></li>
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
                <form role="form" action="{{url('update_flight/'.$get_flight->id)}}" method="post" autocomplete="on" >
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="flight_no">Flight No</label>
                              <input type="text" class="form-control" required maxlength="20" id="flight_no" value="{{ $get_flight->flight_no}}" name="flight_no" placeholder="Flight No">
                            </div>
                            <div class="form-group">
                              <label for="flight_from">Flight From</label>
                              <input type="text" class="form-control" required id="flight_from" maxlength="40" onkeypress="return restrictNumerics(event);"  value="{{ $get_flight->flight_from}}" name="flight_from" placeholder="Flight From">
                            </div>
                            <div class="form-group">
                                <label for="flight_to">Flight To</label>
                                <input type="text" class="form-control" id="flight_to" maxlength="40" onkeypress="return restrictNumerics(event);" required value="{{ $get_flight->flight_to}}" name="flight_to" placeholder="Flight To">
                            </div>
                            
                            
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                  <label for="service_provider">Air Transport Service Provider</label>
                                  

                                  <input type="text" class="form-control" value="{{$get_flight->service_provider}}" id="service_provider" required name="service_provider"  list="providerList">
                              <datalist id="providerList">
                                    <option   value="Air India" @if($get_flight->service_provider=='Air India') {{ 'selected' }} @endif>Air India</option>
                                    <option   value="Air India Express" @if($get_flight->service_provider=='Air India Express') {{ 'selected' }} @endif >Air India Express</option>
                                    <option   value="AirAsia India" @if($get_flight->service_provider=='AirAsia India') {{ 'selected' }} @endif >AirAsia India</option>
                                    <option   value="GoAir" @if($get_flight->service_provider=='GoAir') {{ 'selected' }} @endif >GoAir</option>
                                    <option   value="IndiGo" @if($get_flight->service_provider=='IndiGo') {{ 'selected' }} @endif >IndiGo</option>
                                    <option   value="SpiceJet" @if($get_flight->service_provider=='SpiceJet') {{ 'selected' }} @endif >SpiceJet</option>
                                    <option   value="Vistara" @if($get_flight->service_provider=='Vistara') {{ 'selected' }} @endif >Vistara</option>
                                    <option   value="Quikjet Airlines" @if($get_flight->service_provider=='Quikjet Airlines') {{ 'selected' }} @endif >Quikjet Airlines</option>
                                    <option   value="Blue Dart Aviation" @if($get_flight->service_provider=='Blue Dart Aviation') {{ 'selected' }} @endif >Blue Dart Aviation</option>
                                    <option   value="SpiceXpress" @if($get_flight->service_provider=='SpiceXpress') {{ 'selected' }} @endif >SpiceXpress</option>
                              </datalist>

                              </div>
                              <div class="bootstrap-timepicker">
                              <div class="form-group">
                                <label for="departure_time">Departure Time</label>
                                <input type="text" class="form-control timepicker" required id="departure_time" value="{{ $get_flight->departure_time}}" name="departure_time" placeholder="Departure Time">
                              </div>
                              </div>
                              <div class="bootstrap-timepicker">
                              <div class="form-group">
                                <label for="arrival_time">Arrival Time</label>
                                <input type="text" class="form-control timepicker" required id="arrival_time" value="{{ $get_flight->arrival_time}}" name="arrival_time" placeholder="Arrival Time">
                              </div>
                              </div>

                              
                    </div>
                 </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update Flight</button>
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

      /* Restriction for Numeric value  */
        
      function restrictNumerics(e){
        var x=e.which||e.keycode; 
        if((x>=65 && x<=90) || x==8 ||
        (x>=97 && x<=122)|| x==95 || x==32)
        return true;
        else
        return false;
      }
      
      $(function () {
         //Timepicker
         $(".timepicker").timepicker({
            showInputs: false,
            showMeridian: false
          });
      });
    </script>

@endsection




