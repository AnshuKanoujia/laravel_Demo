@extends('front.layouts.mainlayout')

@section('title')
<title> Taxi Booking </title>
<style>
/* 
.fade-scale {
  transform: scale(0);
  opacity: 0;
  -webkit-transition: all .25s linear;
  -o-transition: all .25s linear;
  transition: all .25s linear;
}
.fade-scale.in {
  opacity: 1;
  transform: scale(1); 
}
*/
</style>
@endsection

@section('content')
<header class="text-white bg-home">
  <div class="container text-center">
    <div class="search-section">
      <h1 class="search-title text-center">Self Ride Bike Rentals</h1>
      <label class="search-title-sub text-center">Now starts @ ₹8/hour*</label>
      <div class="search-contener">
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
        </div>
        <div class="row">
          <div class="form-group col-md-3">
             <button type="button" value="bike" name="bike" class="btn ride-now-btn" >Bike</button>
          </div>
          <div class="form-group col-md-3">
             <button type="button"  value="accessories" name="accessories" class="btn ride-now-btn" >Accessories</button>
          </div>
          <div class="form-group col-md-3">
             <button type="button" value="cab" name="cab" class="btn ride-now-btn" >Cab</button>
          </div>
          <div class="form-group col-md-3">
            <button button="button" value="self_drive" name="self_drive" class="btn ride-now-btn" >Self Drive</button>
          </div>
        </div>
         
    </div>
    </div>
    <div class="home-scroll-btn"><a href="#howworks" id="new"><img src="data:image/png')}};base64,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" class="img-responsive scrollAnimation" alt=""></a></div>
  </div>
</header>

<section id="why" class="bg-white">
  <div class="-work">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="app-cons-tight"><a href="#" target="_blank"> <img src="{{ URL::asset('public/front/img/app-store.png')}}" alt="" class="" /> </a></div>
            </div>
            <div class="col-md-6">
              <div class="title-setion">
                <h2> Bikes Rental App</h2>
              </div>
            </div>
            <div class="col-md-3">
              <div class="app-cons-left"><a href="#" target="_blank"> <img src="{{ URL::asset('public/front/img/google-playe.png')}}" alt="" class="" /> </a></div>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-setion">
          <label>Why ?</label>
          <p>We simplified bike rentals, so you can focus on what's important to you.</p>
        </div>
      </div>
    </div>
    <div class="row"> 
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="why--item">
          <p class="text-heading-why">Safety</p>
          <div class="sprite sprite-racing-helmet sprite-icon-more"></div>
          <div class="why--item-title">
            <p class="text-center">Your safety is our priority. We guarantee a comprehensive insurance and also an ISI marked helmet. With all new bikes and a strict maintenance policy, you can keep calm and ride !</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="why--item">
          <p class="text-heading-why">Pit stops</p>
          <div class="sprite sprite-white-map-locator sprite-icon-more"></div>
          <div class="why--item-title">
            <p class="text-center">We have ‘ Bike Rental Hubs’ in different parts of the city, so you’d never go 'OffBikes'. Reach out to us from wherever you are and we’ll fix you right up!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="why--item">
          <p class="text-heading-why">Wallet’s BFF</p>
          <div class="sprite sprite-wallet sprite-icon-more"></div>
          <div class="why--item-title">
            <p class="text-center">You can count on us for the best bike rental prices in the city! Find a plethora of weekly offers on our site and cut your wallet some slack.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="why--item">
          <p class="text-heading-why">One stop shop</p>
          <div class="sprite sprite-deal sprite-icon-more"></div>
          <div class="why--item-title">
            <p class="text-center">Be it everyday commute, road trips and tour packages, riding gears, exclusive bike merch or refurbishing and maintenance - we have them all!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section ng-hide="hideAll" id="featuredon" class="bg-white section m-t-30 ng-scope" ng-if="phonePePlatform == false">
  <div class="m-t-30">
    <div class="col-md-12">
      <div class="title-setion">
        <label>Featured On</label>
        <p>Our complete press coverage.</p>
      </div>
    </div>
  </div>
  <div class=" container-fluid">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-2 col-sm-3 text-center"><img src="{{ URL::asset('public/front/img/aninews.png')}}" alt="" class="img-responsive" /></div>
      <div class="col-md-2 col-sm-3 text-center"><img src="{{ URL::asset('public/front/img/business-standard.png')}}" alt="" class="img-responsive" /></div>
      <div class="col-md-2 col-sm-3 text-center"><img src="{{ URL::asset('public/front/img/bwdisrupt.png')}}" alt="" class="img-responsive" /></div>
      <div class="col-md-2 col-sm-3 text-center"><img src="{{ URL::asset('public/front/img/thenewsminute.png')}}" alt="" class="img-responsive" /></div>
      <div class="col-md-2 col-sm-3 text-center"><img src="{{ URL::asset('public/front/img/vvcircle.jpg')}}" alt="" class="img-responsive" /></div>
    </div>
  </div>
</section>
<section ng-hide="hideAll" id="contact" class="bg-white section m-t-30">
  <div class="contact-box">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-setion">
            <label>Contact US</label>
            <h3 class="font-weight-normal">Any Bike Renting Issue? Feel Free to Contact us.</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 padding-left-6">
          <div class="contact-form">
            <div class="contact-form-box">
              <form ng-submit="contactus(userObj)" class="ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-pattern">
                <div class="row">
                  <div class="col-md-6 padding-rt-4">
                    <div class="form-group">
                      <div class="cols-sm-10">
                        <div class="input-group"><span class="input-group-addon contact-slect-icon form-icons border-rigth-0 left-2"><i class="fa fa-user" aria-hidden="true"></i> </span>
                          <input type="text" class="left-55 form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="firstname" id="Cfirstname" ng-model="userObj.firstname" placeholder="First Name" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 padding-lt-4">
                    <div class="form-group">
                      <div class="cols-sm-12">
                        <div class="input-group"><span class="input-group-addon contact-slect-icon form-icons border-rigth-0 left-2"><i class="fa fa-user" aria-hidden="true"></i> </span>
                          <input type="text" class="left-55 form-control ng-pristine ng-empty ng-touched ng-untouched ng-invalid ng-invalid-required" name="Lastname" id="Lastname" ng-model="userObj.lastname" placeholder="Last Name" required>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="cols-sm-12">
                    <div class="input-group"><span class="input-group-addon contact-slect-icon form-icons border-rigth-0 left-2"><i class="fa fa-envelope" aria-hidden="true"></i> </span>
                      <input type="email" class="left-55 form-control ng-pristine ng-empty ng-touched ng-untouched ng-valid-email ng-invalid ng-invalid-required" name="email" id="Cemail" ng-model="userObj.email" placeholder="Email" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="cols-sm-12">
                    <div class="input-group"><span class="input-group-addon contact-slect-icon form-icons border-rigth-0 left-2"><i class="fa fa-phone" aria-hidden="true"></i> </span>
                      <input type="text" class="form-control ng-pristine ng-empty ng-touched left-55 ng-untouched ng-invalid ng-invalid-required ng-valid-pattern" name="number" id="number" ng-model="userObj.number" placeholder="Mobile Number" pattern="[0-9]{10}" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon contact-slect-icon form-icons border-rigth-0 left-2"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <select class="form-control form-control-sm">
                      <option>Bengaluru</option>
                      <option>Hyderabad</option>
                      <option>Jaipur</option>
                      <option>Mysuru</option>
                      <option>Pune</option>
                      <option>Udaipur</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group"><span class="input-group-addon contact-slect-icon form-icons border-rigth-0 left-2"><i class="fa fa-info" aria-hidden="true"></i></span>
                    <textarea cols="70" class="form-control left-55 ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="message" id="textarea" ng-model="userObj.message" width="100%" placeholder="Message" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn submit-btn">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div id="accordion" class="faq-wrp">
            <div class="card">
              <div class="card-header-1" id="headingOne"> <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Mumbai - corporate hq </a> </div>
              <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header-1" id="headingTwo"> <a class=" collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Bengaluru </a> </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header-1" id="headingThree"> <a class=" collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Hyderabad </a> </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header-1" id="heading4"> <a class=" collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseThree"> Jaipur</a> </div>
              <div id="collapse4" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header-1" id="heading5"> <a class=" collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapseThree"> Mysuru </a> </div>
              <div id="collapse5" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header-1" id="heading6"> <a class=" collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapseThree"> Pune </a> </div>
              <div id="collapse6" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header-1" id="heading7"> <a class=" collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapseThree"> Udaipur </a> </div>
              <div id="collapse7" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header-1" id="heading8"> <a class=" collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapseThree"> Gurgaon </a> </div>
              <div id="collapse8" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section ng-hide="hideAll" id="why" class="bg-grey section">
  <div class="why-">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-setion">
            <label>Top FAQs</label>
            <h4 class="font-weight-normal">Renting a Bike should be Easy, Like our FAQs.</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="introducing-looking-faq col-md-6 visible-md visible-lg">
          <div class="why--item-title-faq">
            <p class="text-left"><span class="introducing-looking-faq-heading"><i class="fa fa-circle" aria-hidden="true"></i> How do I pay?</span><br>
              You can pay online using debit/credit card or e-wallets. You can also pay at the hub station during your vehicle pick-up.<br>
              <br>
              <span class="introducing-looking-faq-heading"><i class="fa fa-circle" aria-hidden="true"></i> Where can I pick up the bike from?</span><br>
              While booking your bike, you’ll be given an option to select a pick-up location in your vicinity.<br>
              <br>
            </p>
          </div>
        </div>
        <div class="introducing-looking-faq col-md-6 visible-md visible-lg">
          <div class="why--item-title-faq">
            <p class="text-left"><span class="introducing-looking-faq-heading"><i class="fa fa-circle" aria-hidden="true"></i> What documents do I need to show while booking?</span><br>
              You need to show your original valid driving license and submit any one original government verified ID proof.<br>
              <br>
              <span class="introducing-looking-faq-heading"><i class="fa fa-circle" aria-hidden="true"></i> Will I be getting a complimentary helmet?</span><br>
               Bikes provides one helmet with each booking. The second helmet is provided, if needed and is subject to availability.<br>
              <br>
            </p>
          </div>
        </div>
        
        <!-- ngIf: phonePePlatform == false -->
        <article class="text-center faq-bottom-text ng-scope" ng-if="phonePePlatform == false">If you have any more doubts, please visit our <a href="https://www.bikes.com/faq.html" target="_blank">FAQ Section</a><br>
          Our Daily Bike Renting Plan is the most affordable plan in India. Check out our Fleet and Pricing section on top for more detailed information and if you are a bike enthusiast, check out our <a href="https://blog.bikes.com/" target="_blank">Blog</a>.
          <p></p>
        </article>
        <!-- end ngIf: phonePePlatform == false --> 
        <!-- ngIf: phonePePlatform == false --> 
        
        <!-- end ngIf: phonePePlatform == false --> 
        
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="introducing-looking">
            <h5 class="introducing-looking-heading">Popular Bikes for Rent:</h5>
            <table class="width-100 popular-bikes m-t-30">
              <tbody>
                <tr>
                  <td><h6 class="font-weight-normal">Honda Activa for rent</h6></td>
                  <td><h6 class="font-weight-normal">Yamaha FZ for rent</h6></td>
                </tr>
                <tr>
                  <td><h6 class="font-weight-normal">Pulsar 150 for rent</h6></td>
                  <td><h6 class="font-weight-normal">Honda Dio for rent</h6></td>
                </tr>
                <tr>
                  <td><h6 class="font-weight-normal">Royal Enfield 350 Classic for rent</h6></td>
                  <td><h6 class="font-weight-normal">Avenger 220 Cruise for rent</h6></td>
                </tr>
                <tr>
                  <td><h6 class="font-weight-normal">Avenger 220 Street for rent</h6></td>
                  <td><h6 class="font-weight-normal">Dominar 400 ABS for rent</h6></td>
                </tr>
                <tr>
                  <td><h6 class="font-weight-normal">Bajaj CT 100 for rent</h6></td>
                  <td><h6 class="font-weight-normal">Pulsar NS 200 for rent</h6></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </div>
</section>

<!-- The Modal -->
<div class="modal fade-scale" id="request_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="javascript:void(0)" method="post" onsubmit="return confirm('do you  want to  confirm ?');">
        {{ csrf_field() }}
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Booking Request</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
           
          </div>
           <div class="row">
                <div class="col-md-6">
                    <div class="from-group">
                      <label for="start_date_time">Start Date Time</label>
                      <input type="text" name="start_date_time" required id="" class="form-control datetimepicker " placeholder="Enter Date And  time....">
                    </div>
                   
                    <div class="from-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" required id="name" class="form-control" placeholder="Enter name....">
                    </div>
                    <div class="from-group">
                      <label for="contact">Mobile</label>
                      <input type="text" name="contact" id="contact" maxlength="10" required minlength="10" onkeypress="return restrictAlphabets(event);"  class="form-control" placeholder="Enter mobile ....">
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="from-group">
                      <label for="end_date_time">End Date Time</label>
                      <input type="text" name="end_date_time" id="" required class="form-control datetimepicker " placeholder="Enter End Date Time ....">
                    </div>
                    <div class="from-group">
                      <label for="name">Type</label>
                      <select class="form-control" name="request_type"  id="request_type" required>
                        <option value="">--Select Request type--</option>
                        <option value="bike">Bike</option>
                        <option value="accessories">Accessories</option>
                        <option value="cab">Cab</option>
                        <option value="self_drive">Self Drive</option>
                      </select>
                    </div>
                    <div class="from-group">
                      <label for="email">Email</label>
                      <input type="email" required name="email"  id="email" class="form-control" placeholder="Enter email....">
                    </div>
                   
                   
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label for="description">Description</label>
                       <textarea name="description" id="description" style="resize:none;" placeholder="Description here"  class="form-control" cols="30" rows="4"></textarea>
                    </div>
                </div>
           </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <span class="pull-left alertmessage"></span>
          <button type="submit" class="btn btn-primary">Request</button>
          <button type="reset" class="btn btn-default">Reset</button>
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        </div>
        
        </form>
      </div>
    </div>
  </div>


@endsection

@section('customjs')
<script>
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}



//  bootstrap  datetime picker 
 $(function () {
   // $('#start_date_time').datetimepicker();
    // $('#end_date_time').datetimepicker();
    });
     

      // restrict Alphabets  
      function restrictAlphabets(e){
          var x=e.which||e.keycode; 
          if((x>=48 && x<=57) || x==8 ||
            (x>=35 && x<=40)|| x==46)
            return true;
          else
            return false;
      }

    
 $(document).ready(function(){

     $('.ride-now-btn').click(function(){
        $('#request_type').val($(this).val()); 
        $('.modal-title').html($(this).html()+' Booking Request ');
        $('#request_modal').modal();
      }); 


    $('#request_modal form').submit(function(event){
          event.preventDefault(); 
          $('#request_modal form .alertmessage').html(""); 
          $.ajax({
                  type: "POST",
                  url: "{{url('send_request')}}",
                  data: $(this).serialize(),
                  success: function(xhr, status, data){
                      console.log(xhr.success)
                      if(xhr.success){
                        $( '#request_modal form').each(function(){
                            this.reset();
                        });
                        $('#request_modal form .alertmessage').html('<span class="text-success">Request Submitted...</span>');
                        
                        setTimeout(function(){
                          $('#request_modal').modal('hide');
                        }, 3000);
                      }
                      else{ $('#request_modal form .alertmessage').html('<span class="text-success">Somthing event wrong!...</span>'); }
                  },
                  error: function(xhr, status, data){ 
                     console.log(xhr.responseJSON.errors);
                     var errorString = '<div class="text-danger"><ul>';
                      $.each(xhr.responseJSON.errors, function( key, value) {
                        errorString += '<li>' + value[0] + '</li>';
                      });
                      errorString += '</ul></div>';
                      $('#request_modal form .alertmessage').html(errorString);
                     }
              });

      }); 



      if (window.jQuery().datetimepicker) {
        $('.datetimepicker').datetimepicker({
            // Formats
            // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
            format: 'YYYY-MM-DD HH:mm',
            // Your Icons
            // as Bootstrap 4 is not using Glyphicons anymore
            icons: {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-check',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
    }


 }); 

      
</script>
@endsection