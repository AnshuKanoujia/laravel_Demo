@extends('genral.layouts.mainlayout')
@section('title') <title>Update Custom Activities  </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Update Custom Activities 
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
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                <form role="form" action="{{url('update_custom_activity/'.$activities_details['get_customization_activity']->id)}}" method="post">
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">

                          <div class="form-group">
                              <label for="activity_type">Activities  Type</label>
                              <select class="form-control" required name="activity_type" id="activity_type">
                                 <option   value="">--Select Activities Type--</option>
                                 @foreach($activities_details['get_all_activities_types'] as $row)
                                 <option   value="{{$row->id}}" @if($activities_details['get_customization_activity']->activity_type==$row->id) selected @endif>{{$row->title}}</option>
                                 @endforeach
                              </select>
                            </div>
                            
                            <div class="form-group">
                              <label for="activity_name">Activities Name</label>
                              <input type="text" class="form-control" id="activity_name"  required maxlength="200" value="{{$activities_details['get_customization_activity']->activity_name}}" name="activity_name" placeholder="Name">
                            </div>
                           
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label for="time_duration">Time (Hours)</label>
                                <input type="text" class="form-control" maxlength="10" onkeypress="return restrictAlphabets(event);"  required  value="{{$activities_details['get_customization_activity']->time_duration}}" id="time_duration" name="time_duration" placeholder="Hours">
                              </div>
                              <div class="form-group">
                                <label for="tadistancexino">Distance(Kilometer)</label>
                                <input type="text" class="form-control" maxlength="10" onkeypress="return restrictAlphabets(event);"  required value="{{$activities_details['get_customization_activity']->distance}}" id="distance" name="distance" placeholder="Kilometer">
                              </div>
                              <!-- textarea -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control"  name="description"  required id="description"  style="resize:none; "  rows="4"  placeholder="Address ...">{{$activities_details['get_customization_activity']->description}}</textarea>
                            </div>
                            
                              
                        </div>
                 </div>
                 <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Custom Activity</button>
                  </div>
                </form>
                </div><!-- /.box-header -->
               
              </div><!-- /.box -->
          
          </div>   <!-- /.row -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
@endsection


@section('customjs')
  <script type="text/javascript">
      /*   restrict Alphabets   */
      function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8 ||
            (x>=35 && x<=40)|| x==46)
            return true;
          else
            return false;
      }
  </script>
@endsection




