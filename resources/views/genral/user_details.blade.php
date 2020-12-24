@extends('genral.layouts.mainlayout')
@section('title') <title>User  Details </title>
<style>
 
img.margin.borderclass {
    border: 2px solid #3c8dbc;
}
</style>

@endsection



@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @if($get_user->roll_id=='3') Managers  @elseif($get_user->roll_id=='2') Employee @endif Profile
      </h1>
      <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('drivers')}}">Driver</a></li>
            <li class="active" ><a href="{{url('driver-details/'.$get_user->id)}}">Driver details</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-md-3">

         <!-- Profile Image -->
         <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" style="width: 100px; height: 100px;" src="{{ URL::asset('public/images/users/'.$get_user->image)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ucfirst($get_user->name)}}</h3>

              <p class="text-muted text-center">@if($get_user->roll_id=='3') Managers  @elseif($get_user->roll_id=='2') Employee @endif </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right">{{$get_user->phone}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{$get_user->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Join Date</b> <a class="pull-right">{{date("F j, Y",strtotime($get_user->join_date))}}</a>
                </li>
               
                
              </ul>
              <label>Address </label>
              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              <p>{{$get_user->address}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary" style="min-height:445px;">
            <div class="box-header with-border">
              <h3 class="box-title">Documents</h3>
            </div>
              <div class="timeline-body">
              @if(isset($get_user_documents))
                    @foreach($get_user_documents as $value)
                     @if($value->document_type=='application/pdf')
                     <a href="{{URL::asset('public/images/users/'.$value->documents)}}" target="_blank" download><img src="{{URL::asset('public/admin/images/pdf.png')}}" alt="..." class="margin borderclass" style="height: 70px;" title="{{$value->document_title?$value->document_title:''}}">
                     
                     </a>
                    
                     @else
                     <a href="{{URL::asset('public/images/users/'.$value->documents)}}" target="_blank"   download="{{$value->documents}}" ><img src="{{URL::asset('public/images/users/'.$value->documents)}}" alt="..." class="margin borderclass" style="height: 70px;" title="{{$value->document_title?$value->document_title:''}}"></a> 
                     @endif
                    @endforeach
                @endif
              </div>
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


 
     

@endsection


@section('customjs')
<script>
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
</script>

@endsection
