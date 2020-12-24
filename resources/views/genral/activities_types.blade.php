@extends('genral.layouts.mainlayout')
@section('title') <title>Activities Types </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add Activities  Types 
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
                <form role="form" action="{{url('add_activities_type')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" class="form-control" required maxlength="100"  id="title" name="title" placeholder="Title..">
                            </div>
                        </div>
                        <div class="col-md-6">
                              <!-- textarea -->
                             <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" maxlength="202"  style="resize:none; " required rows="4"  id="description"  placeholder="description ..."></textarea>
                              </div>
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Add Activities  Type</button>
                        </div>
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
                  <h3 class="box-title">All Activities Types</h3> <div class="pull-right alertmessage"></div>
                </div><!-- /.box-header -->
                <div class="box-body">
                @if(isset($activities_types))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($activities_types as $value)
                      <tr id="row_{{$value->id}}">
                        <td>{{$value->title}} </td>
                        <td>{{$value->description}}</td>
                        <td><a href="javascript:void(0);" title="delete" onclick="delete_activities_type({{$value->id}});" ><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;<a href="{{url('edit_activities_type/'.$value->id)}}" title="edit"><i class="fa fa-edit text-success"></i></a></td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                   
                  </table>
                  

                  @else
                  <h5 class="box-title alert alert-danger">There is no data.</h3>
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
    var gettype=$("input[type=radio][name='type']:checked").val();
    if(gettype=='contract')
    {
      $("input[type=radio][name='rate'][value='monthly']").prop('checked', false);
      $("input[type=radio][name='rate'][value='daily']").prop('checked', true); 
    }
    else if(gettype=='employee')
    {  
      $("input[type=radio][name='rate'][value='daily']").prop('checked', false);
      $("input[type=radio][name='rate'][value='monthly']").prop('checked', true);
    }
    else
    {
      
      $("input[type=radio][name='rate'][value='daily']").prop('checked', true);
    }
    $("input[type=radio][name='type']").change(function(){
       var gettype=this.value; 
        if(gettype=='contract')
        {
          $("input[type=radio][name='rate'][value='monthly']").prop('checked', false);
          $("input[type=radio][name='rate'][value='daily']").prop('checked', true); 
        }
        else if(gettype=='employee')
        {  
          $("input[type=radio][name='rate'][value='daily']").prop('checked', false);
          $("input[type=radio][name='rate'][value='monthly']").prop('checked', true);
        }
        else
        {
          
          $("input[type=radio][name='rate'][value='daily']").prop('checked', true);
        }
    }); 
});

      $(function () {
    
        $('#example1').dataTable({
        
          "ordering": false,
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false,
          
        });
      });

       

      function delete_activities_type(rowId)
      {
          if(confirm('Do you want  to  delete this?'))
          {
              $.ajax({
                  type: "POST",
                  url: "{{url('delete_activities_type')}}",
                  data: {'row_id':rowId,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      //console.log(result);
                      if(result=='200'){
                        $('#row_'+rowId).remove(); 
                        $('.alertmessage').html('<span class="alert alert-success">Activities Type deleted...</span>');  
                      }
                      else{ $('.alertmessage').html('<span class="alert alert-success">Somthing event wrong!...</span>'); }
                  }
              });
          }
      }

    </script>
@endsection




