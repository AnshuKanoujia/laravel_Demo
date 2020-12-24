@extends('genral.layouts.mainlayout')
@section('title') <title>Tour length</title>
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
          <h1>
           Add Tour length
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="dashboard">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content"    style="    min-height: 160px;" >
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
                <form role="form" action="{{url('update_tour_length/'.$tour_details->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="name">Days</label>
                              <input type="text" class="form-control"  maxlength="3" onkeyup="set_night_value()" onkeypress="return restrictAlphabets(event);" value="{{$tour_details->no_of_day}}" required id="no_of_day" name="no_of_day" placeholder="day..">
                            </div>
                        </div>

                        <div class="col-md-4">
                             <div class="form-group">
                               <label for="email">Night</label>
                               <input type="text" class="form-control" maxlength="3"  onkeyup="set_day_value()" onkeypress="return restrictAlphabets(event);" value="{{$tour_details->no_of_night}}" required id="no_of_night" name="no_of_night" placeholder="night..">
                              </div>
                        </div>
                        <div class="col-md-4" style="padding-top:24px; ">
                           <button type="submit" class="btn btn-primary ">Update length</button>
                        </div>
                        
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
   


      //     restrict Alphabets  
      function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8 ||
            (x>=35 && x<=40)|| x==46)
            return true;
          else
            return false;
      }

        function set_night_value()
        {
            var days_val=$("#no_of_day").val(); 
           
           if(days_val){$("#no_of_night").val(parseInt(days_val)-1)}
        }
        function set_day_value()
        {
            var night_val=$("#no_of_night").val(); 
           
           if(night_val){$("#no_of_day").val(parseInt(night_val)+1)}
        }
     



    </script>
@endsection
