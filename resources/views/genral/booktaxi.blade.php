@extends('genral.layouts.mainlayout')
@section('title') 

<title>Vehicle </title>
<style>
.cost-title{
   /*  padding: 15px;
    font-size: 21px;
    margin-bottom: 25px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px; */
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
           Add Vehicle  
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
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
                <form role="form" action="{{url('addtaxi')}}" method="post">
                {{ csrf_field() }}

                  <!-- Start OF The  Copy  Html  -->
                  <div class="box-body clearfix">
                        <div class="cost-title">General Specification </div> 
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="title">Vehicle  Title</label>
                              <input type="text" class="form-control" required id="title" name="title" placeholder="Name">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="make">Made</label>
                                <input type="text" placeholder="Enter Made" name="make" required id="make" list="madelist" class="form-control">
                                <datalist id="madelist">
                                  <option   value="Maruti Suzuki">Maruti Suzuki</option>
                                  <option   value="Hyundai">Hyundai</option>
                                  <option   value="BMW">BMW</option>
                                  <option   value="Volvo">Volvo</option>
                                  <option   value="Toyota">Toyota</option>
                                  <option   value="Honda">Honda</option>
                                </datalist>
                               
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" class="form-control"  required id="model" name="model" list="modellist" placeholder="Enter Model">
                                <datalist id="modellist">
                                  <option   value="Aura">Aura</option>
                                  <option   value="Baleno">Baleno</option>
                                  <option   value="Eeco">Eeco</option>
                                  <option   value="Creta">Creta</option>
                                  <option   value="Xcent 2020">Xcent 2020</option>
                                  <option   value="Creta 2020">Creta 2020</option>
                                  <option   value="Innova">Innova</option>
                                  <option   value="Fortuner">Fortuner</option>
                                  <option   value="S60 2019">S60 2019</option>
                                  <option   value="XC60">XC60</option>
                                  <option   value="M Series">M Series</option>
                                </datalist>
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="model_year">Model Year</label>
                                <select class="form-control" required id="model_year" name="model_year">
                                  <option   value="">--Select Model Year--</option>
                                  <?php $year = date('Y'); $last_year=date('Y')-30; ?>
                                    @for ($i = $last_year; $i <= $year ; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                  
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" required id="category" name="category" placeholder="Category">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="luggage">Luggage</label>
                              <select class="form-control" id="luggage" required name="luggage">
                              <option   value="">--Luggage--</option>
                              <option   value="1">Yes</option>
                              <option   value="0">No</option>
                            </select>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="seat">Number of Seat</label>
                                <input type="text" class="form-control"  maxlength="2" onkeypress="return restrictAlphabets(event);"  required id="seats" name="seats" placeholder="Seats">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="taxino">Taxi Number</label>
                              <input type="text" class="form-control" required id="taxi_no" name="taxi_no" placeholder="Taxi Number">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="registration_no">Registration Number</label>
                                <input type="text" class="form-control"  required id="registration_no" name="registration_no" placeholder="Registration Number">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                              <label for="account_number">Banana Account Number</label>
                              <input type="text" class="form-control" maxlength="20"  required id="account_number" name="account_number" placeholder="Account  Number..">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-8 col-lg-8">
                            <div class="form-group">
                            <label for="description">Banana Account Description</label>
                                <textarea name="description" required id="description" class="form-control" placeholder="Enter Description" cols="30" rows="2" style="resize:none;"></textarea>
                            </div>
                          </div>


                    </div>

                    <div class="box-body clearfix">
                        <div class="cost-title">Financial Info</div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label for="full_value">Full Value</label>
                                  <input type="text" class="form-control"  maxlength="50"  onkeypress="return restrictAlphabets(event);"  required id="full_value" name="full_value" placeholder="Full Value">
                              </div>
                          </div>
                          
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="amortization_gap">Amortization Gap Year</label>
                              <input type="text" class="form-control" minlength="1" maxlength="50"  onkeypress="return restrictAlphabets(event);"  required id="amortization_gap" name="amortization_gap" placeholder="Amortization Gap ">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="resell_value">Resell  Value </label>
                              <input type="text" class="form-control"  maxlength="50"  onkeypress="return restrictAlphabets(event);"  required id="resell_value" name="resell_value" placeholder="Resell  Value">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label for="amortization_total">Amortization Total</label>
                                  <input type="text" class="form-control"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="amortization_total" name="amortization_total" placeholder="Amortization Total">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="amortization_day_per_month">Amortization Day Per Month</label>
                                <input type="text" class="form-control"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="amortization_day_per_month" name="amortization_day_per_month" placeholder="Amortization Day Per Month">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="amortization_value_per_day">Amortization Value  Per  Day</label>
                                <input type="text" class="form-control"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="amortization_value_per_day" name="amortization_value_per_day" placeholder="Amortization Value  Per  Day">
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
                                  <option value="{{$i}}">{{$i}}</option>
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
                                  <option value="{{$i}}">{{$i}}</option>
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
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="taxi_value">Value Per Day (Taxi)</label>
                                <input type="text" class="form-control"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="taxi_value" name="taxi_value" placeholder="Taxi Value Per Day">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="tour_value">Value Per Day (Tour)</label>
                                <input type="text" class="form-control"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="tour_value" name="tour_value" placeholder="Taxi Value Per Day">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="airport_transfer_value">Value Per Day (Airport Transfer)</label>
                                <input type="text" class="form-control"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="airport_transfer_value" name="airport_transfer_value" placeholder="Airport Transfer Value Per Day">
                              </div>
                          </div>
                          <div class="col-sm-offset-6 col-md-offset-8 col-lg-offset-9 col-sm-6 col-md-4 col-lg-3">
                               <br/>
                               <button type="submit" class="btn btn-primary btn-block">Add A Vehicle</button>
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



         <!-- Main content -->
         <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Vehicle List</h3>  <div class="pull-right alertmessage"></div> 
                </div><!-- /.box-header -->
                <div class="box-body">
                @if(isset($all_taxies))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Taxi No</th>
                        <th>Registration</th>
                        <th>Luggage</th>
                        <th>Seat</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($all_taxies as $value)
                     @if($value->taxi_owner=='self')
                      <tr id="row_{{$value->id}}">
                        <td>{{$value->title}}</td>
                        <td>{{$value->make}}</td>
                        <td>{{$value->model}}</td>
                        <td>{{$value->taxi_no}}</td>
                        <td>{{$value->registration_no}}</td>
                        <td>@if($value->luggage=='1')  {{'YES'}} @elseif($value->luggage=='0') {{'NO'}} @endif</td>
                        <td>{{$value->seats}}</td>
                        <td><a href="javascript:void(0);" title="delete" onclick="delete_taxi('{{$value->id}}');"  ><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;<a href="{{url('edit_taxi/'.$value->id)}}" title="edit" ><i class="fa fa-edit text-success"></i></a></td>
                      </tr>
                      @endif
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
    


    <!-- page script -->
    <script type="text/javascript">

      //     restrict Alphabets  
      function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8 ||
            (x>=35 && x<=40)|| x==46)
            return true;
          else
            return false;
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

      

      
      function delete_taxi(rowId)
      {
          if(confirm('Do you want  to  delete this?'))
          {
              $.ajax({
                  type: "POST",
                  url: "{{url('delete_taxi')}}",
                  data: {'row_id':rowId,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      //console.log(result);
                      if(result=='200'){
                        $('#row_'+rowId).remove(); 
                        $('.alertmessage').html('<span class="text-success">Taxi deleted...</span>');  
                      }
                      else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  }
              });
          }
      }

    </script>
@endsection




