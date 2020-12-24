@extends('genral.layouts.mainlayout')
@section('title') <title>Rental Booking  </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           New Rental Booking 
            <small>Preview</small>
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
                <form role="form" action="{{url('add_rental_bookings')}}" method="post"  enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="start_date">Start Date<i style="color:red;">*</i></label>
                                       <input type="text" class="form-control" required id="start_date" name="start_date" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bootstrap-timepicker">
                                      <label for="start_time">Start Time <i style="color:red;">*</i></label>
                                      <input type="text" class="form-control" required id="start_time" name="start_time" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="guest_name">Guest Name <i style="color:red;">*</i></label>
                              <input type="text" class="form-control" onkeypress="return restrictNumerics(event);" required id="guest_name" name="guest_name" placeholder="Guest  Name">
                            </div>
                            
                            

                            <div class="form-group tgInptW">
                                <label for="accessories ">Accessories <i style="color:red;">*</i></label>
                                <input type="text" class="form-control" onchange="set_price_to_sku()" data-role="tagsinput"  id="accessories " name="accessories" placeholder="Accessories">
                                
                              </div>
                              <datalist id="sku_list"> 
                                 @if(count($all_stock_accesory) > 0 )
                                    @foreach($all_stock_accesory as $value)
                                    <option value="{{$value->sku}}">{{$value->type_of_product}} : Price : {{$value->amount}}</option>
                                    @endforeach
                                 @endif
                                </datalist> 
                              <div class="form-group">
                                <label for="total_amount">Total Rental Amount <i style="color:red;">*</i>  </label>
                                <input type="text" class="form-control"  id="total_amount" maxlength="7" required minlength="1" onkeypress="return restrictAlphabets(event);"   name="total_amount"> 
                              </div>
                           
                            
                        </div>
                        <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="end_date">End Date (Return)<i style="color:red;">*</i></label>
                                        <input type="text" class="form-control" required id="end_date" name="end_date" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bootstrap-timepicker">
                                        <label for="end_time"> End Time (Return)<i style="color:red;">*</i></label>
                                        <input type="text" class="form-control" required id="end_time" name="end_time" >
                                        </div>
                                    </div>
                                </div>
                              <div class="form-group">
                                <label for="guest_email">Email<i style="color:red;">*</i> </label>
                                <input type="email" class="form-control" required id="guest_email" name="guest_email" placeholder="Guest Email..">
                              </div>

                              <div class="form-group">
                              <label for="mobile">Mobile <i style="color:red;">*</i></label>
                              <input type="text" class="form-control"  id="mobile" name="mobile" maxlength="10" required minlength="10" onkeypress="return restrictAlphabets(event);"  placeholder="Mobile..">
                            </div>
                            
                            <div class="form-group">
                              <label for="request_type">Request Type <i style="color:red;">*</i></label>
                              <select class="form-control" name="request_type" required id="request_type">
                                 <option   value=""  >-- Select request type--</option>
                                 <option   value="bike"  >Bike</option>
                                 <option   value="accessories"  >Accessories</option>
                              </select>
                            </div>
                            <input type="hidden" name="booking_type" value="custom" id="booking_type">
                            
                              
                        </div>
                        <div class="col-md-12">
                              <div class="form-group">
                                <label for="description">Description </label>
                                <textarea name="description"  class="form-control"  id="description" cols="30" style="resize:none;" rows="4"></textarea>
                              </div>
                        </div>
                 </div>
                 <div class="box-footer text-center">
                    <button type="submit" class="btn btn-primary">Book For Rental</button>
                  </div>
                </form>
                </div><!-- /.box-header -->
               
              </div><!-- /.box -->
            
          </div>   
           
        </section><!-- /.content -->


      
       

      </div><!-- /.content-wrapper -->
@endsection


@section('customjs')
    
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        var pickerOptsGeneral = { format: "yyyy-mm-dd", autoclose: true, minView: 2, maxView: 2, todayHighlight: true,startDate:  new Date() };
        $("#start_date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
        $('#start_date').datetimepicker(pickerOptsGeneral).on('changeDate',function(ev){}); 

        $("#end_date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
        $('#end_date').datetimepicker(pickerOptsGeneral).on('changeDate',function(ev){}); 
        
        $('#start_time').timepicker({  showInputs: false ,showMeridian:false});
        $('#end_time').timepicker({  showInputs: false,showMeridian:false });

        $('input[data-role="tagsinput"]').tagsinput();
        //  for  dynamic list 
        $('.bootstrap-tagsinput input').attr('list','sku_list'); 

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

      /* Restriction for Numeric value  */
        
    function restrictNumerics(e){
        var x=e.which||e.keycode; 
        if((x>=65 && x<=90) || x==8 ||
        (x>=97 && x<=122)|| x==95 || x==32)
        return true;
        else
        return false;
      }

    function  set_price_to_sku()
    {
        
        var  inputdata=$('input[data-role="tagsinput"]').tagsinput('items').toString();
        // console.log(inputdata)
        if(inputdata)
        {
          
          $.ajax({
                  type: "POST",
                  url: "{{url('get_price_by_sku')}}",
                  data: {'inputdata':inputdata,"_token":"{{csrf_token()}}"},
                  success: function(xhr, status, data){
                      console.log(xhr.success+'--'+xhr.price); 
                      if(xhr.success)
                      {
                        $('#total_amount').val(xhr.price); 
                        //$('.alertmessage').html('<span class="text-success text-bold">Booking deleted...</span>');  
                      }
                      else
                      { 
                        $('.alertmessage').html('<span class="text-danger text-bold">Somthing event wrong!...</span>'); 
                      }
                  }
            });
        }
        else
        {
           $('#total_amount').val(0); 
        } 
           
    }
    </script>
@endsection




