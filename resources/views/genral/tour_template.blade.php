@extends('genral.layouts.mainlayout3')
@section('title') 
<title>Add Tour  Template </title>
<link href='https://unpkg.com/fullcalendar-scheduler@1.10.0/dist/scheduler.min.css' rel='stylesheet' />

<style type="text/css">
	.mb-2{
		margin-bottom: 10px;
	}
 .breadcrumb li:not(.active) a{
	color: #777;
 }
 .breadcrumb li.active a{
	color: #000;
	font-weight: bold;
 }
 .pr-4{
	padding-right: 20px !important;
 }
 .d-flex{
	display: flex;
    flex-wrap: wrap;
	width: 200px;
 }
 .d-flex input.form-control {
    margin-right: 9px;
    flex-basis: 100px;
	max-width: 100px;
    margin-bottom: 5px;
}
.d-flex button {
 height: 34px;
 margin-left: 5px;
}
#financial-details thead th span{
	cursor: pointer;
}
#financial-details .modal-body{
    max-height: 500px;
    overflow-y: auto;
 
}
#financial-details .d-flex:not(:first-child){
	border-top: 1px solid  #e0e0e0;
	padding-top: 5px;
}
#financial-details thead th{
    white-space: nowrap;
}
[class^="icon-"],
[class*=" icon-"] {
  background-image: url("public/admin/bootstrap/glyphicons/glyphicons-halflings.png");
}
.mt-10 {
	margin-top: 10px !important;
}
div span.lbl-name{
  display: block;
  max-width: 100%;
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
.mt-53{
  margin-top: 53px;
}
</style>
@endsection
@section('content')<style type="text/css">
  .all_items_wrapper .col{  
	position: relative;
	width: 100%;
	min-height: 1px;
	padding-right: 15px;
	padding-left: 15px;    
	-ms-flex-preferred-size: 0;
	flex-basis: 0;
	-ms-flex-positive: 1;
	flex-grow: 1;
	max-width: 100%;
  }
  .all_items_wrapper .row{
	margin: 0;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-wrap: wrap;
	flex-wrap: wrap;
	position: relative;
  }
  .cost-title {
	padding: 15px;
	font-size: 21px;
	margin-bottom: 25px;
	border-bottom: 1px solid #ddd;
	padding-bottom: 10px;
}
.all_items_wrapper .remove-invoice-item {
	display: inline-block;
	vertical-align: top;
	position: absolute;
	top: 0;
	right: 0;
	max-width: 39px;
	padding: 9px 11px;
	height: auto;
	cursor: pointer;
}
img {
	max-width: 100%;
	width: 100%;
}
.all_items_wrapper > .row > .col:last-child {
	padding-right: 40px;
}
.all_items_wrapper label {
	color: #4a4a4a;
	font-weight: 600;
	font-size: 14px;
}
.CurrencyTypeBox .form-group {
	max-width: 321px;
}
.CurrencyTypeBox {
	margin: 0;
	padding: 0 15px;
}
.save_event_form [contenteditable] {
	border-bottom: 1px dotted #ddd;
		padding-right: 20px;
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
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <section class="content-header">
	  <h1> Add Tour Template <small> New </small> </h1>
	  <ol class="breadcrumb">
		 <li>
			<a href="#"><i class="fa fa-dashboard"></i> Home</a>
		  </li>
		 <li class="active">Dashboard</li>
	  </ol>
   </section>
	<section class="content">
		<div class="row">
		  <div class="col-sm-12">
			<div class="tab-content">
			  <div id="edit_cost" class="tab-pane fade in active">
				<div class="row">
			   
				  <div class="box box-primary">
					<div class="box-header">
					<div class="col-sm-12 text-center alert-msg">  </div>
					<form role="form" action="{{url('add_custom_activity')}}" method="post">
					{{ csrf_field() }}
					  <div class="box-body clearfix">
						<div class="col-sm-6 col-md-4 col-lg-3">
						  <div class="form-group">
							<label for="tourName">Tour Name</label>
							<input type="hidden" name="activity_type" id="activity_type"    value="{{isset($get_tour_type_row->id)?$get_tour_type_row->id:'5'}}">
							<input type="text" class="form-control" required  id="tourName" onkeypress="return restrictNumerics(event);" name="tourName" placeholder="Tour Name">
						  </div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3">
						  <div class="form-group">
							<label for="tourDur">Tour duration (ex transport)</label>
							<input type="number" class="form-control" maxlength="2" max='14' min="1" oninput="validity.valid||(value='');" required  id="tourDur" name="tourDur" placeholder="Tour duration (ex transport)">
						  </div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3">
						  <div class="form-group">
							<label for="tourFreq">Tour Frequency</label>
							<input type="text" class="form-control" required list="freq_list"  id="tourFreq" name="tourFreq" placeholder="Tour Frequency">
							  @if(count($get_Freq) > 0 )
							  <datalist   id="freq_list" >
							  @foreach($get_Freq as $value)
								  <option>{{ucfirst($value->tourFreq)}}
							  @endforeach
							  </datalist>
							  @endif
						  </div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3">
						  <div class="form-group">
							<label for="origin">Origin</label>
							<input type="text" class="form-control" required  list='region_list'  id="address" name="address" placeholder="Origin" autocomplete="off">
							  @if(count($pickup_drop_list) > 0 )
							  <datalist   id="region_list" >
							  @foreach($pickup_drop_list as $value)
								  <option>{{ucfirst($value->region)}}
							  @endforeach
							  </datalist>
							  @endif


						  </div>
						</div>

						<div class="col-sm-6 col-md-4 col-lg-3">
							
						  <div class="form-group">
							<label for="">Travel time from/to pickup point</label>
							<div class="input-group ">
							  <div class="input-group-addon">
								<span class="input-group-text">Minutes</span>
							  </div>
							  <input type="text" class="form-control"  placeholder="Minutes" name="travelTimeMin" required onkeypress="return isNumber(this, event)">
							</div>
						  </div>
						</div>

						<div class="col-sm-6 col-md-4 col-lg-3">
						  <div class="bootstrap-timepicker">
							<div class="form-group bootstrap-timepicker">
							   <label for="start_time">Approx Start Time</label>
							   <input type="text" class="form-control" required id="start_time"   name="start_time" placeholder="Start Time">
							</div>
						  </div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3">
						  <div class="bootstrap-timepicker">
							<div class="form-group bootstrap-timepicker">
							  <label for="end_time">Approx End Time</label> 
							   <input type="text" class="form-control" readonly required id="end_time"  name="end_time" placeholder="End Time">
							</div>
						  </div>
						</div>
						

					  </div>
					  <div class="box-body clearfix" id="financial-details">
					 	 <div class="cost-title">
						  	Finacial Details
						  </div>
						
							<div class="table-responsive">
								<div class="row">
									<div class="col-md-6">
										<h4><b>Internal</b></h4>
									</div>
									<div class="col-md-6 text-right pr-4">
											<!-- <button type="button" class="btn btn-secondary cancelDropEvt" data-dismiss="modal">Cancel</button> -->
												<button type="button" class="btn btn-info btn-xs next-page">
												External Info</button>
												<button type="button" class="btn btn-info btn-xs prev-page hidden">
												Internal Info</button>
												<!-- <button type="button" class="btn btn-success btn-sm submit-finance hidden">
													<span class="fa fa-spin"></span>
												Submit</button> -->
											</div>
								</div>
								<!-- <ol class="breadcrumb">
									<li class="active">Internal</li>
									<li><a href="#">External</a></li>
								</ol> -->
									<div class="divider"></div>
									<!-- <div class="row">
											
									</div> -->
								<div id="page-1">
									<table class="table table-striped table-bordered">
										<thead>
											<tr> 
												<th>Internal No of Pax</th>
												<!-- <th>Internal Supplier Cost</th>  -->
												<th contenteditable="true">
													Supplier
													<span class="add-supplier">
														<i class="fa fa-plus"></i>
													</span>
												</th> 
												<th>Internal Extras Per Pax</th>
												<th>Internal Extras Per Car</th>
												<!-- <th contenteditable="true">
												 Internal Discount
													<span class="add-discount">
														<i class="fa fa-plus"></i>
													</span>
												</th> -->
												<th class="text-right" style="width: 100px">Action</th>
											</tr>
										</thead> 
			
										<tbody> 
											<tr> 
												<td scope="row">
													<input type="text" name="int_no_of_pax" onkeypress="return restrictAlphabets(event);" required class="form-control" placeholder="No of pax" />
												</td>  
												<td>
													<input type="text" name="int_supplier_value" onkeypress="return restrictAlphabets(event);" required  class="form-control" placeholder="Value" />
												</td> 
												<td>
													<input type="text" name="int_extras_per_pax" onkeypress="return restrictAlphabets(event);" required class="form-control" placeholder="Extras Per Pax" />
												</td>
												<td>
													<input type="text" name="int_extras_per_car" onkeypress="return restrictAlphabets(event);"required class="form-control" placeholder="Extras Per Car" />
												</td>
												<!-- <td>
													<input type="number" name="int_discount" class="form-control" placeholder="Discount" />
												</td> -->
												<td class="text-right">
													<button class="btn btn-primary add-new-row"><i class="fa fa-plus"></i> Add Row</button>
												</td> 
												
											</tr>  
										</tbody>
			
									</table>    
								</div>
								<div id="page-2" class="hidden">
									<table class="table table-striped table-bordered">
										<thead>
											<tr> 
												<th>External No of Pax</th>
												<th contenteditable="true">
													Supplier
													<span class="add-supplier">
														<i class="fa fa-plus"></i>
													</span>
												</th> 
												<th>External Extras Per Pax</th>
												<th>External Extras Per Car</th>
												<!-- <th contenteditable="true">
													External Discount 
													<span class="add-discount">
														<i class="fa fa-plus"></i>
													</span>
												</th>  -->
												<th class="text-right" style="width: 100px"> Action</th>
											</tr>
										</thead> 
			
										<tbody> 
											<tr> 
												<td scope="row">
													<input type="number" name="ext_no_of_pax" required onkeypress="return restrictAlphabets(event);"class="form-control" placeholder="No of pax" />
												</td>  
												<td>
													<input type="text" name="ext_supplier_value" required  onkeypress="return restrictAlphabets(event);" class="form-control" placeholder="Value" />
												</td> 
												<td>
													<input type="number" name="ext_extras_per_pax" required  onkeypress="return restrictAlphabets(event);" class="form-control" placeholder="Extras Per Pax" />
												</td>
												<td>
													<input type="number" name="ext_extras_per_car" requierd  onkeypress="return restrictAlphabets(event);" class="form-control" placeholder="Extras Per Car" />
												</td>
												<!-- <td>
													<input type="number" name="ext_discount" class="form-control" placeholder="Discount" />
												</td> -->
												<td class="text-right">
													<button class="btn btn-primary add-new-row"><i class="fa fa-plus"></i> Add Row</button>
												</td> 
											</tr>  
										</tbody>
			
									</table>    
								</div>
							</div>
						
					  </div>
					  <!-- <div class="box-body clearfix">
						<div class="cost-title">Group costs</div>
						<div class="row CurrencyTypeBox">
						  <div class="col">
							<div class="form-group">
							  <label for="">Select Currency</label>
							  <select name="groupCurrencyType"  class="form-control" onchange="updteCurrentType(event)">
								<option value="">Select Currency</option>
								<option value="IDR">IDR</option>
								<option value="INR">INR</option>
								<option value="EUR">EUR</option>
								<option value="USD">USD</option>
							  </select>
							</div>
						  </div>
						</div>
						<div class="all_items_wrapper">
						  <div class="row">
							<div class="col">
							  <div class="form-group">
								<label for="">Component</label>
							  </div>
							  <div class="form-group">
								<input type="text" class="form-control arr-item"  placeholder="Component" name="groupComponent[]" required>
							  </div>
							</div>
							<div class="col">
							  <div class="form-group">
								<label for="">Cost</label>
							  </div>
							  <div class="form-group">
								<div class="input-group ">
								  <div class="input-group-addon">
									<span class="input-group-text">IDR</span>
								  </div>
								  <input type="text" class="form-control formatCurrency cost_input arr-item"  placeholder="Cost" name="groupCost[]" required  onkeypress="return isNumber(this, event)">
								</div>
							  </div>
							</div>
							<div class="col">
							  <div class="form-group">
								<label for="">Max pax</label>
							  </div>
							  <div class="form-group">
								<input type="text" class="form-control arr-item"  placeholder="Max pax" name="groupMaxPax[]" required onkeypress="return isNumber(this, event)">
							  </div>
							</div>
							<div class="col">
							  <div class="form-group">
								<label for="">Beneficiary</label>
							  </div>
							  <div class="form-group">
								<input type="text" class="form-control arr-item"  placeholder="Beneficiary" name="groupBeneficiary[]" required>
							  </div>
							</div>
							<div class="col">
							  <div class="form-group">
								<label for="">Commission</label>
							  </div>
							  <div class="form-group">
								<div class="input-group ">
								  <div class="input-group-addon">
									<span class="input-group-text">IDR</span>
								  </div>
								  <input type="text" class="form-control formatCurrency commission_input arr-item"  placeholder="Commission" name="groupCommission[]" required onkeypress="return isNumber(this, event)">
								</div>
							  </div>
							</div>
						  </div>
						  <div class="row adder-row">
							<div class="col-sm-12">
							  <div class="item-adder">
								<button type="button" class="btn btn-default"><span class="fa fa-plus"> Add Item </span></button>
							  </div>
							</div>
							<div class="col-sm-12 total-row text-right">
							  <div class="form-group form-inline">
								<label for="origin">Total Cost</label>
								<input type="text" class="form-control totalCosts" required  id="totalGroupCost" name="totalGroupCost" placeholder="Total cost" readonly>
							  </div>
							  <div class="form-inline">
								<label for="origin">Total Commission</label>
								<input type="text" class="form-control totalCommission" required  id="totalGroupCommission" name="totalGroupCommission" placeholder="Total commission" readonly>
							  </div>
							</div>
						  </div>
						</div>
					 </div>
					  <div class="box-body clearfix">
						<div class="cost-title">Pax costs</div>
						<div class="row CurrencyTypeBox">
						  <div class="col">
							<div class="form-group">
							  <label for="">Select Currency</label>
							  <select class="form-control" onchange="updteCurrentType(event)" name="paxCurrrencyType">
								<option value="">Select Currency</option>
								<option value="IDR">IDR</option>
								<option value="INR">INR</option>
								<option value="EUR">EUR</option>
								<option value="USD">USD</option>
							  </select>
							</div>
						  </div>
						</div>
						<div class="all_items_wrapper">
						  <div class="row">
							<div class="col">
							  <div class="form-group">
								<label for="">Component</label>
							  </div>
							  <div class="form-group">
								<input type="text" class="form-control arr-item"  placeholder="Component" name="paxComponent[]" required>
							  </div>
							</div>
							<div class="col">
							  <div class="form-group">
								<label for="">Cost</label>
							  </div>
							  <div class="form-group">
								<div class="input-group ">
								  <div class="input-group-addon">
									<span class="input-group-text">IDR</span>
								  </div>
								  <input type="text" class="form-control formatCurrency cost_input arr-item"  placeholder="Cost" name="paxCost[]" required  onkeypress="return isNumber(this, event)">
								</div>
							  </div>
							</div>
							<div class="col">
							  <div class="form-group">
								<label for="">Min Age</label>
							  </div>
							  <div class="form-group">
								<input type="text" class="form-control arr-item"  placeholder="Max pax" name="paxMinAge[]" required onkeypress="return isNumber(this, event)">
							  </div>
							</div>
							<div class="col">
							  <div class="form-group">
								<label for="">Beneficiary</label>
							  </div>
							  <div class="form-group">
								<input type="text" class="form-control arr-item"  placeholder="Beneficiary" name="paxBeneficiary[]" required>
							  </div>
							</div>
							<div class="col">
							  <div class="form-group">
								<label for="">Commission</label>
							  </div>
							  <div class="form-group">
								<div class="input-group ">
								  <div class="input-group-addon">
									<span class="input-group-text">IDR</span>
								  </div>
								  <input type="text" class="form-control  formatCurrency commission_input arr-item"  placeholder="Commission" name="paxCommission[]" required onkeypress="return isNumber(this, event)">
								</div>
							  </div>
							</div>
						  </div>
						  <div class="row adder-row">
							<div class="col-sm-12">
							  <div class="item-adder">
								<button type="button" class="btn btn-default"><span class="fa fa-plus"> Add Item </span></button>
							  </div>
							</div>
							<div class="col-sm-12 total-row text-right">
							  <div class="form-group form-inline">
								<label for="origin">Total Cost</label>
								<input type="text" class="form-control totalCosts" required  id="totalPaxCosts" name="totalPaxCosts" placeholder="Total cost" readonly>
							  </div>
							  <div class="form-inline">
								<label for="origin">Total Commission</label>
								<input type="text" class="form-control totalCommission" required  id="totalPaxCommission" name="totalPaxCommission" placeholder="Total commission" readonly>
							  </div>
							</div>
						  </div>
						</div>
					 </div> -->
					  <div class="box-footer">
						<div class="row">
						  <div class="col-sm-12">
							<div class="col-sm-12 text-right  ">
							  <a class="btn btn-primary step-1 btn-next"  >Next</a>
							  <!-- <button type="submit" class="btn btn-primary">Save</button> -->
							</div>
						  </div>
						</div>
					  </div>
					</form>
					</div><!-- /.box-header -->
				  </div><!-- /.box -->
				</div>  
			  </div>
			  <div id="calendar_view" class="tab-pane fade calendar_view">
				<div class="wizard">
				 <?php $action='update_booking'; ?>
				  <div class="box box-success">
					<div class="row">
					  <div class="col-md-3">
						<div class="box box-solid">
							<div class="box-body">
							  <div class="summary__fields">
								<div class="row ">
								  <div class="form-group col-sm-12">
									<h3>Pax - 1</h3>
									<input type="hidden" name="tour_template_id" id="tour_template_id">
								  </div>
								  <div class="form-group col-sm-12">
									<label for="cost">Cost</label>
									<div class="input-group ">
									  <div class="input-group-addon">
										<span class="input-group-text">IDR</span>
									  </div>
									  <input type="text" class="form-control formatCurrency cost_input"  placeholder="Cost" name="stp2cost" required  onkeypress="return isNumber(this, event)">
									</div>
								  </div>
								  <div class="form-group col-sm-12">
									<label for="paidToringo">Paid to Ringgo</label>
									<div class="input-group ">
									  <div class="input-group-addon">
										<span class="input-group-text">IDR</span>
									  </div>
									  <input type="text" class="form-control formatCurrency cost_input"  placeholder="Amount" name="stp2ringo" required  onkeypress="return isNumber(this, event)">
									</div>
								  </div>
								  <div class="form-group col-sm-12">
									<label for="cost">Paid to ABC</label>
									<div class="input-group ">
									  <div class="input-group-addon">
										<span class="input-group-text">IDR</span>
									  </div>
									  <input type="text" class="form-control formatCurrency cost_input"  placeholder="Amount" name="stp2abc" required  onkeypress="return isNumber(this, event)">
									</div>
								  </div>
								  <div class="form-group col-sm-12" style="margin-top: 51px;">
									<label for="cost">Gross margin</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<span class="input-group-text">IDR</span>
									  </div>
									  <input type="text" class="form-control formatCurrency cost_input"  placeholder="Amount" name="stp2grossmargin" required  onkeypress="return isNumber(this, event)">
									</div>
								  </div>
								  <div class="col-sm-12 ">
									<a class="btn btn-primary btn-back"  href="#">Back</a>
									<a class="btn btn-primary btn-next step-2"  href="#">Next</a>
								  </div>
								</div>
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
								  <div class="col-sm-12 popover-oldFields">
									<p class="mt-10"><span class="lbl-name">Island Hopping:</span>
									  <textarea class="form-control text__editor"  name="island_hoping" rows="2" cols="80"></textarea>
									</p>
									<p class="mt-10"><span class="lbl-name">Includes :</span>
									  <textarea class="form-control text__editor" name="include" rows="2" cols="80"></textarea>
									</p>
									<p class="mt-10"><span class="lbl-name">Does not include :</span>
									  <textarea class="form-control text__editor" id="" name="doesntinclude" rows="2" cols="80"></textarea>
									</p>
								  </div>
								  <div class="col-sm-12 popover-newFields">
								  </div>
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
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <div id="editor_view" class="tab-pane fade">
				<div class="row">
				  <div class="box box-primary">
					<div class="box-header">
					  <form role="form" action="#" method="post">
						<div class="box-body ">
						  <div class="col-sm-4">
							<div class="form-group">
							  <label for="tourName">Tour Name</label>
							  <input type="text" class="form-control" required  onkeypress="return restrictNumerics(event);" id="tourName" name="tourName" placeholder="Tour Name">
							</div>
						  </div>
						  <!-- <div class="col-sm-8">
							  <br />
							  <button id="add-financial" class="btn btn-primary">Add Financial Details</button>
						  </div> -->
						  <div class="clearfix"></div>
						  <div class="editor_view_editors">
							<!-- <div class="col-sm-6 col-lg-4">
							  <div class="form-group">
								<label for="tourFreq">Island Hopping</label>
								<textarea class="ev_text__editor" id="" name="" rows="3" cols="80"></textarea>
							  </div>
							</div>
							<div class="col-sm-6 col-lg-4">
							  <div class="form-group">
								<label for="origin">Includes</label>
								<textarea class="ev_text__editor" id="" name="" rows="3" cols="80"></textarea>
							  </div>
							</div>
							<div class="col-sm-6 col-lg-4">
							  <div class="form-group">
								<label for="tourName">Does not include</label>
								<textarea class="ev_text__editor" id="" name="" rows="3" cols="80"></textarea>
							  </div>
							</div> -->
						  </div>
						  <div class="clearfix"></div>
						</div>
						<div class="box-footer">
						  <div class="row">
							<div class="col-sm-12">
							  <div class="col-sm-12 text-right  ">
								<a class="btn btn-primary btn-back"  href="#">Back</a>
								<button type="button" class="save_button btn btn-primary">Save</button>
							  </div>
							</div>
						  </div>
						</div>
					  </form>
					</div><!-- /.box-header -->
				  </div><!-- /.box -->
				</div>  
			  </div>
			</div>
		  </div>
		</div>
	</section><!-- /.content -->
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

</div>

@endsection
@section('customjs')
<script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
 <script>
	$(document).ready(function(){
		//modal show
		// $('body #add-financial').on('click', function(){
		// 	$('#financial-details').modal('show');
		// });

		// add supplier and remove suppirler row
		var count = 0;
		$('body .add-supplier').on('click', function(e){
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

		// var discount = 0;
		// $('body .add-discount').on('click', function(e){
		// 	discount++;
		// 	// var th =  $(this).closest('th').clone(true);
		// 	var index = $(this).closest('th').index(),
		// 	id = $(this).closest('table').parent().siblings('div').attr('id');
		// 	txt = id == 'page-2' ? 'External Discount' : 'Internal Discount';

		// 	$('#financial-details table').each(function(i){
		// 		$(this).find('thead > tr').find('th').eq(index).after(
		// 			// $(this).find('thead > tr').find('th').eq(index).clone(true)
		// 			$('<th />',{'contenteditable': true}).append(
		// 				i == 0 ? 'Internal Discount' : 'External Discount' ,
		// 				//  + parseInt(discount+Number(1)) ,
		// 				 ' ',
		// 				$(this).find('thead > tr').find('th').eq(index).find('.add-discount').clone(true)
		// 			)
					
		// 		)

		// 		$(this).find('thead > tr').find('th').eq(index).empty().append(
		// 			i == 0 ? 'Internal Discount' : 'External Discount' ,
		// 			//  + discount ,
		// 			 ' ',
		// 			$('<span />',{'class': 'delete-discount'})
		// 				.append($('<i />',{'class': 'fa fa-trash'})
		// 			)
		// 		)
		// 		// var newTxt = $(this).find('thead > tr').find('th').eq(index).text();
		// 		$(this).find('tbody > tr').each(function(){

		// 			$(this).find('td').eq(index).find('input').attr(
		// 				'placeholder', 'Discount'
		// 				// +parseInt(discount)
		// 			)	

		// 			$(this).find('td').eq(index).after(
		// 				$('<td />').append(
		// 					// $('<input type="number" name="int_discount_value'+discount'"').val('')
		// 					$('<input />',{
		// 						'type': 'number',
		// 						'name': 	i == 0 ? 'int_discount-' + parseInt(discount+Number(1)) : 'ext_discount_value' + parseInt(discount+Number(1)),
		// 						'class': 'form-control',
		// 						'placeholder': 'Discount'
		// 						// +parseInt(discount+Number(1))
		// 					})
		// 				)
		// 			)

		// 		})
					

			
		// 	})


		// });

		$(document).on('click', '.delete-supplier', function(){
			var indexDel = $(this).closest('th').index();
			$('#financial-details table').each(function(){
				$(this).find('thead > tr').find('th').eq(indexDel).remove();
				$(this).find('tbody > tr').each(function(){
					$(this).find('td').eq(indexDel).remove();
				})
			})
		})

		// $(document).on('click', '.delete-discount', function(){
		// 	var indexDel = $(this).closest('th').index();
		// 	$('#financial-details table').each(function(){
		// 		$(this).find('thead > tr').find('th').eq(indexDel).remove();
		// 		$(this).find('tbody > tr').each(function(){
		// 			$(this).find('td').eq(indexDel).remove();
		// 		})
		// 	})
		// })

	
		// add new and delete row
		$('body .add-new-row').on('click',function(e){
		
			$('#financial-details table').each(function(){
				$(this).find('tbody').append(
					$(this).find('tbody > tr').last().clone(true)
				)

				$(this).find('tbody').children('tr').not(':last').find('td').last().empty()
				.append(
					$('<button />',{'class': 'btn btn-danger delete-row'})
						.append($('<i />',{'class': 'fa fa-trash'})
					)
				)

				$(this).find('tbody').children('tr').last().find('input').val('');
			})

		});

		$(document).on('click', '.delete-row', function(){
			var index = $(this).closest('tr').index();
			$('#financial-details table').each(function(){
				$(this).find('tbody').find('tr').eq(index).remove()
			})

		});

		// next page
		$('.next-page').on('click',function(){
			$('.next-page, #page-1').addClass('hidden');
			$('.prev-page, #page-2, .submit-finance').removeClass('hidden');
			$('#financial-details h4 > b').text(
				$('.next-page.hidden').text().split('Info')[0]
			)
		})

		$('.prev-page').on('click',function(){
			$('.next-page, #page-1').removeClass('hidden');
			$('.prev-page, #page-2,.submit-finance').addClass('hidden');
			$('#financial-details h4 > b').text(
				$('.prev-page.hidden').text().split('Info')[0]
			)
		})
		

		$('.submit-finance').on('click', function(){
			var objTable = {},
			 arrTb1 = [],
			 arrTb2  =[];
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
						} else{
							obj['action'+indx] = $(this).html();
						}
					});
					if(index == 0){
						arrTb1.push(obj)
					} else if(index == 1){
						arrTb2.push(obj)
					}
				
				});
               if(index == 0){
					arrTb1.push(arrTh)
				} else if(index == 1){
					arrTb2.push(arrTh)
				}
 
				objTable = {
					'internal': arrTb1,
					'external': arrTb2,
				}
            })
		})

	})
 </script>
<script>
var currentEvent,saveEvtObj={},$currentPopupDetailWrapper='',$currentPopoverToOpt='',offsetLeft=0,popoverElement='',fcCalConfg='',renderingEvents='',dragingResourceId='',stepOneAllFieldsVals={},stp2AllInputData={},newEventsTimeDurationRange={},allPopoverData=[],stp3AllData=[];
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
	//renderingEvents=<?php if(isset($get_all_events_of_today)){ echo $get_all_events_of_today;  }else{ echo '';  } ?>; 
	// console.log(renderingEvents)

	/* ----------------------------------------------------------------- */
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
function updateCalConfig(defDate,resourceVals,allEvents,setOld){
  console.log(setOld)
	fcCalConfg={
	  header: { // layout header
		left: '', 
		center: '',
		right: '' 
	  },
	  defaultView: 'agendaDay',
	  defaultDate : defDate,
	  groupByResource: true,
	  events: allEvents,
	  selectable: true,
	  allDaySlot: false,
	  snapDuration: '00:01:00',
	  displayEventTime: true,
	  slotEventOverlap: false,
	  slotDuration: '00:30:00',
	  eventOverlap: true,
	  slotLabelFormat: 'HH:mm', 
	  timeFormat: 'HH:mm',
	  slotLabelInterval: '00:30:00',
	  resources: resourceVals,            
	  select: function (event, jsEvent, view) {
		console.log(event);
		console.log('select');
		currentEvent=event;
		popoverElement = $(jsEvent.target);
		if(!setOld)
		  $(jsEvent.target).popover({
			title: 'the title',
			content: function () {
			  // var newPopover=$($("#popoverContent").html());
			  //  $("#popoverContent").find('.save_event_form .removeNewField').click(function(){
			  //   $(this).hide();
			  //   $(this).closest('p').slideUp(200,function(){
			  //     $(this).remove()
			  //   })
				return $("#popoverContent").html();
			},
			template: popTemplate,
			placement: 'left',
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
		currentEvent=event;
		// console.log('evenclick');
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
	  eventRender: function (event, element,jsEvent) {
		// console.log(event);
		// console.log(jsEvent );
		// console.log(element);
		element.click(function(){
		offsetLeft=$(this).closest('.fc-time-grid-event').offset().left;
		})
		currentEvent=event;
		 if(!setOld && event.resourceId == '1')
		element.popover({
		  title: 'title',
		  content: function(){
			  $("#popoverContent").find('.save_event_form').attr('data-target',event.id);
			  var newPopover=$($("#popoverContent").html());

			   $("#popoverContent").find('.save_event_form').attr('data-target','');
			   newPopover.find('.removeNewField').click(function(){
				$(this).hide();
				$(this).closest('p').slideUp(200,function(){
				  $(this).remove()
				})
			   })
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
		});
		var resouces = element.find('.fc-content');
		resouces.closest('a').on('click',function(){
		  if(popoverElement)
		  popoverElement.not(this).popover('hide');
		})
		resouces.closest('a').css({'border-color': 'rgb(144, 144, 144)'});
		resouces.closest('a').attr({'title': resouces.text()});
		if(event.resourceId == 1)
		resouces.closest('a').css({'background-color': '#c55a11'});
		else if(event.resourceId == '2')
		resouces.closest('a').css({'background-color': '#ffc000'});
		else 
		resouces.closest('a').css({'background-color': '#bdd7ee'});

		resouces.html('<span class="event_title" >'+ resouces.text() +'</span>');
		element.attr('id',event.id);
	  },
		 
  };
  var myCalendar=$('#fCalendar').fullCalendar(fcCalConfg);
  myCalendar.find('.fc-today-button').click(function(){
	$('.fc-overlay').addClass('active');
	var defDate=moment().format();
	gettingSettingEvents(defDate,false);  
  })
}

 
 
  function saveEvent(popoverclick){
	allPopoverData=[];
	$popupWrper=$(popoverclick).closest(".save_event_form");
	$('#popoverContent .popover-newFields').html($popupWrper.find('.popover-newFields').html())
	$popupWrper.find('.popover-oldFields p,.popover-newFields p').each(function(){
	  allPopoverData.push({label: $(this).find('.lbl-name').text(),html:$(this).find('textarea').val(),name:$(this).find('textarea').attr('name')});
	})
	popoverElement.popover('hide');
	console.log(allPopoverData)

	// $(popoverclick).closest(".popover").hide().remove();

	  // $popupWrper=$(popoverclick).closest(".save_event_form");
	  // currentEvent['status']=$popupWrper.find('.statusOption').val();
	  // var evntId=$popupWrper.attr('data-target');
	  // var startTime=moment(currentEvent.start).format("YYYY-MM-DD HH:mm:ss");
	  // var endTime=moment(currentEvent.end).format("YYYY-MM-DD HH:mm:ss");
	
	  // console.log(evntId+'--'+startTime+'----'+endTime+'---'+$popupWrper.find('.statusOption').val());//event id,start & end time
	  // if(evntId && startTime && endTime!='Invalid date' && $popupWrper.find('.statusOption').val() )
	  // {
	  //   $.ajax({
	  //       type: "POST",
	  //       url: "{{url('structure_booking_status')}}",
	  //       data:{ _token: "{{ csrf_token() }}",row_id:evntId,start_date:startTime,end_date:endTime?endTime:startTime,'status': $popupWrper.find('.statusOption').val()},
	  //       success:function(responce){
	  //         console.log(responce)
	  //         console.log(responce.validate); 
	  //         if(responce.validate=='0')
	  //         {
	  //           $('#validate_section').show(); 
	  //         }
	  //         else
	  //         {
	  //           $('#validate_section').hide();
	  //         }

	  //        // displayMessage("Events Saved  Success...",'alertmessage','success');
	  //        $(popoverclick).closest(".popover").hide().remove();
	  //        $('#fCalendar').fullCalendar('updateEvent', currentEvent);
	  //       },
	  //       error:function(responce){
	  //         console.log(responce)
	  //       }
	  //   });
	  // }
	  // else
	  // {
	  //   console.log('set  End  time of events'); 
	  //   alert("set  End  time of events"); 
	  // }
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
  $('#popoverContent').find('.popover-oldFields p,.popover-newFields p').each(function(){
	  allPopoverData.push({label: $(this).find('.lbl-name').text(),html:$(this).find('textarea').val(),name:$(this).find('textarea').attr('name')});
	})
  $('input[name="travelTimeMin"]').trigger('change');

  $('input[name="travelTimeMin"]').val(0);
//   $('input[name="travelTimeMin"]').keyup(function(e){
// 	var  start_time= $("#start_time").val();
// 	console.log(start_time.substring(0, 2))
// 	console.log(start_time.substring(3, 5))
// 	console.log(start_time.substring(6, 8))

// 	var travelTimeMin=$('input[name="travelTimeMin"]').val();
// 	var  minut=travelTimeMin?travelTimeMin:90;
// 	console.log(Math.floor(minut/60));
// 	console.log(minut%60);
// 	var newhour =(start_time.substring(0, 2))+(Math.floor(minut/60));
// 	var newminut =(start_time.substring(3, 5))+(minut%60);
// 	var newTime = newhour + ':'+newminut+ ' '+start_time.substring(6, 8);
// 	$("#end_time").val(newTime);

//   }); 

  $("#end_time").timepicker({
	showInputs: false
  });

  $("#start_time").timepicker({
	showInputs: false
  }).on('changeTime.timepicker', function (e) {
    
	var travelTimeMin=$('input[name="travelTimeMin"]').val();
	var  minut=travelTimeMin?travelTimeMin:90;
	console.log(e)
	console.log(Math.floor(minut/60));
	console.log(minut%60);
	var newhour =(e.time.hours)+(Math.floor(minut/60));
	var newminut =(e.time.minutes)+(minut%60);
	var newTime = newhour + ':'+newminut+ ' '+e.time.meridian;
	$("#end_time").val(newTime);

	});
  
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
function gettingSettingEvents(newDate,setOld){
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
	  console.log(resp.get_all_taxi)
	  // console.log(resp); 
	  // console.log(resp.validate); 
	   resourceVals=[ {id: 3, title: "Overview"},{id: 2, title: "Transport"},{id: 1, title: "Activity"} ];
	   // allEvents=resp.all_events_of_the_day;
	   allEvents=[
	  {
		"id": 20,
		"start": newEventsTimeDurationRange.startDate,
		"end": newEventsTimeDurationRange.endDate,
		"resourceId": "3",
	  }, 
	  {
		"id": 21,
		"start": newEventsTimeDurationRange.startT1,
		"end": newEventsTimeDurationRange.endT1,
		"resourceId": "2",
	  },
	  {
		"id": 22,
		"start": newEventsTimeDurationRange.startT2,
		"end": newEventsTimeDurationRange.endT2,
		"resourceId": "2",
	  },
	  {
		"id": 23,
		"start": newEventsTimeDurationRange.startAct,
		"end": newEventsTimeDurationRange.endAct,
		"resourceId": "1",
	  }];
	   console.log(allEvents)
	   if(resourceVals && allEvents){ 
		updateCalConfig(defDate,resourceVals,allEvents,setOld); 
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
 console.log(' Tour  template id '+$.session.get("tour_template_id")?$.session.get("tour_template_id"):' HY')
  // $('.tab-pane.calendar_view').addClass('active in');
  $('.fc-overlay').addClass('active');
  var defDate=moment().format();
  gettingSettingEvents(defDate,false); 
  // $('.tab-pane.calendar_view').removeClass('active in');   
})
.on('click','.btn-next',function(e){
  //
  e.preventDefault();
  if($(this).hasClass('step-1'))
  {
	  if($('#tourName').val())
	  {
	  //console.log("Hi Pradeep");
	   /*  var objTable = {},
			 arrTb1 = [],
			 arrTb2  =[];
			$('#financial-details table').each(function(index){
				$(this).find('tbody tr').each(function(indx){
					var obj = {};
					$(this).find('td').each(function(i){					
						if($(this).find('input').length){
							// obj[$(this).find('input').attr('name')] = $(this).find('input').val();
							obj[$(this).find('input').attr('name')+indx] = $(this).find('input').val();
						}
					});
					if(index == 0){
						arrTb1.push(obj)
					} else if(index == 1){
						arrTb2.push(obj)
					}
				
				});
				objTable = {
					'internal': arrTb1,
					'external': arrTb2,
				}
			}); */
			
			var objTable = {},
			 arrTb1 = [],
			 arrTb2  =[];
			$('#financial-details table').each(function(index){
               var arrTh =[];
               $(this).find('thead tr th').each(function(indx){
				 arrTh.push($(this).html());  
               })
				$(this).find('tbody tr').each(function(indx){
					var obj = {};
					$(this).find('td').each(function(i){					
						if($(this).find('input').length){
							obj[$(this).find('input').attr('name')+indx] = $(this).find('input').val();
						} else{
							obj['action'+indx] = $(this).html();
						}
					});
					if(index == 0){ 
						arrTb1.push(obj)
					} else if(index == 1){
						arrTb2.push(obj)
					}
				
				});
               if(index == 0){
					arrTb1.push(arrTh)
				} else if(index == 1){
					arrTb2.push(arrTh)
				}
 
				objTable = {
					'internal': arrTb1,
					'external': arrTb2,
				}
			});
			
			console.log(arrTb1)
			console.log("End of the  Pradeep");   
			console.log(); 
			//  exit; 
	stepOneAllFieldsVals['groupComponent'] = $("input[name='groupComponent\\[\\]']").map(function(){return $(this).val();}).get();
	stepOneAllFieldsVals['groupCost'] = $("input[name='groupCost\\[\\]']")
			  .map(function(){return $(this).val();}).get();
	stepOneAllFieldsVals['groupMaxPax'] = $("input[name='groupMaxPax\\[\\]']")
			  .map(function(){return $(this).val();}).get();
	stepOneAllFieldsVals['groupBeneficiary'] = $("input[name='groupBeneficiary\\[\\]']").map(function(){return $(this).val();}).get();
	stepOneAllFieldsVals['groupCommission'] = $("input[name='groupCommission\\[\\]']").map(function(){return $(this).val();}).get();

	// stepOneAllFieldsVals['paxComponent'] = $("input[name='paxComponent\\[\\]']").map(function(){return $(this).val();}).get();
	// stepOneAllFieldsVals['paxCost'] = $("input[name='paxCost\\[\\]']").map(function(){return $(this).val();}).get();
	// stepOneAllFieldsVals['paxMinAge'] = $("input[name='paxMinAge\\[\\]']").map(function(){return $(this).val();}).get();
	// stepOneAllFieldsVals['paxBeneficiary'] = $("input[name='paxBeneficiary\\[\\]']").map(function(){return $(this).val();}).get();
	// stepOneAllFieldsVals['paxCommission'] = $("input[name='paxCommission\\[\\]']").map(function(){return $(this).val();}).get();
	$(this).closest('form').find('input:not(.arr-item)').each(function() {
	  stepOneAllFieldsVals[$(this).attr('name')]=$(this).val();
	});

	// stepOneAllFieldsVals['groupCurrencyType']=$("select[name='groupCurrencyType']").val();
	// stepOneAllFieldsVals['paxCurrrencyType']=$("select[name='paxCurrrencyType']").val();
	stepOneAllFieldsVals['activity_type']=$("input[name='activity_type']").val();
	stepOneAllFieldsVals['internal_financial_details']=arrTb1;
	stepOneAllFieldsVals['external_financial_details']=arrTb2;
    stepOneAllFieldsVals['tour_template_id']=$('#tour_template_id').val()?$('#tour_template_id').val():'';
	stepOneAllFieldsVals['_token']="{{ csrf_token() }}";
	
	console.log(stepOneAllFieldsVals)
	// alert("Hi"); 
	// exit; 

	
	
	   $.ajax({
			type: "POST",
			url: "{{url('add_tour_template')}}",
			//data:{ _token: "{{ csrf_token() }}",add_tour_template},
			data:stepOneAllFieldsVals,
			success:function(result){
				console.log(result); 
			  var responce=JSON.parse(result);
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
			  }
			 
			},
			error:function(responce){
			  console.log(responce)
			}
		});
    }  
	else
	{
		$('.alert-msg').html('<span class="text-danger">All field are required.</span>');
	}
  }
  else if($(this).hasClass('step-2'))
  {
	$(this).closest('.summary__fields').find('input').each(function(){
	  stp2AllInputData[$(this).attr('name')]=$(this).val();
	})
	$('#editor_view .editor_view_editors').html('')
	$.each(allPopoverData,function(index,obj){
	  // console.log(index)
	  // console.log(obj)
	  var newElement=$('<div class="col-sm-6 col-lg-4"> <div class="form-group"> <label for="" id="label_'+index+'">'+obj.label+'</label> <textarea class="ev_text__editor" id="'+obj.name+'" name="'+obj.name+'" rows="3" cols="80">'+obj.html+'</textarea> </div> </div>');
	  CKEDITOR.replace(newElement.find('textarea')[0], {
			toolbarGroups: [{"name": "basicstyles", "groups": ["basicstyles"] }, {"name": "links", "groups": ["links"] }, {"name": "paragraph", "groups": ["list", "blocks"] }, {"name": "document", "groups": ["mode"] }, {"name": "styles", "groups": ["styles"] }], removeButtons: 'Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
	  });
	  $('#editor_view .editor_view_editors').append(newElement)
	})
	console.log(stp2AllInputData)
	console.log("hi hi Pradeep")
	// console.log(allPopoverData)

	$.ajax({
			type: "POST",
			url: "{{url('update_template_contents')}}",
			data:{ _token: "{{ csrf_token() }}",'tour_template_id':stp2AllInputData.tour_template_id,'stp2cost': stp2AllInputData.stp2cost, 'stp2ringo': stp2AllInputData.stp2ringo, 'stp2abc': stp2AllInputData.stp2abc, 'stp2grossmargin': stp2AllInputData.stp2grossmargin,'allPopoverData':allPopoverData},
			// data:stepOneAllFieldsVals,
			success:function(result){
			  if(result)
			  {
				 console.log('success'); 
			  }
			  else
			  {
				console.log('error'); 
			  }
			 
			},
			error:function(responce){
			  console.log(responce)
			}
			
		}); 


   


  }
  $(this).closest('.tab-content').find('.tab-pane').removeClass('active in');
  $(this).closest('.tab-pane').next('.tab-pane').addClass('active in');
  if($(this).hasClass('step-1')){
	$('#fCalendar').fullCalendar('destroy');
	  // setTimeout(function(){
		$('.fc-overlay').addClass('active');
		var defDate=moment().format();
		gettingSettingEvents(defDate,false); 
	  // },100)    
	  $(window).trigger('resize');
  }   
})
.on('click','.btn-back',function(e){
  e.preventDefault();
  $(this).closest('.tab-content').find('.tab-pane').removeClass('active in');
  $(this).closest('.tab-pane').prev('.tab-pane').addClass('active in');
  $(window).trigger('resize');
})
.on('blur change','#startTime,#end_time,input[name="travelTimeMin"]',function(){
  updateMinuteDifference();
})
function isNumber(txt, evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode == 46) {
	//Check if the text already contains the . character
	if (txt.value.indexOf('.') === -1) {
	  return true;
	} else {
	  return false;
	}
  } else {
	if (charCode > 31 &&
	  (charCode < 48 || charCode > 57))
	  return false;
  }
  return true;
}

</script>
 <script type="text/javascript">
		var map; 
		var marker; 
		var myLatlng = new google.maps.LatLng(20.268455824834792,85.84099235520011);
		var geocoder = new google.maps.Geocoder(); 
		var infowindow = new google.maps.InfoWindow();    
   
		var placeSearch, autocomplete;
   
   
		function initialize(){
   
		  //  use  For Auto Complete Addresss 
		  autocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), {types: ['geocode']});
   
		  //  Select Address To  the  Marker  ## START ##
		  var mapOptions = {
			zoom: 18,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  };
		  console.log(mapOptions)
		  map = new google.maps.Map(document.getElementById("myMap"), mapOptions);
		 
   
		  marker = new google.maps.Marker({
			map: map,
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
			$('#address').val(results[0].formatted_address); 
			$('#latitude').val(marker.getPosition().lat());
			$('#longitude').val(marker.getPosition().lng());
			infowindow.setContent(results[0].formatted_address);
			infowindow.open(map, marker);
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


	  //  END of The Google  Map 
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
$(document)
.on('click','.item-adder button',function(e){
  e.preventDefault();
  console.log('clicled')
  var $wraper=$(this).closest('.all_items_wrapper')
  var newElem=$wraper.find('.row:first-child').clone(true);
  newElem.find('.col').each(function(){
	$(this).find('.form-group:first-child').remove();
  })
  newElem.find('.col:last-child .form-group').append('<span class="remove-invoice-item"> <img src="public/images/delete.png" alt="del"> </span>');
  newElem.find('.remove-invoice-item').click(function(){
	$(this).closest('.row').slideUp(300,function(){
	  $(this).remove();
	})
  })
  $wraper.find('.adder-row').before(newElem);
})
.on('copy paste cut','.formatCurrency',function(e){
  e.preventDefault();
})
.on('blur','.formatCurrency',function(){
  var $this=$(this);
  var newVal=$this.val();
  if(newVal){
	newVal=newVal.replace(/,/g,'');
	var newCmaVal=new Intl.NumberFormat('en-Us',{}).format(newVal);
	$this.val(newCmaVal)
  }
})
.on('change keyup','.commission_input',function(){
var commission_input=0;
$(this).closest('.all_items_wrapper').find('.commission_input').each(function(){
  var $this=$(this);
  var newVal=$this.val();
  if(newVal){
	newVal=parseFloat(newVal.replace(/,/g,''));
	commission_input+=newVal;
  }
})
console.log(commission_input)
$(this).closest('.all_items_wrapper').find('.totalCommission').val( new Intl.NumberFormat('en-Us',{}).format(commission_input))
})
.on('change keyup','.cost_input',function(){
var cost_input=0;
$(this).closest('.all_items_wrapper').find('.cost_input').each(function(){
  var $this=$(this);
  var newVal=$this.val();
  if(newVal){
	newVal=parseFloat(newVal.replace(/,/g,''));
	cost_input+=newVal;
  }
})
console.log(cost_input)
$(this).closest('.all_items_wrapper').find('.totalCosts').val(new Intl.NumberFormat('en-Us',{}).format(cost_input))
})
.on('focus','.formatCurrency',function(){
var $this=$(this);
var newVal=$this.val();
if(newVal){
  newVal=newVal.replace(/,/g,'');
  $this.val(newVal)
}
})
.on('click','#editor_view .save_button',function(e){
stp3AllData=[];
$(this).closest('form').find('.ev_text__editor').each(function(index){
  // stp3AllData[$(this).attr('name')]=CKEDITOR.instances[$(this).attr('name')].getData();
  // stp3AllData[$('#label_'+index).html()]=CKEDITOR.instances[$(this).attr('name')].getData();
  var obj = { label: $('#label_'+index).html(), value: CKEDITOR.instances[$(this).attr('name')].getData(),name: $('#label_'+index).html() };
  stp3AllData.push(obj);  
})
  console.log(stp3AllData)
  // label_'+index+'


   $.ajax({
			type: "POST",
			url: "{{url('update_template_contents')}}",
			data:{ _token: "{{ csrf_token() }}",'tour_template_id':$('#tour_template_id').val(),'allPopoverData2':stp3AllData},
			// data:stepOneAllFieldsVals,
			success:function(result){
			  if(result)
			  {
				 console.log('success'); 
				 window.location = "{{url('tour_success')}}"; 

			  }
			  else
			  {
				console.log('error'); 
			  }
			 
			},
			error:function(responce){
			  console.log(responce)
			}
			
		}); 



  
});
$(function(){
  $(".ev_text__editor").each(function(_, ckeditor) {
	// CKEDITOR.replace(ckeditor)
	CKEDITOR.replace(ckeditor, {
		  toolbarGroups: [{"name": "basicstyles", "groups": ["basicstyles"] }, {"name": "links", "groups": ["links"] }, {"name": "paragraph", "groups": ["list", "blocks"] }, {"name": "document", "groups": ["mode"] }, {"name": "styles", "groups": ["styles"] }], removeButtons: 'Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
	});
  });
})

function isNumber(txt, evt) {
var charCode = (evt.which) ? evt.which : evt.keyCode;
if (charCode == 46) {
  //Check if the text already contains the . character
  if (txt.value.indexOf('.') === -1) {
	return true;
  } else {
	return false;
  }
} else {
  if (charCode > 31 &&
	(charCode < 48 || charCode > 57))
	return false;
}
return true;
}    
function updteCurrentType(event){
$(event.target).closest('.box-body').find('.input-group-text').text($(event.target).val())
}
var newElemIndex=2020;
function addNewField(event){
  $newElement=$('<p class="mt-10" id="newElem'+newElemIndex+'"><span class="removeNewField">&times; </span><span class="lbl-name" contenteditable>Add label name </span> : <textarea class="form-control text__editor" name="newElem'+newElemIndex+'" rows="2" cols="80"></textarea> </p>');
  $newElement.find('[contenteditable]').blur(function(){
	  var text='';
	  text=$(this).text();
	  if(!text){
		$(this).text('Add label name')
	  }
  })
  $newElement.find('.removeNewField').click(function(){
	$(this).hide();
	$(this).closest('p').slideUp(200,function(){
	  $(this).remove();
	})
  })
  $(event.target).closest('.save_event_form').find('.popover-newFields').append($newElement);
  newElemIndex++;
}
function updateMinuteDifference(){
var timeStart = new Date(moment().format('MM/DD/YYYY') +' '+ $('#start_time').val());
var timeEnd = new Date(moment().format('MM/DD/YYYY') +' '+ $('#end_time').val());
// console.log(timeStart)
// console.log(timeEnd)
if(timeStart > timeEnd)
var timeEnd = new Date(moment().add(1,'Days').format('MM/DD/YYYY') +' '+ $('#end_time').val());
// var diff = timeEnd.getTime() - timeStart.getTime();
var travelTime=parseInt($('input[name="travelTimeMin"]').val());
travelTime=travelTime > 1 ? travelTime / 2 :  0.1;
// console.log(travelTime)
// console.log(diff)
// var diffHrs = Math.floor((diff % 86400000) / 3600000); // hours
// var diffMins = Math.round(((diff % 86400000) % 3600000) / 60000); 


newEventsTimeDurationRange['startDate']=moment(timeStart).format("MM/DD/YYYY HH:mm:ss");
newEventsTimeDurationRange['endDate']=moment(timeEnd).format("MM/DD/YYYY HH:mm:ss");

newEventsTimeDurationRange['startT1']=moment(timeStart).format("MM/DD/YYYY HH:mm:ss");
newEventsTimeDurationRange['endT1']=moment(timeStart).add(travelTime,'Minutes').format('MM/DD/YYYY HH:mm:ss');

newEventsTimeDurationRange['startT2']=moment(timeEnd).subtract(travelTime,'Minutes').format('MM/DD/YYYY HH:mm:ss');
newEventsTimeDurationRange['endT2']=moment(timeEnd).format("MM/DD/YYYY HH:mm:ss");

newEventsTimeDurationRange['startAct']=moment(timeStart).add(travelTime,'Minutes').format('MM/DD/YYYY HH:mm:ss');
newEventsTimeDurationRange['endAct']=moment(timeEnd).subtract(travelTime,'Minutes').format('MM/DD/YYYY HH:mm:ss');

// console.log(newEventsTimeDurationRange)
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

	  //     restrict Alphabets  
      function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8)
            return true;
          else
            return false;
      }

</script> 
@endsection
