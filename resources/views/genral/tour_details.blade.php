<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Tour Package </title>
    <style>
    .box-data{
        min-height: 541px;
    }
    </style>
    
    <!-- Bootstrap -->
    <link href="{{ URL::asset('public/admin/tourpdf/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('public/admin/tourpdf/css/style.css')}}" rel="stylesheet">
    <script src="{{ URL::asset('public/admin/tourpdf/js/jquery-1.12.4.js')}}"></script>
    <script src="{{ URL::asset('public/admin/tourpdf/js/jspdf.min.js')}}"></script>
    <script src="{{ URL::asset('public/admin/tourpdf/js/canvas.js')}}"></script>
     
</head>

<body >
    <div class="wrapper">
        <div id="tblCustomers">
            <div class="container-fluid top-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 contenteditable="" spellcheck="false">Belitung Views</h2>
                        </div>
                    </div>
                </div>
                <div class="text-other">
                    <p class="dis-text" contenteditable="" spellcheck="false">Discovery tour offer</p>
                    <p class="days" contenteditable="" spellcheck="false" >{{!empty($get_tour_data->no_of_day)?$get_tour_data->no_of_day:'0'}} days/{{!empty($get_tour_data->no_of_night)?$get_tour_data->no_of_night:'0'}} nights <br> {{$get_tour_data->children_below_3+$get_tour_data->children_below_8+$get_tour_data->passengers }} guests</p>
                </div>
                <div class="text2">
                    <p contenteditable="" spellcheck="false">Fly to the Beautiful Island of Belitung from Kuala Lumpur</p>
                </div>
                <img src="{{ URL::asset('public/admin/tourpdf/images/streettaxi-logo.png')}}" class="fix-logo">
            </div>
            <div class="content" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1 class="mt-50" contenteditable="" spellcheck="false">Belitung essentials – itinerary</h1>
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
                                    <h6 contenteditable="" spellcheck="false" >Day {{$i}}  </h6>
                                    @if(!empty($get_tour_events_data))
                                        @if(!empty($get_tour_events_data[$i-1]->event_data))
                                            @foreach($get_tour_events_data as  $value)
                                                @php($eventdata=json_decode($value->event_data))
                                                @if($get_all_days[$i-1]['start_date']==date('Y-m-d',strtotime($value->start_date)))
                                                    <h4 contenteditable="" spellcheck="false" > {{$eventdata->title}}</h4>
                                                    @foreach($eventdata->eventDetails as  $row)
                                                    <h5 contenteditable="" spellcheck="false" >{{$row->label}}</h5>
                                                    <div contenteditable="" spellcheck="false"  class="text-bold"><?php echo $row->value;?></div>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    <h5 contenteditable="" spellcheck="false" >You will visit :</h5>
                                    <span class="block" contenteditable="" spellcheck="false" >{{!empty($get_tour_events_data[$i-1]->event_data)?json_decode($get_tour_events_data[$i-1]->event_data)->title:''}}</span>
                                    @endif
                                    
                                </div>
                            </div>
                        @endif

                        @if($i==$count)
                            <div class="col-md-4">
                                <div class="box-data">
                                    <h6 contenteditable="" spellcheck="false" >IDR 3’250’000 in total</h6>
                                    <h4 contenteditable="" spellcheck="false" >(IDR 1’625’000 per pax)</h4>
                                    <ul>
                                        <h5 contenteditable="" spellcheck="false" >Includes:</h5>
                                        <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false" >Car rental automatic (self drive) for duration of your stay</span></li>
                                        <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false" >Island hopping tour (boat, snorkelling gear & life jackets, entrance fee to Kepayang island, Lunch) on a private boat</span></li>
                                        <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false" >Leebong tour, entrance fees and lunch </span></li>
                                    </ul>
                                    <ul>
                                        <h5 contenteditable="" spellcheck="false" >Does not include:</h5>
                                        <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false" >Food and entrance fees, unless otherwise specified</span></li>
                                        <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false" >Fuel and parking fees</span></li>
                                    </ul>
                                    <p class="block-div"><span contenteditable="" spellcheck="false" >Optional full risk insurance </span>
                                    <span contenteditable="" spellcheck="false" > IDR 200’000 (deductible IDR 700’000 in case of incident)</span>
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

                    <!--<div class="row flex-items">
                        <div class="col">
                            <div class="box-data">
                                <h6 >Day 1</h6>
                                <h4 contenteditable="" spellcheck="false">Arrival & West Belitung </h4>
                                <h5 contenteditable="" spellcheck="false">11:45 Meet & greet at airport and car delivery</h5>
                                <ul>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Pass through Tanjung Binga (Fisherman village)</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Enjoy the 180° view at Bukit Berahu resort </span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Visit Tanjung Tinggi beach and its famous granite boulders </span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Have a swim at Kampung Dedaun</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-data">
                                <h6>Day 2</h6>
                                <h4 contenteditable="" spellcheck="false">Island Hopping </h4>
                                <ul>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Drive to jetty for 09:00</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Departure from Tanjung Kelayang jetty</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Lunch at Kepayang Island Snorkel near Lengkuas island</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Finish at 16:00 and drive back to Hotel </span></li>
                                    <h5><i contenteditable="" spellcheck="false">You will visit up to 6 islands :</i></h5>
                                    <li> <span class="block" contenteditable=""  spellcheck="false">Batu Berlayar Island, Lengkuas Island, Kepayang Island, Tukong island, Kelayang Island and, only at low tide, Sand Island. </span></li>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-data">
                                <h6>Day 3</h6>
                                <h4 contenteditable="" spellcheck="false">Relax on Leebong island</h4>
                                <ul>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Drive to jetty for 10:00</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Drive to the jetty and board boat at 10:00 </span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Have a seafood lunch on the island</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Enjoy island facilities (kayak, paddle board, canoe, bicycle, beach volley, karaoke, futsal, ping-pong)</span>
                                    </li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Take a boat safari to sand island or mangroves (depending on tide)</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Finish at 17:00 </span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-data">
                                <h6>Day 4</h6>
                                <h4 contenteditable="" spellcheck="false">Self drive rental</h4>
                                <h5 contenteditable="" spellcheck="false">Explore East Belitung</h5>
                                <ul>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Take pictures at Burung Mandi and Serdang beaches</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Visit the Vihara Dewi Kuan Im Buddhist temple</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Visit SD Muhammadiyah Gantong and the Kata Andrea Hirata Museum (from the Laskar Pelangi movie) </span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Discover the Rumah Keong</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-data">
                                <h6 >Day 5</h6>
                                <h4 contenteditable="" spellcheck="false">Departure</h4>
                                <ul>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Drive to airport</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false"> Car return at airport at 10:30 </span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-data">
                                <h6 contenteditable="" spellcheck="false">IDR 3’250’000 in total</h6>
                                <h4 contenteditable="" spellcheck="false">(IDR 1’625’000 per pax)</h4>
                                <ul>
                                    <h5 contenteditable="" spellcheck="false">Includes:</h5>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false">Car rental automatic (self drive) for duration of your stay</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false">Island hopping tour (boat, snorkelling gear & life jackets, entrance fee to Kepayang island, Lunch) on a private boat</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false">Leebong tour, entrance fees and lunch </span></li>
                                </ul>
                                <ul>
                                    <h5 contenteditable="" spellcheck="false">Does not include:</h5>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false">Food and entrance fees, unless otherwise specified</span></li>
                                    <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false">Fuel and parking fees</span></li>
                                </ul>
                                <p class="block-div">
                                    <span contenteditable="" spellcheck="false">Optional full risk insurance </span>
                                    <span contenteditable="" spellcheck="false">
                                    IDR 200’000 (deductible IDR 700’000 in case of incident)</span>
                                </p>
                            </div>
                        </div>
                    </div>-->


                    <div class="row flex-row">
                        <div class="col-md-6">
                            <img src="{{ URL::asset('public/admin/tourpdf/images/backbeauty.jpg')}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="center-text-wrap">
                                <div class="center-text-inner">
                                    <p>
                                        <img src="{{ URL::asset('public/admin/tourpdf/images/quotation-marks.png')}}" class="comma-left">
                                        <span contenteditable="" spellcheck="false">I've backpacked to countries like Italy and Turkey and observed beautiful scenery, but then I realized that beauty was always very close to me. It is here in Belitung Island, where the rivers, beaches and the terrain captivate my attention most.</span><img src="{{ URL::asset('public/admin/tourpdf/images/quotation-marks.png')}}" class="comma-right">
                                    </p>
                                    <p class="robo-text">
                                        <span class="block">
                                            <i>
                                                <strong style="color: #fd2540;" contenteditable="" spellcheck="false">Andrea Hirata,
                                                </strong>
                                            </i> 
                                        </span>
                                        <span contenteditable="" spellcheck="false">(author of the Laskar Pelangi novel)</span>
                                    </p>
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
                                    <h4 contenteditable="" spellcheck="false" >{{$value->title?$value->title:''}}</h4>
                                    @if(!empty($all_contents))
                                      <ul>
                                         @foreach($all_contents as $value2)

                                            @if($value->title==$value2->title)
                                            <li><img src="{{ URL::asset('public/admin/tourpdf/images/arrow.png')}}"><span contenteditable="" spellcheck="false" >
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
                        <div class="col-sm-12">
                            <div class="data-divs">                         
                                <img src="{{ URL::asset('public/admin/tourpdf/images/thank.png')}}" class="thank-emoji">
                                <h1 contenteditable="" spellcheck="false">Thank you</h1>
                               <p ><img src="{{ URL::asset('public/admin/tourpdf/images/quotation-marks2.png')}}" class="comma-left"> <span contenteditable="" spellcheck="false">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span><img src="{{ URL::asset('public/admin/tourpdf/images/quotation-marks2.png')}}" class="comma-right"></p>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>   
    <a href="javascript:void(0)" class="float" id="btnExport" > <!--id="btnExport" -->
        <span>Download Pdf</span>
        <svg  viewBox="-79 0 512 512" xmlns="http://www.w3.org/2000/svg">
            <path d="m353.101562 485.515625h-353.101562v-485.515625h273.65625l79.445312 79.449219zm0 0" fill="#e3e4d8"/><path d="m273.65625 0v79.449219h79.445312zm0 0" fill="#d0cebd"/><path d="m0 353.101562h353.101562v158.898438h-353.101562zm0 0" fill="#b53438"/><g fill="#fff"><path d="m52.964844 485.515625c-4.871094 0-8.828125-3.953125-8.828125-8.824219v-88.277344c0-4.875 3.957031-8.828124 8.828125-8.828124 4.875 0 8.828125 3.953124 8.828125 8.828124v88.277344c0 4.871094-3.953125 8.824219-8.828125 8.824219zm0 0"/><path d="m300.136719 397.242188h-52.964844c-4.871094 0-8.828125-3.957032-8.828125-8.828126 0-4.875 3.957031-8.828124 8.828125-8.828124h52.964844c4.875 0 8.828125 3.953124 8.828125 8.828124 0 4.871094-3.953125 8.828126-8.828125 8.828126zm0 0"/><path d="m300.136719 441.378906h-52.964844c-4.871094 0-8.828125-3.953125-8.828125-8.828125 0-4.871093 3.957031-8.828125 8.828125-8.828125h52.964844c4.875 0 8.828125 3.957032 8.828125 8.828125 0 4.875-3.953125 8.828125-8.828125 8.828125zm0 0"/><path d="m247.171875 485.515625c-4.871094 0-8.828125-3.953125-8.828125-8.824219v-88.277344c0-4.875 3.957031-8.828124 8.828125-8.828124 4.875 0 8.828125 3.953124 8.828125 8.828124v88.277344c0 4.871094-3.953125 8.824219-8.828125 8.824219zm0 0"/></g><path d="m170.203125 95.136719c-.863281.28125-11.695313 15.261719.847656 27.9375 8.351563-18.371094-.464843-28.054688-.847656-27.9375m5.34375 73.523437c-6.296875 21.496094-14.601563 44.703125-23.527344 65.710938 18.378907-7.042969 38.375-13.195313 57.140625-17.546875-11.871094-13.621094-23.738281-30.632813-33.613281-48.164063m65.710937 57.175782c7.167969 5.445312 8.914063 8.199218 13.613282 8.199218 2.054687 0 7.925781-.085937 10.636718-3.828125 1.316407-1.820312 1.828126-2.984375 2.019532-3.59375-1.074219-.574219-2.515625-1.710937-10.335938-1.710937-4.449218 0-10.027344.191406-15.933594.933594m-119.957031 38.601562c-18.804687 10.425781-26.464843 19-27.011719 23.835938-.089843.804687-.328124 2.90625 3.785157 6.011718 1.316406-.414062 8.96875-3.859375 23.226562-29.847656m-23.421875 44.527344c-3.0625 0-6-.980469-8.507812-2.832032-9.15625-6.796874-10.390625-14.347656-9.808594-19.492187 1.597656-14.132813 19.304688-28.945313 52.648438-44.03125 13.230468-28.636719 25.820312-63.921875 33.324218-93.398437-8.773437-18.871094-17.3125-43.351563-11.097656-57.714844 2.179688-5.03125 4.910156-8.894532 9.976562-10.566406 2.011719-.652344 7.078126-1.480469 8.941407-1.480469 4.617187 0 9.050781 5.507812 11.183593 9.089843 3.972657 6.648438 3.992188 14.390626 3.363282 21.859376-.609375 7.253906-1.84375 14.46875-3.265625 21.601562-1.039063 5.242188-2.214844 10.460938-3.46875 15.660156 11.855469 24.175782 28.644531 48.816406 44.746093 65.683594 11.539063-2.054688 21.460938-3.097656 29.546876-3.097656 13.761718 0 22.121093 3.167968 25.519531 9.691406 2.828125 5.402344 1.660156 11.726562-3.433594 18.769531-4.898437 6.769531-11.640625 10.34375-19.523437 10.34375-10.710938 0-23.15625-6.671875-37.050782-19.851562-24.957031 5.15625-54.097656 14.34375-77.65625 24.515625-7.355468 15.410156-14.398437 27.824218-20.964844 36.933594-8.996093 12.5-16.773437 18.316406-24.472656 18.316406" fill="#b53438"/><path d="m79.449219 450.207031h-26.484375c-4.871094 0-8.828125-3.953125-8.828125-8.828125v-52.964844c0-4.875 3.957031-8.828124 8.828125-8.828124h26.484375c19.472656 0 35.308593 15.835937 35.308593 35.3125 0 19.472656-15.835937 35.308593-35.308593 35.308593zm-17.65625-17.65625h17.65625c9.734375 0 17.652343-7.917969 17.652343-17.652343 0-9.738282-7.917968-17.65625-17.652343-17.65625h-17.65625zm0 0" fill="#fff"/><path d="m158.898438 485.515625h-8.828126c-4.875 0-8.828124-3.953125-8.828124-8.824219v-88.277344c0-4.875 3.953124-8.828124 8.828124-8.828124h8.828126c29.199218 0 52.964843 23.753906 52.964843 52.964843 0 29.210938-23.765625 52.964844-52.964843 52.964844zm0-17.652344h.085937zm0-70.621093v70.621093c19.472656 0 35.308593-15.839843 35.308593-35.3125 0-19.472656-15.835937-35.308593-35.308593-35.308593zm0 0" fill="#fff"/>
        </svg>
    </a>


<script type="text/javascript">
function generateDocumentPdf(){ 
var HTML_Width = $("#tblCustomers").width();
var HTML_Height = $("#tblCustomers").height();
var top_left_margin = 15;
var PDF_Width = HTML_Width+(top_left_margin*2);
var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
var canvas_image_width = HTML_Width;
var canvas_image_height = HTML_Height;
var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
html2canvas(document.getElementById("tblCustomers"),{allowTaint:true}).then(function(canvas) {
canvas.getContext('2d');
// console.log(canvas.height+"  "+canvas.width);
var imgData = canvas.toDataURL("image/jpeg", 1.0);
var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
for (var i = 1; i <= totalPDFPages; i++) { 
    pdf.addPage(PDF_Width, PDF_Height);
    pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin),canvas_image_width,canvas_image_height);
}       
// pdf.save("Tour-Document.pdf"); 
// console.log(pdf.output('datauri'))


// var doc = pdf.output();
var doc=btoa(pdf.output());
    $.ajax({  
        type: "POST",
        url: "{{url('create_tour_pdf')}}",
        data:{ ab:doc,_token: "{{ csrf_token() }}"},
        success:function(result){
            console.log(result)
            if(result)
            {
              pdf.save("Tour-Document.pdf");
              window.location = "{{url('tour_complete')}}";
            }
        },
        error:function(responce){
            console.log(responce)
        }
    });





});
};


$("body").on("click", "#btnExport", function (e) {
e.preventDefault();
window.scrollTo(0,0);
var m=generateDocumentPdf(); 
// console.log("Hi Pradeep")

}).on('blur','[contentEditable]',function(){
    
var newtxt=$(this).text();
if(!newtxt){
$(this).text('-');
}
});


    </script>
</body>
</html>