@extends('genral.layouts.mainlayout')
@section('title') <title>Accessories </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           All @if(isset($all_products)) {{ ucfirst($all_products[0]->type_of_product)}} @else  Inventory @endif  
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
            <div class="col-xs-12">
              <div class="box">
                <!-- <div class="box-header">
                  <h3 class="box-title">All Products List</h3>  <div class="pull-right alertmessage"></div> 
                </div> -->
                <div class="box-body">
                <div class="row text-center"><a href="{{url('accessories')}}" class="btn btn-primary btn-xs"><span class="fa fa-undo"></span> Back</a></div>
                @if(isset($all_products))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product Image</th>
                        <th>Product Title</th>
                        <th>Product Type</th>
                        <th>For Rental</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Purchase Date</th>
                        <th>Invoice</th>
                        <th>BarCode</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($all_products as $value)
                     
                      <tr id="row_{{$value->id}}">
                        <td><a href="{{ URL::asset('images/'.$value->image)}}"><img src="{{ URL::asset('images/'.$value->image)}}" data-toggle="modal" data-target="#myModal" style="height:50px;" /></a></td>
                        <td>{{$value->title}}<br><b>"{{$value->sku}}"</b></td>
                        <td>{{$value->type_of_product}}</td>
                        <td>@if($value->rental=='1') <i class="btn btn-info btn-xs">Rental</i>@else  <i class="btn btn-warning btn-xs">no-rental</i>  @endif </td>
                        <td>@if($value->amount==null) 0 @else{{$value->amount}}@endif</td>
                        <td>@if($value->in_stock=='0') <span class="btn btn-xs btn-success btn-block" data-toggle="tooltip" title="in-stock" >in-stock</span> @else<span class="btn btn-xs btn-danger btn-block" data-html="true" data-placement="right" data-toggle="tooltip" title="Booking for :- {{$value->guest_name}} <br> Return :- {{date('F j, Y',strtotime($value->end_date_time))}}">out-of-stock</span> @endif</td>
                        <td>{{date("F j, Y",strtotime($value->purchase_date))}}</td>
                        <td>
                          <a href="{{ URL::asset('images/'.$value->invoice_attachment)}}">
                            <img src="{{ URL::asset('images/'.$value->invoice_attachment)}}" data-toggle="modal" data-target="#myModal"  style="height:50px;" />
                          </a>  
                        </td>
                        <td>{!!DNS1D::getBarcodeHTML($value->barcode, 'I25')!!}<span style="letter-spacing: 9px; ">{{$value->barcode}}</span></td>
                        <td>
                          <a href="javascript:void(0);" title="delete" onclick="delete_record({{$value->id}});"><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;
                          <a href="{{url('accessories/edit/'.$value->id)}}" title="edit" ><i class="fa fa-edit text-success"></i></a>
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

        $('[data-toggle="tooltip"]').tooltip();

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
          if((x>=48 && x<=57) || x==8 ||
            (x>=35 && x<=40)|| x==46)
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




