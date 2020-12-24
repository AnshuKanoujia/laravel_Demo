@extends('genral.layouts.mainlayout')
@section('title') <title>All Rental Bookings </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           All Rental Booking 
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
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <!-- <h3 class="box-title">All Rental Bookings</h3>  -->
                  <div class="pull-left alertmessage"></div>
                </div>
                <div class="box-body">
                @if(isset($all_rental_bookings))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Total Rental Amount</th>
                        <th>Request Type</th>
                        <th>Booking</th>
                        <!-- <th>Description</th> -->
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Booking Date</th>
                        <th>Booking Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($all_rental_bookings as $value)
                      <tr id="row_{{$value->id}}">
                        <td>{{$value->guest_name}}<!--<br/>{{$value->guest_email}}--></td>
                        <td  style=" text-align:center; " >{{$value->guest_mobile}}</td>
                        <td>{{$value->amount}} </td>
                        <td>{{ucfirst($value->request_type)}} </td>
                        <td>{{ucfirst($value->booking_type)}} </td>
                        <!-- <td>{{$value->description}}</td> -->
                        <td>{{date("F j, Y,h:i A",strtotime($value->start_date_time))}}</td>
                        <td>{{date("F j, Y,h:i A",strtotime($value->end_date_time))}}</td>
                        <td>{{date("F j, Y",strtotime($value->created_at))}}</td>
                        <td class="status" >
                        @if($value->booking_status=='1') <span class="btn btn-primary btn-xs btn-block">New</span> 
                        @elseif($value->booking_status=='2') <span class="btn btn-warning btn-xs btn-block">Alloted</span>
                        @elseif($value->booking_status=='3') <span class="btn btn-success btn-xs btn-block">Returned</span>
                        @else <span class="btn btn-primary btn-xs btn-block">New</span>
                        @endif
                        </td>
                        <td>
                          <select  onchange="update_status(this,'{{$value->id}}','{{$value}}')">
                          <option value="">Status</option>
                          <option @if($value->booking_status=='1') selected @endif value="1" >New</option>
                          <option @if($value->booking_status=='2') selected @endif value="2">Allot</option>
                          <option @if($value->booking_status=='3') selected @endif value="3">Return</option>
                          </select>
                        </td>
                      </tr>
                      @endforeach
                                            
                    </tbody>
                   
                  </table>
                  

                  @else
                  <h5 class="box-title text-danger">There is no data.</h3>
                  @endif
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
       

      </div><!-- /.content-wrapper -->




   <!-- modal of Accessory  Alloted-->
   <div class="modal fade" id="rental_accessory_alloted_modal" role="dialog">
        <div class="modal-dialog modal-xs">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Booking Allotment</h4>
            </div>
            <div class="modal-body">
            <form role="form"  action="javascript:void(0)" id="rental_accessory_alloted_form" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="box-body">
                        <input type="hidden" id="status_value">
                        <input type="hidden" id="class_">
                        <input type="hidden" id="booking_status">
                        <input type="hidden"  id="rowId" name="rowId">
                        <div class="col-md-6">
                           <label for="accessories_list">Accessories</label>
                           <p class="accessories_list"></p>
                        </div>
                        <div class="colmd-6">
                           <label for="bookingamount">Booking Amount</label>
                           <p class="bookingamount"></p>
                        </div>
                        <input type="hidden" name="alloted_accessories" id="alloted_accessories">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alloted_date">Allotment Date</label>
                                <input type="text" class="form-control" required value="{{date('Y-m-d')}}" id="alloted_date" name="alloted_date" >
                            </div>
                            <div class="form-group">
                                <!-- <input type="hidden"  id="booking_request_id" name="booking_request_id"> -->
                                <label for="advanced_amount">Advanced Amount</label>
                                <input type="text" class="form-control" maxlength="12"  onkeypress="return restrictAlphabets(event);"  required  id="advanced_amount"  name="advanced_amount" placeholder="Advanced Amount">
                                 
                            </div>
                            <input type="radio" name="terms" class="flat-red"  value="1" />&nbsp;
                            Yes  i make sure . all booking formalties  have been completed.
                            
                        </div>
                        <div class="box-footer">
                          <span class="pull-left alertmessage"></span>
                          <button type="submit" class="btn btn-primary next-step pull-right">Alloted </button>
                        </div>

                     </div>
                  </form>
            </div>
            <div class="modal-footer">
              <!-- <button class="data-dismiss">x</button> -->
            </div>

          </div>
        </div>
    </div>

      <!-- modal of Accessory  Returned-->
   <div class="modal fade" id="rental_accessory_returned_modal" role="dialog">
        <div class="modal-dialog modal-xs">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Booking Return</h4>
            </div>
            <div class="modal-body">
            <form role="form"  action="javascript:void(0)" id="rental_accessory_returned_form" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="box-body">
                        <input type="hidden" id="status_value">
                        <input type="hidden" id="class_">
                        <input type="hidden" id="booking_status">
                        <input type="hidden"  id="rowId" name="rowId">
                        <div class="col-md-6">
                           <label for="accessories_list">Accessories</label>
                           <p class="accessories_list"></p>
                        </div>
                        <div class="colmd-6">
                           <label for="bookingamount">Booking Amount</label>
                           <p class="bookingamount"></p>
                        </div>
                        <div class="col-md-6">
                           <label for="alloted_date">Alloted Date</label>
                           <p class="alloted_date"></p>
                        </div>
                        <div class="colmd-6">
                           <label for="advanced_amount">Advanced Amount</label>
                           <p class="advanced_amount"></p>
                        </div>
                        <input type="hidden" name="returned_accessories" id="returned_accessories">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="return_date">Return Date</label>
                                <input type="text" class="form-control" required value="{{date('Y-m-d')}}" id="return_date" name="return_date" >
                            </div>
                            <div class="form-group">
                                <input type="hidden"  id="booking_request_id" name="booking_request_id">
                                <label for="paid_amount">Paid Amount</label>
                                <input type="text" class="form-control" maxlength="12" onkeyup="return_paid_onkeyup(this)"  onkeypress="return restrictAlphabets(event);"  required  id="paid_amount"  name="paid_amount" placeholder="Paid Amount">
                                 <b ></b>
                                 
                            </div>
                            <input type="radio" name="terms" class="flat-red"  value="1" /> &nbsp;
                            Yes i make sure  . all  settelement  are done .
                            
                        </div>
                        <div class="box-footer">
                          <span class="pull-left alertmessage"></span>
                          <button type="submit" class="btn btn-primary next-step pull-right">Returned </button>
                        </div>

                     </div>
                  </form>
            </div>
            <div class="modal-footer">
              <!-- <button class="data-dismiss">x</button> -->
            </div>

          </div>
        </div>
    </div>
@endsection


@section('customjs')
   
    <!-- page script -->
    <script type="text/javascript">
    $(document).ready(function(){
            
      $('#rental_accessory_alloted_form').submit(function(event){
        event.preventDefault(); 
        
        // console.log($('#rental_accessory_alloted_form').serialize()); exit; 
        var status_value=$('#rental_accessory_alloted_form #status_value').val(); 
        var class_=$('#rental_accessory_alloted_form #class_').val();
        var booking_status=$('#rental_accessory_alloted_form #booking_status').val();   
        var rowId=$('#rental_accessory_alloted_form #rowId').val(); 
          var formdata=$('#rental_accessory_alloted_form').serialize(); 
              $.ajax({
                    type: "POST",
                    url: "{{url('accessories_alloted')}}",
                    data:formdata,
                    success: function(xhr, status, data){
                      console.log(xhr)
                      // console.log(xhr.success)
                       if(xhr.success){
                        $( '#rental_accessory_alloted_form').each(function(){
                            this.reset(); 
                        }); 
                        $('#rental_accessory_alloted_form .box-footer .alertmessage').html('<span class="text-success text-bold">Request Submitted...</span>');
                         setTimeout(function(){
                          $('#rental_accessory_alloted_modal').modal('hide');
                        }, 2000);
                        update_stat(rowId,status_value,class_,booking_status); 
                      }
                      else{ 
                        $('#rental_accessory_alloted_form .box-footer .alertmessage').html('<span class="text-danger text-bold">GGSomthing event wrong!...</span>'); 
                        } 
                  },
                  error: function(xhr, status, data){ 
                     console.log(xhr);
                    // console.log(xhr.responseJSON.errors);
                      var errorString = '<div class="text-danger text-bold">';
                      $.each(xhr.responseJSON.errors, function( key, value) { 
                        errorString += value[0]+'| ';
                      }); 
                      errorString += '</div>';
                      $('#rental_accessory_alloted_form .box-footer .alertmessage').html(errorString);
                    }
                });
       });


      /* submit  the  return acc  modal */
       $('#rental_accessory_returned_form').submit(function(event){
        event.preventDefault(); 

        var status_value=$('#rental_accessory_returned_form #status_value').val(); 
        var class_=$('#rental_accessory_returned_form #class_').val();
        var booking_status=$('#rental_accessory_returned_form #booking_status').val();
        var rowId=$('#rental_accessory_returned_form #rowId').val(); 
        var formdata=$('#rental_accessory_returned_form').serialize();

        var advanced_amount=parseInt($('#rental_accessory_returned_form .advanced_amount').html());
        var bookingamount=parseInt($('#rental_accessory_returned_form .bookingamount').html());
        var paid_amount=parseInt($('#rental_accessory_returned_form #paid_amount').val());

        if(paid_amount)
        {
            if(paid_amount==bookingamount)
            {
              $.ajax({
                    type: "POST",
                    url: "{{url('accessories_returned')}}",
                    data:formdata,
                    success: function(xhr, status, data){
                      console.log(xhr)
                      console.log(xhr.success)
                      if(xhr.success)
                      {
                         $( '#rental_accessory_returned_form').each(function(){ this.reset(); }); 
                         $('#rental_accessory_returned_form .box-footer .alertmessage').html('<span class="text-success text-bold">Request Submitted...</span>');
                         setTimeout(function(){ $('#rental_accessory_returned_modal').modal('hide');}, 2000);
                         update_stat(rowId,status_value,class_,booking_status); 
                      }
                      else
                      { 
                         $('#rental_accessory_returned_form .box-footer .alertmessage').html('<span class="text-danger text-bold">Somthing event wrong!...</span>'); 
                      } 
                  },
                  error: function(xhr, status, data){ 
                     console.log(xhr);
                    // console.log(xhr.responseJSON.errors);
                      var errorString = '<div class="text-danger text-bold">';
                      $.each(xhr.responseJSON.errors, function( key, value) { 
                        errorString += value[0]+'| ';
                      }); 
                      errorString += '</div>';
                      $('#rental_accessory_returned_form .box-footer .alertmessage').html(errorString);
                    }
                });
            } 
            else
            { 
              $('#rental_accessory_returned_form #paid_amount').css('border','1px solid  red');  
              $('#rental_accessory_returned_form b').html('<span class="text-danger">Paid Amount Must Be Equal To Booking Amount.. </span>');
            }
        }
        else
        {
          $('#rental_accessory_returned_form #paid_amount').css('border','1px solid  red');  
          $('#rental_accessory_returned_form b').html('<span class="text-danger">Paid Full Booking Amount.. </span>');
        }
        
        
        
       });


    }); 

  
  function return_paid_onkeyup(event)
  { 
      //  alert($(event).val()); exit; 
        var advanced_amount=parseInt($('#rental_accessory_returned_form .advanced_amount').html());
        var bookingamount=parseInt($('#rental_accessory_returned_form .bookingamount').html());
        var paid_amount=parseInt($(event).val());

        if(paid_amount)
        {
            if(paid_amount==bookingamount)
            {
               if(advanced_amount)
               {
                  if(advanced_amount > bookingamount )
                  {
                    $('#rental_accessory_returned_form #paid_amount').css('border','1px solid green');  
                    $('#rental_accessory_returned_form b').html('<span class="text-success"> Returned '+(advanced_amount-bookingamount)+' For Customer.. </span>');
                  }
                  else if(advanced_amount < bookingamount)
                  {
                    $('#rental_accessory_returned_form #paid_amount').css('border','1px solid green');  
                    $('#rental_accessory_returned_form b').html('<span class="text-success"> '+(bookingamount-advanced_amount)+' Taken  to  Customer.. </span>');
                  }
                  else
                  {
                    $('#rental_accessory_returned_form #paid_amount').css('border','1px solid green');  
                    $('#rental_accessory_returned_form b').html('<span class="text-success"> Paid '+paid_amount+' Amount.. </span>');
                  }

               }
               else
               {
                $('#rental_accessory_returned_form #paid_amount').css('border','1px solid green');  
                $('#rental_accessory_returned_form b').html('<span class="text-success"> Paid '+paid_amount+' Amount.. </span>');
                
               }
            } 
            else
            { 
              $('#rental_accessory_returned_form #paid_amount').css('border','1px solid  red');  
              $('#rental_accessory_returned_form b').html('<span class="text-danger">Paid Amount Must Be Equal To Booking Amount.. </span>');
            }
        }
        else
        {
          $('#rental_accessory_returned_form #paid_amount').css('border','1px solid  red');  
          $('#rental_accessory_returned_form b').html('<span class="text-danger">Paid Full Booking Amount.. </span>');
        }        
  }


      $(function () {

          $('#example1').dataTable({
              "ordering": false,
              "bPaginate": true,
              "bLengthChange": false,
              "bFilter": true,
              "bSort": false,
              "bInfo": true,
              "bAutoWidth": false,
          });

          // check condition  
          
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

        var pickerOptsGeneral = { format: "yyyy-mm-dd", autoclose: true, minView: 2, maxView: 2, todayHighlight: true,startDate:  new Date() };
        $("#alloted_date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
        $('#alloted_date').datetimepicker(pickerOptsGeneral).on('changeDate',function(ev){}); 

        $("#return_date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
        $('#return_date').datetimepicker(pickerOptsGeneral).on('changeDate',function(ev){}); 

      });

     function get_row_data(row_id){ 
       var tempData = [];
      //  console.log(typeof reg);exit;
                $.ajax({ 
                    type: "POST",
                    url: "{{url('get_rental_booking')}}",
                    data: {'row_id':row_id,"_token":"{{ csrf_token() }}"},
                    success: function(result){
                        // return result;
                        tempData.push(result);
                    }
                });
               return tempData;
              
     }
     
     function  update_status(Event,rowId,request_type)
     {  
        if(confirm('Do you want  to  Update status ?'))
          {
            var booking_status='';
            var class_='';
            var status_value=$(Event).val();
             switch(status_value){
                case "1":
                  booking_status = " New ";
                  class_='primary';
                  break;
                case "2":
                  booking_status = " Alloted ";
                  class_='warning';
                  break;
                case "3":
                  booking_status = " Returned ";
                  class_='success';
                  break;
                
                default:
                booking_status=" New ";
                class_='primary';
              }
              var row_=get_row_data(rowId);
              //console.log(row_.request_type); 
              //console.log(row_[0]); 
              var myJSON = JSON.stringify(row_);
               console.log(row_);
              //  console.log(row_[[0]]);
               console.log(row_[0]); 
              //  

              var row_data=JSON.parse(request_type); 
              
               if(status_value=='2' && (row_data.request_type=='bike' ||  row_data.request_type=='accessories'))
                {
                      $('#rental_accessory_alloted_modal #rowId').val(rowId);
                      $('#rental_accessory_alloted_modal #status_value').val(status_value);
                      $('#rental_accessory_alloted_modal #class_').val(class_);
                      $('#rental_accessory_alloted_modal #booking_status').val(booking_status);

                      $('#rental_accessory_alloted_modal #alloted_accessories').val(row_data.accessories);

                      $('.accessories_list').html(row_data.accessories); 
                      $('.bookingamount').html(row_data.amount);
                      
                      $('#alloted_date').val((row_data.alloted_date!=null)?row_data.alloted_date:moment(new Date()).format('YYYY-MM-DD'));
                      $('#advanced_amount').val((row_data.advanced_amount!=null)?row_data.advanced_amount:'0');

                      $("#rental_accessory_alloted_modal").modal(); 
                }
                else if(status_value=='3' && (row_data.request_type=='bike' || row_data.request_type=='accessories'))
                {
                      $('#rental_accessory_returned_modal #rowId').val(rowId);
                      $('#rental_accessory_returned_modal #status_value').val(status_value);
                      $('#rental_accessory_returned_modal #class_').val(class_);
                      $('#rental_accessory_returned_modal #booking_status').val(booking_status);

                      $('#rental_accessory_returned_modal #returned_accessories').val(row_data.accessories);

                      $('.accessories_list').html(row_data.accessories); 
                      $('.bookingamount').html(row_data.amount);
                      $('.alloted_date').html((row_data.alloted_date)?row_data.alloted_date:'--'); 
                      $('.advanced_amount').html((row_data.advanced_amount!=null)?row_data.advanced_amount:'0');

                      $('#return_date').val((row_data.return_date!=null)?row_data.return_date:moment(new Date()).format('YYYY-MM-DD'));
                      $('#paid_amount').val((row_data.paid_amount!=null)?row_data.paid_amount:'0');

                      $("#rental_accessory_returned_modal").modal(); 
                }
                else
                {
                      // alert('free case '); 
                      update_stat(rowId,status_value,class_,booking_status);  
                }
          }
          else
          {
            console.log(" this  for  prevent ") 
          }
     }
      
// ab 
       //     restrict Alphabets  
       function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8 ||
            (x>=35 && x<=40)|| x==46)
            return true;
          else
            return false;
      }


      function  update_stat(rowId,status_value,class_,booking_status)
      {
          // alert('rowId :'+rowId+'--status_value : '+status_value+' class_ '+class_+' booking_status '+booking_status);exit;  
          $.ajax({ 
                    type: "POST",
                    url: "{{url('update_rental_status')}}",
                    data: {'row_id':rowId,'status_value':status_value,"_token":"{{ csrf_token() }}"},
                    success: function(result){
                        console.log(result);
                        if(result=='200'){
                          // $('#row_'+rowId+' .status').html("hello  Pradeep"); 
                          $('#row_'+rowId+' .status').html('<span class="btn btn-'+class_+' btn-xs btn-block" >'+booking_status+'</span>');
                          // remove
                          $('.box-header .alertmessage').html('<span class="text-success text-bold">Status '+booking_status+' updated ...</span>'); 
                          
                        }
                        else{ 
                          $('.box-header .alertmessage').html('<span class="text-danger text-bold">Somthing event wrong!...</span>'); 
                        }
                    }
                });
      }


    </script>
@endsection




