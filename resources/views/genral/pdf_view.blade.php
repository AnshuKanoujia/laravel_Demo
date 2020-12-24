<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>{{!empty($title)?$title:''}}</title>
    <style>
      body {
          font-family: 'Varela Round', sans-serif;
      }

      .top-wrapper {
          font-family: 'Lobster', cursive;
          background-image: url("{{ URL::asset('public/admin/tourpdf/images/back.jpg')}}");
          height: 600px;
          background-size: cover;
          background-position: center center;
          background-repeat: no-repeat;
          position: relative;
      }

      .top-wrapper:before {
          content: "";
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          height: 600px;
          background-color: rgba(0, 0, 0, .3);
      }

      .top-wrapper h2 {
          color: #fff;
          font-size: 140px;
          text-align: center;
          padding: 70px 0px 20px 0px;
          text-shadow: 0px 6px 5px #131313;
      }

      .wrapper {
          border: 20px solid #fff;
      }

      .fix-logo {
          position: absolute;
          right: 10px;
          bottom: 10px;
          width: 200px;

      }

      .dis-text {
          font-family: 'Roboto', sans-serif;
          padding: 0px 0px 10px 0px;
          width: 100%;
          color: #fff;
          font-size: 20px;
          text-transform: uppercase;
          margin-bottom: 20px;
          border-bottom: 1px solid #fff;
          display: inline-block;
      }

      .days {
          color: #fff;
          font-size: 40px;
          text-shadow: 1px 0px 2px #000;
          line-height: 50px;
      }

      .text-center {
          text-align: center;
      }

      .text-other {
          background-color: #fd2525;
          width: 270px;
          display: inline-block;
          border-bottom-right-radius: 28px;
          box-shadow: 0px 1px 6px 1px #1c1b1b;
          padding: 15px;
          position: absolute;
          left: 0;
          text-align: left;
          bottom: 80px;
          border-top-right-radius: 28px;
          border-bottom-right-radius: 28px;
      }

      .text2 {
          display: inline-block;
          padding: 0px;
          position: absolute;
          left: 0;
          bottom: 0px;
          width: 270px;
      }

      .text2 p {
          font-family: 'Roboto', sans-serif;
          color: #fff;
          margin-bottom: 0px;
          display: inline-block;
          font-size: 16px;
          padding: 15px;

      }

      img {
          max-width: 100%;
      }

      .mt-50 {
          margin: 50px 0px;
      }

      .box-data {

          background-image: linear-gradient(130deg, #ecfb80 0%, #aff9fd 90%);

          box-shadow: 0px 0px 26px 0px rgba(132, 124, 124, 0.51);
          -moz-box-shadow: 0px 0px 26px 0px rgba(132, 124, 124, 0.51);
          -webkit-box-shadow: 0px 0px 26px 0px rgba(132, 124, 124, 0.51);
          padding: 20px;
          border-radius: 14px;
          transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
          color: #000;
          margin-bottom: 30px;
          min-height: 475px;
      }

      .box-data:hover {
          box-shadow: 0px 0px 10px 0px rgb(29, 187, 196);
          -moz-box-shadow: 0px 0px 10px 0px rgb(29, 187, 196);
          -webkit-box-shadow: 0px 0px 10px 0px rgb(29, 187, 196);
      }

      .box-data h4 {
          text-transform: uppercase;
          box-shadow: 0px 0px 10px -4px #202020;
          -moz-box-shadow: 0px 0px 10px -4px #202020;
          -webkit-box-shadow: 0px 0px 10px -4px #202020;
          font-size: 16px;
          font-weight: 600;
          background-color: #1dbbc4;
          border-radius: 4px;
          -moz-border-radius: 4px;
          -webkit-border-radius: 4px;
          padding: 6px 10px;
          color: #fff;
          letter-spacing: 1px;
          margin: 15px 0px 20px 0px;
      }

      .box-data h6 {
          font-size: 27px;
          font-weight: 400;
          font-family: 'Lobster', cursive;
          letter-spacing: 2px;
      }

      .box-data ul {
          list-style: none;
          display: block;
          padding-left: 0px;
      }

      .box-data ul li {
          line-height: 20px;
          margin-bottom: 6px;
          font-size: 14px;
          display: inline-block;
          width: 100%;
      }

      .box-data li img {
          float: left;
          width: 10px;
          height: 12px;
          margin-top: 4px;
          margin-right: 10px;

      }

      .box-data li span {
          float: left;
          width: calc(100% - 25px);
          color: #000;
          font-size: 14px;

      }

      .box-data h5 {
          color: #fd2525;
          font-size: 15px;
          font-weight: 600;
          letter-spacing: 1px;
      }

      .flex-row {
          display: flex
      }

      .block-div {
          background-color: #fd2540;
          color: #fff;
          text-align: center;
          padding: 6px 5px;

      }

      .block-div span {
          display: block;
          font-weight: 600;
          letter-spacing: 1px;
          padding: 6px 5px;

      }

      .center-text-wrap {
          display: table;
          width: 90%;
          height: 100%;
          margin: 0 auto;
          border: 12px double #facd1c;
          padding: 45px;

      }

      .center-text-wrap p {
          font-size: 25px;
          font-family: 'Lobster', cursive;
          line-height: 34px;
      }

      .center-text-inner {
          display: table-cell;
          text-align: center;
          vertical-align: middle;

      }

      .block {
          display: block;
          width: 100%;
          text-transform: uppercase;
      }

      .comma-left {
          width: 43px;
          margin-top: -28px;
          margin-right: 10px;

      }

      .comma-right {
          width: 43px;

          transform: rotate(180deg);
      }

      .robo-text {
          font-family: 'Roboto', sans-serif !important;
          font-size: 14px !important;
          line-height: 20px !important;
          margin-top: 40px;
      }

      .terms-div {

          padding: 15px;
          border-radius: 4px;
          margin-bottom: 0px;
          height: 259px;


      }

      .terms-div h4 {
          color: #000;
          font-family: 'Lobster', cursive;
          letter-spacing: 1px;
          font-size: 25px;
          border-bottom: 1px solid;
          padding: 5px 0px 15px 0px;
          margin-top: 0;
      }

      .terms-div ul li {
          color: #3E3E3E;
          font-size: 15px;
          line-height: 23px;
          margin-bottom: 15px;
      }

      .thank-img {

          margin: 0 auto;
          display: inherit;
      }

      h1 {
          font-family: 'Lobster', cursive;
          font-size: 40px;
      }

      .terms-div ul {

          list-style: none;
          padding: 0;


      }

      .terms-div li img {

          float: left;
          width: 10px;
          height: 12px;
          margin-top: 4px;
          margin-right: 10px;

      }

      .terms-div li span {

          float: left;
          width: calc(100% - 25px);
          color: #000;
          font-size: 14px;

      }

      .data-divs {

          background: #1dbbc4;
          color: #fff;
          width: 700px;
          min-height: 500px;

          position: absolute;
          top: 67%;
          right: 50px;
          padding: 50px;
          text-align: center;
      }

      .data-divs p {
          font-size: 22px;

          line-height: 34px;
      }

      .data-divs h1 {
          font-size: 60px;
          color: #ffde5e;
          text-shadow: 0px 1px 2px #000;
          margin-bottom: 30px;

      }

      .thank-img {
          margin-left: -50px;
      }

      .thank-emoji {
          width: 100px;
          margin: 0px;
      }


     .pdf_btn{
        background-color: crimson;
        width: 200px;
        padding: 5px;
        margin: 2px;
        color: #fff;
        border: 1px solid yellow;
        text-decoration:none; 
     }
     .pdf_btn:hover{
        background-color: #1dbbc4;
        width: 200px;
        padding: 5px;
        color: #fff;
        margin: 2px;
        border: 1px solid yellow;
        text-decoration:none; 
     } 
     /*  Bootstrap  css */
      
     
.row{width:100%; }
.col-md-4{ width:33.33%;}
.col-md-12{width:100%}
.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9{float:left}

@media (min-width:992px){
  .col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9{float:left}
}

    


     /* bootstrap  css  and */
    </style>
    <!-- Bootstrap  CSS -->
   
    <!-- eND OF BOOTSTRAP CSS-->

   <!-- <link href="{{ URL::asset('public/admin/tourpdf/css/bootstrap.min.css') }} " rel="stylesheet">-->
   <!-- <link href="{{ URL::asset('public/admin/tourpdf/css/style.css') }} " rel="stylesheet"> -->

    <!-- <link href="{{ public_path() .'/admin/tourpdf/css/bootstrap.min.css' }}" rel="stylesheet">
    <link href="{{ public_path() .'/admin/tourpdf/css/style.css' }}" rel="stylesheet"> -->
</head>

<body>
<div class="wrapper">
        <div class="top-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Belitung Views</h2>
                    </div>
                </div>
            </div>
            <div class="text-other">
                <p class="dis-text">Discovery tour offer</p>
                <p class="days">5 days/4 nights <br> 2 guests</p>
            </div>
            <div class="text2">
                <p>Fly to the Beautiful Island of Belitung from Kuala Lumpur</p>
            </div>
            <img src="{{ URL::asset('public/admin/tourpdf/images/streettaxi-logo.png')}}" class="fix-logo">
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="mt-50">Belitung essentials – itinerary</h1>
                    </div>
                </div>
                <div class="row flex-row">
                    <div class="col-md-4">
                        <div class="box-data">
                            <h6>Day 1</h6>
                            <h4>Arrival & West Belitung </h4>
                            <h5>11:45 Meet & greet at airport and car delivery</h5>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Pass through Tanjung Binga (Fisherman village)</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Enjoy the 180° view at Bukit Berahu resort </span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Visit Tanjung Tinggi beach and its famous granite boulders </span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Have a swim at Kampung Dedaun</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-data">
                            <h6>Day 2</h6>
                            <h4>Island Hopping </h4>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Drive to jetty for 09:00</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Departure from Tanjung Kelayang jetty</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Lunch at Kepayang Island Snorkel near Lengkuas island</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Finish at 16:00 and drive back to Hotel </span></li>
                                <h5><i>You will visit up to 6 islands :</i></h5>
                                <li> <span class="block">Batu Berlayar Island, Lengkuas Island, Kepayang Island, Tukong island, Kelayang Island and, only at low tide, Sand Island. </span></li>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-data">
                            <h6>Day 3</h6>
                            <h4>Relax on Leebong island</h4>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Drive to jetty for 10:00</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Drive to the jetty and board boat at 10:00 </span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Have a seafood lunch on the island</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Enjoy island facilities (kayak, paddle board, canoe, bicycle, beach volley, karaoke, futsal, ping-pong)</span>
                                </li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Take a boat safari to sand island or mangroves (depending on tide)</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Finish at 17:00 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row flex-row">
                    <div class="col-md-4">
                        <div class="box-data">
                            <h6>Day 4</h6>
                            <h4>Self drive rental</h4>
                            <h5>Explore East Belitung</h5>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Take pictures at Burung Mandi and Serdang beaches</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Visit the Vihara Dewi Kuan Im Buddhist temple</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Visit SD Muhammadiyah Gantong and the Kata Andrea Hirata Museum (from the Laskar Pelangi movie) </span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Discover the Rumah Keong</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-data">
                            <h6>Day 5</h6>
                            <h4>Departure</h4>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Drive to airport</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Car return at airport at 10:30 </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-data">
                            <h6>IDR 3’250’000 in total</h6>
                            <h4>(IDR 1’625’000 per pax)</h4>
                            <ul>
                                <h5>Includes:</h5>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>Car rental automatic (self drive) for duration of your stay</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>Island hopping tour (boat, snorkelling gear & life jackets, entrance fee to Kepayang island, Lunch) on a private boat</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>Leebong tour, entrance fees and lunch </span></li>
                            </ul>
                            <ul>
                                <h5>Does not include:</h5>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>Food and entrance fees, unless otherwise specified</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>Fuel and parking fees</span></li>
                            </ul>
                            <p class="block-div"><span>Optional full risk insurance </span>
                                IDR 200’000 (deductible IDR 700’000 in case of incident)
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row flex-row">
                    <div class="col-md-6">
                        <img src="{{ URL::asset('public/admin/tourpdf/images/backbeauty.jpg')}}" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="center-text-wrap">
                            <div class="center-text-inner">
                                <p>
                                    <img src="{{ URL::asset('public/admin/tourpdf/images/quotation-marks.png')}}" class="comma-left">I've backpacked to countries like Italy and Turkey and observed beautiful scenery, but then I realized that beauty was always very close to me. It is here in Belitung Island, where the rivers, beaches and the terrain captivate my attention most.<img src="{{ URL::asset('public/admin/tourpdf/images/quotation-marks.png')}}" class="comma-right">
                                </p>
                                <p class="robo-text"><span class="block"><i><strong style="color: #fd2540;">Andrea Hirata,</strong></i> </span>(author of the Laskar Pelangi novel)</i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="mt-50">Terms & conditions</h1>
                    </div>
                </div>
                <div class="row flex-row">
                    <div class="col-md-6">
                        <div class="terms-div">
                            <h4>Payment terms</h4>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Payments are to be made before the service commences, except for metered taxi.
                                    Payments must be made in full and in cash, bank transfer, PayPal, credit or debit card.
                                    No services will be rendered if payment is not effectuated in full.
                                    Down payments may be asked for some bookings to guarantee third parties services remain available on the day of the booking. Such down payments are usually not refundable.</span>
                                </li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Specific refund policies are described in the relevant sections below.
                                    Unless specified otherwise in conditions below and outside of peak season, bookings can be cancelled up to 48 hours before the start of the trip.</span>
                                </li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    All settlements done via PayPal will attract an additional 3.5% surcharge and 2.6% via credit/debit card.</span>
                                </li>
                            </ul>
                             
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="terms-div">
                            <h4>Island hopping</h4>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Once confirmed, island hopping tours can be cancelled up to 36 hours prior to tour start.
                                    Within 36 hours of tour start, cancellation fees of IDR 450’000 per group will be levied.
                                    In case of heavy rain, and up to two hours before tour start, cancellation of the tour will be effectuated free of charge. Guests can elect to get a full refund of the tour or a re-schedule for a later day.</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Driver will wait up to 15 minutes at meeting point. Delayed guests will face a penalty of IDR 50’000 per hour of waiting.</span>
                                </li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Island hopping packages include a series of services that are detailed in the offer. Additional services can be purchased on board the boat and paid in full before being used.
                                    Pick up is usually at 16:00. Guests that come back early might have a longer waiting time for pickup. However, the company with put its best endeavours to collect easts before 16:00.</span>
                                     </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row flex-row">
                    <div class="col-md-6">
                        <div class="terms-div">
                            <h4>Airport transfers</h4>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>Airport transfers can either be with meter (standard) or at fixed price (return fares, agreed prices as part of a tour).</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Fixed-price airport transfers are direct from the airport to the hotel or from the hotel to the airport.
                                    Stop-overs requested by guests on the way will attract additional charges, either based on meter or defined by head office and confirmed to the driver.
                                    The airport promotion offered on the website is reserved to Belitung residents and from airport to personal home only. These rates are not available for outside guests.</span>
                                </li>
                            </ul>
                             
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="terms-div">
                            <h4>Car rentals with driver</h4>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Outside of peak season, car rentals with driver can be cancelled up to 36 hours before start at no fee.</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Within 36 hours of tour start, car rentals can be cancelled for of fee of IDR 150’000 per vehicle. </span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    The stated fees include the car rental, the driver and the fuel only.
                                    Meals, entrance fees, parking, souvenirs and other incidentals are excluded from the rental costs.</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>Car rentals with driver shall terminate at 20:00 but a maximum of 12 hours. Additional hours will be charged at IDR 30’000 per hour.</span> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row flex-row">
                    <div class="col-md-6">
                        <div class="terms-div">
                            <h4>Leebong island tours</h4>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Once confirmed, Leebong tours can be can cancelled up to 48 hours before the tour start.
                                    Within 48 hours of tour start, cancellation fees of IDR 400’000 per person will be levied.
                                    In case of heavy rain, and up to two hours before tour start, cancellation of the tour will be effectuated free of charge. Guests can elect to get a full refund of the tour or a re-schedule for a later day.</span>
                                </li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Passengers who fail to be at meeting point in time thus causing a delay for transportation might not be picked-up by the driver. In such cases, the tour will not be refunded but can be rescheduled for a fee of IDR 350’000 group.</span>
                                </li>
                                 
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="terms-div">
                             <h4>
                                Self-drive car rentals and motorbike rentals</h4>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Rentals are governed by the signed rental agreement that guests will fill at arrival.
                                    A deposit based on the rental value and the service chosen will be levied at arrival. Deposits can be made in cash or with card, either in IDR or in selected international currencies (please check with head office beforehand). Deposits will be refunded in full at the end of the rental if the vehicle is returned in condition set forth in the rental agreement.</span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Car rentals can be cancelled within 24 hours of start and 48 hours of start at no cost. Past this deadline, a day rental charge will be charged to the guest.
                                    Fuel and parking fees ate to be paid by the guests.
                                     </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row flex-row">
                    <div class="col-md-6">
                        <div class="terms-div">
                            <h4> Belitung island tours, thematic tours</h4>
                            <ul>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Outside of peak season, tours can be cancelled up to 36 hours before start at no fee.
                                    Within 36 hours of tour start, Belitung island tours and thematic tours can be cancelled for of fee of IDR 150’000 per vehicle. </span></li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Tours includes services specified in the offer. Additional services are at the cost of the guest.</span>
                                </li>
                                <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    Car rental, petrol and driver are included in the tour, but only if the itinerary is followed strictly. Changes in itinerary may attract additional charges and drivers will confirm them with head office before accepting alterations to the route.</span>
                                </li>
                            </ul>
                             
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="terms-div">
                            <h4>Other activities</h4>
                            <ul>
                               <li> <img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>For all bookings that need to be paid in advance (notably hotel bookings, special dinners, events, etc.), booking can only be guaranteed once down payment was made.</span></li>
                               <li> <img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                    For all the above, no refund will be made in case of cancellation. </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin: 50px 0px;position:relative">
                    <div class="col-md-11">
                        <img src="{{ URL::asset('public/admin/tourpdf/images/new.jpg')}}" class="thank-img" >
                    </div>
                    <div class="data-divs">
                        
                        <img src="{{ URL::asset('public/admin/tourpdf/images/thank.png')}}" class="thank-emoji">
                        <h1>Thank you</h1>
                       <p><img src="{{ URL::asset('public/admin/tourpdf/images/quotation-marks2.png')}}" class="comma-left"> 
                       Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                       <img src="{{ URL::asset('public/admin/tourpdf/images/quotation-marks2.png')}}" class="comma-right"></p>
                       
                    </div>
                </div>

                <div class="row" style="margin: 50px 0px;position:relative">
                    <div class="col-md-11">
                        <a href="#" class="pdf_btn"> Save  & Edit </a>
                        <a href="{{url('create_tour_pdf')}}" class="pdf_btn"> Send  Pdf >>> </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
   


   
</body> 

</html>