@extends('genral.layouts.mainlayout')
@section('title') 

<title>Third Party Vehicle </title>
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
           Third Party Vehicle 
            <small>Add</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a>Forms</a></li>
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
                <form role="form" action="{{url('add_third_party_vehicle')}}" method="post">
                {{ csrf_field() }}

                  <!-- Start OF The  Copy  Html  -->
                  <div class="box-body clearfix">
                        <div class="cost-title">General Specification</div> 
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
                                <label for="model_year">Year Model</label>
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
                              <label for="luggage">Luggage </label>
                              <select class="form-control" id="luggage" required name="luggage">
                              <option   value="">--Luggage --</option>
                              <option   value="1">Yes</option>
                              <option   value="0">No</option>
                            </select>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="seat">No of Seat</label>
                                <input type="text" class="form-control"  maxlength="2" onkeypress="return restrictAlphabets(event);"  required id="seats" name="seats" placeholder="Seats">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="taxino">Taxi No</label>
                              <input type="text" class="form-control" required id="taxi_no" name="taxi_no" placeholder="Taxi no">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="registration_no">Registration No</label>
                                <input type="text" class="form-control"  required id="registration_no" name="registration_no" placeholder="Registration no">
                              </div>
                          </div>
                    </div>

                    <div class="box-body clearfix">
                        <div class="cost-title">Financial +  Third Party Info</div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label for="owner_name">Owner Name</label>
                                  <input type="text" class="form-control"  maxlength="50" onkeypress="return restrictNumerics(event);"   required id="owner_name" name="owner_name" placeholder="Owner Name ">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                              <label for="internal_airport_pickup">Airport  Pickup Price (Inernal)</label>
                              <input type="text" class="form-control"  maxlength="50"  onkeypress="return restrictAlphabets(event);"  required id="internal_airport_pickup" name="internal_airport_pickup" placeholder="(Internal) Airport Pickup Price">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="full_day_price_internal">Full Day Price (Internal)</label>
                                <input type="text" class="form-control"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="full_day_price_internal" name="full_day_price_internal" placeholder="Full Day Price (Internal)">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="owner_phone">Owner Phone </label>
                                <input type="text" class="form-control"  maxlength="10" minlength="10" onkeypress="return restrictAlphabets(event);"   id="owner_phone" name="owner_phone" placeholder="Owner Phone">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label for="external_airport_pickup">Airport  Pickup Price (External)</label>
                                  <input type="text" class="form-control"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="external_airport_pickup" name="external_airport_pickup" placeholder="(External) Airport Pickup Price">
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-4">
                              <div class="form-group">
                                <label for="full_day_price_external">Full Day Price (External)</label>
                                <input type="text" class="form-control"  maxlength="50" onkeypress="return restrictAlphabets(event);"  required id="full_day_price_external" name="full_day_price_external" placeholder="Full Day Price (External)">
                              </div>
                          </div>
                          <div class="col-sm-offset-4 col-md-offset-4  col-lg-offset-4 col-sm-4 col-md-4 col-lg-4">
                            <label>
                                <input type="checkbox" class="minimal" value="1" name="driver_included" />&nbsp;&nbsp; Driver Included
                            </label>
                          </div>
                          <div class="col-sm-4 col-md-4 col-lg-4">
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
                        <th>Owner Info</th>
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
                     @if($value->taxi_owner=='third_party')
                      <tr id="row_{{$value->id}}">
                        <td>Name:{{$value->owner_name}}<br/>Phone:{{$value->owner_phone}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->make}}</td>
                        <td>{{$value->model}}</td>
                        <td>{{$value->taxi_no}}</td>
                        <td>{{$value->registration_no}}</td>
                        <td>@if($value->luggage=='1')  {{'YES'}} @elseif($value->luggage=='0') {{'NO'}} @endif</td>
                        <td>{{$value->seats}}</td>
                        <td>
                        <a href="javascript:void(0);" title="delete" onclick="delete_taxi({{$value->id}});"  ><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;
                        <a href="{{url('edit_third_party_vehicle/'.$value->id)}}" title="edit" ><i class="fa fa-edit text-success"></i></a>
                        </td>
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
          if((x>=48 && x<=57) || x==8)
            return true;
          else
            return false;
      }
      function restrictNumerics(e){
        var x=e.which||e.keycode; 
        if((x>=65 && x<=90) || x==8 ||
        (x>=97 && x<=122)|| x==95 || x==32)
        return true;
        else
        return false;
      }

      

      
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
                        $('.alertmessage').html('<span class="text-success">Vehicle deleted...</span>');  
                      }
                      else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  }
              });
          }
      }

    </script>
@endsection




