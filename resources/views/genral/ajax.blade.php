@if(isset($method))

@switch($method)
    @case('modal_event_listing')
            <div class="chart tab-pane active" id="taxi-tab" style="position: relative; min-height: 300px;">
            <div >
                          @if(isset($booking_taxi_events_details) && count($booking_taxi_events_details) > 0 )
                            <table class="table no-margin" id="example1"> <!--class="table no-margin"-->
                                <thead>
                                  <tr>
                                      <th width="160">Booking ID</th>
                                     
                                      <th>Start</th>
                                      <th>End </th>
                                      <th>Status</th>
                                      <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                @php($count=1)
                                 @foreach($booking_taxi_events_details as $value)
                                     <tr id="events_row_{{$value->id}}">
                                        <td><span id="{{$value->id}}"> {{$value->booking_id}}</span></td>
                                       
                                        <td ><span class="label label-success">{{ date("g:i a", strtotime($value->start_time)) }}</span></td>
                                        <td class="new_end_time"><span class="label label-danger">{{ date("g:i a", strtotime($value->end_time)) }}</span></td>
                                        <td class="taxi_staus">
                                          <select name="booking_status" id="booking_status" onchange="update_booking_status(this,'{{$value->id}}')" >
                                                <option @if($value->booking_status=='booking') selected @endif value="booking">Booking</option>
                                                <option @if($value->booking_status=='drive_time')selected @endif value="drive_time">Drive Time</option>
                                                <option @if($value->booking_status=='delayed') selected @endif value="delayed">Delayed</option>
                                                <option @if($value->booking_status=='completed') selected @endif value="completed">Complete</option>
                                            </select>
                                        </td>
                                        <td>
                                        <a style="cursor:pointer;" onclick="get_taxi_and_driver('{{$value->start_date}}','{{$value->end_date}}','{{$value->booking_id}}','{{$value->id}}','{{$value->booking_type}}')" >Resources</a>
                                        </td>
                                     </tr>
                                     @php($count++)
                                 @endforeach

                                </tbody>
                              

                            </table>
                          @else
                          <div class="text-danger text-center">  There are no Booking ...</div>
                          @endif
                        </div>
            </div>
            <div class="chart tab-pane" id="tour-tab" style="position: relative; min-height: 300px;">
            <div >
                          @if(isset($booking_tour_events_details) && count($booking_tour_events_details) > 0)
                           <table  class="table no-margin" id="example2">
                                <thead>
                                <tr>
                                    <th width="160">Booking ID</th>
                                    
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($count=1)
                                 @foreach($booking_tour_events_details as $value)
                                     <tr id="events_row_{{$value->id}}">
                                        <td><span id="{{$value->id}}"> {{$value->booking_id}}</span></td>
                                        <td ><span class="label label-success">{{ date("g:i a", strtotime($value->start_time)) }}</span></td>
                                        <td><span class="label label-danger">{{ date("g:i a", strtotime($value->end_time)) }}</span></td>
                                        <td class="taxi_staus">
                                          <select name="booking_status" id="booking_status" onchange="update_booking_status(this,'{{$value->id}}')" >
                                                <option @if($value->booking_status=='booking') selected @endif value="booking">Booking</option>
                                                <option @if($value->booking_status=='drive_time')selected @endif value="drive_time">Drive Time</option>
                                                <option @if($value->booking_status=='delayed') selected @endif value="delayed">Delayed</option>
                                                <option @if($value->booking_status=='completed') selected @endif value="completed">Complete</option>
                                            </select>
                                            
                                        </td>
                                        <td>
                                        <a style="cursor:pointer;" onclick="get_taxi_and_driver('{{$value->start_date}}','{{$value->end_date}}','{{$value->booking_id}}','{{$value->id}}','{{$value->booking_type}}')" >Resources</a>
                                        </td>
                                     </tr>
                                     @php($count++)
                                 @endforeach

                                </tbody>
                              

                            </table>
                          @else
                            <div class="text-danger text-center">  There are no Booking ...</div>
                          @endif

                          <script type="text/javascript">
                              $(function(){
                                  /// 
                                   $('#example1').dataTable({
                                        "ordering": false,
                                        "bPaginate": true,
                                        "bLengthChange": false,
                                        "bFilter": false,
                                        "bSort": true,
                                        "bInfo": true,
                                        "bAutoWidth": false
                                      });
                                    $('#example2').dataTable({
                                        "ordering": false,
                                        "bPaginate": true,
                                        "bLengthChange": false,
                                        "bFilter": false,
                                        "bSort": true,
                                        "bInfo": true,
                                        "bAutoWidth": false
                                      });

                                }); 
                          </script>

                        </div>  
            </div> 
    @break

    @case('modal_assign_taxi_driver')


      <?php 
      $all_booked_taxi_array=array(); 
      foreach($get_all_booked_taxies as $value) 
      {
        array_push($all_booked_taxi_array,$value->taxi);
      }
      
      $all_booked_driver_array=array(); 
      foreach($get_all_booked_driver as $value) 
      {
        array_push($all_booked_driver_array,$value->driver);
      }

      ?> 

   
          <div class="row" style="padding:5px;">
              <p></p>
              <div class="col-md-6"  style="width:50%; float:left; ">

                 <input type="hidden" value="{{!empty($single_event_details->id)?$single_event_details->id:''}}" name="row_id" id="row_id" />
                 <input type="hidden" value="{{!empty($single_event_details->booking_type)?$single_event_details->booking_type:''}}" name="booking_type" id="booking_type" />

                <label>Driving Type</label>
                <div class="form-group">
                    <label>
                      <input type="radio" name="type_of_driving" class="flat-red type_of_driving" value="cab" checked /> Cab
                    </label>
                    <!-- <label>
                      <input type="radio" name="type_of_driving" class="flat-red type_of_driving" value="self_driving"  />Self Driving
                    </label> -->
                  </div>
              </div>
              <div class="col-md-6" style="width:50%; float:right; " >
               <div class="form-group">
                    <label for="taxi">Taxi</label>
                    @if(count($get_all_Taxies) > 0)
                    <select  name="taxi" class="form-control"     id="taxi" >
                      <option   value="">--Select Taxi --</option>
                      @if(isset($single_event_details->taxi) && $single_event_details->taxi!="")
                          @foreach($get_all_Taxies as $value)
                          <option  @if($single_event_details->taxi==$value->id) selected @endif    value="{{$value->id}}"     >{{$value->title.'--'.$value->taxi_no}}</option>
                          @endforeach
                      @else
                          @foreach($get_all_Taxies as $value)
                              @if( count($all_booked_taxi_array) && in_array($value->id,$all_booked_taxi_array))
                              @else
                              <option  value="{{$value->id}}" >{{$value->title.'--'.$value->taxi_no}}</option>
                              @endif
                          @endforeach
                      @endif

                      
                    </select>
                    @endif
                </div>
              </div>
          </div>
           

                  
                  <div class="row cabdriving" style="padding:5px;">
                  <input type="hidden" class="form-control" value="{{!empty($single_event_details->start_date)?$single_event_details->start_date:''}}"  required id="tour_start"   name="tour_start" >
                  <input type="hidden" class="form-control" value="{{!empty($single_event_details->start_date)?date('Y-m-d',strtotime($single_event_details->end_date)):''}}"  required id="tour_end_date"   name="tour_end_date" >

                          <div clas="col-md-4"  style="width:33.33%; float:left; padding:5px;">
                              <label for="">Pick Up / Drop Point</label>
                              <p>Pickup Point</p> 
                          </div>
                          <div clas="col-md-4"  style="width:33.33%; float:right; padding:5px;">
                              <label for="">Driver</label>
                              <select  name="driver" class="form-control" required    id="driver" >
                                  <option   value="">--Select Driver --</option>

                                  @if( isset($single_event_details->driver) && $single_event_details->driver!="")
                                      @foreach($get_all_drivers as $value)
                                          <option @if($single_event_details->driver==$value->id) selected @endif  value="{{$value->id}}">{{ucfirst($value->name)}}</option>
                                      @endforeach
                                  @else
                                      @foreach($get_all_drivers as $value)
                                          @if(count($all_booked_driver_array) && in_array($value->id,$all_booked_driver_array))
                                          @else
                                          <option   value="{{$value->id}}">{{ucfirst($value->name)}}</option>
                                          @endif
                                      @endforeach
                                  @endif

                                
                                </select>
                          </div>
                          <div clas="col-md-4"  style="width:33.33%; float:right; padding:5px;">
                              <label for="">Approx End Time</label>
                              <div class="bootstrap-timepicker">
                                  <input type="text" class="form-control timepicker" value="{{!empty($single_event_details->end_date)?date('h:i A',strtotime($single_event_details->end_date)):''}}"  required id="tour_end_time"   name="tour_end_time" >
                              </div>
                          </div>
                                
                      </div>
                  
                    
                      <div class="row selfdriving" style=" display:none; padding:5px;">
                          <div clas="col-md-4"  style="width:33.33%; float:left; padding:5px;">
                              <label for="">Pick Up / Drop Point</label>
                              <p>Drop Point</p>
                              <br/>
                              <p>Pickup Point</p> 
                          </div>
                          <div clas="col-md-4"  style="width:33.33%; float:right; padding:5px;">
                              <label for="drop_driver">Driver</label>
                              <select  name="drop_driver" class="form-control" required    id="drop_driver" >
                                  <option   value="">--Select Driver --</option>
                                  <option   value="selfdriving">Self Driving</option>
                                  @foreach($get_all_drivers as $value)
                                  @if(count($all_booked_driver_array) && in_array($value->id,$all_booked_driver_array))
                                  @else
                                  <option   value="{{$value->id}}">{{ucfirst($value->name)}}</option>
                                  @endif
                                  @endforeach
                                </select><br/>
                                <select  name="pickup_driver" class="form-control" required    id="pickup_driver" >
                                  <option   value="">--Select Driver --</option>
                                  <option   value="selfdriving">Self Driving</option>
                                  @foreach($get_all_drivers as $value)
                                  @if(count($all_booked_driver_array) && in_array($value->id,$all_booked_driver_array))
                                  @else
                                  <option value="{{$value->id}}">{{ucfirst($value->name)}}</option>
                                  @endif
                                  @endforeach
                                </select>
                          </div>
                          <div clas="col-md-4"  style="width:33.33%; float:right; padding:5px;">
                              <label for="">Time</label>
                              <div class="bootstrap-timepicker">
                                  <input type="text" class="form-control timepicker" required id="drop_time"   name="drop_time" >
                              </div><br/>
                              <div class="bootstrap-timepicker">
                                  <input type="text" class="form-control timepicker" required id="pickup_time"   name="pickup_time" >
                              </div>
                          </div>
                                
                      </div>
                      

           

            <div class="row">
                <div clas="col-md-6"  style="width:50%; float:left; padding:5px;">
                   <label for="resources">Resources</label>
                   <div class="tgInptW" >
                        <input type="text" id="resources" value="{{!empty($single_event_details->resource)?$single_event_details->resource:''}}" class="form-control" data-role="tagsinput" placeholder="Enter name oF Resources"/>
                    </div>
                </div>
                <div clas="col-md-6" style="width:50%; float:right; padding:5px;" >
                   <div class="form-group " style="padding-top:25px; padding-left:100px;">
                          <button class="btn btn-primary" type="submit" onclick="assign_taxi_driver(this)" >Submit </button>
                    </div>
                </div>
                <script type="text/javascript">
                  $(function(){
                      $('input[data-role="tagsinput"]').tagsinput();
                      $(".timepicker").timepicker({
                                showInputs: false
                            });
                            
                      $('.type_of_driving').change(function(){
                          var checked_type = $( 'input[name=type_of_driving]:checked' ).val();
                            
                          // console.log(checked_type)
                          if(checked_type=='self_driving')
                          {
                            $('.cabdriving').css('display','none'); 
                            $('.selfdriving').css('display','block'); 
                          }
                          else if(checked_type='cab')
                          { 
                            $('.cabdriving').css('display','block'); 
                            $('.selfdriving').css('display','none'); 
                          }
                      });
                      
                    }); 


     

                </script>
            </div>

          
        @break

        @case('all_events_of_the_day')
            <tr title="100">
              <td>Breza</td>
              <td>Akram</td>
              <td>Tour</td>
            </tr>
                            
        @break


        @case('getAssigntaxiOfDay')
        
          @if(isset($taxies) && !empty($taxies))
                  @foreach($taxies as $key=>$taxi)
                  <tr id="{{$key}}" >
                    <td>
                    <!-- <select id="taxi[{{$key}}]" name="taxi[{{$key}}]" readonly required>
                    <option value="{{$taxi->id}}">{{$taxi->title}}</option>
                    </select> -->
                    <label for="taxi[{{$key}}]">{{$taxi->title}}</label>
                    <input id="taxi[{{$key}}]" type="hidden" name="taxi[{{$key}}]" value="{{$taxi->id}}" required />
                    <td>
                    <select id="driver[{{$key}}]" class="form-control"  name="driver[{{$key}}]" onchange="getNewDriverlist(event,{{$key}});" required>
                    <option value="">----Select Driver----</option>
                    <option value="0">No Driver</option>
                    @foreach($drivers as $driver)
                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                    @endforeach
                    </select>
                    </td>
                </tr>
                  @endforeach
          @endif
                            
        @break
        @case('updateAssigntaxiOfDay')
        {{$newTaxiData[0]}}
        @if(isset($taxies) && !empty($taxies))
                  @foreach($taxies as $key=>$taxi)
                  <tr id="{{$key}}" >
                    <td>
                    <!-- <select id="taxi[{{$key}}]" name="taxi[{{$key}}]" readonly required>
                    <option value="{{$taxi->id}}">{{$taxi->title}}</option>
                    </select> -->
                    <label for="taxi[{{$key}}]">{{$taxi->title}}</label>
                    <input id="taxi[{{$key}}]" type="hidden" name="taxi[{{$key}}]" value="{{$taxi->id}}" required />
                    <td>
                    <select id="driver[{{$key}}]" class="form-control"  name="driver[{{$key}}]"  onchange="getNewDriverlist(event,{{$key}});" required>
                    <option value="">----Select Driver----</option>
                    <option value="0">No Driver</option>
                    @foreach($drivers as $driver)
                    <option value="{{$driver->id}}" @if($newTaxiData[$key]==$driver->id) {{ 'selected' }} @endif >{{$driver->name}}</option>
                    @endforeach
                    </select>
                    </td>
                </tr>
                  @endforeach
          @endif

          <input type="hidden" name="rowId" value="{{!empty($rowId)?$rowId:''}}"/>
                            
        @break



    @default
        <span>Something went wrong, please try again</span>
@endswitch


@endif