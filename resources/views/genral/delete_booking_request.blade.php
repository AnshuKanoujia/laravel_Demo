@extends('genral.layouts.mainlayout')
@section('title') <title>delete Booking Request </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Delete Booking Request
            <small>New</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('dashboard')}}">Forms</a></li>
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
            
                    @if(!empty($delete_details) )
                        <!-- <div class="box-header">
                          <h3 class="box-title">Booking ID : {{$delete_details->booking_id}}</h3>   
                        </div> -->
                        <div class="box-body">
                          <table  class="table">
                            <tbody>
                             <tr>
                                <th class="text-primary">Booking ID</th>
                                <td>{{$delete_details->booking_id}} ( {{ucfirst($delete_details->booking_type)}} ) </td>
                                <th>Guest name</th>
                                <td>{{ucfirst($delete_details->name)}}</td>
                              </tr>
                              <tr >
                                <th>Delete request by</th>
                                <td>{{ucfirst($delete_details->users_name)}}  ( @if($delete_details->users_type=='1') Admin @elseif($delete_details->users_type=='2') Employee @elseif($delete_details->users_type=='3') Managers @endif )</td>
                                <th class="text-aqua" >Delete reason</th>
                                <td>{{ucfirst($delete_details->delete_reason)}}</td>
                              </tr>
                              <tr>
                                <th>Booking start date</th>
                                <td>{{date("F j, Y h:i:s A",strtotime($delete_details->booking_start_date.' '.$delete_details->tour_start_time))}}</td>
                                <th>Booking end  date</th>
                                <td>{{date("F j, Y",strtotime($delete_details->booking_end_date))}}</td>
                              </tr>
                              @if($delete_details->booking_type=='taxi')
                                <tr>
                                  <th>Source address </th>
                                  <td>{{$delete_details->source_address?$delete_details->source_address:''}}</td>
                                  <th>Destination address </th>
                                  <td>{{$delete_details->destination_address?$delete_details->destination_address:''}}</td>
                                </tr>
                              @endif
                              <tr>
                                <th>Guest email</th>
                                <td>{{$delete_details->guest_email}}</td>
                                <th>Guest  whatsapp</th>
                                <td>{{ucfirst($delete_details->whatsapp)}}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td>
                                <!-- <a href="{{url('delete_booking/'.$delete_details->id.'/'.$delete_details->booking_type)}}" class="btn btn-success" title="Approve">Approve</a> -->
                                <a href="javascript:void(0)" onclick="delete_cofirmation('{{$delete_details->id}}','{{$delete_details->booking_type}}')" class="btn btn-success" title="Approve">Approve</a>
                                &nbsp;&nbsp;
                                
                                <td>
                                <!-- <a href="{{url('delete_booking_request_cancel/'.$delete_details->id.'/'.$delete_details->booking_type)}}" class="btn btn-danger" title="Cencel">Cencel</a> -->
                                <a href="javascript:void(0)" onclick="deletebooking('{{$delete_details->id}}','{{$delete_details->booking_type}}')" class="btn btn-danger" title="Cancel">Cancel</a>


                                 </td></td>
                              </tr>
                            </tbody>
                          </table>
                        
                        </div><!-- /.box-body -->
                   @else
                      <div class="box-header text-center">
                        <h3 class="box-title text-center text-danger"> There  are no request  !!!.</h3>   
                      </div>
                   @endif
               
              </div><!-- /.box -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection

@section('customjs')
  <script>
 
   function  deletebooking(delete_id,booking_type)
   {
     if(confirm('Are you sure want to  cancel  ..'))
     {
      $.ajax({
            type: "GET",
            url: "{{url('delete_booking_request_cancel')}}/"+delete_id+"/"+booking_type,
            success:function(responce){
              window.location.assign("{{url('dashboard')}}");
            },
            error:function(responce){
              console.log(responce)
            }
        });
     }
     
   }

   function  delete_cofirmation(delete_id,booking_type)
   {
     if(confirm('Are you sure want to  delete?  ..'))
     {
      $.ajax({
              type: "GET",
              url: "{{url('delete_booking')}}/"+delete_id+"/"+booking_type,
              success:function(responce){
                window.location.assign("{{url('dashboard')}}");
              },
              error:function(responce){
                console.log(responce)
              }
        });
     }
    
   }

  </script>
@endsection





