@extends('genral.layouts.mainlayout')
@section('title') <title>dashboard </title> 

<style type="text/css">
[class^="icon-"], [class*=" icon-"] {
    background-image: url("public/admin/bootstrap/glyphicons/glyphicons-halflings.png");
}
</style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Send mail 
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

       


        <!-- Main content -->
        <section class="content">
        <div class="row">
          <div class="col-md-12">
         

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
              
            </div>
          </div>
          <div class="row">
         
            <div class="col-md-12">

              <div class="box box-primary">
                <div class="box-body">
                 
                  <div class="row">
                  <form action="{{url('email_send')}}" method="post">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                       <label>From Email : </label>
                       <input type="text" class="form-control" name="from_email" id="from_email" placeholder="Enter To Email"/>
                       <label>To Email : </label>
                       <input type="text" class="form-control" name="to_email" id="to_email" placeholder="Enter To Email"/>
                    </div>
                    <div class="col-md-4">
                       <label>Message : </label>
                       <input type="text" class="form-control" name="msg" id="msg" placeholder="Enter Message...."/>
                       <br/>
                       <button class="btn btn-sm btn-primary" name="send_mail">Submit </button>
                    </div>

                   </form>
                  </div><!--  End Of the ROw -->
                  
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


      </div><!-- /.content-wrapper -->




  
    

  @endsection

 @section('customjs')

    

@endsection

