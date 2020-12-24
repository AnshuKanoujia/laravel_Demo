@extends('genral.layouts.mainlayout3')
@section('title') 
<title>dashboard </title>
<link href='https://unpkg.com/fullcalendar-scheduler@1.10.0/dist/scheduler.min.css' rel='stylesheet' />

<style type="text/css">
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
      <h1> Tour summary <small> Today </small> </h1>
      <ol class="breadcrumb">
         <li>
            <a href="#"><i class="fa fa-dashboard"></i> Home</a>
          </li>
         <li class="active">Dashboard</li>
      </ol>
   </section>
   <!-- Main content -->
<!--    <section class="content">
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
                          </div>
                          <div class="form-group col-sm-12">
                            <label for="cost">Cost</label>
                            <div class="input-group ">
                              <div class="input-group-addon">
                                <span class="input-group-text">IDR</span>
                              </div>
                              <input type="text" class="form-control formatCurrency cost_input"  placeholder="Cost" name="" required  onkeypress="return isNumber(this, event)">
                            </div>
                          </div>
                          <div class="form-group col-sm-12">
                            <label for="paidToringo">Paid to Ringgo</label>
                            <div class="input-group ">
                              <div class="input-group-addon">
                                <span class="input-group-text">IDR</span>
                              </div>
                              <input type="text" class="form-control formatCurrency cost_input"  placeholder="Amount" name="" required  onkeypress="return isNumber(this, event)">
                            </div>
                          </div>
                          <div class="form-group col-sm-12">
                            <label for="cost">Paid to ABC</label>
                            <div class="input-group ">
                              <div class="input-group-addon">
                                <span class="input-group-text">IDR</span>
                              </div>
                              <input type="text" class="form-control formatCurrency cost_input"  placeholder="Amount" name="" required  onkeypress="return isNumber(this, event)">
                            </div>
                          </div>
                          <div class="form-group col-sm-12" style="margin-top: 51px;">
                            <label for="cost">Gross margin</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <span class="input-group-text">IDR</span>
                              </div>
                              <input type="text" class="form-control formatCurrency cost_input"  placeholder="Amount" name="" required  onkeypress="return isNumber(this, event)">
                            </div>
                          </div>
                          <div class="col-sm-12 ">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="butotn" class="btn btn-default">Cancel</button>
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
                          <div class="col-sm-12">
                            <p class="mt-10"><span class="lbl-name">Island Hopping:</span>
                              <textarea class="text__editor" id="" name="" rows="10" cols="80">
                                This is my textarea to be replaced with CKEditor.
                              </textarea>
                            </p>
                            <p class="mt-10"><span class="lbl-name">Includes :</span>
                              <textarea class="text__editor" id="" name="" rows="10" cols="80">
                                This is my textarea to be replaced with CKEditor.
                              </textarea>
                            </p>
                            <p class="mt-10"><span class="lbl-name">Does not include :</span>
                              <textarea class="text__editor" id="editor3" name="editor3" rows="10" cols="80">
                                This is my textarea to be replaced with CKEditor.
                              </textarea>
                            </p>
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
   </section> -->
       <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-sm-12">
            <div class="tab-content">
              <div id="edit_cost" class="tab-pane fade in active">
                <div class="row">
                  <div class="box box-primary">
                    <div class="box-header">
                    <form role="form" action="{{url('add_custom_activity')}}" method="post">
                    {{ csrf_field() }}
                      <div class="box-body clearfix">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                          <div class="form-group">
                            <label for="tourName">Tour Name</label>
                            <input type="text" class="form-control" required  id="tourName" name="tourName" placeholder="Tour Name">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                          <div class="form-group">
                            <label for="tourDur">Tour duration (ex transport)</label>
                            <input type="text" class="form-control" required  id="tourDur" name="tourDur" placeholder="Tour duration (ex transport)">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                          <div class="form-group">
                            <label for="tourFreq">Tour Frequency</label>
                            <input type="text" class="form-control" required  id="tourFreq" name="tourFreq" placeholder="Tour Frequency">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                          <div class="form-group">
                            <label for="origin">Origin</label>
                            <input type="text" class="form-control" required  onFocus="geolocate()" id="address" name="address" placeholder="Origin" autocomplete="off">
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
                               <input type="text" class="form-control" required id="end_time"  name="end_time" placeholder="End Time">
                            </div>
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
                      </div>
                      <div class="box-body clearfix">
                        <div class="cost-title">Group costs</div>
                        <div class="row CurrencyTypeBox">
                          <div class="col">
                            <div class="form-group">
                              <label for="">Select Currency</label>
                              <select name="groupCurrencyType" class="form-control" onchange="updteCurrentType(event)">
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
                     </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="col-sm-12 text-right  ">
                              <a class="btn btn-primary step-1 btn-next"  href="#">Next</a>
                              <button type="submit" class="btn btn-primary">Save</button>
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
                                  </div>
                                  <div class="form-group col-sm-12">
                                    <label for="cost">Cost</label>
                                    <div class="input-group ">
                                      <div class="input-group-addon">
                                        <span class="input-group-text">IDR</span>
                                      </div>
                                      <input type="text" class="form-control formatCurrency cost_input"  placeholder="Cost" name="" required  onkeypress="return isNumber(this, event)">
                                    </div>
                                  </div>
                                  <div class="form-group col-sm-12">
                                    <label for="paidToringo">Paid to Ringgo</label>
                                    <div class="input-group ">
                                      <div class="input-group-addon">
                                        <span class="input-group-text">IDR</span>
                                      </div>
                                      <input type="text" class="form-control formatCurrency cost_input"  placeholder="Amount" name="" required  onkeypress="return isNumber(this, event)">
                                    </div>
                                  </div>
                                  <div class="form-group col-sm-12">
                                    <label for="cost">Paid to ABC</label>
                                    <div class="input-group ">
                                      <div class="input-group-addon">
                                        <span class="input-group-text">IDR</span>
                                      </div>
                                      <input type="text" class="form-control formatCurrency cost_input"  placeholder="Amount" name="" required  onkeypress="return isNumber(this, event)">
                                    </div>
                                  </div>
                                  <div class="form-group col-sm-12" style="margin-top: 51px;">
                                    <label for="cost">Gross margin</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <span class="input-group-text">IDR</span>
                                      </div>
                                      <input type="text" class="form-control formatCurrency cost_input"  placeholder="Amount" name="" required  onkeypress="return isNumber(this, event)">
                                    </div>
                                  </div>
                                  <div class="col-sm-12 ">
                                    <a class="btn btn-primary btn-back"  href="#">Back</a>
                                    <a class="btn btn-primary btn-next"  href="#">Next</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
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
                                      <textarea class="form-control text__editor" id="" name="" rows="2" cols="80"></textarea>
                                    </p>
                                    <p class="mt-10"><span class="lbl-name">Includes :</span>
                                      <textarea class="form-control text__editor" id="" name="" rows="2" cols="80"></textarea>
                                    </p>
                                    <p class="mt-10"><span class="lbl-name">Does not include :</span>
                                      <textarea class="form-control text__editor" id="" name="editor3" rows="2" cols="80"></textarea>
                                    </p>
                                  </div>
                                  <div class="col-sm-12 popover-newFields">
                                  </div>
                                  <div class="col-sm-12">
                                    <br/>
                                    <p class="text-right">
                                      <button onClick="addNewField(event);" type="button" class="btn btn-default" ><i class="fa fa-plus"></i> Add Field</button>
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
                        <div class="box-body clearfix">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="tourName">Tour Name</label>
                              <input type="text" class="form-control" required  id="tourName" name="tourName" placeholder="Tour Name">
                            </div>
                          </div>
                          <div class="col-sm-8">
                            
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-sm-6 col-lg-4">
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
                          </div>
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

@endsection
@section('customjs')
<script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script>

var currentEvent,saveEvtObj={},$currentPopupDetailWrapper='',$currentPopoverToOpt='',offsetLeft=0,popoverElement='',fcCalConfg='',renderingEvents='',dragingResourceId='',stepOneAllFieldsVals={},newEventsTimeDurationRange={};
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
    console.log(renderingEvents)

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

  $("#save").click(function () {
      var eventsFromCalendar = $('#fCalendar').fullCalendar('clientEvents');
      // $("#confirmTour").hide();
      var  booking_id=$('#booking_id').val(); 
      var  booking_type=$('#booking_type').val(); 
      // console.log(eventsFromCalendar)
      //console.log(eventsFromCalendar)
      var objects2 = new Array();
          for (let index = 0; index < eventsFromCalendar.length; index++) {
            // console.log(eventsFromCalendar[index])
            // console.log(eventsFromCalendar[index].title)
              objects2[index]={title:eventsFromCalendar[index].title,end:eventsFromCalendar[index].end,start:eventsFromCalendar[index].start,allDay:eventsFromCalendar[index].allDay,backgroundColor:eventsFromCalendar[index].backgroundColor,borderColor:eventsFromCalendar[index].borderColor,_id:eventsFromCalendar[index]._id,className:eventsFromCalendar[index].className,_allDay:eventsFromCalendar[index]._allDay,_start:eventsFromCalendar[index]._start,_end:eventsFromCalendar[index]._end,lunchYN:eventsFromCalendar[index].lunchYN,lunchskl:eventsFromCalendar[index].lunchskl,spMeal:eventsFromCalendar[index].spMeal,selfDrvYN:eventsFromCalendar[index].selfDrvYN,actDivingYN:eventsFromCalendar[index].actDivingYN,actFishYN:eventsFromCalendar[index].actFishYN,expNY:eventsFromCalendar[index].expNY,dive12:eventsFromCalendar[index].dive12,diver1:eventsFromCalendar[index].diver1};
            
       }
      var myJSON2 = JSON.stringify(objects2);
      $.ajax({
            type: "POST",
            url: "{{url('update_event')}}",
            data:{ _token: "{{ csrf_token() }}",event_data:myJSON2,booking_id:booking_id,start_date:'2020-02-02',end_date:'2020-02-02','booking_type':'tour' },
            success:function(responce){
              console.log(responce)
              // $("#confirmTour").hide();
              displayMessage("Events Saved  Success...",'alertmessage','success');
              window.location = "{{url('tour_bookings')}}";
            },
            error:function(responce){
              console.log(responce)
            }
            
        }); 
  });  
 
  function saveEvent(popoverclick){
    $(popoverclick).closest(".popover").hide().remove();
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
  $("#start_time").timepicker({
    showInputs: false
  });  
  $("#end_time").timepicker({
    'showInputs': false,
    'defaultTime': moment().add(4,'hours').format('hh:mm A')
  })
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
  // $('.tab-pane.calendar_view').addClass('active in');
  $('.fc-overlay').addClass('active');
  var defDate=moment().format();
  gettingSettingEvents(defDate,false); 
  // $('.tab-pane.calendar_view').removeClass('active in');   
})
.on('click','.btn-next',function(e){
  e.preventDefault();
  if($(this).hasClass('step-1'))
  {
    stepOneAllFieldsVals['groupComponent'] = $("input[name='groupComponent\\[\\]']").map(function(){return $(this).val();}).get();
    stepOneAllFieldsVals['groupCost'] = $("input[name='groupCost\\[\\]']")
              .map(function(){return $(this).val();}).get();
    stepOneAllFieldsVals['groupMaxPax'] = $("input[name='groupMaxPax\\[\\]']")
              .map(function(){return $(this).val();}).get();
    stepOneAllFieldsVals['groupBeneficiary'] = $("input[name='groupBeneficiary\\[\\]']").map(function(){return $(this).val();}).get();
    stepOneAllFieldsVals['groupCommission'] = $("input[name='groupCommission\\[\\]']").map(function(){return $(this).val();}).get();

    stepOneAllFieldsVals['paxComponent'] = $("input[name='paxComponent\\[\\]']").map(function(){return $(this).val();}).get();
    stepOneAllFieldsVals['paxCost'] = $("input[name='paxCost\\[\\]']")
              .map(function(){return $(this).val();}).get();
    stepOneAllFieldsVals['paxMinAge'] = $("input[name='paxMinAge\\[\\]']")
              .map(function(){return $(this).val();}).get();
    stepOneAllFieldsVals['paxBeneficiary'] = $("input[name='paxBeneficiary\\[\\]']").map(function(){return $(this).val();}).get();
    stepOneAllFieldsVals['paxCommission'] = $("input[name='paxCommission\\[\\]']").map(function(){return $(this).val();}).get();
    $(this).closest('form').find('input:not(.arr-item)').each(function() {
      stepOneAllFieldsVals[$(this).attr('name')]=$(this).val();
    })
    console.log(stepOneAllFieldsVals)
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
.on('click','#editor_view .save_button',function(){
  $(this).closest('form').find('.ev_text__editor').each(function(index){
    console.log(CKEDITOR.instances["editor"+(index + 1)].getData());
  })
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
  $newElement=$('<p class="mt-10" id="newElem'+newElemIndex+'"><span class="removeNewField">&times; </span><span class="lbl-name" contenteditable>Add label name </span> : <textarea class="form-control text__editor" rows="2" cols="80"></textarea> </p>');
  $newElement.find('[contenteditable]').blur(function(){
      // console.log('editable');
      // console.log($(this).val());
      // console.log($(this).text());
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
console.log(travelTime)
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

console.log(newEventsTimeDurationRange)
}
</script> 
@endsection


