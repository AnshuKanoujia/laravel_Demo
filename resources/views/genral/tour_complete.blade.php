@extends('genral.layouts.mainlayout')
@section('title') <title>Tour Complete </title>
 <style>
  .dropzone {
    min-height: 150px;
    border: 2px dotted rgba(0, 0, 0, 0.3);
    background: white;
    padding: 20px 59px;
}


 .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}


 </style>
@endsection





@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="text-success">
          Tour Created 
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
            @if($errors->any())
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
                <form role="form" action="{{url('listenToReplies')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="box-body">
                        <!-- <div class="col-md-12">
                          <p class="label label-success" style="15px">Tour Have Been Created </p>
                        </div> -->
                        <div class="col-md-offset-3 col-md-6">
                              <p class="label label-success" style="font-size:15px;">Tour Have Been Created </p>
                              <label class="h2">Tour Package send to Client <img src="{{url('public/admin/images/whatsapp.png')}}" style="height:80px;" /></label>
                              <div class="form-group">
                                <label for="license_no">Whatsapp No <i class="text-danger">*</i></label>
                                <input type="text" class="form-control" required value="{{$tour_data->guest_whatsapp}}" id="whatsapp_no" name="whatsapp_no" placeholder="Whatsapp No">
                              </div>
                              <input type="hidden" name="booking_id" id="booking_id" value="{{$tour_data->booking_id}}">
                              <div class="form-group">
                                <label for="license_no">Whatsapp Message</label> 
                                <textarea style="resize:none;" class="form-control" name="whatsapp_msg" id="whatsapp_msg" rows="4" placeholder="Whatsapp Message (optional) " ></textarea>
                              </div>




                           <button type="submit" class="pull-right btn btn-primary">Send Tour Package</button>
                        </div>

                        
                        <!-- <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Add A Driver</button>
                        </div> -->
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




        

      $(function () {

        


        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });


      });
     

   
   


      //     restrict Alphabets  
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
