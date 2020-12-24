<?php

namespace App;
use  App\Customization_activities_types;
use Illuminate\Database\Eloquent\Model;
use  DB; 
class Customization_activities extends Model
{
      protected $fillable=['activity_type','activity_name','short_details','tourFreq','origin','start_time','end_time','travelTimeMin','group_currency','pax_currency','group_costs','pax_costs','group_TotalCosts','group_TotalCommission','pax_TotalCosts','pax_TotalCommission','description','time_duration','distance','internal_financial_details', 'external_financial_details']; 
      
   public static  function get_this_tour($whereArray)
   {   
       return Customization_activities::where($whereArray)->first();
   }
   public static function get_all_activities()
      {
         return Customization_activities::leftJoin('customization_activities_types', function($join) {
            $join->on('customization_activities.activity_type', '=', 'customization_activities_types.id');
          })->select('customization_activities_types.title as title', 'customization_activities.*')->where('customization_activities.status' ,1)->orderBy('customization_activities.id','DESC')->get();
      }

   public  static function add_custom_activity($request)
   {
      return Customization_activities::create([
            'activity_type'=>$request->activity_type,
            'activity_name'=>$request->activity_name,
            'description'=>$request->description,
            'time_duration'=>$request->time_duration?$request->time_duration:'',
            'distance'=>$request->distance?$request->distance:''
      ]); 
   }
   public  static function add_tour_template($ins_data)
   {   
       return Customization_activities::create($ins_data);
   }

   //   delete_custom_activity
   public static  function delete_custom_activity($request)
   {
       //return Customization_activities::where('id' ,$request->row_id)->delete();
       return Customization_activities::where('id' ,$request->row_id)->update(['status' => 0]);
   }
    
   //  get by id 
    public static function get_by_id($request){ 
       return Customization_activities::where('id' ,$request->row_id)->first(); 
    }
   //   update_custom_activity_by_id
   public static function update_custom_activity_by_id($request)
   {
       if($request->activity_type){$update['activity_type']=$request->activity_type; }
       if($request->activity_type){$update['activity_name']=$request->activity_name; }
       if($request->activity_type){$update['description']=$request->description; }  
       if($request->activity_type){$update['time_duration']=$request->time_duration?$request->time_duration:''; }
       if($request->activity_type){$update['distance']=$request->distance?$request->distance:''; }
       if($request->activities_details){$update['activities_details']=$request->activities_details?$request->activities_details:''; }
       if($request->short_details){$update['short_details']=$request->short_details?$request->short_details:''; }
       
       if($request->stp2cost){$update['stp2cost']=$request->stp2cost?$request->stp2cost:''; }
       if($request->stp2ringo){$update['stp2ringo']=$request->stp2ringo?$request->stp2ringo:''; }
       if($request->stp2abc){$update['stp2abc']=$request->stp2abc?$request->stp2abc:''; }
       if($request->stp2grossmargin){$update['stp2grossmargin']=$request->stp2grossmargin?$request->stp2grossmargin:''; }

       $update['status']=1; 
     return Customization_activities::where('id',$request->row_id)->update($update);  
   }

   public static function update_custom_activities($column,$value,$update_data)
   { 
      return Customization_activities::where($column,$value)->update($update_data);  
   }


   public static  function get_records_gruop_by_where($groupBy,$column,$value)
   {    
      return Customization_activities::where($column,$value)->whereNotNull($groupBy)->select('tourFreq')->groupBy('tourFreq')->get();  //   
       
   }




}
