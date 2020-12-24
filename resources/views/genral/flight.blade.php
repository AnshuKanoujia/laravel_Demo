@extends('genral.layouts.mainlayout')
@section('title') <title>Flights </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add Flight 
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
                <form role="form" action="{{url('add_flight')}}" method="post" autocomplete="on" >
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="flight_no">Flight No</label>
                              <input type="text" class="form-control" required maxlength="20" id="flight_no" name="flight_no" placeholder="Flight No">
                            </div>
                            
                            <div class="form-group">
                              <label for="flight_from">Flight From</label>
                              <input type="text" class="form-control" required id="flight_from" maxlength="40" onkeypress="return restrictNumerics(event);"  name="flight_from" placeholder="Flight From">
                            </div>
                            
                            <div class="form-group">
                                <label for="flight_to">Flight To</label>
                                <input type="text" class="form-control" required id="flight_to"  maxlength="40" onkeypress="return restrictNumerics(event);" name="flight_to" placeholder="Flight To">
                            </div>
                        </div>
                        <div class="col-md-6">
                             
                            <div class="form-group">
                              <label for="service_provider">Air Transport Service Provider</label>
                              <input type="text" class="form-control" id="service_provider" required name="service_provider"  list="providerList">
                              <datalist id="providerList">
                                 <option   value="Air India">Air India</option>
                                 <option   value="Air India Express">Air India Express</option>
                                 <option   value="AirAsia India">AirAsia India</option>
                                 <option   value="GoAir">GoAir</option>
                                 <option   value="IndiGo">IndiGo</option>
                                 <option   value="SpiceJet">SpiceJet</option>
                                 <option   value="Vistara">Vistara</option>
                                 <option   value="Quikjet Airlines">Quikjet Airlines</option>
                                 <option   value="Blue Dart Aviation">Blue Dart Aviation</option>
                                 <option   value="SpiceXpress">SpiceXpress</option>
                              </datalist>
                              </div>
                    
                              <div class="bootstrap-timepicker">
                              <div class="form-group">
                                <label for="departure_time">Departure Time</label>
                                <input type="text" class="form-control timepicker" required id="departure_time" name="departure_time" placeholder="Departure Time">
                              </div>
                              </div>

                              
                              <div class="bootstrap-timepicker">
                              <div class="form-group">
                                <label for="arrival_time">Arrival Time</label>
                                <input type="text" class="form-control timepicker" required id="arrival_time"  name="arrival_time" placeholder="Arrival Time">
                              </div>
                              </div>

                              
                            
                              
                    </div>
                 </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add New Flight</button>
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
                  <h3 class="box-title">All Flight List</h3>  <div class="pull-right alertmessage"></div> 
                </div><!-- /.box-header -->
                <div class="box-body">
                @if(isset($all_flights))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Flight No</th>
                        <th>Service Provider</th>
                        <th>Flight From</th>
                        <th>Flight To</th>
                        <th>Departure Time</th>
                        <th>Arrival Time</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($all_flights as $value)
                      <tr id="row_{{$value->id}}">
                        <td>{{$value->flight_no}}</td>
                        <td>{{$value->service_provider}}</td>
                        <td>{{$value->flight_from}}</td>
                        <td>{{$value->flight_to}}</td>
                        <td>{{$value->departure_time}}</td>
                        <td>{{$value->arrival_time}}</td>
                        <td><a href="javascript:void(0);" title="delete" onclick="delete_flight({{$value->id}});"  ><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;<a href="{{url('edit_flight/'.$value->id)}}" title="edit" ><i class="fa fa-edit text-success"></i></a></td>
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
@endsection


@section('customjs')
   
<!-- <script src="{{ URL::asset('public/admin/plugins/timepicker/bootstrap-timepicker.min.js')}}" type="text/javascript"></script> -->
    <!-- page script -->
    <script type="text/javascript">

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


      function delete_flight(rowId)
      {
          if(confirm('Do you want  to  delete this?'))
          {
              $.ajax({
                  type: "POST",
                  url: "{{url('delete_flight')}}",
                  data: {'row_id':rowId,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      //console.log(result);
                      if(result=='200'){
                        $('#row_'+rowId).remove(); 
                        $('.alertmessage').html('<span class="text-success">Flight deleted...</span>');  
                      }
                      else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  }
              });
          }
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
    
   
      $(function () {
         $(".timepicker").timepicker({
            showInputs: false,
            showMeridian: false
          });
      });
    </script>

@endsection




