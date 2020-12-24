<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () { return view('welcome'); });
Route::get('/', 'Home@index');

/* Booking Request To  Front End By Customers */ 
Route::post('send_request','Home@send_request');

// Route::get('/', 'AdminController@admin');



// Admin  Login 
Route::get('admin-login', 'AdminController@admin');
Route::post("sign_in" , "Auth\LoginController@sign_in");
Route::get("logout" , "Logout@logout");

// Admin Dashboard  
Route::get('dashboard','AdminController@dashboard');   
Route::get('home','AdminController@dashboard'); 
Route::get('calender','AdminController@calender'); 
Route::get('table','AdminController@table'); 

//  taxi Management 
Route::get('booktaxi','Taxi@booktaxi'); 
Route::post('addtaxi','Taxi@addtaxi');
Route::post('delete_taxi','Taxi@delete_taxi'); 
Route::get('edit_taxi/{row_id}','Taxi@edit_taxi'); 
Route::post('update_taxi/{row_id}','Taxi@update_taxi'); 

//  Third  Party  Vehicle 
Route::get('third_party_vehicle','Taxi@third_party_vehicle');
Route::post('add_third_party_vehicle','Taxi@add_third_party_vehicle');
Route::get('edit_third_party_vehicle/{row_id}','Taxi@edit_third_party_vehicle'); 
Route::post('update_third_party_vehicle/{row_id}','Taxi@update_third_party_vehicle'); 

// Driver Management :: 
Route::get('drivers','Driver@drivers'); 
Route::post('add_drivers','Driver@add_drivers');
Route::post('delete_driver','Driver@delete_driver'); 
Route::get('edit_driver/{row_id}','Driver@edit_driver'); 
Route::post('update_driver/{row_id}','Driver@update_driver'); 
Route::get('driver-details/{driver_id}','Driver@driver_details'); 

//  Documents Management 
Route::get('add_documents/{driver_id}','Driver@add_documents'); 
Route::post('upload_images','Driver@upload_images'); 
Route::get('upload_confirm','Driver@upload_confirm'); 
Route::post('delete_documents','Driver@delete_documents'); 
Route::post('update_documents_title','Driver@update_documents_title'); 

//  flight Management
Route::get('flight','Flight@flight'); 
Route::post('add_flight','Flight@add_flight');
Route::post('delete_flight','Flight@delete_flight'); 
Route::get('edit_flight/{row_id}','Flight@edit_flight'); 
Route::post('update_flight/{row_id}','Flight@update_flight'); 


//  Pickup || Drop Management
Route::get('pickup_drop','Pickup_drop_point@pickup_drop'); 
Route::post('add_pickup_drop','Pickup_drop_point@add_pickup_drop'); 
Route::get('edit_pickup_drop/{row_id}','Pickup_drop_point@edit_pickup_drop'); 
Route::post('update_pickup_drop/{row_id}','Pickup_drop_point@update_pickup_drop'); 
Route::post('delete_pickup_drop','Pickup_drop_point@delete_pickup_drop'); 


//   activities types 
Route::get('activities_types','Customization_activities_type@activities_types'); 
Route::post('add_activities_type','Customization_activities_type@add_activities_type');
Route::post('delete_activities_type','Customization_activities_type@delete_activities_type'); 
Route::get('edit_activities_type/{row_id}','Customization_activities_type@edit_activities_type'); 
Route::post('update_activities_type/{row_id}','Customization_activities_type@update_activities_type'); 


// other  activities Or  templating 
Route::get('custom_activities','Customization_activity@custom_activities'); 
Route::post('add_custom_activity','Customization_activity@add_custom_activity');
Route::post('delete_custom_activity','Customization_activity@delete_custom_activity'); 
Route::get('edit_custom_activity/{row_id}','Customization_activity@edit_custom_activity'); 
Route::post('update_custom_activity/{row_id}','Customization_activity@update_custom_activity'); 

//  Tour  templating 
Route::get('tour_tamplating','Tour_tamplate@tour_tamplating'); 
// Route::get('tour_tamplating','Controller@tour_tamplating');  
Route::post('add_tour_template','Tour_tamplate@add_tour_template'); 
Route::get('edit_tour_template/{row_id}','Tour_tamplate@edit_tour_template'); 

Route::post('update_finanencial_details','Tour_tamplate@update_finanencial_details');

Route::get('tour_tamplates','Tour_tamplate@tour_tamplates'); 
Route::post('update_template_contents','Tour_tamplate@update_template_contents'); 
Route::post('update_template_step1','Tour_tamplate@update_template_step1'); 
Route::get('tour_success','Tour_tamplate@tour_success'); 

//  Booking Rout 

// Route::post('booking','Booking@booking'); 
Route::post('financials','Booking@get_financial_by_activity_id_with_no_of_passenger'); 
Route::get('booking','Booking@booking'); 
Route::post('get_arrival_time_scheduled','Booking@get_arrival_time_scheduled'); 
Route::post('add_booking','Booking@add_booking'); 
Route::post('add_booking_taxi','Booking@add_booking_taxi'); 
Route::post('delete_tour_booking','Booking@delete_tour_booking'); 
Route::post('delete_taxi_booking','Booking@delete_taxi_booking'); 
Route::get('taxi_bookings','Booking@taxi_bookings'); 
Route::get('tour_bookings','Booking@tour_bookings'); 
Route::post('update_booking_other','Booking@update_booking_other');
Route::post('update_tour_booking_status','Booking@update_tour_booking_status');  
Route::post('update_tour_booking_approve','Booking@update_tour_booking_approve'); 
Route::post('update_tour_financials','Booking@update_tour_financials');

Route::post('update_taxi_booking_other','Booking@update_taxi_booking_other');
Route::post('update_taxi_booking_status','Booking@update_taxi_booking_status');  

Route::get('financial_layout','Booking@financial_layout'); 
Route::get('export_financial','Booking@export_financial');
Route::post('save_financial','Booking@save_financial');


/* Banana Account URL */
Route::get('banana_accounts','Banana_account@all_banana_accounts'); 
Route::post('add_accounts','Banana_account@add_accounts');
Route::post('delete_accounts','Banana_account@delete_accounts'); 
Route::get('edit_account/{row_id}','Banana_account@edit_account'); 
Route::post('update_accounts/{row_id}','Banana_account@update_accounts'); 

Route::post('save_event','Booking@save_event');
Route::get('edit_tour_booking/{row_id}','Booking@edit_tour_booking'); 
Route::post('update_event','Booking@update_event');
Route::post('update_booking_status','Booking@update_booking_status'); 
Route::post('structure_booking_status','Booking@structure_booking_status'); 

Route::get('edit_taxi_booking/{row_id}','Booking@edit_taxi_booking'); 
Route::post('update_booking_taxi/{row_id}','Booking@update_booking_taxi');
Route::post('update_booked_driver_name','Booking@update_booked_driver_name'); 


Route::post('delete_request_taxi_booking','Booking@delete_request_taxi_booking');
Route::post('delete_request_tour_booking','Booking@delete_request_tour_booking');

//  tour  Booking  :  Pdf view 
Route::get('get_tour_details','Booking@get_tour_details'); 
Route::post('create_tour_pdf','Booking@create_tour_pdf'); 
Route::get('tour_complete','Booking@tour_complete'); 

// all booking Request 
Route::get('all_request','Booking@all_request');
Route::post('update_request_status','Booking@update_request_status'); 
Route::post('rental_booking_by_user','Accessory@rental_booking_by_user'); 
Route::post('taxi_rental_booking','Booking@taxi_rental_booking'); 
Route::post('add_conversation','Booking@update_conversation'); 
Route::post('get_conversation','Booking@get_conversation');

//  update rental  status 
Route::post('update_rental_status','Booking@update_rental_status'); 

Route::post('accessories_alloted','Accessory@accessories_alloted'); 
Route::post('accessories_returned','Accessory@accessories_returned');
// delete  booking by  notification request  
Route::get('delete_booking/{row_id}/{booking_type}','Booking@delete_booking'); 
Route::get('delete_booking_request_cancel/{row_id}/{booking_type}','Booking@delete_booking_request_cancel'); 
// delete booking request  details 
Route::get('delete_booking_request_details/{booking_id}/{booking_type}','Booking@delete_booking_request_details'); 

//  get booking Events Details For Dashboard Modal 
Route::post('get_booking_events_details','Booking@get_booking_events_details');  
Route::post('get_taxi_and_driver','Booking@get_taxi_and_driver');  // get booked taxi  and driver List  on this date 
Route::post('taxi_driver_assign_for_tour','Booking@taxi_driver_assign_for_tour');
Route::post('taxi_driver_assign_for_taxi','Booking@taxi_driver_assign_for_taxi');

//  Tour Length Management
Route::get('add_day','Tour_length@add_day'); 
Route::post('add_tour_length','Tour_length@add_tour_length');
Route::get('edit_tour_length/{row_id}','Tour_length@edit_tour_length'); 
Route::post('update_tour_length/{row_id}','Tour_length@update_tour_length'); 
Route::post('delete_tour_length','Tour_length@delete_tour_length'); 
Route::post('get_tour_length_days','Tour_length@get_tour_length_days'); 

// Users Management 
Route::get('registration','RegisterController@registration'); 
Route::post('sign_up','RegisterController@sign_up'); 
Route::post('delete_users','RegisterController@delete_users'); 
Route::get('edit_user/{row_id}','RegisterController@edit_user'); 
Route::post('update_user/{row_id}','RegisterController@update_user'); 
Route::get('user-details/{user_id}','RegisterController@user_details'); 
Route::get('users_documents/{user_id}','RegisterController@users_documents'); 
Route::post('upload_user_document','RegisterController@upload_user_document'); 
Route::post('delete_user_documents','RegisterController@delete_user_documents'); 
Route::post('update_user_documents_title','RegisterController@update_user_documents_title'); 

// Address management 
Route::get('address','Address@address'); 
Route::post('add_address','Address@add_address'); 
Route::post('delete_address','Address@delete_address'); 
Route::get('edit_address/{row_id}','Address@edit_address'); 
Route::post('update_address/{row_id}','Address@update_address'); 


// send  Driver  Details 
Route::get('gettodaydetails','Controller@sendTodayDetails'); 
Route::get('booking_structure','Controller@booking_structure'); 
Route::post('get_events_of_day','Controller@get_events_of_day'); 

// accessories
Route::get('new_accessories','Accessory@new_accessories');
Route::post('add_accessories','Accessory@add_accessories');
Route::get('accessories','Accessory@accessories'); 
Route::post('delete_accessories','Accessory@delete_accessories'); 
Route::get('accessories/{accessories_type}','Accessory@accessories_list_as_type'); 
Route::get('accessories/edit/{row_id}','Accessory@edit_accessories'); 
Route::post('update_accessories/{row_id}','Accessory@update_accessories');

//  rental  Bookings 
Route::get('new_rental_bookings','Accessory@new_rental_bookings'); 
Route::get('rental_bookings','Accessory@rental_bookings'); 
Route::post('add_rental_bookings','Accessory@add_rental_bookings'); 
Route::post('get_rental_booking','Accessory@get_rental_booking');

Route::post('get_price_by_sku','Accessory@get_price_by_sku');
// Email test  
Route::get('send_mail','AdminController@sendm'); 
Route::post('email_send','AdminController@email_send'); 


// Assign taxi to driver
Route::get('assign_taxi', 'AssignTaxiToDriver@getTaxiDriverList');
Route::post('submitAssignTaxi', 'AssignTaxiToDriver@submitAssignTaxi');
// Route::get('edit_assign_taxi/{currentDateId}', 'AssignTaxiToDriver@editTaxiDriver');
// Route::post('update_assign_taxi/{currentDateId}', 'AssignTaxiToDriver@updateTaxiDriver');
Route::post('getAssigntaxiOfDay','AssignTaxiToDriver@getAssigntaxiOfDay'); 

//  Terms  And Condition  
Route::get('term_condition','Contents@term_condition'); 
Route::post('add_terms','Contents@add_terms'); 
Route::post('delete_contents','Contents@delete_contents'); 
Route::get('edit_contents/{row_id}','Contents@edit_contents'); 
Route::post('update_contents/{row_id}','Contents@update_contents'); 


// testing 
Route::get('urllist','Controller@getUrl');

//  test page
Route::get('page','Controller@page'); 

Route::get('sendwhatsapp','ChatBotController@send_whatsappmsg');  //  send_whatsappmsg   listenToReplies
Route::post('listenToReplies','ChatBotController@listenToReplies'); 
Route::get('package/{file}','ChatBotController@package'); 
