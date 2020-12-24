@extends('genral.layouts.mainlayout')
@section('title') <title>Accessories </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           All Inventory 
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
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
                <!-- <div class="box-header">
                  <h3 class="box-title">All Products List</h3>  <div class="pull-right alertmessage"></div> 
                </div> -->
                <div class="box-body">
                    <div class="row text-center ">
                        <a href="{{url('new_accessories')}}" class="btn btn-info btn-xs "> <span class="fa fa-plus-circle"></span> Add Inventory</a>
                    </div>
                @if(isset($all_products))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       
                        <th>Products </th>
                        <th>Quantities</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($all_products as $value)
                        <tr id="row_{{$value->id}}">
                          <td><a href="{{url('accessories/'.strtolower($value->type_of_product))}}">{{$value->type_of_product}}</a></td>
                          <td><a href="{{url('accessories/'.strtolower($value->type_of_product))}}">{{$value->counting}}</a></td>
                          <td>
                          <a href="{{url('accessories/'.strtolower($value->type_of_product))}}" class="btn btn-primary btn-xs" title="Views All"><i class="fa fa-eye text-success"></i> Views All </a>
                          </td>
                        </tr>
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

      <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <img class="img-responsive" src=""  style="height:400px;"/>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>


@endsection


@section('customjs')
    
    <!-- page script -->
    <script type="text/javascript">
     $(document).ready(function(){
      $('img').on('click', function () {
        var image = $(this).attr('src');
        $('#myModal').on('show.bs.modal', function () {
            $(".img-responsive").attr("src", image);
        });
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
          "bAutoWidth": false
        });
      });

      //     restrict Alphabets  
      function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8)
            return true;
          else
            return false;
      }

 

      function delete_record(rowId)
      {
          if(confirm('Do you want  to  delete this?'))
          {
              $.ajax({
                  type: "POST",
                  url: "{{url('delete_accessories')}}",
                  data: {'row_id':rowId,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      //console.log(result);
                      if(result=='200'){
                        $('#row_'+rowId).remove(); 
                        $('.alertmessage').html('<span class="text-success">Products deleted...</span>');  
                      }
                      else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  }
              });
          }
      }

    </script>
@endsection




