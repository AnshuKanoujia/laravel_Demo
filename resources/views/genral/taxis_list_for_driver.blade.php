@extends('genral.layouts.mainlayout')
@section('title') <title>Driving details Of  Driver</title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Today`s driving details Of Driver`s 
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
             
                    @if(!empty($get_all_events_of_today) )
                   
                        <!-- <div class="box-header">
                          <h3 class="box-title">Booking ID : </h3>   
                        </div> -->
                        <div class="box-body">
                          <table  class="table">
                            <thead>
                             <tr>
                               <th>Taxi</th>
                               <th>Guest-Name</th>
                               <th>Guest-Phone</th>
                               <th>Guest-Email</th>
                               <th>Start-DateTime</th>
                               <th>End-DateTime</th>
                             </tr>
                            </thead>
                            <tbody>
                            @foreach($get_all_events_of_today as $value)
                                <tr>
                                    <th class="text-primary">{{$value->booking_id}}</th>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->whatsapp}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{date("F j, Y h:i:s A",strtotime($value->start_date))}}</td>
                                    <td>{{date("F j, Y h:i:s A",strtotime($value->end_date))}}</td>
                                </tr>
                            @endforeach
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







