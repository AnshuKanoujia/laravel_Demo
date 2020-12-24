@extends('genral.layouts.mainlayout')
@section('title') <title>Financial Layout </title> 
<style>
.hidden_for_text
{
      border: none;
      border-color: transparent;
      
}
.input_width{
  width: 75px;
}

.hidden_for_text:focus
{
      border: none;
      border-color: transparent;
      outline: none;
}
</style>
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Financial Layout 
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
                  <h3 class="box-title">All Financial Details (today)</h3> 
                  <div class="pull-left alertmessage"></div>
                  <!-- <div class="pull-right"><a href="{{url('export_financial')}}" class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;Export data</a></div> -->
                </div>
                <div class="box-body">
                  
                <form class="from-group" id="financial_form" action="javascript:void(0)" method="post">
                {{ csrf_field() }}
                @if(count($All_layout))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="text-center">Date</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Booking Type</th>
                        <th class="text-center">Debit : A/C</th>
                        <th class="text-center">Credit : A/C</th>
                        <th class="text-center">Amount (INR)</th>
                        <!-- <th class="text-center">Booking Status</th> -->
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($All_layout as $row)
                      <tr id="row_" class="text-center">
                        <td><input type="text" class="hidden_for_text input_width mandatory" readonly name="date[]" value='{{date("Y-m-d",strtotime($row['datetime']))}}'></td>
                        <td><input type="text" class="hidden_for_text mandatory"  name="description[]" value='Amount of {{$row["guest_name"]}}'></td>
                        <td><input type="text" class="hidden_for_text input_width mandatory" readonly name="booking_type[]" value="{{ucfirst($row['type'])}}"></td>
                        <td>
                           @if(count($all_banana_accounts))
                            <select name="debit_acc[]"  class="mandatory">
                              <option value="">-select-</option>
                              @foreach($all_banana_accounts as $row2)
                              <option value="{{$row2->account_number}}">{{$row2->account_number}}</option>
                              @endforeach
                            </select>
                           @endif
                        </td>
                        <td>
                          @if(count($all_banana_accounts))
                            <select name="credit_acc[]"  class="mandatory">
                              <option value="">-select-</option>
                              @foreach($all_banana_accounts as $row2)
                              <option value="{{$row2->account_number}}">{{$row2->account_number}}</option>
                              @endforeach
                            </select>
                           @endif
                        </td>
                        <td><input type="text" class="hidden_for_text input_width  mandatory"  name="external_amount[]"  value="{{$row['amount']}}"></td>
                        <!-- <td><input type="text" class="hidden_for_text mandatory" readonly name="booking_status[]"  value="{{ucfirst($row['status'])}}"></td> -->
                      </tr>
                    @endforeach
                       <tr>
                        <td class="validation_msg"></td>
                        <td></td>
                        <td></td>
                        <td class="text-center"> <button type="submit" class="btn btn-primary btn-xs btn-block submit_btn" >Submit</button> </td>
                        <td class="new_msg text-center"></td>
                        <td>@if(count($financials_of_day))<a href="{{url('export_financial')}}" style="display:block;" class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;Export data</a>@endif</td>
                       </tr>
                    </tbody>

                  </table>
                  </form>
                  @else
                  <div class="box-title text-danger text-center">There is no data.</div>
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

    //  for chnage the Driver Type  And Set  Automaticaly  Rate of the Driver 
$(document).ready(function(){

  $('#financial_form').submit(function(e){
      e.preventDefault(); 
      $('.validation_msg').html("");
      $('.new_msg').html('');
       var isValid = true;    
       var classname = 'mandatory';    
      $('.' + classname + '').each(function (i, obj)  
      {    
          if (obj.value == '')  
          {    
            $(obj).css('border','1px solid red'); 
              isValid = false;    
              return isValid;    
          }
      });

      console.log(isValid)
      if (!isValid)  
      {    
          $('.' + classname + '').each(function (i, obj)  
          {    
              if (obj.value == '')  
              {    
                  obj.style.border = '1px solid red';    
              }  
              else  
              {    
                  //obj.style.border = '1px solid black';    
              }    
          });       
          $('.validation_msg').html('<span class="label  label-danger">All field are required!</span>'); 
      }   

      if (isValid)  
      {    
          if(confirm('Do you want  to  save this?'))
          {
             var  form_data=$('#financial_form').serialize();
             console.log(form_data)
              $.ajax({
                  type: "POST",
                  url: "{{url('save_financial')}}",
                  data: form_data,
                  beforeSend:function(){
                   $('.submit_btn').html('<i class="fa fa-spin"></i> Submit'); 
                  },
                  success: function(result){
                      console.log(result);
                      if(result=='200'){
                        $('.submit_btn').html('Submit');  
                        $('.validation_msg').html('<span class="label  label-success">Financial data saved.</span>'); 
                        $('.new_msg').html('<span class="txet text-info"> click export data to download ---&gt <span>');
                      }
                      else{ 
                        $('.validation_msg').html('<span class="label  label-danger">Somthing event wrong!....</span>'); 
                        }
                  }
              });
          }   
      }   
      

  }); 
    
    



});

      $(function () {
    
        $('#example1').dataTable({
        
          // "ordering": false,
          // "bPaginate": true,
          // "bLengthChange": false,
          // "bFilter": true,
          // "bSort": false,
          // "bInfo": true,
          // "bAutoWidth": false,

          "ordering": false,
          "bPaginate": false,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": false,
          "bInfo": false,
          "bAutoWidth": false,
          
        });
      });


    </script>
@endsection




