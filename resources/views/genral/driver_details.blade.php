@extends('genral.layouts.mainlayout')
@section('title') <title>Driver  Details </title>
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
        Driver Profile
      </h1>
      <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('drivers')}}">Driver</a></li>
            <li class="active" ><a href="{{url('driver-details/'.$get_driver_details->id)}}">Driver details</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-md-3">

         <!-- Profile Image -->
         <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" style="width: 100px; height: 100px;" src="{{ URL::asset('images/'.$get_driver_details->image)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ucfirst($get_driver_details->name)}}</h3>

              <p class="text-muted text-center">  Taxi Driver </p>
              
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right">{{$get_driver_details->phone}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{$get_driver_details->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Join Date</b> <a class="pull-right">{{date("F j, Y",strtotime($get_driver_details->join_date))}}</a>
                </li>
                <li class="list-group-item">
                  <b>License No</b> <a class="pull-right">{{$get_driver_details->license_no}}</a>
                </li>
                
              </ul>
              <label>Address </label>
              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              <p>{{$get_driver_details->address}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom"> 
            <ul class="nav nav-tabs"> 
              <li class="active"><a href="#activity_ride" data-toggle="tab">Ride History</a></li>
              <li><a href="#documents" data-toggle="tab">Documents</a></li>
              <!-- <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
            </ul>
            <div class="tab-content" style="min-height:445px;">
              <div class="active tab-pane" id="activity_ride">

          <!--Start   Of the table Contents  Area -->
             
                @if(isset($get_ride_details))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Driver  Name</th>
                        <th>Tour Name</th>
                        <th>Source  Address</th>
                        <th>Destination  Address</th>
                        <th>Start  Date</th>
                        <th>End  Date</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($get_ride_details as $value)
                      <tr id="row_{{$value->id}}">
                        <td>Pradeep </a></td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->source_address}}</td>
                        <td>{{$value->destination_address}}</td>
                        <td>{{date("F j, Y",strtotime($value->booking_start_date))}}
                         <br/>{{date("g:i a",strtotime($value->tour_start_time))}}
                        </td>
                        <td>{{date("F j, Y",strtotime($value->booking_start_date))}} </td>
                       
                      </tr>
                      @endforeach

                    </tbody>
                   
                  </table>


                  @else
                  <h5 class="box-title text-danger">There is no data.</h3>
                  @endif
                

              <!--   End Of the table Contents  Area -->
              </div>
              <!-- /.tab-pane -->
             

              <div class="tab-pane" id="documents">
                <div class="timeline-body">
                @if(isset($get_driver_documents))
                    @foreach($get_driver_documents as $value)
                     @if($value->document_type=='application/pdf')
                     <a href="{{URL::asset('images/'.$value->documents)}}" target="_blank"><img src="{{URL::asset('admin/images/pdf.png')}}" alt="..." class="margin borderclass" style="height: 70px;" title="{{$value->document_title?$value->document_title:''}}">
                     
                     </a>
                    
                     @else
                     <a href="{{URL::asset('images/'.$value->documents)}}" target="_blank"   download="{{$value->documents}}" ><img src="{{URL::asset('images/'.$value->documents)}}" alt="..." class="margin borderclass" style="height: 70px;" title="{{$value->document_title?$value->document_title:''}}"></a> 
                     @endif
                     
                    @endforeach
                @endif

                   

                  </div>
              </div>
              <!-- /.tab-pane -->

              <!-- <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div> -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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
