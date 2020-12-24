@extends('genral.layouts.mainlayout')
@section('title') <title>Booking Request </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Booking Request 
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
          <div class="col-md-12 alert_message">
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
          </div>
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <!-- <h3 class="box-title">All Activities Types</h3>  -->
                  <div class="pull-left alertmessage"></div>
                </div>
                <div class="box-body">
                @if(isset($all_request))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Guest</th>
                        <th>Phone</th>
                        <th>Booking Type</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <!-- <th>Booking Date</th> -->
                        <th>Booking Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($all_request as $value)

                      <tr id="row_{{$value->id}}">
                        <td>{{$value->name}}<!--<br/> {{$value->email}}--></td>
                        <td  style=" text-align:center; " >{{$value->contact}}</td>
                        <td>{{ucfirst($value->request_type)}} </td>
                        <td>{{$value->description}}</td>
                        <td>{{date("F j, Y,h:i A",strtotime($value->start_date_time))}}</td>
                        <td>{{date("F j, Y,h:i A",strtotime($value->end_date_time))}}</td>
                        <!-- <td>{{date("F j, Y",strtotime($value->created_at))}}</td> -->
                        <td class="status">
                        @if($value->booking_status=='1') <span class="btn btn-primary btn-xs btn-block" data-row="{{$value->id}}">New</span> 
                        @elseif($value->booking_status=='2') <span class="btn btn-warning btn-xs btn-block" data-row="{{$value->id}}">Inconversation</span>
                        @elseif($value->booking_status=='3') <span class="btn btn-success btn-xs btn-block" data-row="{{$value->id}}">Confirm</span>
                        @elseif($value->booking_status=='4') <span class="btn btn-danger btn-xs btn-block" data-row="{{$value->id}}">Cancel</span>
                        @else <span class="btn btn-primary btn-xs btn-block" data-row="{{$value->id}}">New</span>
                        @endif

                        
                        </td>
                        <td>
                        
                        <select  onchange="update_status(this,'{{$value->id}}','{{$value}}')">
                         <option value="">Status</option>
                         <option @if($value->booking_status=='1') selected @endif value="1" >New</option>
                         <option @if($value->booking_status=='2') selected @endif value="2">Inconversation</option>
                         <option @if($value->booking_status=='3') selected @endif value="3">Confirm</option>
                         <option @if($value->booking_status=='4') selected @endif value="4">Cancel</option>
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


      <div id="rental_booking_modal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                     <label for="booking_title">Rental Booking</label>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                  <form role="form" action="javascript:void(0)" id="rental_booking_form" method="post"  enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">
                            <div class="row">
                                <input type="hidden" id="status_value">
                                <input type="hidden" id="class_">
                                <input type="hidden" id="booking_status">
                                <input type="hidden"  id="rowId">
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <input type="hidden"  id="booking_request_id" name="booking_request_id">
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
                              <input type="text" class="form-control" required id="guest_name" name="guest_name" placeholder="Guest  Name">
                            </div>
                            
                            <div class="form-group tgInptW">
                                <label for="accessories ">Accessories <i style="color:red;">*</i> </label>
                                <input type="text" class="form-control" onchange="set_price_to_sku()"  data-role="tagsinput"   id="accessories " name="accessories" placeholder="accessories">
                                <datalist id="sku_list"> 
                                 @if(count($all_stock_accesory) > 0 )
                                    @foreach($all_stock_accesory as $value)
                                    <option value="{{$value->sku}}">{{$value->type_of_product}} : Price : {{$value->amount}}</option>
                                    @endforeach
                                 @endif
                                </datalist> 
                              </div>
                            <div class="form-group">
                                <label for="total_amount">Total Amount <i style="color:red;">*</i>  </label>
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
                              <input type="text" class="form-control"  id="mobile" maxlength="10" required minlength="10" onkeypress="return restrictAlphabets(event);"   name="mobile" placeholder="Mobile..">
                            </div>
                            
                            <div class="form-group">
                              <label for="request_type">Request Type <i style="color:red;">*</i></label>
                              <select class="form-control" name="request_type" required id="request_type">
                                 <option   value=""  >-- Select request type--</option>
                                 <option   value="bike"  >Bike</option>
                                 <option   value="accessories"  >Accessories</option>
                              </select>
                            </div>
                            <input type="hidden" name="booking_type" value="user" id="booking_type">
                            
                              
                             
                        </div>
                        <div class="col-md-12">
                              <div class="form-group">
                                <label for="description">Description </label>

                                <textarea name="description"  class="form-control"  id="description" cols="30" style="resize:none;" rows="3"></textarea>
                              </div>
                        </div>
                 </div>
                 <div class="box-footer text-center">
                    <span class="pull-left alertmessage"></span>
                    <button type="submit" class="btn btn-primary">Book For Rental</button>
                  </div>
                </form>
                  </div>
                  <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div> -->
              </div>
          </div>
      </div>
      

   <!-- Modal -->
   <div class="modal fade" id="taxi_rental_booking_modal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Book Taxi</h4>
            </div>
            <div class="modal-body">
            <form role="form"  action="javascript:void(0)" id="taxi_rental_booking_form" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="box-body">
                        <input type="hidden" id="status_value">
                        <input type="hidden" id="class_">
                        <input type="hidden" id="booking_status">
                        <input type="hidden"  id="rowId">
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="hidden"  id="booking_request_id" name="booking_request_id">
                              <label for="booking_start_date">Booking Starting Date</label>
                              <input type="text" class="form-control" required value="16/04/2020" id="booking_start_date" name="booking_start_date" readonly>
                           </div>

                           <div class="form-group">
                              <label for="booking_end_date">Booking End Date (Return)</label>
                              <input type="text" class="form-control" required value="16/04/2020" id="booking_end_date" name="booking_end_date" readonly>
                           </div>

                           
                           <div class="form-group">
                              <label for="guest_name">Guest Name</label>
                              <input type="text" class="form-control" required  maxlength="20" id="guest_name"  name="guest_name" placeholder="Guest Name">
                           </div>
                           
                           <div class="form-group">
                              <label for="guest_email">Guest Email</label>
                              <input type="email" class="form-control" maxlength="30" required id="guest_email"  name="guest_email" placeholder="Guest Email">
                           </div>
                           <div class="form-group">
                              <label for="guest_whatsapp">Guest Whatsapp</label>
                              <input type="text" class="form-control" maxlength="12" onkeypress="return restrictAlphabets(event);" required id="guest_whatsapp"  name="guest_whatsapp" placeholder="Guest Whatsapp">
                           </div>
                          
                           <div class="form-group">
                              <label for="special_request">Special Request</label>
                              <textarea class="form-control" name="special_request"  style="resize:none;" rows="2"      id="special_request"  placeholder="special_request ..."></textarea>
                           </div>
                           
                        </div>
                        <div class="col-md-6">
                           
                           <div class="row">
                              <div class="col-md-6">
                                <div class="bootstrap-timepicker">
                                    <div class="form-group bootstrap-timepicker">
                                       <label for="tour_start_time">Trip Start Time</label>
                                       <input type="text" class="form-control timepicker" required id="tour_start_time"   name="tour_start_time" placeholder="Trip Start Time">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="children_below">Children Below</label>
                                    <input type="text" class="form-control" maxlength="5" required  id="children_below" onkeypress="return restrictAlphabets(event);  " name="children_below" placeholder="Children below">
                                 </div>
                              </div>
                              <div class="col-md-6">
                               <div class="bootstrap-timepicker">
                                    <div class="form-group bootstrap-timepicker">
                                       <label for="driver_approx_time">Driver Aprox Time</label> 
                                       <input type="text" class="form-control driver_approx_time" required id="driver_approx_time"   name="driver_approx_time" placeholder="Driver Approx Time">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="passengers">No Of Passengers</label>
                                    <input type="text" class="form-control"  maxlength="20" required id="passengers"  onkeypress="return restrictAlphabets(event);" name="passengers" placeholder="Number of passengers">
                                 </div>
                              </div>
                           </div>
                           
                           <div class="form-group">
                               <label for="destination_address">Booking Type</label>
                              <input type="text" class="form-control" required readonly id="booking_type" list="book_type"  name="booking_type" placeholder="booking_type">
                              <datalist id="book_type"> 
                                    <option value="cab">
                                    <option value="self_drive">
                                </datalist> 
                           </div>
                           <div class="form-group">
                              <label for="source_address">Source Address</label> Or <a href="#" data-toggle="modal" data-target="#source_map_Modal" style="cursor: pointer;">set to  map </a>
                              <!-- <textarea class="form-control" required  style="resize:none;" rows="3" name="source_address" onFocus="geolocate()"   id="source_address"  placeholder="Source Address ..."></textarea> -->

                              <input type="text" class="form-control" onFocus="geolocate()" list="custom_address" required id="source_address"  name="source_address" placeholder="Source Address...">
                              <datalist id="custom_address"> 
                                 @if(count($get_all_address) > 0 )
                                    @foreach($get_all_address as $value)
                                    <option value="{{$value->address}}">
                                    @endforeach
                                 @endif
                                </datalist> 
                                
                           </div>
                           <div class="form-group">
                              <label for="destination_address">Destination address</label> Or <a href="#" data-toggle="modal" data-target="#destination_map_Modal" style="cursor: pointer;">set to  map </a>
                              <!-- <textarea class="form-control" style="resize:none;" rows="3"  name="destination_address" required  onFocus="geolocate2()"  id="destination_address"  placeholder="Destination address ..."></textarea> -->
                              <input type="text" class="form-control" onFocus="geolocate2()" list="custom_address"  required id="destination_address"  name="destination_address" placeholder="Destination address...">
                           </div>
                        </div>
                        <div class="box-footer">
                          <span class="pull-left alertmessage"></span>
                          <button type="submit" class="btn btn-primary next-step pull-right">Booking Now</button>
                          <!-- <button type="submit" class="btn btn-primary pull-right ">Book For Rental</button> -->
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


       <!-- Modal  for Conversation -->
   <div class="modal fade" id="booking_conversation_modal" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Conversation Details</h4>
            </div>
            <div class="modal-body">
            <form role="form"  action="javascript:void(0)" id="booking_conversation_form" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="box-body">
                        <input type="hidden" id="status_value">
                        <input type="hidden" id="class_">
                        <input type="hidden" id="booking_status">
                        <input type="hidden"  id="rowId" name="rowId">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="conversation">Conversation</label>
                              <textarea class="form-control" name="conversation"  style="resize:none;" rows="4" id="conversation"  placeholder="conversation ..."></textarea>
                           </div>
                        </div>
                        
                        <div class="box-footer">
                          <span class="pull-left alertmessage"></span>
                          <button type="submit" class="btn btn-primary next-step pull-right">Submit</button>
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

    <!-- Update Conversation modal  -->
    <div class="modal fade" id="update_booking_conversation_modal" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Conversation Details</h4>
            </div>
            <div class="modal-body">
            <form role="form"  action="javascript:void(0)" id="update_booking_conversation_form" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="box-body">
                        <input type="hidden"  id="rowId" name="rowId">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="conversation">Conversation</label>
                              <textarea class="form-control" name="conversation"  style="resize:none;" rows="4" id="conversation"  placeholder="conversation ..."></textarea>
                           </div>
                        </div>
                        
                        <div class="box-footer">
                          <span class="pull-left alertmessage"></span>
                          <button type="submit" class="btn btn-primary next-step pull-right">Submit</button>
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
    
<div class="modal fade" id="source_map_Modal" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content"  style="position: static;" >
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Select source Address</h4>
         </div>
         <form action="{{url('booking')}}"  method="post" >
            {{ csrf_field() }}
            <div class="modal-body" style="padding:0px; " >
               <div id="myMap" style="height:435px;  width:100%;     position: static; "></div>
               <input id="map_address" type="text" style="width:600px; display:none;"/><br/>
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
<!--  destination Address Modal -->
<div class="modal fade" id="destination_map_Modal" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content" style="position: static; ">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Select  destination Address</h4>
         </div>
         <form action="{{url('booking')}}"  method="post" >
            {{ csrf_field() }}
            <div class="modal-body" style="padding:0px; " >
               <div id="myMap2" style="height:435px;  width:100%;     position: static; "></div>
               <input id="map_address2" type="text" style="width:600px; display:none; "/><br/>
               <input type="hidden" id="latitude2" placeholder="Latitude"/>
               <input type="hidden" id="longitude2" placeholder="Longitude"/>
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
      
    
    
    
    
    
    <!-- page script -->
<script type="text/javascript">

    //  for chnage the Driver Type  And Set  Automaticaly  Rate of the Driver 
$(document).ready(function(){

       
       $('#rental_booking_form').submit(function(event){
        event.preventDefault(); 
        // console.log($('#rental_booking_form').serialize()); 
        var status_value=$('#status_value').val(); 
        var class_=$('#class_').val();
        var booking_status=$('#booking_status').val();
        var rowId=$('#rowId').val(); 
          var formdata=$('#rental_booking_form').serialize(); 
              $.ajax({
                    type: "POST",
                    url: "{{url('rental_booking_by_user')}}",
                    data:formdata,
                    success: function(xhr, status, data){
                      console.log(xhr)
                      // console.log(xhr.success)
                       if(xhr.success){
                        $( '#rental_booking_form form').each(function(){
                            this.reset(); 
                        }); 
                        $('#rental_booking_form .box-footer .alertmessage').html('<span class="text-success text-bold">Request Submitted...</span>');
                         setTimeout(function(){
                          $('#rental_booking_modal').modal('hide');
                        }, 2000);
                        update_stat(rowId,status_value,class_,booking_status); 
                      }
                      else{ 
                        $('#rental_booking_form .box-footer .alertmessage').html('<span class="text-danger text-bold">Somthing event wrong!...</span>'); 
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
                      $('#rental_booking_form .box-footer .alertmessage').html(errorString);
                    }
                });
       }); 


       //  taxi booking  modal  form submission

       $('#taxi_rental_booking_form').submit(function(event){
        event.preventDefault(); 
        // console.log($('#taxi_rental_booking_form').serialize()); 
        var status_value=$('#taxi_rental_booking_form #status_value').val(); 
        var class_=$('#taxi_rental_booking_form #class_').val();
        var booking_status=$('#taxi_rental_booking_form #booking_status').val();
        var rowId=$('#taxi_rental_booking_form #rowId').val(); 
          var formdata=$('#taxi_rental_booking_form').serialize(); 
              $.ajax({
                    type: "POST",
                    url: "{{url('taxi_rental_booking')}}",
                    data:formdata,
                    success: function(xhr, status, data){
                      console.log(xhr)
                      // console.log(xhr.success)
                       if(xhr.success){
                        $( '#taxi_rental_booking_form').each(function(){
                            this.reset(); 
                        }); 
                        
                        $('#taxi_rental_booking_form .box-footer .alertmessage').html('<span class="text-success text-bold">Request Submitted...</span>');
                        
                        setTimeout(function(){
                          $('#taxi_rental_booking_modal').modal('hide');
                        }, 2000);

                        update_stat(rowId,status_value,class_,booking_status); 

                      }
                      else{ 
                        $('#taxi_rental_booking_form .box-footer .alertmessage').html('<span class="text-danger text-bold">Somthing event wrong!...</span>'); 
                        }  
                  },
                  error: function(xhr, status, data){ 
                     console.log(xhr);
                    //  console.log(xhr.responseJSON.errors);
                      var errorString = '<div class="text-danger text-bold"><ul>';
                      $.each(xhr.responseJSON.errors, function( key, value) { 
                        errorString += '<li>'+value[0]+'</li>';
                      });
                      errorString += '</ul></div>';
                      $('#taxi_rental_booking_form .box-footer .alertmessage').html(errorString);

                     }
             });
       });   

       /* Submit  The  Boooking  Conversation Form  */
       $('#booking_conversation_form').submit(function(event){
        event.preventDefault(); 
        var status_value=$('#booking_conversation_form #status_value').val(); 
        var class_=$('#booking_conversation_form #class_').val();
        var booking_status=$('#booking_conversation_form #booking_status').val();
        var rowId=$('#booking_conversation_form #rowId').val(); 
        var formdata=$('#booking_conversation_form').serialize(); 
              $.ajax({
                    type: "POST",
                    url: "{{url('add_conversation')}}",
                    data:formdata,
                    success: function(xhr, status, data){
                      console.log(xhr)
                      // console.log(xhr.success)
                       if(xhr.success){
                        $( '#booking_conversation_form').each(function(){this.reset(); }); 
                        $('#booking_conversation_form .box-footer .alertmessage').html('<span class="text-success text-bold">Request Submitted...</span>');
                        setTimeout(function(){
                          $('#booking_conversation_modal').modal('hide');
                        }, 2000);
                        update_stat(rowId,status_value,class_,booking_status); 
                      }
                      else{ 
                        $('#booking_conversation_form .box-footer .alertmessage').html('<span class="text-danger text-bold">Somthing event wrong!...</span>'); 
                        }  
                  },
                  error: function(xhr, status, data){ 
                     console.log(xhr);
                      //console.log(xhr.responseJSON.errors);
                      var errorString = '<div class="text-danger text-bold"><ul>';
                      $.each(xhr.responseJSON.errors, function( key, value) { 
                        errorString += '<li>'+value[0]+'</li>';
                      });
                      errorString += '</ul></div>';
                      $('#booking_conversation_form .box-footer .alertmessage').html(errorString);
                     }
             });
       
       });

       /* update the  conversation of  booking request  */
       $('#update_booking_conversation_form').submit(function(e){
             e.preventDefault();
             var formdata=$('#update_booking_conversation_form').serialize(); 
              $.ajax({
                    type: "POST",
                    url: "{{url('add_conversation')}}",
                    data:formdata,
                    success: function(xhr, status, data){
                      console.log(xhr)
                      console.log(xhr.success)
                      if(xhr.success)
                      {
                        $( '#update_booking_conversation_form').each(function(){
                            this.reset(); 
                        }); 
                        $('#update_booking_conversation_modal').modal('hide');
                        $('.box-header .alertmessage').html('<span class="text-success text-bold">conversation details  updated  ...</span>'); 
                      }
                      else
                      { 
                        $('#update_booking_conversation_form .box-footer .alertmessage').html('<span class="text-danger text-bold">Somthing event wrong!...</span>'); 
                      }   
                  },
                  error: function(xhr, status, data){ 
                     console.log(xhr);
                    //  console.log(xhr.responseJSON.errors);
                      var errorString = '<div class="text-danger text-bold"><ul>';
                      $.each(xhr.responseJSON.errors, function( key, value) { 
                        errorString += '<li>'+value[0]+'</li>';
                      });
                      errorString += '</ul></div>';
                      $('#update_booking_conversation_form .box-footer .alertmessage').html(errorString);

                     }
             });
       }); 
       

       $('.status span').click(function(){
            var rowId=$(this).data('row'); 
            $('#update_booking_conversation_form .box-footer .alertmessage').html('');
            $.ajax({
                    type: "POST",
                    url: "{{url('get_conversation')}}",
                    data:{'rowId':rowId,"_token": "{{ csrf_token() }}"},
                    success: function(xhr, status, data){
                     
                      if(xhr.success)
                      {
                            $('#update_booking_conversation_form #rowId').val(rowId);
                            $('#update_booking_conversation_form #conversation').val(xhr.conversation.conversation); 
                            $('#update_booking_conversation_modal').modal(); 
                      }
                      else
                      { 
                        $('#update booking_conversation_form .box-footer .alertmessage').html('<span class="text-danger text-bold">Somthing event wrong!...</span>'); 
                      }  
                  },
                  error: function(xhr, status, data){ 
                    console.log(xhr)
                    $('#update_booking_conversation_form .box-footer .alertmessage').html('<span class="text-danger text-bold">Somthing event wrong!...</span>'); 
                  }
            });

       });
       
    
});


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


    var pickerOptsGeneral = { format: "yyyy-mm-dd", autoclose: true, minView: 2, maxView: 2, todayHighlight: true,startDate:  new Date() };
    $("#start_date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
    $('#start_date').datetimepicker(pickerOptsGeneral).on('changeDate',function(ev){}); 

    $("#end_date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
    $('#end_date').datetimepicker(pickerOptsGeneral).on('changeDate',function(ev){}); 
    
    $('#start_time').timepicker({  showInputs: false ,showMeridian:false});
    $('#end_time').timepicker({  showInputs: false,showMeridian:false });

    $('#driver_approx_time').timepicker({  showInputs: false,showMeridian:false });
    $('#tour_start_time').timepicker({  showInputs: false,showMeridian:false });



    $('input[data-role="tagsinput"]').tagsinput();
    
     //  for  dynamic listing 
    $('.bootstrap-tagsinput input').attr('list','sku_list');


  });

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
                  booking_status = " Inconversation ";
                  class_='warning';
                  break;
                case "3":
                  booking_status = " Confirm ";
                  class_='success';
                  break;
                case "4":
                  booking_status = " Cancel ";
                  class_='danger';
                break;
                default:
                booking_status=" New ";
                class_='primary';
              }
              var row_data=JSON.parse(request_type); 
              
                if(status_value=='2')
                {
                  $('#booking_conversation_modal #rowId').val(rowId);
                  $('#booking_conversation_modal #status_value').val(status_value);
                  $('#booking_conversation_modal #class_').val(class_);
                  $('#booking_conversation_modal #booking_status').val(booking_status);

                  $('#booking_conversation_modal #conversation').val((row_data.conversation)?row_data.conversation:'');

                  // booking_conversation_modal
                  $('#booking_conversation_modal').modal();
                  // alert(row_data.request_type);
                }
                else if(status_value=='3' && (row_data.request_type=='bike' ||  row_data.request_type=='accessories'))
                {
                      // alert("confirm : bike and Accesory"); 
                      var start_date=row_data.start_date_time.substr(0,10); 
                      var end_date=row_data.end_date_time.substr(0,10); 

                      var start_time=row_data.start_date_time.substr(11,5); 
                      var end_time=row_data.end_date_time.substr(11,5); 
                      
                      $("#start_date").val(start_date); 
                      $("#end_date").val(end_date); 

                      $("#start_time").val(start_time); 
                      $("#end_time").val(end_time); 

                      $('#guest_name').val(row_data.name);
                      $('#guest_email').val(row_data.email);
                      $('#mobile').val(row_data.contact);
                      $('#request_type').val(row_data.request_type); 
                      $('#description').html(row_data.description); 
                      $('#rental_booking_modal #booking_request_id').val(row_data.id);

                      $('.bootstrap-tagsinput input').attr('name','tagsinput'); 
                      $('.bootstrap-tagsinput input').attr('value',''); 

                       
                      $('#rental_booking_modal #rowId').val(rowId);
                      $('#rental_booking_modal #status_value').val(status_value);
                      $('#rental_booking_modal #class_').val(class_);
                      $('#rental_booking_modal #booking_status').val(booking_status);
                      $('#rental_booking_form .box-footer .alertmessage').html('');
                      $("#rental_booking_modal").modal(); 

                    
                }
                else if(status_value=='3' && (row_data.request_type!='bike' && row_data.request_type!='accessories'))
                {
                      var start_time=row_data.start_date_time.substr(11,5); 
                      var end_time=row_data.end_date_time.substr(11,5); 
                      // alert('confirm :  !bke and !accessory');
                      var yyy=row_data.start_date_time.substr(0,4); 
                      var mm=row_data.start_date_time.substr(5,2); 
                      var dd=row_data.start_date_time.substr(8,2);

                      var end_yyy=row_data.end_date_time.substr(0,4); 
                      var end_mm=row_data.end_date_time.substr(5,2); 
                      var end_dd=row_data.end_date_time.substr(8,2); 
                      //   17/04/2020   2020-04-17 
                      // alert(row_data.start_date_time); 
                      $('#taxi_rental_booking_modal #booking_start_date').val(dd+'/'+mm+'/'+yyy);  
                      $('#taxi_rental_booking_modal #booking_end_date').val(end_dd+'/'+end_mm+'/'+end_yyy); 
                      $('#tour_start_time').val(start_time); 
                      if(row_data.request_type=='cab')
                      {
                        var booking_type='taxi'; 
                      }
                      else
                      {
                        var booking_type=row_data.request_type; 
                      }
                      $('#taxi_rental_booking_modal #booking_type').val(booking_type); 
                      $('#taxi_rental_booking_modal #booking_request_id').val(row_data.id);


                      $('#taxi_rental_booking_modal #guest_name').val(row_data.name);
                      $('#taxi_rental_booking_modal #guest_email').val(row_data.email);
                      $('#taxi_rental_booking_modal #guest_whatsapp').val(row_data.contact);
                      // alert(); 
                      $('#taxi_rental_booking_modal #rowId').val(rowId);
                      $('#taxi_rental_booking_modal #status_value').val(status_value);
                      $('#taxi_rental_booking_modal #class_').val(class_);
                      $('#taxi_rental_booking_modal #booking_status').val(booking_status);


                      $('#taxi_rental_booking_form .box-footer .alertmessage').html('');
                      $('#taxi_rental_booking_modal').modal(); 
                }
                else
                {
                      // alert('free case '); 
                      update_stat(rowId,status_value,class_,booking_status);  
                }


              
          }
     }

     function  update_stat(rowId,status_value,class_,booking_status)
     {
        $.ajax({ 
                  type: "POST",
                  url: "{{url('update_request_status')}}",
                  data: {'row_id':rowId,'status_value':status_value,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      console.log(result);
                      if(result=='200'){
                        // $('#row_'+rowId+' .status').html("hello  Pradeep"); 
                        $('#row_'+rowId+' .status').html('<span class="btn btn-'+class_+' btn-xs btn-block" data-row="'+rowId+'" >'+booking_status+'</span>');
                        // remove
                        $('.box-header .alertmessage').html('<span class="text-success text-bold">Status '+booking_status+' updated ...</span>'); 
                         //  window.location='https://www.google.com'; 
                          
                         
                      }
                      else{ 
                        $('.box-header .alertmessage').html('<span class="text-danger text-bold">Somthing event wrong!...</span>'); 
                      }
                  }
              });
     }
      function delete_booking(rowId)
      {
          if(confirm('Do you want  to  delete this?'))
          {
              $.ajax({
                  type: "POST",
                  url: "{{url('delete_tour_booking')}}",
                  data: {'row_id':rowId,"_token":"{{csrf_token()}}"},
                  success: function(result){
                      //console.log(result);
                      if(result=='200'){
                        $('#row_'+rowId).remove(); 
                        $('.alertmessage').html('<span class="text-success text-bold">Booking deleted...</span>');  
                      }
                      else{ $('.alertmessage').html('<span class="text-danger text-bold">Somthing event wrong!...</span>'); }
                  }
              });
          }
      }

      //     restrict Alphabets  
      function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8 ||
            (x>=35 && x<=40)|| x==46)
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

        var map; var map2; 
        var marker; var marker2;
        var myLatlng = new google.maps.LatLng(20.268455824834792,85.84099235520011);
        var geocoder = new google.maps.Geocoder(); 
        var infowindow = new google.maps.InfoWindow();    
   
        var placeSearch, autocomplete;
   
   
        function initialize(){
   
          //  use  For Auto Complete Addresss 
          autocomplete = new google.maps.places.Autocomplete(document.getElementById('source_address'), {types: ['geocode']});
   
          autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('destination_address'), {types: ['geocode']});
            
          
          //  Select Address To  the  Marker  ## START ##
          var mapOptions = {
            zoom: 18,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };
   
          map = new google.maps.Map(document.getElementById("myMap"), mapOptions);
          map2 = new google.maps.Map(document.getElementById("myMap2"), mapOptions);
   
          marker = new google.maps.Marker({
            map: map,
            position: myLatlng,
            draggable: true
          });
   
          marker2 = new google.maps.Marker({
            map: map2,
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
   
                    $('#latitude2,#longitude2').show();
                    $('#map_address2').val(results[0].formatted_address);
                    // $('#destination_address').html(results[0].formatted_address);   //  default address fill  
                    $('#latitude2').val(marker.getPosition().lat());
                    $('#longitude2').val(marker.getPosition().lng());
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
         
            $('#source_address').val(results[0].formatted_address); 
            $('#latitude').val(marker.getPosition().lat());
            $('#longitude').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
            }
            }
            });
          });
          //  For Second  map Marker 
          google.maps.event.addListener(marker2, 'dragend', function() {
                geocoder.geocode({'latLng': marker2.getPosition()}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                $('#map_address2').val(results[0].formatted_address);
              
                $('#destination_address').val(results[0].formatted_address); 
                $('#latitude2').val(marker2.getPosition().lat());
                $('#longitude2').val(marker2.getPosition().lng());
                infowindow.setContent(results[0].formatted_address);
                infowindow.open(map2, marker2);
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
      function geolocate2() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle(
                {center: geolocation, radius: position.coords.accuracy});
            autocomplete2.setBounds(circle.getBounds());
          });
        }
      }






       


    </script>
@endsection




