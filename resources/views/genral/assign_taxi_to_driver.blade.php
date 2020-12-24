@extends('genral.layouts.mainlayout')
@section('title')
<title>Assign taxi to driver</title>
@endsection

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Assign taxi to driver
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
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <!-- <h3 class="box-title"> @if(isset($editData) && !empty($editData)) Update Assign Taxi @else Assign Taxi @endif</h3> <div class="pull-right alertmessage"></div> -->
                </div><!-- /.box-header -->
                <div class="box-body">
                
                @if(isset($editData) || isset($data))
                @if(isset($editData) && !empty($editData))
                <?php  //print_r($editData['newTaxiData']['driverData'][$key]);  ?> 
                <form role="form"   action="{{ url('update_assign_taxi/'.$editData['newTaxiData']['rowId'])}}" method="post" >
                @else
                <form role="form" onsubmit="return confirm('do you  want to assign these  drivers ?');"  action="{{url('submitAssignTaxi')}}" method="post" >
                @endif
                {{ csrf_field() }}
                 <div class="row">
                    <div class="col-md-2"><h3 class="box-title text-primary"> @if(isset($editData) && !empty($editData)) Update Assign Taxi @else Assign Taxi @endif</h3></div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="assign_date">Assign Date</label> 
                        <input type="text" class="form-control" value="{{ $data['selected_date']?$data['selected_date']:date('Y-m-d')}}"  required name="assign_date" id="assign_date" placeholder="Assign Date" />
                      </div>
                    </div>
                    
                 </div>
                 <div class="row">
                   <div class="col-md-7">
                   <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr class="bg-primary">
                        <th>Taxi</th>
                        <th>Driver</th>
                      </tr>
                    </thead>

                    @if(isset($editData) && !empty($editData))
                    
                    <tbody>
                     @foreach($editData['newTaxiData']['taxiData'] as $key=>$taxi)
                      <tr id="{{$key}}" class="{{$editData['newTaxiData']['driverData'][$key]}}" >
                        <td>
                        <label for="taxi[{{$key}}]">{{$taxi->title}}</label>
                        <input id="taxi[{{$key}}]" type="hidden" name="taxi[{{$key}}]" value="{{$taxi->id}}" />
                        <!-- <select id="taxi[{{$key}}]" name="taxi[{{$key}}]" readonly>
                          <option value="{{$taxi->id}}">{{$taxi->title}}</option>
                        </select> -->
                        <td>
                        <select id="driver[{{$key}}]"  class="form-control"  name="driver[{{$key}}]" onchange="getNewDriverlist(event,{{$key}});" required>
                          <option value="">----Select Driver----</option>
                          <option value="0" >No Driver</option>
                          @foreach($editData['drivers'] as $keys=>$drivers)
                          <option value="{{$drivers->id}}" @if($editData['newTaxiData']['driverData'][$key]==$drivers->id) {{ 'selected' }} @endif>{{$drivers->name}}</option>
                          @endforeach
                        </select>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>

                    <input type="hidden" name="rowId" value="<?php echo $editData['newTaxiData']['rowId'] ?>"/>

                    @elseIf(isset($data) && !empty($data))

                    <tbody>
                     @foreach($data['taxies'] as $key=>$taxi)
                      <tr id="{{$key}}" >
                        <td>
                        <label for="taxi[{{$key}}]">{{$taxi->title}}</label>
                        <input  type="hidden" name="taxi[{{$key}}]" value="{{$taxi->id}}"  />
                        <!-- <select id="taxi[{{$key}}]" name="taxi[{{$key}}]" readonly>
                          <option value="{{$taxi->id}}">{{$taxi->title}}</option>
                        </select> -->
                        <td>
                        <select class="form-control" id="driver[{{$key}}]" name="driver[{{$key}}]" onchange="getNewDriverlist(event,{{$key}});" required>
                          <option value="">----Select Driver----</option>
                          <option value="0">No Driver</option>
                          @foreach($data['drivers'] as $drivers)
                          <option value="{{$drivers->id}}" @if( !empty($data['newTaxiData']['driverData'][$key]) && $data['newTaxiData']['driverData'][$key]==$drivers->id) {{ 'selected' }} @endif >{{$drivers->name}}</option>
                          @endforeach
                        </select>
                        </td>
                        
                      </tr>

                      @endforeach
                      <input type="hidden" name="rowId" value="{{!empty($data['rowId'])?$data['rowId']:''}}"/>
                    </tbody>
                   
                    @endif
                  </table>

                  <div class="row">
                     <div class="col-md-offset-6 col-md-6">
                     <button type="submit" class="btn btn-primary"> @if(isset($editData) && !empty($editData)) Update @else Submit @endif</button>
                     </div>
                  </div>
                  <!-- <button type="button" onclick="assignTask()">Submit</button> -->
                   </div>
                 </div>
                  
                  </form>
                  @else
                  <h5 class="box-title text-danger">There is no data.</h3>
                  @endif
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection

@section('customjs')

<script type="text/javascript">


function getNewDriverlist(event ,rowIndex) {
  
var selectedval=event.target.value  ;
var oldSelectedval=$(event.target).data('oldVal');
$(event.target).data('oldVal',selectedval);
$(event.target).closest('tr').nextAll().each(function(){
if($(this).find('td:last-child select').val() == selectedval)
$(this).find('td:last-child select').val('');
if(selectedval != '0')
$(this).find('td:last-child select option[value="'+selectedval+'"]').attr('disabled','disabled');
$(this).find('td:last-child select option[value="'+oldSelectedval+'"]').removeAttr('disabled');
})
}

$(function () {
      /* set  a date  taxi  And  Driver Listing data*/
     var selected_date="{{$data['selected_date']}}"; 
     
    //  console.log(selected_date)
     $('table tbody tr td').each(function(){ 
        // console.log("Hi Pradeep");
        console.log($('table tbody tr td').attr('class'));
        }); 
      /* set  a date  taxi  And  Driver Listing data */

      // $("#assign_date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
      // $("#assign_date").inputmask("yyyy-mm-dd");
        var pickerOptsGeneral = { format: "yyyy-mm-dd", autoclose: true, minView: 2, maxView: 2, todayHighlight: true,startDate:  new Date() };
        $('#assign_date').datetimepicker(pickerOptsGeneral).on('changeDate',function(event){
          
          var date = event.target.value;
          // console.log(date); 
          if(confirm('Do you want  to  Chnage this?'))
          {
              $.ajax({
                  type: "POST",
                  url: "{{url('getAssigntaxiOfDay')}}",
                  data: {'date':date,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      console.log(result);
                      if(result!='')
                      {
                        $('tbody').html(result);
                      }
                      else
                      {
                        $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>');
                      }
                     
                  }
              });
          }

        });
        //$("#assign_date").datetimepicker("setDate",data(yyyy-mm-dd));
         
      });

  function updateAssignTaxi(event, rowId){
    if(rowId != null){
      var date = event.target.value;
    }
  }

  

</script>
@endsection
