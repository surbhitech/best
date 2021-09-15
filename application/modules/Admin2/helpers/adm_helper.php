<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('ci_instance')){
	function ci_instance(){
	 return	$CI =& get_instance();
	}
}
if(!function_exists('total_subcat')){
	function total_subcat($catid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->subcat_data_row($catid);
	}
}
if(!function_exists('expert_inactive_video')){
	function expert_inactive_video($cat_id){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_all_video($cat_id);
	}
}
if(!function_exists('expert_inactive_article')){
	function expert_inactive_article($cat_id){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_all_article($cat_id);
	}
}
function set_expert_row($cat_id){
	$ci = ci_instance();
	return $row = $ci->Main_model->set_expert_row($cat_id);
}
if(!function_exists('subcat_name')){
	function subcat_name($catid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_data_row($catid);
	}
}

if(!function_exists('all_category')){
	function all_category(){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->category_data();
	}
}
if(!function_exists('all_expert')){
	function all_expert(){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_data();
	}
}
if(!function_exists('all_question')){
	function all_question(){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->all_question();
	}
}
if(!function_exists('all_answer')){
	function all_answer(){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->all_answer();
	}
}
if(!function_exists('all_users')){
	function all_users(){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->all_users();
	}
}

if(!function_exists('all_subadmin')){
	function all_subadmin(){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->all_subadmin();
	}
}

if(!function_exists('total_expert_subcat')){
	function total_expert_subcat($subcatid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_data_row_subcat($subcatid);
	}
}
if(!function_exists('expert_subcatcatid_and_expert_wise')){
	function expert_subcatcatid_and_expert_wise($catid,$expert_id){
   	      $ci = ci_instance();
         return $data = $ci->Main_model->expert_subcatcatid_and_expert_wise($catid,$expert_id);
	}
}

if(!function_exists('total_expert')){
	function total_expert($catid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_data_row($catid);
	}
}
if(!function_exists('total_expert_cat')){
	function total_expert_cat($catid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_data_row_cat($catid);
	}
}
if(!function_exists('academic_detail')){
	function academic_detail($expertid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_academic_detail($expertid);
	}
}
if(!function_exists('confrence_detail')){
	function confrence_detail($expertid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_confrence_detail($expertid);
	}
}
if(!function_exists('award_detail')){
	function award_detail($expertid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_award_detail($expertid);
	}
}

if(!function_exists('subcat_namesubcatidwise')){
	function subcat_namesubcatidwise($subcatid){
	    $subcatid = json_decode($subcatid);
   	      $ci = ci_instance();
   	      $data = array();
      $data = $ci->Main_model->subcat_namesubcatidwise($subcatid);
      if($data != false){
          return $data;
      }
	}
}
if(!function_exists('subcat_name_subcatwise')){
	function subcat_name_subcatwise($subcatid){
   	      $ci = ci_instance();
   	      $data = array();
      $data = $ci->Main_model->single_subcat_data($subcatid);
      if($data != false){
          return $data;
      }
	}
}
if(!function_exists('total_question_incatwise')){
	function total_question_incatwise($catid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->total_question_incatwise($catid);
	}
}
if(!function_exists('inactiveexpert_catwise')){
	function inactiveexpert_catwise($catid){
   	      $ci = ci_instance();
    return $data = $ci->Main_model->inactiveexpert_catwise($catid);
	}
}
if(!function_exists('category_status')){
    function category_status($id,$val){
        $ci = ci_instance();
        if($val=='0'){
            $ci->Main_model->change_status($id,$val);
        } else{
            $ci->Main_model->change_status2($id,$val);
        }
    }
}
function cat_name($id){
    $ci = ci_instance();
    return $ci->Main_model->single_cat_data($id);
}
function cat_name_withsubcat($id,$subcatid){
    $ci = ci_instance();
    return $ci->Main_model->single_cat_data($id,$subcatid);
}
function subcat_single($subcatid){
    $ci = ci_instance();
    return $ci->Main_model->subcat_data_single($subcatid);
}
function subcat_catwise($catid){
    $ci = ci_instance();
    return $ci->Main_model->subcat_data($catid);
}