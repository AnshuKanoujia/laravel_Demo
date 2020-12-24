@extends('genral.layouts.mainlayout')
@section('title') <title>Accessories </title> 
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Update Accessories 
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
                <form role="form" action="{{url('update_accessories/'.$products_details[0]->id)}}" method="post"  enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="title">Product Title <i style="color:red;">*</i></label>
                              <input type="text" class="form-control" value="{{$products_details[0]->title}}" required id="title" name="title" placeholder="Product Title">
                            </div>
                            <!-- <div class="form-group">
                              <label for="rental">For Rental <i style="color:red;">*</i></label>
                              <select class="form-control" name="rental" required id="rental">
                                 <option value="">--Select Rental--</option>
                                 <option value="1" @if($products_details[0]->rental=='1') selected @endif >Yes</option>
                                 <option value="0" @if($products_details[0]->rental=='0') selected @endif >No</option>
                              </select>
                            </div> -->
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rental">For Rental <i style="color:red;">*</i></label>
                                    <select class="form-control" name="rental" onchange="change_rental(this)" required id="rental">
                                      <option   value="">--Select Rental--</option>
                                      <option   value="1" @if($products_details[0]->rental=='1') selected @endif >Yes</option>
                                      <option   value="0" @if($products_details[0]->rental=='0') selected @endif >No</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                  <label for="amount">Price <i style="color:red;">*</i></label>
                                  <input type="text" class="form-control" onkeypress="return restrictAlphabets(event);" value="{{!empty($products_details[0]->amount)?$products_details[0]->amount:'0'}}" required id="amount" name="amount" placeholder="Price">
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Product Image </label>
                            <!-- <span class="btn btn-primary btn-file"> &nbsp;&nbsp;&nbsp;<i class="fa  fa-upload" ></i>&nbsp; &nbsp; Choose a file
                                </span>  -->
                                <input type="file"  id="image" name="image"> 
                                <a href="{{ URL::asset('public/images/'.$products_details[0]->image)}}">
                                 <img src="{{ URL::asset('public/images/'.$products_details[0]->image)}}" data-toggle="modal" data-target="#myModal"  alt="path not found " style="height:60px;">
                                 </a>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label for="type_of_product">Product Type <i style="color:red;">*</i> </label>
                                <input type="text" class="form-control"  list="product_type_list" value="{{$products_details[0]->type_of_product}}" required id="type_of_product" name="type_of_product" placeholder="Type of product">
                                @if(count($all_products) > 0 )
                                <datalist   id="product_type_list" >
                                @foreach($all_products as $value)
                                  <option>{{ucfirst($value->type_of_product)}}
                                @endforeach
                                  
                                </datalist >
                                @endif
                              </div>
                              <div class="form-group">
                                <label for="purchase_date">Purchase Date</label>
                                <input type="text" class="form-control" value="{{$products_details[0]->purchase_date}}" id="purchase_date" name="purchase_date" placeholder="Purchase date">
                              </div>
                              <div class="form-group">
                                <label for="invoice_attachment">Invoice Attachment</label>
                            <!-- <span class="btn btn-primary btn-file"> &nbsp;&nbsp;&nbsp;<i class="fa  fa-upload" ></i>&nbsp; &nbsp; Choose a file
                                </span>  -->
                                <input type="file"  id="invoice_attachment" name="invoice_attachment"/> 
                                    <a href="{{ URL::asset('public/images/'.$products_details[0]->invoice_attachment)}}">
                                    <img src="{{ URL::asset('public/images/'.$products_details[0]->invoice_attachment)}}" data-toggle="modal" data-target="#myModal" alt="path  not found " style="height:60px; ">
                                    </a>
                              </div>
                             
                        </div>
                        <div class="col-md-12">
                              <div class="form-group">
                                <label for="description">Description </label>

                                <textarea name="description"  class="form-control"  id="description" cols="30" style="resize:none;" rows="4">{{$products_details[0]->description}}</textarea>
                              </div>
                        </div>
                 </div>
                 <div class="box-footer text-center">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                  </div>
                </form>
                </div><!-- /.box-header -->
               
              </div><!-- /.box -->

              

              

              

            

            
          </div>   
            <!-- <div class="row">
                <div class="text-center">
                  <h2>One-Dimensional (1D) Barcode Types</h2><br/>
                    <div>{!!DNS1D::getBarcodeHTML(8889899, 'C39')!!}</div></br>
                    <div>{!!DNS1D::getBarcodeHTML(5436564, 'S25')!!}</div></br>
                    <div>{!!DNS1D::getBarcodeHTML(77656765, 'I25')!!}</div></br>
                    <div>{!!DNS1D::getBarcodeHTML(6435636, 'MSI+')!!}</div></br>
                    <div>{!!DNS1D::getBarcodeHTML(25547, 'POSTNET')!!}</div></br>
                  </div>
            </div> -->
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
      

        $("#purchase_date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
        var pickerOptsGeneral = { format: "yyyy-mm-dd", autoclose: true, minView: 2, maxView: 2, todayHighlight: true };
        $('#purchase_date').datetimepicker(pickerOptsGeneral).on('changeDate',function(ev){}); 
        

      });

      //     restrict Alphabets  
      function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8)
            return true;
          else
            return false;
      }
      function  change_rental(Event)
      {
            
            if($(Event).val()=='0')
            {
              // $('#amount').attr('readonly','readonly');
              $('#amount').val('0'); 
            }
            
      }



    </script>
@endsection




