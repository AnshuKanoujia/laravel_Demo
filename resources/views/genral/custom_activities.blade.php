@extends('genral.layouts.mainlayout')
@section('title') <title>Custom Activities  </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add Custom Activities 
            <small>Preview</small>
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
                <div class="box-header">
                <form role="form" action="{{url('add_custom_activity')}}" method="post">
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="activity_type">Activities  Type</label>
                              <select class="form-control"  required name="activity_type" id="activity_type">
                                 <option   value="">--Select Activities Type--</option>
                                 @foreach($activities_details['get_all_activities_types'] as $row)
                                   @if($row->id!='5')
                                   <option   value="{{$row->id}}">{{$row->title}}</option>
                                   @endif
                                   
                                 @endforeach
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="activity_name">Activities Name</label>
                              <input type="text" class="form-control" required maxlength="200" id="activity_name" name="activity_name" placeholder="Name">
                            </div>
                           
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label for="time_duration">Time (Hours)</label>
                                <input type="number" class="form-control" maxlength="2" max='14' min="1" oninput="validity.valid||(value='');"    required id="time_duration" name="time_duration" placeholder="Hours">
                              </div>
                              <div class="form-group">
                                <label for="tadistancexino">Distance(Kilometer)</label>
                                <input type="text" class="form-control" maxlength="10" onkeypress="return restrictAlphabets(event);"  required id="distance" name="distance" placeholder="Kilometer">
                              </div>
                              <!-- textarea -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" style="resize:none; " required rows="4" id="description"  placeholder="Description ..."></textarea>
                            </div>
                        </div>
                 </div>
                 <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add Custom Activity</button>
                  </div>
                </form>
                </div><!-- /.box-header -->
               
              </div><!-- /.box -->

              

              

              

            

            
          </div>   <!-- /.row -->
        </section><!-- /.content -->



         <!-- Main content -->
         <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Activities  Type List</h3>  <div class="pull-right alertmessage"></div> 
                </div><!-- /.box-header -->
                <div class="box-body">
                @if(isset($activities_details['get_all_activities']))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Activities Type</th>
                        <th>Name</th>
                        <th>Time</th>
                        <th>Distance</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($activities_details['get_all_activities'] as $value)
                     
                          @if($value->activity_type!='5')
                        <tr id="row_{{$value->id}}">
                          <td>{{$value->title}}</td>
                          <td>{{$value->activity_name}}</td>
                          <td>{{$value->time_duration}}</td>
                          <td>{{$value->distance}}</td>
                          <td>{{$value->description}}</td>
                        
                          <td>
                          <a href="javascript:void(0);" title="delete" onclick="delete_custom_activity({{$value->id}});"><i class="fa fa-trash text-danger"></i></a>
                          &nbsp;&nbsp;
                          <a href="{{url('edit_custom_activity/'.$value->id)}}" title="edit" ><i class="fa fa-edit text-success"></i></a></td>
                        </tr>
                        
                          @endif
                      @endforeach
                      
                    </tbody>
                   
                  </table>
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
      $(function () {
        $('#example1').dataTable({
          "ordering": false,
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": false,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
      


    /*   restrict Alphabets   */
      function restrictAlphabets(e){
        //console.log(e.key)
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8 ||
            (x>=35 && x<=40)|| x==46)
              return true;
          else
            return false;
      }
 


/*  delete Custom Activity */
      function delete_custom_activity(rowId)
      {
          if(confirm('Do you want  to  delete this?'))
          {
              $.ajax({
                  type: "POST",
                  url: "{{url('delete_custom_activity')}}",
                  data: {'row_id':rowId,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      //console.log(result);
                      if(result=='200'){
                        $('#row_'+rowId).remove(); 
                        $('.alertmessage').html('<span class="alert alert-success">Custom Activity deleted...</span>');  
                      }
                      else{ $('.alertmessage').html('<span class="alert alert-success">Somthing event wrong!...</span>'); }
                  }
              });
          }
      }

    </script>
@endsection




