@extends('genral.layouts.mainlayout')
@section('title') 
<title>dashboard </title>
<style type="text/css">
		#financial-details thead th{
		white-space: nowrap;
	}
  .open-modal{
	position: absolute;
  	top: 15px;
	right: 15px;
	z-index: 999;
	}

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

#confirm-diving {
	z-index: 999999 !important;
}
.actDivingYValues[data-active="No"] {
		display: none;
}
.removeThisEvent{
		font-size: 21px;
		top: -2px;
		right: -3px;
		position: absolute;
		line-height: 1;
		height: auto;
		padding: 0;
		background: #ef5a5a;
		width: 21px;
		line-height: 21px;
		text-align: center;
		color: #fff;
		border-radius: 50%;
		z-index: 999;
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

#confirm-diving {
  z-index: 999999 !important;
}
.actDivingYValues[data-active="No"] {
	display: none;
}
.removeThisEvent{
	font-size: 21px;
	top: -2px;
	right: -3px;
	position: absolute;
	line-height: 1;
	height: auto;
	padding: 0;
	background: #ef5a5a;
	width: 21px;
	line-height: 21px;
	text-align: center;
	color: #fff;
	border-radius: 50%;
	z-index: 999;
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
.save_event_form [contenteditable] {
	border-bottom: 1px dotted #ddd;
		padding-right: 20px;
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
  vertical-align: middle;
  font-size: 13px;
  font-weight: 400;
  margin: 7px 7px 7px 0px;
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

#confirm-diving {
  z-index: 999999 !important;
}
.actDivingYValues[data-active="No"] {
	display: none;
}
.removeNewField {
  background: #fff;
  padding: 0;
  border: 1px solid #ce2323;
  width: 15px;
  cursor: pointer;
  height: 15px;
  position: relative;
  z-index: 1;
  line-height: 1;
  display: block;
  text-align: center;
  float: right;
  color: #ce2323;
  border-radius: 3px;
}
.popover-newFields p {
	position: relative;
}
.event_labels {
	padding: 0 5px;
	display: inline-block;
	vertical-align: top;
	font-weight: 600;
	border: 1px solid #0000003b;
	margin-bottom: 3px;
	margin-right: 3px;
}
</style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	 <!-- Content Header (Page header) -->
	 <section class="content-header">
			<h1> Update Tour Booking <small> Calender </small> </h1>
			<ol class="breadcrumb">
				 <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				 <li class="active">Dashboard</li>
			</ol>
	 </section>
	 <!-- Main content -->
	 <section class="content">
			<div class="wizard">

				 <?php $action='update_booking'; ?>
								<div class="tab-pane " role="tabpanel" id="step2">
									<div class="box box-success">
										<div class="box-header">
										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="box box-solid">
												<input type="hidden" id="booking_id" name="booking_id" value="{{$booking_deatils['tour_bookings_details']->booking_id}}" class="form-control" />
												<input type="hidden" id="booking_type" name="booking_type" value="{{$booking_deatils['tour_bookings_details']->booking_type}}" class="form-control" />
												@if(count($booking_deatils['get_all_activities_types']))
															<?php $a ='1'; ?>
														 @foreach($booking_deatils['get_all_activities_types'] as $value)
														
															<div class="box-header with-border">
																 <h4 class="box-title">{{ucfirst($value->title)}}</h4>
															</div>
															<div class="box-body">
																 <div id="external-events<?php if($a=='1') {}else{ echo $a; } ?>" class="external-events">
																 @if(count($booking_deatils['get_all_activities']))
																	 @foreach($booking_deatils['get_all_activities'] as $row)
																			 @if($row->activity_type==$value->id)
																			 <div class="external-event bg-{{$a}}" data-detail="{{$row->activities_details?$row->activities_details:''}}"  data-duration="{{$row->time_duration?$row->time_duration:''}}"  >{{$row->activity_name}}</div>
																			 @endif
																			 
																		@endforeach
																	 @endif
																 </div>
															</div>
															<?php $a++; ?>   
														 @endforeach
														@endif
												</div>
											</div>
											<div class="col-md-9">
												 
													<!-- {{$booking_deatils["tour_bookings_events_details"]}} -->
													
												<div class="box box-solid">
													<div class="box-body ">
														<div class="text-right">
														<!-- <a href="JavaScript:Void(0);" class="btn btn-primary">Make Offer</a>
														<a href="JavaScript:Void(0);" class="btn btn-primary">Edit Tour</a> -->
														<a href="" class="btn btn-success" data-toggle="modal" data-target="#confirmTour">Update Tour</a>
													</div>
														<div id="fCalendar"></div>
														<div id="popoverContent" class="hide">
															<form class="save_event_form">
															<div class="row">
																<div class="col-sm-12 ">
																	<div class="popover-inner">
																	<!-- <div class="popover-oldFields">
																		<p class="mt-10"><span class="lbl-name">Island Hopping:</span>
																		<textarea class="form-control text__editor"  name="island_hoping" rows="1" cols="80"></textarea>
																		</p>
																		<p class="mt-10"><span class="lbl-name">Includes :</span>
																		<textarea class="form-control text__editor" name="include" rows="1" cols="80"></textarea>
																		</p>
																		<p class="mt-10"><span class="lbl-name">Does not include :</span>
																		<textarea class="form-control text__editor" id="" name="doesntinclude" rows="1" cols="80"></textarea>
																		</p>
																	</div> -->
																	<div class="popover-newFields">
																		<span class="no-record">No record found!</span>
																	</div>
																	</div>
																</div>
																</div>
																<div class="row">
																<div class="col-sm-12">
																	<br/>
																	<p class="text-right">
																	<button onClick="addNewField(event);" type="button" class="btn btn-default pull-left" title="Add Field"><i class="fa fa-plus"></i></button>
																	<button onClick="saveEvent(this);" type="button" class="btn save-btn btn-success" >save</button>
																	</p>
																</div>
																</div>
															</form>               
														</div>
													 
														<!-- <div id="popoverContent" class="hide">
															<form class="save_event_form">
															 	<div class="row">
																	<div class="col-sm-12">
																		<h4 class="sep-div">Option</h4>
																		<p><span class="lbl-name">Lunch:</span>
																			<label for="lunchY"><input type="radio" name="lunchYN" id="lunchY" checked value="Yes">Yes</label>
																			<label for="lunchN"><input type="radio" name="lunchYN" id="lunchN" value="No">No</label>
																		</p>
																		<p><span class="lbl-name">Snorkelling:</span>
																			<label for="lunchsklY"><input type="radio" name="lunchskl" id="lunchsklY" checked value="Yes">Yes</label>
																			<label for="lunchsklN"><input type="radio" name="lunchskl" id="lunchsklN" value="No">No</label>
																		</p>
																		<p>
																			<span class="lbl-name">Special meal:</span>
																			<label for="spMeal1"><input type="radio" name="spMeal" id="spMeal1" value="No N__3">No N__3</label>
																			<label for="spMeal2"><input type="radio" name="spMeal" id="spMeal2" value="Vege. N">Vege. N</label>
																			<label for="spMeal3"><input type="radio" name="spMeal" id="spMeal3" checked value="Chick. N">Chick. N</label>
																		</p>
																		<h4 class="sep-div">Transport</h4>
																		<p>
																			<span class="lbl-name">Self-drive:</span>
																			<label for="selfDrvN"><input type="radio" name="selfDrvYN" id="selfDrvN" value="No">No</label>
																			<label for="selfDrvY"><input type="radio" name="selfDrvYN" id="selfDrvY" checked value="Yes">Yes</label>
																		</p>
																		<h4 class="sep-div">Activities</h4>
																		<p>
																			<span class="lbl-name">Diving:</span>
																			<label><input type="radio" id="dno" name="actDivingYN"  value="No" onchange="toggleDivingNo(this)">No</label>
																			<label class="d-yes"><input type="radio" name="actDivingYN" id="dyes" checked="" onchange="toggleDiving(this)" value="Yes">Yes</label>
																		</p>
																		<p>
																			<span class="lbl-name">Fishing:</span>
																			<label for="actFishN">
																				<input type="radio" name="actFishYN" id="actFishN"  value="No">No
																			</label> 
																			<label for="actFishY">
																				<input type="radio" name="actFishYN" id="actFishY" value="Yes" checked="">Yes
																			</label>
																		</p>
																		<p class="float-right"><button onClick="saveEvent(this);" type="button" class="btn save-btn btn-success" >save</button></p>
																	</div>
																</div>
															</form>
														</div> -->
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
			</div>
			<!-- /.row -->
	 </section>
	 <!-- /.content -->
</div>
<div class="modal fade" id="confirm-diving" role="dialog">
	 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">            
						<h4 class="modal-title">Diving</h4>
				</div>
				<form id="diving_form">
					<div class="modal-body">
				 
						<div id="checkpopup">
							<p><span class="lbl-name">Experienced:</span>
								<label for="expY"><input type="radio" name="expNY" id="expY" checked="" value="Yes">Yes</label>
								<label for="expN"><input type="radio" name="expNY" id="expN" value="No">No</label>
							</p>
							<p><span class="lbl-name">No. of Dives:</span>
								<label for="diveY"><input type="radio" name="dive12" id="diveY" checked="" value="1">One</label>
								<label for="diveN"><input type="radio" name="dive12" id="diveN" value="2">Two</label>
							</p>
							<p>
								<span class="lbl-name">No of divers:</span>
								<label for="diverY"><input type="radio" name="diver1" id="diverY" checked="" value="1">1</label>
							</p>
						</div>
					</div>
					<div class="modal-footer">
					<!--     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
							<button type="button" onClick="savediving(this);" class="btn btn-success">Save diving</button>
					</div>
				</form>
			</div>
	 </div>
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="goback" role="dialog">
	 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Action</h4>
				 </div>
				 <div class="modal-body">
						<p class="text-center">If You want to change date <a href="dashboard">go back</a> to date selection page</p>
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
							 <div id="myMap" style="height:435px;  width:100%;position: static; "></div>
							 <input id="map_address" type="text" style="width:600px;"/><br/>
							 <input type="text" id="latitude" placeholder="Latitude"/>
							 <input type="text" id="longitude" placeholder="Longitude"/>
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
			<div class="modal-content" style="position: static;">
				 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Select  destination Address</h4>
				 </div>
				 <form action="{{url('booking')}}"  method="post" >
						{{ csrf_field() }}
						<div class="modal-body" style="padding:0px; " >
							 <div id="myMap2" style="height:435px;  width:100%;     position: static; "></div>
							 <input id="map_address2" type="text" style="width:600px; "/><br/>
							 <input type="text" id="latitude2" placeholder="Latitude"/>
							 <input type="text" id="longitude2" placeholder="Longitude"/>
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
						</div>
				 </form>
			</div>
	 </div>
</div>

<div class="modal fade" id="confirmTour" role="dialog">
	 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" style="color:#000 !important">&times;</button>
						<h4 class="modal-title">Send Offer to customer</h4>
				 </div>
				 <div class="modal-body">
					<p class="text-left"> The offer will be sent to the customer via </p>
					<label class="mb-10"><input type="checkbox"> Email (LeonTan123@example.com </label>
					<label><input type="checkbox"> WhatsApp (+60 123 456 789) </label>
				 
				 </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-success" id="save">Save changes</button>
			</div>
			</div>
	 </div>
</div>
<!--  financial details Modal -->
<div class="modal fade" id="financial-details" role="dialog">
	 <div class="modal-dialog modal-lg">
		<div class="modal-content" style="position: static;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
					<h4 class="modal-title">Financial Details</h4>
				</div>
			
			<div class="modal-body">
				<div class="table-responsive">
					<div class="row">
						<div class="col-md-6">
							<h4 class="mb-2"><b>Internal</b></h4>
						</div>
						<div class="col-md-6 text-right pr-4">
							<button type="button" class="btn btn-info btn-xs next-page"> External Info</button>
							<button type="button" class="btn btn-info btn-xs prev-page hidden"> Internal Info</button>
						</div>
					</div>
					<div id="page-1" class="">
						<table class="table table-striped table-bordered">
			
						</table>    
					</div>
					<div id="page-2" class="hidden">
						<table class="table table-striped table-bordered">
			
						<tbody> 
						
						</tbody>
			
						</table>    
					</div>
				</div>
							
			</div>
			<div class="modal-footer">
			        <span class="financial_alert_message"></span>&nbsp;&nbsp;
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary submit-finance">Submit</button>
			</div>
		
		</div>
	</div>
</div>


@endsection
@section('customjs')
<script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script type="text/javascript">
var all_taxi=<?php echo !empty($booking_deatils['get_all_Taxies'])?$booking_deatils['get_all_Taxies']:'' ?>;
console.warn(all_taxi)
			var daysval = ""
			var txtval = ""
			var tourId;
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
			 //  End oF the Google  map  Selction 
	 
			//get Arrival Time  Scheduled   OF Flight 
			function  get_arrival_time_scheduled(flight)
			{
					 $.ajax({
									type: "POST",
									url: "{{url('get_arrival_time_scheduled')}}",
									data: {'flight_id':flight.value,"_token":"{{ csrf_token() }}"},
									success: function(result){
											// console.log(result);
											if(result){
												$('#arrival_flight_time').val(result);    
											}
											else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
									}
							});
	 
			}
			function  get_departure_time_scheduled(flight)
			{
					 $.ajax({
									type: "POST",
									url: "{{url('get_arrival_time_scheduled')}}",
									data: {'flight_id':flight.value,"_token":"{{ csrf_token() }}"},
									success: function(result){
											// console.log(result);
											if(result){
												$('#departure_flight_time').val(result);    
											}
											else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
									}
							});
	 
			}
	 
	 
		 /*code: 48-57 Numbers
				8  - Backspace,
				35 - home key, 36 - End key
				37-40: Arrow keys, 46 - Delete key*/
				function restrictAlphabets(e){
					var x=e.which||e.keycode; 
					if((x>=48 && x<=57) || x==8 ||
						(x>=35 && x<=40)|| x==46)
						return true;
					else
						return false;
			}
	 
		//   Count total day  OF Tour  At End  of them 
		
		function  count_day(e)
		{  
					var x=e.which||e.keycode; 
					if((x >=48 && x<=57) || x==8 || (x>=35 && x<=40)|| x==46)
					{
					 
						
						return true;
						
					}
					else
					{
						return false;
					}
	 
		}
		$(function () {
			$(".timepicker").timepicker({
					showInputs: false
			})
		});
		 $('#bookingform').submit(function(e){
					e.preventDefault(); 
				 
					//{{url($action)}}
					var formdata = $(this).serialize();
					$.ajax({
									type: "POST",
									url: "{{url($action)}}",
									// data: {'row_id':rowId,"_token":"{{ csrf_token() }}"},
									data: formdata, // here $(this) refers to the ajax object not form
									success: function(result){
											console.log(result);
											if(result=='200'){
												console.log('Submit');
												$('.alertmessage').html('<span class="text-success">Submit ...</span>');
											}
											else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
									}
							});
		});

		/* Start  of the  Submit  Financial  */
		$('.submit-finance').on('click', function(){
			var drop = false;
			submitFinacialData();
		});
		/* End of  Submit  Financials   */


</script>

<script>

   $(document).ready(function () {
	   	// next page
		$('.next-page').on('click',function(){
			$('.next-page, #page-1').addClass('hidden');
			$('.prev-page, #page-2, .submit-finance').removeClass('hidden');
			$('#financial-details h4 > b').text(
				$('.next-page.hidden').text().split('Info')[0]
			)
		});

		$('.prev-page').on('click',function(){
			$('.next-page, #page-1').removeClass('hidden');
			$('.prev-page, #page-2,.submit-finance').addClass('hidden');
			$('#financial-details h4 > b').text(
				$('.prev-page.hidden').text().split('Info')[0]
			)
		});

		var count = 0;
		$(document).on('click', '.add-supplier', function(e){
			count++;
			// var th =  $(this).closest('th').clone(true);
			var index = $(this).closest('th').index(),
			id = $(this).closest('table').parent().siblings('div').attr('id');
			txt = id == 'page-2' ? 'External Supplier' : 'Internal Supplier';

			$('#financial-details table').each(function(i){
				// console.log($(this).find('thead > tr').find('th').eq(index))	
				$(this).find('thead > tr').find('th').eq(index).after(
					// $(this).find('thead > tr').find('th').eq(index).clone(true)
					$('<th />',{'contenteditable': true}).append(
						i == 0 ? ' Supplier' : 'Supplier' ,
						//  + parseInt(count+Number(1)) ,
						 ' ',
						$(this).find('thead > tr').find('th').eq(index).find('.add-supplier').clone(true)
					)
					
				)

				$(this).find('thead > tr').find('th').eq(index).empty().append(
					i == 0 ? 'Supplier' : 'Supplier' ,
					//  + count ,
					 ' ',
					$('<span />',{'class': 'delete-supplier'})
						.append($('<i />',{'class': 'fa fa-trash'})
					)
				)
				// var newTxt = $(this).find('thead > tr').find('th').eq(index).text();
				$(this).find('tbody > tr').each(function(){

					$(this).find('td').eq(index).find('input').attr(
						'placeholder', 'value'
						// +parseInt(count)
					)	

					$(this).find('td').eq(index).after(
						$('<td />').append(
							// $('<input type="number" name="int_supplier_value'+count'"').val('')
							$('<input />',{
								'type': 'number',
								'name': 	i == 0 ? 'int_supplier_value-' + parseInt(count+Number(1)) : 'ext_supplier_value' + parseInt(count+Number(1)),
								'class': 'form-control',
								'placeholder': 'Value'
								// +parseInt(count+Number(1))
							})
						)
					)

				})
					

			
			})


		});

		var discount = 0;
		$(document).on('click', '.add-discount', function(e){
			discount++;
			// var th =  $(this).closest('th').clone(true);
			var index = $(this).closest('th').index(),
			id = $(this).closest('table').parent().siblings('div').attr('id');
			txt = id == 'page-2' ? 'Discount' : 'Discount';

			$('#financial-details table').each(function(i){
				$(this).find('thead > tr').find('th').eq(index).after(
					// $(this).find('thead > tr').find('th').eq(index).clone(true)
					$('<th />',{'contenteditable': true}).append(
						i == 0 ? 'Discount' : 'Discount' ,
						//  + parseInt(discount+Number(1)) ,
						 ' ',
						$(this).find('thead > tr').find('th').eq(index).find('.add-discount').clone(true)
					)
					
				)

				$(this).find('thead > tr').find('th').eq(index).empty().append(
					i == 0 ? 'Discount' : 'Discount' ,
					//  + discount ,
					 ' ',
					$('<span />',{'class': 'delete-discount'})
						.append($('<i />',{'class': 'fa fa-trash'})
					)
				)
				// var newTxt = $(this).find('thead > tr').find('th').eq(index).text();
				$(this).find('tbody > tr').each(function(){

					$(this).find('td').eq(index).find('input').attr(
						'placeholder', 'Discount'
						// +parseInt(discount)
					)	

					$(this).find('td').eq(index).after(
						$('<td />').append(
							// $('<input type="number" name="int_discount_value'+discount'"').val('')
							$('<input />',{
								'type': 'number',
								'name': 	i == 0 ? 'int_discount-' + parseInt(discount+Number(1)) : 'ext_discount_value' + parseInt(discount+Number(1)),
								'class': 'form-control',
								'placeholder': 'Discount'
								// +parseInt(discount+Number(1))
							})
						)
					)

				})
					

			
			})

		});

		$(document).on('click', '.delete-supplier', function(){
			var indexDel = $(this).closest('th').index();
			$('#financial-details table').each(function(){
				$(this).find('thead > tr').find('th').eq(indexDel).remove();
				$(this).find('tbody > tr').each(function(){
					$(this).find('td').eq(indexDel).remove();
				})
			})
		})

		$(document).on('click', '.delete-discount', function(){
			var indexDel = $(this).closest('th').index();
			$('#financial-details table').each(function(){
				$(this).find('thead > tr').find('th').eq(indexDel).remove();
				$(this).find('tbody > tr').each(function(){
					$(this).find('td').eq(indexDel).remove();
				})
			})
		})
	})

	var popoverElement,popoverElement='',$currentPopupDetailWrapper='',$currentPopoverToOpt='';
	function closePopovers() {
		$('.popover').not(this).popover('hide');
	}
	$('body').on('click', function (e) {
		// close the popover if: click outside of the popover || click on the close button of the popover
		if (popoverElement && ((!popoverElement.is(e.target) && popoverElement.has(e.target).length === 0 && $('.popover').has(e.target).length === 0) || (popoverElement.has(e.target) && e.target.id === 'closepopover'))) {
			closePopovers();
		}
	});
	//getting days range
function gettingDaysRange(renderingEventsDaterange){
		var dates1= new Date(renderingEventsDaterange.start);
		var dates2= new Date(renderingEventsDaterange.end);
		var differenceVal=Math.abs(dates1.getTime() - dates2.getTime());
		differenceVal = differenceVal / (1000 * 3600 * 24);
		return differenceVal;
}
var currentEvent,saveEvtObj={},$currentPopupDetailWrapper='',
		$currentPopoverToOpt='',offsetLeft=0;
	function toggleDiving(e){ 
		$currentPopoverToOpt=$(e).closest('.save_event_form');
		$currentEventTarget=$('#'+$currentPopoverToOpt.attr('data-target')).find('.event-custom-data');
		if ($('#dyes').is(':checked')){
				// $('#fCalendar .activeEvent .event-custom-data .actDivingYValues').slideDown();
				$('#confirm-diving').modal('show');

				// $currentPopoverToOpt=$(e.target).closest('.save_event_form');

				$('#checkpopup input').each(function(){
					$(this).removeAttr('checked');
				})
				// console.log('$currentPopupDetailWrappe.text')
				// console.log($currentPopupDetailWrapper.find('.expNY span').text())
				// console.log($currentPopupDetailWrapper.find('.dive12 span').text())
				if($currentEventTarget.find('.expNY span').text() == 'Yes')
				{
					$('#checkpopup #expY').prop('checked',true);
				}
				else
				{
					$('#checkpopup #expN').prop('checked',true);
				}
				if($currentEventTarget.find('.dive12 span').text() == '1')
				{
					$('#checkpopup #diveY').prop('checked',true);
				}
				else
				{
					$('#checkpopup #diveN').prop('checked',true);
				}

				$('#checkpopup #diverY').prop('checked',true);
		}
		else {
				$('#confirm-diving').modal('hide');
				// $('#fCalendar .activeEvent .event-custom-data .actDivingYValues').slideUp();
		}  
	}
	function toggleDivingNo(e){
		$('#confirm-diving').modal('hide');
		// $currentEventTarget=$('#'+$currentPopoverToOpt.attr('data-target')).find('.event-custom-data');
		// $currentEventTarget.find('.expNY span').text('Yes');
		// $currentEventTarget.find('.dive12 span').text('1');
	}
	$(function () 
	{
		var start_day='{{$booking_deatils["tour_bookings_details"]["booking_start_date"]}}';
		var end_day='{{$booking_deatils["tour_bookings_details"]["booking_end_date"]}}';
		var renderingEventsDaterange={"start":start_day,"end":end_day};
		// var renderingEvents=<?php print_r($booking_deatils["tour_bookings_details"]['events_data']); ?>; 
		var renderingEvents=<?php print_r($booking_deatils["tour_bookings_events_details"]); ?>; 
		
	console.log(renderingEvents)
		/* initialize the external events
		-----------------------------------------------------------------*/
		function init_events(ele) {
		 ele.each(function () {
			 // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			 // it doesn't need to have a start or end
			 var eventObject = {
				 title: $.trim($(this).text()) // use the element's text as the event title
			 }
			 // store the Event Object in the DOM element so we can get to it later
			 $(this).data('eventObject', eventObject)
			 // make the event draggable using jQuery UI
			 $(this).draggable({
				 zIndex        : 1070,
				 revert        : true, // will cause the event to go back to its
				 revertDuration: 0  //  original position after the drag
			 })
		 })
		}
		init_events($('.external-events div.external-event'))
		/* initialize the calendar
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
			$('#add-new-event').click(function (e) {
				e.preventDefault()
				//Get value and make sure it is not null
				var val = $('#new-event').val()
				if (val.length == 0) {
					return
				}
				//Create events
				var event = $('<div />')
				event.css({
					'background-color': currColor,
					'border-color'    : currColor,
					'color'           : '#fff'
				}).addClass('external-event')
				event.html(val)
				$('.external-events').prepend(event)
					//Add draggable funtionality
					init_events(event)
					//Remove event from text input
					$('#new-event').val('')
			})
	// $(document).on('click','.fCalendar-wrapper',function()
	// {
			var popTemplate = [
				'<div class="popover" style="max-width:600px;width:580px">',
				'<div class="arrow"></div>',
				'<div class="popover-header">',
				'<button id="closepopover" type="button" class="close" aria-hidden="true" >&times;</button>',
				'<h3 class="popover-title"></h3>',
				'</div>',
				'<div class="popover-content"></div>',
				'</div>'].join('');

		
				var date = new Date();
				var d = date.getDate();
				var m = date.getMonth();
				var y = date.getFullYear();
				var sttDtt = $('#booking_start_date').val();
				function renderViewColumns(view, element) {
					element.find('th.fc-day-header.fc-widget-header').each(function() {
						var theDate = moment($(this).data('date')); /* th.data-date="YYYY-MM-DD" */
						$(this).html(buildDateColumnHeader(theDate));
					});

					function buildDateColumnHeader(theDate) {
						var container = document.createElement('div');
						var DDD = document.createElement('div');
						var ddMMM = document.createElement('div');
						// DDD.textContent = theDate.format('ddd').toUpperCase();
						ddMMM.textContent = theDate.format('DD MMM');
						// container.appendChild(DDD);
						container.appendChild(ddMMM);
						return container;
					}
				}

				$('#fCalendar').fullCalendar({
						viewRender: renderViewColumns,
						defaultView: 'agendaCustomDay',
						// plugins: [ 'timeGrid' ],
						defaultDate:new Date(start_day),
						firstDay:  new Date(end_day).getDay(),
						// defaultDate: start_day,
						// firstDay: (end_day).getDay(),
					
						views: 
						{
							agendaCustomDay: 
							{
							type: 'agenda',
							duration: { 
										days: parseInt(gettingDaysRange(renderingEventsDaterange)) + parseInt(1)
									},
									buttonText: '4 day'
							}
						},
						events: renderingEvents,
						selectable: true,
						// allDaySlot: false,
						slotEventOverlap: false,
						eventOverlap: function (stillEvent, movingEvent) {
							return stillEvent.allDay && movingEvent.allDay;
						},
						columnFormat: {
							week: 'MMM d'//20 feb
						},
						allDayText: 'Time',
						editable  : true,
						eventResizableFromStart: true,
						timeFormat: 'H:mm',
						droppable : true,
						drop  : function (date, jsEvent, ui,allDay) {

							// Finance Details //
							var passenger= $('#passengers').val();
							var tour_id= tourId; 
							var drop = true;
							addFinancialData(passenger, tour_id);

							if(popoverElement)
								popoverElement.not(this).popover('hide');
								var $this = $(this);
								var dataattr = $this.attr('data-duration');
								var newEvtData=$this.attr('data-detail');
								tourId = $this.attr('data-id');
								// console.log("dropped");
								// console.log(date.format());
								var end = date.clone().add(moment(dataattr.toString(),"LT"), 'hours') ;
								// console.log('end is ' + end.format());

								var originalEventObject = $this.data('eventObject');
								// we need to copy it, so that multiple events don't have a reference to the same object
								var copiedEventObject = $.extend({}, originalEventObject);
								var edate = $.fullCalendar.moment(date.format());  // Create a clone.
								edate.stripTime();        
								edate.time(end);   
								copiedEventObject.end = edate;
								copiedEventObject.start           = date;
								copiedEventObject.allDay          = false;
								copiedEventObject.backgroundColor = $this.css('background-color');
								// console.log(copiedEventObject.backgroundColor)
								copiedEventObject.borderColor     = $this.css('border-color');
								var id=Math.floor((Math.random() * new Date().getTime())).toString();
								copiedEventObject.id           = id;
								if(newEvtData)
									copiedEventObject['evtData']=JSON.parse(newEvtData);
								if($(this).hasClass('bg-1')){
									copiedEventObject.tourEvent=true;
									// console.log($(this).hasClass('bg-1'))
								}
								else{
									// console.log($(this).hasClass('bg-1'))
									copiedEventObject.tourEvent=false;
								}

								
							setTimeout(function(){
								submitFinacialData(drop);
								copiedEventObject['financeData'] = submitFinacialData(drop);
								$('#fCalendar').fullCalendar('renderEvent',copiedEventObject,true);
							},500);
								// console.log(id)
							// var $this = $(this);
							// var dataattr = $(this).attr('data-duration');
							// // console.log("dropped");
							// // console.log(date.format());
							// var end = date.clone().add(moment(dataattr.toString(),"LT"), 'hours') ;
							// // console.log('end is ' + end.format());

							// var originalEventObject = $this.data('eventObject');
							// // we need to copy it, so that multiple events don't have a reference to the same object
							// var copiedEventObject = $.extend({}, originalEventObject);
							// var edate = $.fullCalendar.moment(date.format());  // Create a clone.
							// edate.stripTime();        
							// edate.time(end);   
							// copiedEventObject.end = edate;
							// copiedEventObject.start           = date;
							// copiedEventObject.allDay          = false;
							// copiedEventObject.backgroundColor = $this.css('background-color');
							// copiedEventObject.borderColor     = $this.css('border-color');
							// var id=Math.floor((Math.random() * new Date().getTime())).toString();

							// copiedEventObject.id           = id;
							// 	// console.log(id)
							// $('#fCalendar').fullCalendar('renderEvent',copiedEventObject,true);
						},
						select: function (event, jsEvent, view) {
							// console.log('select');
							// if(typeof closePopovers != 'undefined'){
							// 	closePopovers();
							// }

							// currentEvent=event;
							// popoverElement = $(jsEvent.target);
							// $(jsEvent.target).popover({
							// 	title: 'the title',
							// 	content: function () {
							// 			return $("#popoverContent").html();
							// 	},
							// 	template: popTemplate,
							// 	// placement:,
							// 	html: 'true',
							// 	trigger: 'click',
							// 	animation: 'true',
							// 	container: 'body'
							// }).popover('show');

							if(popoverElement)
								popoverElement.not(this).popover('hide');
								currentEvent=event;
								popoverElement = $(jsEvent.target);
								if(event.tourEvent)
								$(jsEvent.target).popover({
									title: 'the title',
									content: function () {
										return newPopover;
									},
									template: popTemplate,
									placement: 'left',
									html: 'true',
									trigger: 'click',
									animation: 'true',
									container: 'body'
								}).popover('show');
						},
						eventClick:  function(event, jsEvent, view) {
							currentEvent=event;
			$('#fCalendar .activeEvent').removeClass('activeEvent');
			$(this).addClass('activeEvent');
			$currentPopupDetailWrapper=$(this);
			// console.log(view)
			// 2
			popoverElement = $(jsEvent.currentTarget);
			// console.log(popoverElement)
			// console.log(event);
			if(popoverElement)
			popoverElement.not(this).popover('hide');
			$('.popover-title').html(event.title);
			$('.popover-content').html(event.description);
			$('.popover-content').each(function(){
			if(!$(this).find('.popover-inner .text__editor').length){
				$(this).find('.popover-inner .no-record').show();
			}
			})

			$(".close").on('click', function(e){
				e.preventDefault();
				$(this).closest(".popover").hide();
			})
							// console.log(event)
							// console.log(jsEvent)
							// console.log($(window).width())
						//  offsetLeft=$(jsEvent.target).closest('.fc-time-grid-event').offset().left;
						// 	// console.log(jsEvent.screenX)
						// 	// console.log(view)


						// 	currentEvent=event;
						// 	if (currentEvent.lunchYN == "No") {
						// 		$(".popover-content").find('#lunchN').attr('checked', true);

						// 	} else {
						// 			$(".popover-content").find('#lunchY').attr('checked', true);

						// 	}
						// 	if (currentEvent.selfDrvYN == "No") {
						// 			$(".popover-content").find('#selfDrvN').attr('checked', true);

						// 	} else {
						// 			$(".popover-content").find('#selfDrvY').attr('checked', true);

						// 	}
						// 	if (currentEvent.spMeal == "No N__3") {
						// 			$(".popover-content").find('#spMeal1').attr('checked', true);

						// 	} else if (currentEvent.spMeal == "Vege. N") {
						// 			$(".popover-content").find('#spMeal2').attr('checked', true);

						// 	} else {
						// 			$(".popover-content").find('#spMeal3').attr('checked', true);

						// 	}
						// 	if (currentEvent.lunchskl == "No") {
						// 		$(".popover-content").find('#lunchsklN').attr('checked', true);
									

						// 	} else {
						// 			$(".popover-content").find('#lunchsklY').attr('checked', true);

						// 	}
						// 	if (currentEvent.actDivingYN == "No") 
						// 	{
						// 			$(".popover-content").find('#dno').attr('checked', true);
						// 			$(".actDivingYValues").addClass("hello")

						// 	} else {
						// 			$(".popover-content").find('#dyes').attr('checked', true);

						// 	}
						// 			if (currentEvent.expNY == "No") {
						// 				$(".popover-content").find('#expN').attr('checked', true);

						// 			} else {
						// 				$(".popover-content").find('#expY').attr('checked', true);

						// 			}
						// 			if (currentEvent.dive12 == 2) {
						// 				$(".popover-content").find('#diveN').attr('checked', true);

						// 			} else {
						// 				$(".popover-content").find('#diveY').attr('checked', true);

						// 			}
						// 			if (currentEvent.diver1 == 1) {
						// 				$(".popover-content").find('#diverY').attr('checked', true);

						// 			} 

						// 	if (currentEvent.actFishYN == "No") {
						// 			$(".popover-content").find('#actFishN').attr('checked', true);

						// 	} else {
						// 			$(".popover-content").find('#actFishY').attr('checked', true);

						// 	}
							
						// 	console.log('evenclick');
						// 	// console.log(jsEvent)
						// 	$('#fCalendar .activeEvent').removeClass('activeEvent');
						// 	$(this).addClass('activeEvent');
						// 	$currentPopupDetailWrapper=$(this);
						// 	// console.log(view)
						// 	// 2
						// 	popoverElement = $(jsEvent.currentTarget);
						// 	$('.popover-title').html(event.title);
						// 	$('.popover-content').html(event.description);

						// 	$(".close").on('click', function(e){
						// 		e.preventDefault();
						// 		$(this).closest(".popover").hide();
						// 	})
						
						},
						eventRender: function (event, element,jsEvent) {
			// console.log(event);
			// console.log(jsEvent );
			// console.log(element);
			element.click(function(){
				offsetLeft=$(this).closest('.fc-time-grid-event').offset().left;
			})
			currentEvent=event;
			if(event.tourEvent)
				element.popover({
					title: 'title',
					content: function(){
						$("#popoverContent").find('.save_event_form').attr('data-target',event.id);
						var newPopover=$($("#popoverContent").html());

						$("#popoverContent").find('.save_event_form').attr('data-target','');

							newPopover.find('.popover-newFields .no-record').show();
							if(event.evtData)
							{
							if(event.evtData.length > 1){
								newPopover.find('.popover-inner').addClass('maxHgt');
							}
							newPopover.find('.popover-newFields .no-record').hide();
							event.evtData.forEach(function(elem,index){

								newPopover.find('.popover-newFields').append(setNewField($(this),elem))
								console.log(elem)
								// console.log(index)
							})
							}
						return newPopover;
					},
					template: popTemplate,
					placement: function(e){
						var popoverWlength=parseFloat(offsetLeft) + parseFloat($(e).width()) + 50 ;                  
						if($(window).width() < popoverWlength){
							return 'left'
							}
							else{
							return 'top'
							}
						},
						html: 'true',
						trigger: 'click',
						animation: 'true',
						container: 'body'
						})
						// ,function(){
						//   console
						// });

						var resouces = element.find('.fc-content');
						resouces.closest('a').on('click',function(){
						if(popoverElement)
						popoverElement.not(this).popover('hide');
						})
						resouces.closest('a').css({'border-color': 'rgb(144, 144, 144)'});
						resouces.closest('a').attr({'title': resouces.text()});


						resouces.before("<a class='btn btn-sm btn-primary float-right open-modal'>Add Financial</a><span class='removeThisEvent'>&times;</span>").html('<span class="event_title" >'+ resouces.text() +'</span>');
						if(event.evtData)
						event.evtData.forEach(function(elem,index){
							console.log(elem)
							console.log(index)
							resouces.append('<span class="event_labels" >'+ elem.label +'</span>');
						})
						element.attr('id',event._id);


						element.find(".removeThisEvent").on("click", function() {
						$('body').find('.save_event_form').each(function(){
							if($(this).attr('data-target') == event._id){
							$(this).closest('.popover').hide(0,function(){
								$(this).remove();
							})
							}
						})
						$("#fCalendar").fullCalendar("removeEvents", event._id);
						});

						element.find(".open-modal").on("click", function(e) {
							e.stopPropagation();
							var passenger= $('#passengers').val();
							var tour_id= tourId; 
							$('#financial-details').modal('show');
							addFinancialData(passenger, tour_id);
							// console.log(passenger, tour_id, 'ajaxHit------------------')
						});
					},
						}) 
})//ready closed


$("#save").click(function () {
			var eventsFromCalendar = $('#fCalendar').fullCalendar('clientEvents');
			$("#confirmTour").hide();
			 var  booking_id=$('#booking_id').val(); 
			 var  booking_type=$('#booking_type').val(); 
			 console.log(eventsFromCalendar)
			 //console.log(eventsFromCalendar)
				var objects2 = new Array();
				 for (let index = 0; index < eventsFromCalendar.length; index++) {
						 // console.log(eventsFromCalendar[index])
						 // console.log(eventsFromCalendar[index].title) 
							//objects2[index]={title:eventsFromCalendar[index].title,end:eventsFromCalendar[index].end,start:eventsFromCalendar[index].start,allDay:eventsFromCalendar[index].allDay,backgroundColor:eventsFromCalendar[index].backgroundColor,borderColor:eventsFromCalendar[index].borderColor,_id:eventsFromCalendar[index]._id,className:eventsFromCalendar[index].className,_allDay:eventsFromCalendar[index]._allDay,_start:eventsFromCalendar[index]._start,_end:eventsFromCalendar[index]._end,lunchYN:eventsFromCalendar[index].lunchYN,lunchskl:eventsFromCalendar[index].lunchskl,spMeal:eventsFromCalendar[index].spMeal,selfDrvYN:eventsFromCalendar[index].selfDrvYN,actDivingYN:eventsFromCalendar[index].actDivingYN,actFishYN:eventsFromCalendar[index].actFishYN,expNY:eventsFromCalendar[index].expNY,dive12:eventsFromCalendar[index].dive12,diver1:eventsFromCalendar[index].diver1};
							objects2[index]={title:eventsFromCalendar[index].title,end:eventsFromCalendar[index].end,start:eventsFromCalendar[index].start,allDay:eventsFromCalendar[index].allDay,backgroundColor:eventsFromCalendar[index].backgroundColor,borderColor:eventsFromCalendar[index].borderColor,_id:eventsFromCalendar[index]._id,className:eventsFromCalendar[index].className,_allDay:eventsFromCalendar[index]._allDay,_start:eventsFromCalendar[index]._start,_end:eventsFromCalendar[index]._end,eventDetails:eventsFromCalendar[index].evtData,external:eventsFromCalendar[index].financeData[0].external,internal:eventsFromCalendar[index].financeData[0].internal};	
				 }
				var myJSON2 = JSON.stringify(objects2);
				$.ajax({
							type: "POST",
							url: "{{url('update_event')}}",
							data:{ _token: "{{ csrf_token() }}",event_data:myJSON2,booking_id:booking_id,start_date:'2020-02-02',end_date:'2020-02-02','booking_type':'tour' },
							success:function(responce){
								console.log(responce)
								$("#confirmTour").hide();
								displayMessage("Events Saved  Success...",'alertmessage','success');
								/* Redirect To Tour Bookings */
								window.location = "{{url('tour_bookings')}}";
							},
							error:function(responce){
								console.log(responce)
							}
							
					}); 

				
		});  
	 
		function saveEvent(popoverclick){
				$popupWrper=$(popoverclick).closest(".save_event_form");
				var newObj1=$popupWrper.data('diving'),newObj2={};
				// console.log(newObj1)
				// $('.popover').remove();
				$popupWrper.find("input:checked").each(function(){
						var newanme=$(this).attr('name');
						var newVal=$(this).val();
						newObj2[newanme]=$(this).val();
				})
				var saveEvtObj = Object.assign({},newObj1, newObj2);
				console.log($popupWrper.attr('data-target'))
				var $formElems=$('#'+$popupWrper.attr('data-target')+' .event-custom-data');

			$.each(saveEvtObj,function(key,value){
			 
					currentEvent[key]=value;
					if(key=='lunchYN')
					$formElems.find('.lunchYN span').text(value);

					else if(key=='lunchskl')
					$formElems.find('.lunchskl span').text(value);

					else if(key=='spMeal')
					$formElems.find('.spMeal span').text(value);

					else if(key=='selfDrvYN')
					$formElems.find('.selfDrvYN span').text(value);

					// else if(key=='actDivingYN')
					// $formElems.find('.actDivingYN span').text(value);

					else if(key=='actFishYN')
					$formElems.find('.actFishYN span').text(value);

					else if(key=='actDivingYN')
					$formElems.find('.actDivingYN span').text(value);

					else if(key=='expNY')
					$formElems.find('.expNY span').text(value);
				
					else if(key=='dive12')
					$formElems.find('.dive12 span').text(value);

					else if(key=='diver1')
					$formElems.find('.diver1 span').text(value);
			});
			$(popoverclick).closest(".popover").hide().remove();
			$('#fCalendar').fullCalendar('updateEvent', currentEvent);
		}
		function savediving(myclick){
			$("#diving_form input:checked").each(function(){
					var newanme=$(this).attr('name');
					saveEvtObj[newanme]=$(this).val();})
					var formdata={};
				$("#diving_form input:checked").each(function(){
					var newanme=$(this).attr('name');
					saveEvtObj[newanme]=$(this).val();
					formdata[newanme]=$(this).val();
			});
			
			$currentPopoverToOpt.data('diving',formdata);

			$('#confirm-diving').modal('hide');

			var $formElems=$('#fCalendar .activeEvent .event-custom-data');
			$.each(saveEvtObj,function(key,value){
			 
					currentEvent[key]=value;
					if(key=='actDivingYN')
					$formElems.find('.actDivingYN span').text(value);


					 else if(key=='expNY')
					$formElems.find('.expNY span').text(value);
				
					else if(key=='dive12')
					$formElems.find('.dive12 span').text(value);

					else if(key=='diver1')
					$formElems.find('.diver1 span').text(value);
			});
			// $('#fCalendar').fullCalendar('updateEvent', currentEvent);
		}

		function displayMessage(message,class_name,type) {
						 $("."+class_name).html('<span class="text-'+type+'">'+message+'</span>');
						 setInterval(function() { $(".text-"+type).fadeOut(); }, 4000);
		}
		function saveEvent(popoverclick){
			allPopoverData=[];
			$popupWrper=$(popoverclick).closest(".save_event_form");
			$popupWrper.find('.popover-newFields .text__editor').each(function(){
				allPopoverData.push({label: $(this).closest('p').find('.lbl-name').text(),value: CKEDITOR.instances[$(this).attr('name')].getData(),id:$(this).attr('name')});
			})
			popoverElement.popover('hide');
			currentEvent['evtData']=allPopoverData;
				// })
			//     if(key=='lunchYN')
			//     $formElems.find('.lunchYN span').text(value);

			//     else if(key=='lunchskl')
			//     $formElems.find('.lunchskl span').text(value);

			//     else if(key=='spMeal')
			//     $formElems.find('.spMeal span').text(value);

			//     else if(key=='selfDrvYN')
			//     $formElems.find('.selfDrvYN span').text(value);

			//     // else if(key=='actDivingYN')
			//     // $formElems.find('.actDivingYN span').text(value);

			//     else if(key=='actFishYN')
			//     $formElems.find('.actFishYN span').text(value);

			//     else if(key=='actDivingYN')
			//     $formElems.find('.actDivingYN span').text(value);

			//     else if(key=='expNY')
			//     $formElems.find('.expNY span').text(value);
				
			//     else if(key=='dive12')
			//     $formElems.find('.dive12 span').text(value);

			//     else if(key=='diver1')
			//     $formElems.find('.diver1 span').text(value);
			// });
			// $(popoverclick).closest(".popover").hide().remove();
			$('#fCalendar').fullCalendar('updateEvent', currentEvent);
		}

		function setNewField($this,newElemIndex){
			$this.closest('.save_event_form').find('.popover-newFields .no-record').hide();
			var  value=newElemIndex['value'],id=newElemIndex['id'],label=newElemIndex['label'];
			var newElemIndex=Math.floor((Math.random() * new Date().getTime())).toString();
			$newElement=$('<p class="mt-10" id="'+id+'"><span class="removeNewField">&times; </span><span class="lbl-name" contenteditable>'+label+' </span> : <textarea class="form-control text__editor" name="'+id+'" rows="1" cols="80">'+value+'</textarea> </p>');
			$newElement.find('[contenteditable]').blur(function(){
				var text='';
				text=$(this).text();
				if(!text){
					$(this).text('Add label name')
				}
			})
			$newElement.find('.text__editor').each(function(_, ckeditor){
					CKEDITOR.replace(ckeditor, {
					height: 85,
						toolbarGroups: [{"name": "basicstyles", "groups": ["basicstyles"] }, {"name": "links", "groups": ["links"] }, {"name": "paragraph", "groups": ["list", "blocks"] }, {"name": "document", "groups": ["mode"] }, {"name": "styles", "groups": ["styles"] }], removeButtons: 'Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
				});
			})
			$newElement.find('.removeNewField').click(function(){
				var $forms=$(this).closest('.save_event_form');
				$(this).hide();
				$(this).closest('p').slideUp(200,function(){
				$.when($(this).remove()).then(function(){
					// var $forms=$(this).closest('.save_event_form');
					console.log('removed !!!'+ $forms.find('.text__editor').length)
					if(!$forms.find('.text__editor').length){
						$forms.find('.popover-newFields .no-record').show();
					}
				});
				})
			})
			return $newElement;
		}
		function addNewField(event){
			if($(event.target).closest('.save_event_form').find('.popover-inner .text__editor').length > 0)
			$(event.target).closest('.save_event_form').find('.popover-inner').addClass('maxHgt');
			$(event.target).closest('.save_event_form').find('.popover-newFields .no-record').hide();
			var newElemIndex=Math.floor((Math.random() * new Date().getTime())).toString();

			console.log(newElemIndex);

			$newElement=$('<p class="mt-10" id="'+newElemIndex+'"><span class="removeNewField">&times; </span><span class="lbl-name" contenteditable>Add label name </span> : <textarea class="form-control text__editor" name="'+newElemIndex+'" rows="1" cols="80"></textarea> </p>');
			$newElement.find('[contenteditable]').blur(function(){
				var text='';
				text=$(this).text();
				if(!text){
					$(this).text('Add label name')
				}
			})
			$newElement.find('.text__editor').each(function(_, ckeditor){
					CKEDITOR.replace(ckeditor, {
					height: 85,
						toolbarGroups: [{"name": "basicstyles", "groups": ["basicstyles"] }, {"name": "links", "groups": ["links"] }, {"name": "paragraph", "groups": ["list", "blocks"] }, {"name": "document", "groups": ["mode"] }, {"name": "styles", "groups": ["styles"] }], removeButtons: 'Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
				});
			})
			$newElement.find('.removeNewField').click(function(){
				$(this).hide();
				$(this).closest('p').slideUp(200,function(){
				$.when($(this).remove()).then(function(){
					if(!$(event.target).closest('.save_event_form').find('.text__editor').length){
					$(event.target).closest('.save_event_form').find('.popover-newFields .no-record').show();
					$(event.target).closest('.save_event_form').find('.popover-inner').removeClass('maxHgt');
				}
				});

				})
			})
			var $form=$(event.target).closest('.save_event_form');
			$form.find('.popover-newFields').append($newElement);
			$form.find('.popover-inner').animate({scrollTop: ( $form.find('.popover-inner .popover-newFields').height())},300)
		}

		
		//financial Data function
		function addFinancialData(passenger, tour_id){
			$.ajax({
				type: "POST",
				url: "{{url('financials')}}",
				data: {'tour_id':tour_id,'passenger':passenger,"_token":"{{ csrf_token() }}"},
				// data: formdata, // here $(this) refers to the ajax object not form
				success: function(result){
					// console.log(result, all_taxi);
					// console.log("Success");
					$('#financial-details').find('table').empty();
					$.each(result, function(key, arrData){
						createTableDom(key, arrData, all_taxi);
					});
						
				
				},
				error:function(result){
					console.log(result); 
				}
			});

		}

		// addData In modal
		function createTableDom(key, mainData, all_taxi){
			console.log(key,mainData, all_taxi)
			var eqIndex;
			key.split('_')[0] == 'int' ?  eqIndex = 0 : eqIndex = 1;
			var $table = $('#financial-details').find('table').eq(eqIndex),
				$thead = $('<thead>'),
				$tbody = $('<tbody>'),
				$tbodyTr = $('<tr />');

			$.each(mainData, function(i, arrData){
				if(Array.isArray(arrData)){
					var $theadTr = $('<tr>')
					$.each(arrData,function(i, thData){
						//  console.log(thData.split(' ')[1]=="Supplier" ,thData.split(' ')[1])
						if(thData == 'Action'){
							$theadTr.append(
								$('<th>',{'class': 'text-left'}).html('Car'),
								$('<th>',{'class': 'text-left', 'contenteditable': true}).append(
									'Discount', ' ',
									$('<span>',{'class': 'add-discount'}).append(
										$('<i>',{'class': 'fa fa-plus'})
									)
								)
							);
							
						} 
						// else if(thData.split(' ')[1]=="Supplier" || thData.split(' ')[1]=="Discount"){
						// 	$theadTr.append(
						// 		$('<th>',{'contenteditable': true}).html(thData)	
						// 	);
						// }
						else{
							if(thData.match(/\<.*?\>/g) == null){
								$theadTr.append(
									$('<th>').html(thData)	
								);
							} else{
								$theadTr.append(
									$('<th>',{ 'contenteditable': true}).html(thData)	
								);
							}
							
						}

						
						
						$table.prepend($thead.append($theadTr));
					})
					} else{
						
						$.each(arrData, function(key, tbodyData){
							if(key.split(/(\d+)/)[0] == "action"){
								//$tbodyTr.append($('<td />',{'class': 'text-right'}).html(tbodyData));
								// $table.append($tbody.append($tbodyTr));
							} else{
								$tbodyTr.append(
									$('<td />').append(
										$('<input >',{
											'name': key,
											'class': 'form-control'
										}).val(tbodyData)
									)
								)
								$table.append($tbody.append($tbodyTr));
							}
								
						})
						
					}
			})
			// $tr = $('<tr>'),

			//Car
			$td =$('<td style="width: 200px">'),
			$select = $('<select>',{
				'class': 'form-control selectpicker',
				'multiple':'multiple',
				'onchange': 'mySelectPicker()',
				'name': 'car'
			});

			$.each(all_taxi, function(i, data){
				$select.append(
					$('<option>',{
						'data-airportCost': key == 'int_financial_data' ? data.airport_cost_internal : data.airport_cost_external,
						'data-id': 	data.id,
						'data-taxiCost':  key == 'int_financial_data' ? data.taxi_cost_internal : data.airport_cost_external,
						'data-tourCost':   key == 'int_financial_data' ? data.tour_cost_internal : data.tour_cost_external,
						'value': data.seats
						
					}).text(data.title)
				).appendTo($td.appendTo($tbodyTr.appendTo($tbody.appendTo($table))));
			})

			// discount
			$tbodyTr.append(
				$('<td />').append(
					$('<input >',{
						'class': 'form-control',
						'name': 'discount'+eqIndex
					})
				)
			).appendTo($tbody.appendTo($table));

						

		}

		// car changeMethod
		function mySelectPicker() {
			console.log('eee')
		}

		// SaveFinancial Data

		function submitFinacialData(drop){
				var objTable = {},
					arrTb1 = [],
					arrTb2  =[],
					mainArray = [];
					$('#financial-details table').each(function(index){
					var arrTh = [];
					$(this).find('thead tr th').each(function(indx){
						arrTh.push($(this).html());
					})
						$(this).find('tbody tr').each(function(indx){
							var obj = {};
							$(this).find('td').each(function(i){					
								if($(this).find('input').length){
									obj[$(this).find('input').attr('name')+indx] = $(this).find('input').val();
								} 
								else if($(this).find('select').length){
									obj[$(this).find('select').attr('name')+indx] = $(this).find('select').val();
								}
							});
							if(index == 0){
								arrTb1.push(obj)
							} else if(index == 1){
								arrTb2.push(obj)
							}
						
						});
							//    if(index == 0){
							// 		arrTb1.push(arrTh)
							// 	} else if(index == 1){
							// 		arrTb2.push(arrTh)
							// 	}
		
						objTable = {
							'internal': arrTb1,
							'external': arrTb2,
						}
					})
					
					objTable = {
						'internal': arrTb1,
						'external': arrTb2,
					}
					if(drop){
						console.log(objTable,'dsjfklsdjfalskfjl')
						mainArray.push(objTable);				
						return mainArray;
					} else{
							
						console.log(arrTb1)
						console.log("Second Array")
						console.log(arrTb2)
						var booking_id=$("#booking_id").val()?$("#booking_id").val():'';
						console.log("booking_id => "+booking_id)
						var stepOneAllFieldsVals={};
						stepOneAllFieldsVals['internal_financial_details']=arrTb1;
						stepOneAllFieldsVals['external_financial_details']=arrTb2;
						stepOneAllFieldsVals['booking_id']=$("#booking_id").val()?$("#booking_id").val():'';
						stepOneAllFieldsVals['_token']="{{ csrf_token() }}";
						$.ajax({
							type: "POST",
							url: "{{url('update_tour_financials')}}",
							//data:{ _token: "{{ csrf_token() }}",add_tour_template},
							data:stepOneAllFieldsVals,
							success:function(result){
								console.log(result); 
								if(result=='200')
								{
								//alert("Success");
								$('.financial_alert_message').html('<span class="text-success">Financial data saved </span>'); 
								$('#financial-details').modal('hide');
								}
								else
								{
								$('.financial_alert_message').html('<span class="text-danger">Somthing Went  worng !</span>'); 
									// alert('Error'); 
								}


							/* var responce=JSON.parse(result);
							if(responce.success=='1' && responce.template_id)
							{
								$.session.set("tour_template_id","");
								$.session.set("tour_template_id",responce.template_id);
								$('#tour_template_id').val(responce.template_id);
								console.warn('success') 
							}
							else if(responce.success=='0' && responce.template_id=='')
							{
								console.log('error')
							} */
							
							},
							error:function(responce){
								console.log(responce)
							}
						});

						mainArray.push(objTable);	
						currentEvent['financeData']=mainArray;
						$('#fCalendar').fullCalendar('updateEvent', currentEvent);
					}
					
				
		}

				 
</script>
<script src="{{ URL::asset('public/admin/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>

@endsection


