@extends('genral.layouts.mainlayout')
@section('title') <title>Custom Activities  </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

         <!-- Main content -->
         <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Tour Template List</h3>  <div class="pull-right alertmessage"></div> 
                </div><!-- /.box-header -->
                <div class="box-body">
                @if(isset($get_all_activities))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Activities Type</th>
                        <th> Tour Name</th>
                        <th>Tour Duration</th>
                        <!-- <th>Tour Frequency</th>
                        <th>Description</th> -->
                        <th>Action</t
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($get_all_activities as $value)
                          @if($value->activity_type=='5')
                     
                        <tr id="row_{{$value->id}}">
                          <td>{{$value->title}}</td>
                          <td>{{$value->activity_name}}</td>
                          <td>{{$value->time_duration}}</td>
                          <!-- <td>{{$value->distance}}</td>
                          <td>{{$value->description}}</td> -->
                        
                          <td>
                          <a href="javascript:void(0);" data-toggle="tooltip" title="delete" onclick="delete_tour_template({{$value->id}});"><i class="fa fa-trash text-danger"></i></a>
                          &nbsp;&nbsp;
                          <!-- <a href="javascript:void(0);" data-toggle="tooltip" title="template details"  ><i class="fa fa-eye"></i></a>
                          &nbsp;&nbsp; -->
                          <a href="{{url('edit_tour_template/'.$value->id)}}" data-toggle="tooltip" title="edit" ><i class="fa fa-edit text-success"></i></a></td>
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
        $('[data-toggle="tooltip"]').tooltip();

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
      function delete_tour_template(rowId)
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
                        $('.alertmessage').html('<span class="text-success">Template  deleted...</span>');  
                      }
                      else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  }
              });
          }
      }

    </script>
@endsection




