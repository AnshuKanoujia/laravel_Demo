@extends('genral.layouts.mainlayout3')
@section('title') 
<title>dashboard </title>
  <link href='https://unpkg.com/fullcalendar-scheduler@1.10.0/dist/scheduler.min.css' rel='stylesheet' />

<style type="text/css">
  

[class^="icon-"],
[class*=" icon-"] {
  background-image: url("public/admin/bootstrap/glyphicons/glyphicons-halflings.png");
}

.comiseo-daterangepicker-presets,
.comiseo-daterangepicker-triggerbutton,
.comiseo-daterangepicker-buttonpanel {
  display: none !important;
}

.comiseo-daterangepicker {
  display: block !important;
}

.custom-none {
  display: none !important;
}

.ui-datepicker-multi-2 .ui-datepicker-group {
  width: 100% !important;
  display: block;
}

.ui-state-highlight,
.ui-widget-content .ui-state-highlight,
.ui-widget-header .ui-state-highlight {
  border: 1px solid #fcefa1;
  background: #00a65a !important;
  color: #363636;
}

.comiseo-daterangepicker-calendar {
  border-left-width: 0 !important;
  padding-left: 0 !important;
}

.comiseo-daterangepicker {
  width: 19% !important;
  left: 245px !important;
  top: 106px !important;
}

.sidebar-collapse .comiseo-daterangepicker {
  width: 24% !important;
  left: 15px !important;
  top: 106px !important;
}

#custom-picker {
  display: block !important
}

.ui-datepicker-inline {
  width: 100% !important;
}

#booking_start_date {
  background: #eaeaea;
}

.ui-datepicker-today {
  background: #3c8dbc;
  pointer-events: auto !important;
  opacity: 1 !important;
}

.ui-datepicker-today span {
  color: #fff !important;
}

@media only screen and (max-width:768px) {
  .col-md-9 {
    margin-top: 480px;
  }
  .sidebar-collapse .comiseo-daterangepicker {
    width: 95% !important;
    left: 15px !important;
    top: 190px !important;
  }
}

.fc-time-grid-event>.fc-content {
  color: #000;
}

.sep-div {
  border-bottom: 1px solid #ccc;
  padding: 7px 0px;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 14px;
  margin: 0 0px 5px 0px;
  color: #015d93;
}

.popover-content {
  padding: 0px 0px 8px 14px;
}

button.close {
  padding: 4px 7px !important;
  color: #fff !important;
  opacity: 1 !important;
}

label {
  padding: 0px 2px;
  font-weight: 600 !important;
}

.ui-dialog {
  z-index: 9999 !important;
  box-shadow: 0px 2px 12px -2px #000;
  -moz-box-shadow: 0px 2px 12px -2px #000;
  -webkit-box-shadow: 0px 2px 12px -2px #000;
  border-radius: 6px;
  -moz-border-radius: 6px;
  -webkit-border-radius: 6px;
}

.popover-title {
  font-size: 16px !important;
  background-color: #3c8dbc !important;
  border-bottom: 1px solid #ebebeb;
  color: #fff;
  font-weight: 500;
  letter-spacing: .5px;
}

.popover {
  border: 0px !important;
  -webkit-box-shadow: 0 5px 16px rgba(0, 0, 0, .7) !important;
  box-shadow: 0 5px 16px rgba(0, 0, 0, .7) !important;
}

.list-inline {
  margin-top: 10px;
}

.mb-10 {
  margin-bottom: 10px;
}

.bg-1 {
  background-color: #f8cbad;
}

.bg-2 {
  background-color: #bdd7ee;
}

.bg-3 {
  background-color: #ffd966;
}

.fc-event,
.fc-event:hover,
.ui-widget .fc-event {
  color: #4e4e4e;
}

.fc-slats table tbody tr:not(.fc-minor) {
  background: #f0f0f0;
}

.fc-slats table tbody tr.fc-minor {
  background: #e1e1e1;
}

.fc-unthemed .fc-popover,
.fc-unthemed .fc-row,
.fc-unthemed hr,
.fc-unthemed tbody,
.fc-unthemed td,
.fc-unthemed th,
.fc-unthemed thead {
  border-color: #ffffff;
}

th.fc-widget-header {
  background: #a5a5a5;
  padding: 5px;
  text-align: left;
  color: #fff;
  font-weight: 600;
  font-size: 16px;
}

span.lbl-name {
  display: inline-block;
  vertical-align: top;
  font-size: 13px;
  font-weight: 400;
  margin-right: 7px;
  max-width: 96px;
  width: 100%;
}

.popover-content p,
#checkpopup p {
  margin: 0;
  line-height: 12px;
}

.popover-content p label {
  font-size: 13px;
}

h4#modalTitle {
  font-weight: 600;
}

.popover-content input[type="radio"],
#checkpopup input[type="radio"] {
  margin-right: 5px !important;
  margin: 0px 0 0;
}

div#modalBody h4 {
  border-bottom: 1px solid #ddd;
  padding-bottom: 7px;
  margin-top: 21px;
  color: #111;
}

div#modalBody h4:first-child {
  margin-top: 0;
}

#modalBody label {
  cursor: pointer;
}

.modal {
  -webkit-transition: all 0.75s ease;
  transition: all 0.75s ease;
}

.actDivingYValues[data-active="No"] {
    display: none;
}
.fc-content {
    padding: 7px 21px 7px 7px;
}
.event_title {
    display: block;
    font-size: 14px;
    font-weight: 600;
    line-height: 1.2;
    margin-bottom: 7px;
}
.pp_tabulator {
    margin-top: 475px;
}
.pp_tabulator thead{
  background: #3c8dbc;
  color: #fff;
}
.fc-overlay{
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: -1;
  top: 0;
  left: 0;
  overflow: hidden;
}
.fc-overlay span{
    position: absolute;
    background: rgba(0, 0, 0, 0.3);
    top: -25%;
    left: -25%;
    content: "";
    width: 150%;
    height: 150%;
    z-index: 99999;
    -webkit-transform-origin: center;
    -moz-transform-origin: center;
    transform-origin: center;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    transform: scale(0);
    -webkit-transition: all 0.1s ease-in-out 0s;
    -moz-transition: all 0.1s ease-in-out 0s;
    transition: all 0.1s ease-in-out 0s;
    border-radius: 50%;
}
.fc-overlay.active{
  z-index: 999;
}
.fc-overlay.active span{
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    transform: scale(1);
}
</style>
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <section class="content-header">
      <h1> Booking Structure <small> Today </small> </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Dashboard</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="wizard">
         <?php $action='update_booking'; ?>
          <div class="box box-success">
            <div class="row">
              <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-body">
                      <div class="pp_calendar">
                        <div id="custom-picker"></div>
                      </div>
                      <div class="row">

                      </div>
                        <!-- <button type="submit" class="btn btn-success btn-md">Validate</button>
                        <button type="submit" class="btn btn-default btn-md">Edit Day</button>
                        <button type="submit" class="btn btn-default btn-md">Cancel</button> -->
                       
                       
                      <div class="pp_tabulator">
                        <p id="validate_section" style="display:none;">
                        <button type="submit" class="btn btn-block btn-success ">Validate</button>
                        <button type="submit" class="btn btn-block btn-default ">Edit Day</button>
                        <button type="submit" class="btn btn-block btn-default ">Cancel</button>
                        </p>
                        @if(!empty($get_today_car_driver_list))
                        <table class="table">
                          <thead>
                              <tr>
                                <th>Car</th>
                                <th>Driver</th>
                                <th>Purpose</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                          @foreach($get_today_car_driver_list as $value)
                              <tr title="{{$value->id}}">
                                <td>{{ucfirst($value->taxi_title)}}</td>
                                <td>{{ucfirst($value->driver_name)}}</td>
                                <td>{{ucfirst($value->booking_type)}}</td>
                              </tr>
                          @endforeach
                          </tbody>
                        </table>
                        @endif
                      </div>
                  

                    </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="box box-solid">
                  <div class="box-body ">
                    <div id="fCalendar"></div>      
                    <div class="fc-overlay">
                      <span></span>
                    </div>
                    <div id="popoverContent" class="hide">
                      <form class="save_event_form">
                       <div class="row">
                          <div class="col-sm-12">
                            <!-- <h4 class="sep-div mb-10">Option</h4> -->
                            <p class="mt-10"><span class="lbl-name">Status:</span>
                              <select class="statusOption form-control">
                                <option value="">Select Status</option>
                                <option value="completed">Completed</option>
                                <option value="incomplete">Incomplete</option>
                              </select>
                            </p>
                            <!-- <h4 class="sep-div">Time</h4>
                            <p>
                              <span class="lbl-name">Start Time</span>
                              <span class="input2Wrapper timepicker1">
                                <input type="text" name="startHr"  class="form-control" readonly>
                              </span>
                            </p>
                            <p>
                              <span class="lbl-name">End Time</span>
                              <span class="input2Wrapper timepicker2">
                                <input type="text" name="endHr" class="form-control" readonly>
                              </span>
                            </p> -->
                            <br/>
                            <p class="float-right">
                              <button onClick="saveEvent(this);" type="button" class="btn save-btn btn-success" >save</button>
                            </p>
                          </div>
                        </div>
                      </form>                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
   </section>
</div>
<div class="modal fade" id="selectDriver" role="dialog">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Select a common driver</h4>
         </div>
         <div class="modal-body">
          <label class="mb-10">Select Driver</label>
          <select class="form-control">
            <option value="">Select Driver</option>
          </select>   
          <span class="text-danger"></span>      
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary cancelDropEvt" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success saveDropEvt">
            <span class="fa fa-spin"></span>
          Save changes</button>
      </div>
      </div>
   </div>
</div>

@endsection
@section('customjs')
<script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>


<script>
var currentEvent,saveEvtObj={},$currentPopupDetailWrapper='',$currentPopoverToOpt='',offsetLeft=0,popoverElement='',fcCalConfg='',renderingEvents='',dragingResourceId='';
var popTemplate = [
  '<div class="popover" style="max-width:600px;width:380px">',
  '<div class="arrow"></div>',
  '<div class="popover-header">',
  // '<button id="closepopover" type="button" class="close" aria-hidden="true" onClick="closeThePopoverEvent(event)">&times;</button>',
  '<h3 class="popover-title"></h3>',
  '</div>',
  '<div class="popover-content"></div>',
  '</div>'].join('');
$(function () 
{

    renderingEvents=<?php if(isset($get_all_events_of_today)){ echo $get_all_events_of_today;  }else{ echo '';  } ?>; 
    

    /*
    -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    
    $('.fc-event').each(function () {
      // store data so the calendar knows to render an event upon drop
      $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true, // maintain when user navigates (see docs on the renderEvent method)
        id: $(this).attr('id')
      });
      // make the event draggable using jQuery UI
      $(this).draggable({
        zIndex: 999,
        revert: true, // will cause the event to go back to its
        revertDuration: 0 //  original position after the drag
      });
    });

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();        
})//ready closed
function updateCalConfig(defDate,resourceVals,allEvents){
    fcCalConfg={
      defaultView: 'agendaDay',
      defaultDate : defDate,
      groupByResource: true,
      events: allEvents,
      selectable: true,
      allDaySlot: false,
      slotDuration: '00:30:00',
      slotLabelInterval: '00:30:00',
      displayEventTime: true,
      slotEventOverlap: false,
      eventOverlap: true,
      slotLabelFormat: 'HH:mm', 
      nowIndicator: true,
      editable  : true,
      eventResizableFromStart: true,
      timeFormat: 'HH:mm',
      resources: resourceVals,            
      select: function (event, jsEvent, view) {
        console.log('select');

        currentEvent=event;
        popoverElement = $(jsEvent.target);
        $(jsEvent.target).popover({
          title: 'the title',
          content: function () {
              return $("#popoverContent").html();
          },
          template: popTemplate,
          // placement:,
          html: 'true',
          trigger: 'click',
          animation: 'true',
          container: 'body'
        }).popover('show');
      },
      eventDragStart:function(event){
        console.log(event.resourceId)
        dragingResourceId=event.resourceId;
      },
      eventClick:  function(event, jsEvent, view) {
        
        // console.log(event)
        // console.log(jsEvent);
        offsetLeft=$(jsEvent.target).closest('.fc-time-grid-event').offset().left;
        // console.log(jsEvent.screenX)
        // console.log(offsetLeft)
        currentEvent=event;
        console.log('evenclick');
        // console.log(jsEvent)
        $('#fCalendar .activeEvent').removeClass('activeEvent');
        $(this).addClass('activeEvent');
        $currentPopupDetailWrapper=$(this);
        // console.log(view)
        // 2
        popoverElement = $(jsEvent.currentTarget);
        $('.popover-title').html(event.booking_id);
        $('.popover-content').html(event.description);

          $(".close").on('click', function(e){
            e.preventDefault();
            $(this).closest(".popover").hide();
          })
      },
      eventRender: function (event, element) {
        // console.log(event);
        // console.log(event.id);
        // console.log(element);
        // console.log('eventRender');
        currentEvent=event;
        // console.log(event);
        element.popover({
          title: 'title',
          content: function(){
              $("#popoverContent").find('.save_event_form').attr('data-target',event.id);
              var newPopover=$($("#popoverContent").html());
                  newPopover.find('.statusOption option[value="'+event.status+'"]').attr('selected','selected');
               $("#popoverContent").find('.save_event_form').attr('data-target','');
              return newPopover;
          },
          template: popTemplate,
          placement: function(e){
            var popoverWlength=parseFloat(offsetLeft) + parseFloat($(e).width()) + 50 ;                  
            if($(window).width() > popoverWlength){
              return 'top'
            }
            else{
             return 'left'
            }
          },
          html: 'true',
          trigger: 'click',
          animation: 'true',
          container: 'body'
        });
        var resouces = element.find('.fc-content');
        resouces.closest('a').on('click',function(){
          if(popoverElement)
          popoverElement.not(this).popover('hide');
        })
        resouces.closest('a').css({'border-color': 'rgb(144, 144, 144)'});
        if(event.status == 'completed')
        resouces.closest('a').css({'background-color': 'rgb(0, 166, 90)'});
        else if(event.status == 'incomplete')
        resouces.closest('a').css({'background-color': 'rgb(221, 75, 57)'});
        else 
        resouces.closest('a').css({'background-color': ''});
        resouces.html('<span class="event_title">'+ resouces.text() +'</span>');
        element.attr('id',event.id);
        element.find('.fc-content').append("<div class='my-data event-custom-data' data-eventId='"+event.id+"'> <div class='value-div lunchYN'> <label>Guest Name :</label> <span>"+event.name+"</span> </div> <div class='value-div lunchskl'> <label>Driver:</label> <span>"+event.driver_name+"</span> </div> <div class='value-div spMeal'> <label>Booking  Id:</label> <span>"+event.booking_id+"</span> </div> <div class='value-div selfDrvYN'> <label>Booking Type:</label><span>"+event.booking_type+"</span> </div></div>");
      },
      // eventDragStop: function(event){},
      eventResize: function(event,jsEvent,view){
        // console.log(event)
        $('.fc-overlay').addClass('active');
        console.log(event.id+'--'+moment(event.start).format("YYYY-MM-DD HH:mm:ss")+'----'+moment(event.end).format("YYYY-MM-DD HH:mm:ss")+'---'+event.booking_type); //event id,start & end time
        $.ajax({
          type: 'POST',
         // url: '/planing_phase',
          url: "{{url('update_booking_status')}}",  
          data: { _token: "{{ csrf_token() }}",row_id: event.id,start_date: moment(event.start).format("YYYY-MM-DD HH:mm:ss"),end_date: moment(event.end).format("YYYY-MM-DD HH:mm:ss"),status: event.status},
          success: function(resp){
            console.log(resp)
            setTimeout(function(){
              $('.fc-overlay').removeClass('active');
            },200)
          },
          error: function(err){
            console.log(err)
            setTimeout(function(){
              $('.fc-overlay').removeClass('active');
            },200)
          }
        })
      },
      eventDrop: function(event, delta, revertFunc) {
        console.log(event)
        var eventsFromCalendar = $('#fCalendar').fullCalendar('clientEvents');
          var resourceOccurance=[];
          var resourceOccuranceObj={};
          if(dragingResourceId != event.resourceId){
            $.each(eventsFromCalendar,function(index,obj){
              if(obj.resourceId == event.resourceId){
                resourceOccurance.push(obj.driver_id);
                resourceOccuranceObj[obj.driver_id]=obj.driver_name;
              }})
          }
          if(resourceOccurance.length)
          var resourceOccurance=resourceOccurance.filter(function(elem,index,self){ return index === self.indexOf(elem);
            })
          console.log(event)
          if(resourceOccurance.length >= 2)
          {
            $('#selectDriver select').html('<option value="">Select Driver</option>')
            $.each(resourceOccuranceObj,function(key,value){
              $('#selectDriver select').append('<option value="'+key+'">'+value+'</option>');
            })
            $('#selectDriver').modal('show');
            $('#selectDriver').find('.cancelDropEvt').click(function(){
              revertFunc();
            })
            $('#selectDriver').find('.saveDropEvt').click(function(){
              var driverCommonName=$('#selectDriver select').val();
              $('#selectDriver select + .text-danger').text('') 
              if(driverCommonName){       
                $('#selectDriver select + .text-danger').text('') 
                $('#selectDriver .fa-spin').addClass('fa-spinner');
                //$('.fc-overlay').addClass('active');
                updateDroppedEventsOnDropNSave({_token: "{{ csrf_token() }}",row_id: event.id,booking_id: event.booking_id,date: moment(event.start).format("YYYY-MM-DD"),start_date: moment(event.start).format("YYYY-MM-DD HH:mm:ss"),end_date: moment(event.end).format("YYYY-MM-DD HH:mm:ss"),status: event.status,taxi: event.resourceId,driver_id: driverCommonName});             
              }
              else{
                $('#selectDriver select + .text-danger').text('Driver name required.');
              }
            })
          }
          else
          {
            $('.fc-overlay').addClass('active');
            updateResizedDraggedEvents({_token: "{{ csrf_token() }}",row_id: event.id,booking_id: event.booking_id,start_date: moment(event.start).format("YYYY-MM-DD HH:mm:ss"),end_date: moment(event.end).format("YYYY-MM-DD HH:mm:ss"),status: event.status,taxi: event.resourceId})    
          }   
      }     
  };
  $('#fCalendar').fullCalendar(fcCalConfg);
}
function updateDroppedEventsOnDropNSave(pranDatas){
  pranDatas.end_date= pranDatas.end_date == null ? pranDatas.start_date : pranDatas.end_date;
  $.ajax({
      type: 'POST',
      //url: "{{url('update_booking_status')}}",
      url: "{{url('update_booked_driver_name')}}",
       data: pranDatas,
      success: function(resp){
        console.log(resp)
        setTimeout(function(){
          $('.fc-overlay').removeClass('active');
          $('#selectDriver .fa-spin').removeClass('fa-spinner');          
          $('#fCalendar').fullCalendar('destroy');
          gettingSettingEvents(moment().format());
          $('#selectDriver').modal('hide');
        },200)
      },
      error: function(err){
        console.log(err)
        setTimeout(function(){
          $('.fc-overlay').removeClass('active');
          $('#selectDriver .fa-spin').removeClass('fa-spinner');
        },200)
      }
    }) 
}
function updateResizedDraggedEvents(pranDatas){
  pranDatas.end_date= pranDatas.end_date == null ? pranDatas.start_date : pranDatas.end_date;
  $.ajax({
      type: 'POST',
      url: "{{url('update_booking_status')}}",
       data: pranDatas,
      success: function(resp){
        console.log(resp)
        setTimeout(function(){
          $('.fc-overlay').removeClass('active');
        },200)
      },
      error: function(err){
        console.log(err)
        setTimeout(function(){
          $('.fc-overlay').removeClass('active');
        },200)
      }
  }) 
}
    
   
    function saveEvent(popoverclick){
        $popupWrper=$(popoverclick).closest(".save_event_form");
        currentEvent['status']=$popupWrper.find('.statusOption').val();
        var evntId=$popupWrper.attr('data-target');
        var startTime=moment(currentEvent.start).format("YYYY-MM-DD HH:mm:ss");
        var endTime=moment(currentEvent.end).format("YYYY-MM-DD HH:mm:ss");
      
        console.log(evntId+'--'+startTime+'----'+endTime+'---'+$popupWrper.find('.statusOption').val());//event id,start & end time
        if(evntId && startTime && endTime!='Invalid date' && $popupWrper.find('.statusOption').val() )
        {
          $.ajax({
              type: "POST",
              url: "{{url('structure_booking_status')}}",
              data:{ _token: "{{ csrf_token() }}",row_id:evntId,start_date:startTime,end_date:endTime?endTime:startTime,'status': $popupWrper.find('.statusOption').val()},
              success:function(responce){
                console.log(responce)
                console.log(responce.validate); 
                if(responce.validate=='0')
                {
                  $('#validate_section').show(); 
                }
                else
                {
                  $('#validate_section').hide();
                }

               // displayMessage("Events Saved  Success...",'alertmessage','success');
               $(popoverclick).closest(".popover").hide().remove();
               $('#fCalendar').fullCalendar('updateEvent', currentEvent);
              },
              error:function(responce){
                console.log(responce)
              }
          });
        }
        else
        {
          console.log('set  End  time of events'); 
          alert("set  End  time of events"); 
        }
    } 

  function displayMessage(message,class_name,type) {
    $("."+class_name).html('<span class="text-'+type+'">'+message+'</span>');
    setInterval(function() { $(".text-"+type).fadeOut(); }, 4000);
  }
$('#selectDriver select').change(function(){
if($(this).val()){
$(this).next('.text-danger').text('');
}
})
$(function(){
  $("#custom-picker").daterangepicker({
      datepickerOptions : {
        numberOfMonths : 2,
        inline: false,
        altFormat: 'dd/mm/yy',
        minDate: new Date(),
        maxDate: null,
        minRangeDuration: 0,
        showSplitDay: false, 
        defaultDate : new Date(moment().add(2,'days')),
        gotoCurrent: true
      },      
  })
})
function gettingSettingEvents(newDate){
  var defDate=newDate;
  defDate=moment(defDate).format("YYYY-MM-DD"); 

  var  resourceVals='';
   var allEvents =''; 
  $.ajax({
    type: 'POST',
    url: '{{url("get_events_of_day")}}',
    data: {_token: "{{ csrf_token() }}",date: defDate},
    success: function(resp){
      // console.log(resp.all_events_of_the_day)
      // console.log(resp.get_all_taxi)
      // console.log(resp); 
      // console.log(resp.validate); 
       resourceVals=resp.get_all_taxi;
       allEvents=resp.all_events_of_the_day;
       if(resourceVals && allEvents){ updateCalConfig(defDate,resourceVals,allEvents); }
       if(resp.validate=='0' && resp.all_car_driver_list.length )
         {
           $('#validate_section').show(); 
         }
         else
         {
          $('#validate_section').hide();
         }
         if(resp.all_car_driver_list.length > 0)
         {
           var sethtml_data='';
           for (let index = 0; index < resp.all_car_driver_list.length; index++) { 
             sethtml_data+='<tr title="'+resp.all_car_driver_list[index].id+'"><td>'+resp.all_car_driver_list[index].taxi_title+'</td> <td>'+resp.all_car_driver_list[index].driver_name+'</td><td>'+resp.all_car_driver_list[index].booking_type+'</td></tr>';
           }
           $('.pp_tabulator table tbody').html(sethtml_data);
           if(sethtml_data==""){ $('.pp_tabulator table tbody').html(""); }
         }
         else
         {
          $('.pp_tabulator table tbody').html("");
         }
      // resourceVals=resp.resourceVals;
      // allEvents=resp.allEvents;
      setTimeout(function(){
        $('.fc-overlay').removeClass('active');
      },200)
    },
    error: function(err){
      console.log(err)
      resourceVals='';
      allEvents='';
      setTimeout(function(){
        $('.fc-overlay').removeClass('active');
      },200)
    }
  })
  // updateCalConfig(defDate,resourceVals,allEvents);
}
$(document)
.ready(function(){
  $('.fc-overlay').addClass('active');
  var defDate=moment().format();
  console.log('called')
  gettingSettingEvents(defDate);    
})
.on('click','.fc-button-group .fc-prev-button',function(){
  $('.fc-overlay').addClass('active');
  var fcActiveDate = $('#fCalendar').fullCalendar('getDate');
  var defDate=moment(fcActiveDate).subtract(0,'days').format();
    $('#fCalendar').fullCalendar('destroy');
    $("#custom-picker").daterangepicker('destroy').daterangepicker({
      datepickerOptions : {
        numberOfMonths : 2,
        inline: false,
        altFormat: 'dd/mm/yy',
        minDate: new Date(defDate),
        maxDate: null,
        minRangeDuration: 0,
      }      
    });   
    gettingSettingEvents(defDate);
})
.on('click','.fc-button-group .fc-next-button',function(){
  $('.fc-overlay').addClass('active');
  var fcActiveDate = $('#fCalendar').fullCalendar('getDate');
  var defDate=moment(fcActiveDate).add(0,'days').format();
   $('#fCalendar').fullCalendar('destroy');
   $("#custom-picker").daterangepicker('destroy').daterangepicker({
      datepickerOptions : {
        numberOfMonths : 2,
        inline: false,
        altFormat: 'dd/mm/yy',
        minDate: new Date(defDate),
        maxDate: null,
        minRangeDuration: 0,
      }      
  })
   gettingSettingEvents(defDate);
});
</script>
@endsection


