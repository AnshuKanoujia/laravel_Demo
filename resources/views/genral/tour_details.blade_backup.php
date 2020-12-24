<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>{{!empty($title)?$title:''}}</title>
    <style>
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
    </style>
    <!-- Bootstrap -->

    <link href="{{ URL::asset('public/admin/tourpdf/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ URL::asset('public/admin/tourpdf/css/style.css') }} " rel="stylesheet">

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
                <p class="days">{{!empty($get_tour_data->no_of_day)?$get_tour_data->no_of_day:'0'}} days/{{!empty($get_tour_data->no_of_night)?$get_tour_data->no_of_night:'0'}} nights <br> {{$get_tour_data->children_below_3+$get_tour_data->children_below_8+$get_tour_data->passengers }} guests</p>
            </div>
            <div class="text2">
                <p>Fly to the Beautiful Island of Belitung from Kuala Lumpur</p>
            </div>
            <img src="{{ URL::asset('public/admin/tourpdf/images/streettaxi-logo.png')}}" class="fix-logo">
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                         <!-- {{$get_tour_data}}   -->
                     <!-- {{$get_all_days}} -->
                     <!-- {{$get_tour_events_data}} -->
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="mt-50">Belitung essentials – itinerary</h1>
                    </div>
                </div>


                @if(!empty($get_tour_data))
                   @if(!empty($get_tour_data->no_of_day))
                       @php($count=(int)$get_tour_data->no_of_day)
                       @php($m=1)
                     
                       @php($count++)
                       @for ($i = $m; $i <= $count; $i++)
                         

                         @if( ( ($i-1)%3==0  ) || ( $i=='1') )    
                            <div class="row flex-row">    
                         @endif

                         @if($i!=$count)
                            <div class="col-md-4">
                                <div class="box-data">
                                    <h6>Day {{$i}} <!--{{$get_all_days[$i-1]['start_date']}}--> </h6>
                                    <h4>  Island Hopping <!--{{$get_tour_events_data[$i]->booking_id}}--> </h4>
                                    @if(!empty($get_tour_events_data) )
                                      <ul>
                                        @foreach($get_tour_events_data as  $value)
                                        @php($eventdata=json_decode($value->event_data))
                                          @if($get_all_days[$i-1]['start_date']==date('Y-m-d',strtotime($value->start_date)))
                                           <li>
                                            <img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>{{$eventdata->title}}</span>
                                           </li>
                                          @endif
                                        @endforeach
                                        <h5><i>You will visit :</i></h5>
                                        <li> <span class="block">Batu Berlayar Island, Lengkuas Island, Kepayang Island, Tukong island, Kelayang Island and, only at low tide, Sand Island. </span></li>
                                        </li>
                                      </ul>
                                    @endif
                                   
                                        <!-- <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Drive to jetty for 09:00</span></li>
                                        <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Departure from Tanjung Kelayang jetty</span></li>
                                        <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Lunch at Kepayang Island Snorkel near Lengkuas island</span></li>
                                        <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span> Finish at 16:00 and drive back to Hotel </span></li>
                                        <h5><i>You will visit up to 6 islands :</i></h5>
                                        <li> <span class="block">Batu Berlayar Island, Lengkuas Island, Kepayang Island, Tukong island, Kelayang Island and, only at low tide, Sand Island. </span></li>
                                        </li> -->
                                    
                                    
                                </div>
                            </div>
                        @endif

                        @if($i==$count)
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
                           
                        @endif
                        
                        @if($i==$count)
                           </div>
                        @elseif($i%3==0)   
                            </div>
                        @endif
                       @endfor  
                   @endif
                @endif
               
                <!-- <div class="row flex-row">
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
                </div> -->
                <!-- <div class="row flex-row">
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
                </div> -->
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
                  
                    @if(!empty($all_distrinct))
                         
                         @php($i=1)
                         @foreach($all_distrinct as $value)
                             @if(gettype($i/2)!='integer')
                              <div class="row flex-row">
                             @endif

                            <div class="col-md-6">
                                <div class="terms-div">
                                    <h4>{{$value->title?$value->title:''}}</h4>
                                    @if(!empty($all_contents))
                                      <ul>
                                         @foreach($all_contents as $value2)

                                            @if($value->title==$value2->title)
                                            <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span>
                                               {{$value2->contents}}</span>
                                            </li>
                                            @endif
                                            
                                         @endforeach
                                       </ul>
                                    @endif
                                     
                                </div>
                            </div>

                            @if(gettype($i/2)=='integer')
                              </div>
                             @endif

                            @php($i++)
                         @endforeach
                    @endif


                    
                
                


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