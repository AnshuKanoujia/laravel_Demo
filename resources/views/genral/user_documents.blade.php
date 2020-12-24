@extends('genral.layouts.mainlayout')
@section('title') <title>Upload Documents</title>
 <style>
  .dropzone {
    min-height: 150px;
    border: 2px dotted rgba(0, 0, 0, 0.3);
    background: white;
    padding: 20px 59px;
}
.edit-on-click{
  padding:5px 10px;
  cursor: pointer;
}
.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
    border: 1px solid 
    #ececec;
}
.click-any{
  display: inline-block;
  width: 100%;
  height: 60px;
}

 </style>
@endsection



@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Documents
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
                  <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Upload Documents</label>
                            <form action="{{url('upload_user_document')}}" class="dropzone" method="post" >
                            {{ csrf_field() }}
                            <input  type="hidden"  name="user_id" value="{{$user_id}}" />
                            </form>
                            </div>
                            <div class="form-group">
                                <a href="{{url('registration')}}" class="btn btn-primary btn-sm pull-left">Skip</a>
                                <a href="{{url('registration')}}" class="btn btn-primary btn-sm pull-right" >Upload Document</a>
                            </div>

                        </div>
                       
                 </div>
                 
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
                  <h3 class="box-title">All Document List</h3> <div class="pull-right alertmessage"></div>
                </div>
                <div class="box-body">
                @if(isset($get_user_documents))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:200px">Image</th>
                        <th>Documents</th>
                        <th style="width: 60px;" >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($get_user_documents as $value)
                      <tr id="row_{{$value->id}}">
                        <td>
                        @if($value->document_type=='application/pdf')
                        <img src="{{ URL::asset('public/admin/images/pdf.png')}}" style="height:50px; width:50px;" >
                        @else
                        <img  src="{{ URL::asset('public/images/users/'.$value->documents)}}" style="height:50px; width:50px;"/>
                        @endif
                        </td>
                        <td style="padding: 0;vertical-align: middle">
                        @if($value->document_title=='')
                        
                        <span class="edit-on-click click-any">{{$value->document_title}}</span>
                        @else
                        <span class="edit-on-click"> {{$value->document_title}}</span>
                        @endif
                        
                          
                        </td>
                        
                        <td>
                        <a href="javascript:void(0);" title="delete" onclick="delete_documents({{$value->id}},{{$user_id}});" ><i class="fa fa-trash text-danger"></i></td>
                      </tr>
                      @endforeach

                    </tbody>
                   
                  </table>


                  @else
                  <h5 class="box-title text-danger">There is no data.</h3>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </section>


      </div>


      
     

@endsection


@section('customjs')


    <script type="text/javascript">
     
      $(document).ready(function() {
              // var $text2 = $(".edit-on-click").text();
              // $('.edit-on-click').addClass("click-any");
              // $('.edit-on-click').removeClass("click-any");
          $('.edit-on-click').click(function() {

              var $text = $(this),
              $input = $('<input type="text" class="form-control" />')
              if($text.text() == ''){
               
                $text.hide().after($input);
              }


              else{
                $text.hide().after($input);
              
                
              }
              $input.val($text.html()).show().focus()
              // .keypress(function(e) {
              //   var key = e.which
              //   if (key == 13) 
              //   {
                  
              //      $input.hide();
              //     $text.html($input.val()).show();

              //     return false;
              //   }
              // })
              .focusout(function() {
                var rowId= $(this).closest('tr').prop('id'); 
                var row_id= rowId.substring(4, rowId.length);  // row_15 
                // console.log("Row Id : "+row_id); 
                // console.log(" value :  "+$input.val()); 
                var doc_val=$input.val()?$input.val():''; 
                if(row_id)
                {
                  
                  $.ajax({
                          type: "POST",
                          url: "{{url('update_user_documents_title')}}",
                          data: {'row_id':row_id,'documents_title':doc_val,"_token":"{{ csrf_token() }}"},
                          success: function(result){
                              // console.log(result);
                              if(result=='200'){
                                $text.html($input.val()).show();
                                $('.alertmessage').html('<span class="text-success">Documents title updated...</span>');
                              }
                              else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                          }
                      });
                }
                else{ $('.alertmessage').html('<span class="text-danger">Somthing event wrong!...</span>'); }

                $input.hide();
                $text.show();
              })
          });
        });
      
     /*   Start to Upload File  Images */
    //Disabling autoDiscover
    Dropzone.autoDiscover = false;
   

   $(function() {
       //Dropzone class
       var myDropzone = new Dropzone(".dropzone", {
       url: "{{url('upload_user_document')}}",
       paramName: "file",
       maxFilesize: 6000,
       maxFiles: 10,
       acceptedFiles: "image/*,application/pdf",
       success: function(file, response){
       
               console.log(response); 
               // console.log(file); 
              // $('#image').val(response.filename); 

              if(response.success=='1')
              {
                var url="<?php echo URL::asset('public/admin/images/'); ?>"; 
                var url2="<?php echo URL::asset('public/images/users/'); ?>"; 
               /*  $('tbody').append('<tr><td>G</td><td>H</td><td>I</td></tr>');*/
                var html='<tr id="row_'+response.row_id+'" class="even" >';
                      if(response.documents_type=='application/pdf')
                      {
                        html+='<td class="  sorting_1"><img src="'+url+'/pdf.png" style="height:50px; width:50px;" ></td>'; 
                      }
                      else
                      {
                        html+='<td class="  sorting_1"><img src="'+url2+'/'+response.filename+'" style="height:50px; width:50px;" ></td>'; 
                      }
                      //  <input type="text"  value="'+response.filename+'"  onkeyup="save_documents_title(this,'+response.row_id+')"/>
                      html+='<td style="padding: 0;vertical-align: middle" class=" " ><span class="edit-on-click click-any"></span></td>';
                      html+='<td class="">\
                        <a href="javascript:void(0);" title="delete" onclick="delete_documents('+response.row_id+','+response.user_id+');" ><i class="fa fa-trash text-danger"></i></td>';
                        //$value->id   $driver_id 
                     html+='</tr>'; 
                $('tbody').append(html); 
              } 
              else if(response.success=='0')
              {
                $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>');
              }

           }
     });
      
   }); //


   //  For   Bootstrap  datatable 
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


   function delete_documents(rowId,user_id)
      {
          if(confirm('Do you want  to  delete this?'))
          {
              $.ajax({
                  type: "POST",
                  url: "{{url('delete_user_documents')}}",
                  data: {'row_id':rowId,'user_id':user_id,"_token":"{{ csrf_token() }}"},
                  success: function(result){
                      //console.log(result);
                      if(result=='200'){
                        $('#row_'+rowId).remove();
                        $('.alertmessage').html('<span class="text-success">Document deleted...</span>');
                      }
                      else{ $('.alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  }
              });
          }
      }
    </script>
@endsection
