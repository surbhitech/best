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
function rev_datetime($datetime){
    return date('d-m-Y H:i:s',strtotime($datetime));
}
function category_ext_load($cat_id){
 if($cat_id =='1' || $cat_id =='5' || $cat_id =='6' || $cat_id =='7' || $cat_id =='9'){ $ext = 'Advicers'; } 
 if($cat_id =='8'){ $ext = 'Counselors'; }
 if($cat_id =='2' || $cat_id=='3' || $cat_id=='4'){ $ext =''; }
 return $ext;
}
function categoryin_modal($cat_id,$ext){
$subcat_row = total_subcat($cat_id);	    
$total_li = $subcat_row/20;	   
$total_li = ceil($total_li);	   	
if($cat_id){ return $data = array('color1'=>'#770000','color'=>'#fff5ea','count'=>$total_li); }
}
function loadmodalsubcatdata($i){
	$min_limit = ''; $max_limit  = '';
if($i==0){ $min_limit=$i; $max_limit=$min_limit+20; }	           
else if($i==1){ $min_limit=20; $max_limit=20; } 
else if($i==2){ $min_limit=40; $max_limit=20; }
else if($i==3){ $min_limit=60; $max_limit=20; }
else if($i==4){ $min_limit=80; $max_limit=20;  }	    	    
else if($i==5){ $min_limit=100; $max_limit=20;  }
return $data = array("min"=>$min_limit,"max"=>$max_limit);	
}    	
function slider_image_detail($podcast_id){
     $ci = ci_instance();
     $data = $ci->Main_model->podcast_full_detail($podcast_id);
    //  print_r($data); die();
     $slider_image = $data[0]->slider_image;
     $imageid = explode(",",$data[0]->slider_image);
     //print_r($imageid);
     $image_path2 = array();
     $i=0;
	  foreach($imageid as $key=>$value){
	   $image = $ci->Main_model->select_images($value);
	  if(!empty($image)){ $image_path2[$i]=$image[0]->image_path; } 
	  else{ $image_path2=''; }
	                $i++;
	            }
	            return $image_path2;
}
function rev_date($date){
  $array=explode("-",$date);
            $rev=array_reverse($array);
            $date=implode("-",$rev);
            return $date;
}
function prodcast_detail_all($catid){
       $ci = ci_instance();
       return $data = $ci->Main_model->prodcast_detail_all($catid);
}
function expert_review($expert_id){
    $ci = ci_instance();
     $rating = total_rating2($expert_id);
	  if($rating !=''){
	   $total_rating = round($rating['total']);
	   echo round($rating['total'],2)." / 5 Of ".$rating['totaluser']." Queries <br/>";
			for($i=0; $i<$total_rating; $i++){
			 echo "<i class='fa fa-star' aria-hidden='true'></i>";
			}
			  } else{
    			   echo "<i class='fa fa-star' aria-hidden='true'></i>
    				<i class='fa fa-star' aria-hidden='true'></i>
    				<i class='fa fa-star-half-o' aria-hidden='true'></i>";
    			           } 
    
}
function total_expert_point($expert_id,$user_id){
     $ci = ci_instance();
    $totalrating = $ci->Chat_model->rating_point("reviews",$expert_id,$user_id);
    if($totalrating>0){
        return $totalrating;
    } else{ echo 0; }
  
}
function total_rating($expert_id){
    $ci = ci_instance();
    $totalrating = $ci->Chat_model->total_rating("reviews",$expert_id);
    $total_r = $totalrating[0]->total_review; 
    $totalrow = $ci->Chat_model->total_rating_row("reviews",$expert_id);
    if($totalrating>0 && $totalrow>0){
    $total1 = ($total_r) / ($totalrow);
    $total = round($total1);
    if($total !=''){
    return $total;
    } else{ return 0; }
    } else{ return 0; }
}
function total_rating2($expert_id){
    $ci = ci_instance();
    $totalrating = $ci->Chat_model->total_rating("reviews",$expert_id);
    $total_r = $totalrating[0]->total_review; 
    $totalrow = $ci->Chat_model->total_rating_row("reviews",$expert_id);
    $totalusers = $ci->Chat_model->total_users_row($expert_id);
    if($totalrating>0 && $totalrow>0){
    $total1 = ($total_r) / ($totalrow);
    $total = round($total1);
    $data = array("total"=>$total1,"totaluser"=>$totalusers);
    if($total !=''){
    return $data;
    } else{ return 0; }
    } else{ return 0; }
}
function html_rating($expert_id){
     $rating = rating($expert_id);
    if(count($rating) > 0){
						for($i=0; $i<$rating['rating_point']; $i++){
						$html = "<i class='fa fa-star' aria-hidden='true'></i>";
					     }
						} else{
						  $html = "<i class='fa fa-star' aria-hidden='true'></i>
										<i class='fa fa-star' aria-hidden='true'></i>
										<i class='fa fa-star-half-o' aria-hidden='true'></i>";
								}
     return $html; 
}
function rating($expert_id){
    $ci = ci_instance();
    $totalrating = $ci->Chat_model->total_rating("reviews",$expert_id);
    $total_r = $totalrating[0]->total_review; 
    $totalrow = $ci->Chat_model->total_rating_row("reviews",$expert_id);
    if($totalrating>0 && $totalrow>0){
    $total1 = ($total_r) / ($totalrow);
    $total1 = number_format($total1, 2);
    $total = round($total1);
    $data = array("rating_number"=>$total1,"rating_point"=>$total);
    return $data;
    } else{ return false; }
}
function current_url2(){
  return  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
function answer_row($q_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->total_answer_row($q_id);
}
function expert_detail_groupchat_page($subcat_id,$q_id){
    	$ci = ci_instance();
	return $data = $ci->Main_model->expert_detail_groupchat_page($subcat_id,$q_id);
}
function academic_data_expert($expert_id){
    	$ci = ci_instance();
	return $data = $ci->Main_model->academic_data_expert($expert_id);
}
function encrypt_decrypt($action, $string) {

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'e9b8b1596fbb58954dfae1fd6baa8dea';
    $secret_iv = 'e9b8b1596fbb58954dfae1fd6baa8dea';
    // hash
    $key = hash('sha256', $secret_key);
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
function total_question($chat_name,$expert_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->total_question($chat_name,$expert_id);
}
function question_files_select($q_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->question_files_select($q_id);
}
function question_files_select_group($qust_id){
 	$ci = ci_instance();
	return $data = $ci->Main_model->question_files_select_group($qust_id);   
}
function chat_detail_user($var,$type){
	$ci = ci_instance();
	return $data = $ci->Main_model->chat_detail_user($var,$type);
}
function answer_rowsubcat($var,$type){
	$ci = ci_instance();
	return $data = $ci->Main_model->answer_no_row_subcat($var,$type);
}
function answer_files_select($ans_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->answer_files_select($ans_id);
}
function total_question_row($user_id,$subcat_id,$expert_id){
   $ci = ci_instance();
   return $data = $ci->Main_model->total_question_row($user_id,$subcat_id,$expert_id);
	}
function total_question_row_history($user_id,$subcat_id,$expert_id,$q_id){
    $ci = ci_instance();
   return $data = $ci->Main_model->total_question_row_history($user_id,$subcat_id,$expert_id);
}	
function total_question_row_groupchat($user_id,$subcat_id,$expert_id,$advice_mode,$q_id){
   $ci = ci_instance();
   return $data = $ci->Main_model->total_question_row_groupchat($user_id,$subcat_id,$expert_id,$advice_mode,$q_id);
	}
function question_select($user_id,$expert_id,$subcat_id){
	$ci = ci_instance();
	return $result = $ci->Chat_model->question_selectbyuserid(user_id,$expert_id,$subcat_id);
} 
function get_answer($qust_id,$user_id,$expert_id,$subcat_id){
	$ci = ci_instance();
	return $result = $ci->Chat_model->question_answerusingq_id($qust_id,$user_id,$expert_id,$subcat_id);
}
function get_answer2($q_id,$user_id,$expert_id,$subcat_id){
	$ci = ci_instance();
	return $result = $ci->Chat_model->question_answerusingq_id2($q_id,$user_id,$expert_id,$subcat_id);
}
function get_answer_group($user_id,$expert_id,$subcat_id,$q_id,$qust_id,$advice_mode){
	$ci = ci_instance();
	return $result = $ci->Chat_model->get_answer_group($user_id,$expert_id,$subcat_id,$q_id,$qust_id,$advice_mode);
}
function total_cat_row(){
	$ci = ci_instance();
	return $result = $ci->Main_model->total_cat_row();
}
function expert_detail_incatid($cat_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->expert_detail_incatid($cat_id);
	
}
function set_expert_subcat_detail($expert_id){
    	$ci = ci_instance();
	return $res = $ci->Main_model->set_expert_subcat_detail($expert_id);
}
function expert_detail_incatid2($cat_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->expert_detail_incatid2($cat_id);
	
}
function history_text_question($advice_mode,$user_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->history_text_question($advice_mode,$user_id);
}
function table_last_id($id){
	$ci = ci_instance();
	return $res = $ci->Chat_model->last_row($id);
}
function table_last_id2(){
	$ci = ci_instance();
	return $res = $ci->Chat_model->last_row2();
}
function question_no_row($user_id){
	$ci = ci_instance();
	return $res = $ci->Chat_model->question_no_row($user_id);
}
function question_no_row_group($user_id){
	$ci = ci_instance();
	return $res = $ci->Chat_model->question_no_row_group($user_id);
}
function check_history_question($q_id,$end_date){
	$ci = ci_instance();
	return $res = $ci->Chat_model->check_history_question($q_id,$end_date);
}
function question_no_row_history($user_id){
	$ci = ci_instance();
	return $res = $ci->Chat_model->question_no_row_history($user_id);
}
 function question_no_row_group_history($user_id){
	$ci = ci_instance();
	return $res = $ci->Chat_model->question_no_row_group_history($user_id);
}
function total_answer($q_id){
	$ci = ci_instance();
	return $res = $ci->Chat_model->total_answer($q_id);
}
 function user_detail_usinguserid($user_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->user_detail_usinguserid($user_id);
}
function expert_text_question($chat_name,$expert_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->expert_text_question($chat_name,$expert_id);
}
function expert_text_question_history($chat_name,$expert_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->expert_text_question_history($chat_name,$expert_id);
}
function total_question_history($chat_name,$expert_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->total_question_history($chat_name,$expert_id);
}
function user_text_question($chat_name,$user_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->user_text_question($chat_name,$user_id);
}
function all_expert_group_chat($chat_name,$q_id){
	$ci = ci_instance();
	return $res  = $ci->Main_model->all_expert_group_chat($chat_name,$q_id);	
}
function expert_detail($expert_id){
    	$ci = ci_instance();
    	return $res  = $ci->Main_model->single_expert_row($expert_id);	
}
function expert_question_data($chat_name,$expert_id,$status){
	$ci = ci_instance();
//	$update_data = $ci->Main_model->expert_question_history_update($chat_name,$expert_id);
	return $res = $ci->Main_model->expert_question_data($chat_name,$expert_id,$status);
}
function expert_question_data_history($chat_name,$expert_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->expert_question_data_history($chat_name,$expert_id);
}
function user_text_question_detail($chat_name,$user_id,$expert_id,$subcat_id,$qust_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->user_text_question_detail($chat_name,$user_id,$expert_id,$subcat_id,$qust_id);
}
function user_text_question_detail_history($chat_name,$user_id,$expert_id,$subcat_id,$qust_id){
    	$ci = ci_instance();
	return $res = $ci->Main_model->user_text_question_detail_history($chat_name,$user_id,$expert_id,$subcat_id,$qust_id);
}
function user_text_question_detail_subcat($chat_name,$user_id,$expert_id,$subcat_id,$qust_id,$subadmin_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->user_text_question_detail_subcat($chat_name,$user_id,$expert_id,$subcat_id,$qust_id,$subadmin_id);
}
function user_text_question_detail_groupchat($chat_name,$user_id,$expert_id,$subcat_id,$q_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->user_text_question_detail_groupchat($chat_name,$user_id,$expert_id,$subcat_id,$q_id);
}
function user_text_question_detail_single($chat_name,$user_id,$qust_id,$expert_id,$subcat_id){
	$ci = ci_instance();
	return $res = $ci->Main_model->user_text_question_detail($chat_name,$user_id,$expert_id,$subcat_id);
}
function total_subcat_row(){
	$ci = ci_instance();
    return $result = $ci->Main_model->total_subcat_row();
}
function total_expert_row(){
	$ci = ci_instance();
    return $result = $ci->Main_model->total_expert_row2();
}
function expert_tab_id($expert_id,$mode=0){
	$ci = ci_instance();
 return	$tab_id =$ci->Main_model->tab_id_usingexpert_id($expert_id,$mode=0);
}
/*
function subcat_fee_tab_id($subcat_id,$advice_mode){
  $ci = ci_instance();
 return	$tab_id =$ci->Main_model->subcat_fee_tab_id($subcat_id,$advice_mode);  
} */
function expert_tab_id2($expert_id,$advice_mode){
	$ci = ci_instance();
 return	$tab_id = $ci->Main_model->tab_id_usingexpert_id($expert_id,$advice_mode);
}
function expert_id_using_tabid($chat_type_id){
	$ci = ci_instance();
	return $expert_id = $ci->Main_model->expert_id_using_tabid($chat_type_id);
}
function chat_mode_list($expert_id){
	 $ci = ci_instance();
	 return $data = $ci->Main_model->chat_mode_list($expert_id);
}
function tab_detailbytab_id($tab_id,$tab_name){
	$ci = ci_instance();
	return $data = $ci->Main_model->chatmode_singlerow($tab_id,$tab_name);
}
function article_incatwise($cat_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->articlerow_incatwise($cat_id);
}
function podcast_incatwise($cat_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->podcastrow_incatwise($cat_id);
}
function article_insubcatwise($subcat_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->articlerow_insubcatwise($subcat_id);
}
function podcast_insubcatwise($subcat_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->podcastrow_insubcatwise($subcat_id);
}
function expert_detail_insubcat($cat_id,$subcat_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->expert_detail_insubcat($cat_id,$subcat_id);
}
function expert_cat_id_subcat_table($expert_id){
	$ci = ci_instance();
	return $data = $this->Main_model->expert_cat_id_subcat_table($expert_id);
}
function work_exp_row($expert_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->work_exp_row($expert_id);
}
function award_row($expert_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->award_row($expert_id);
}
 function prodcast_detail($expert_id,$subcat_id){
    	$ci = ci_instance();
	return $data = $ci->Main_model->prodcast_data($expert_id,$subcat_id);
}
function expert_membership($expert_id){
	 $ci = ci_instance();
	 return $data = $ci->Main_model->expert_membership($expert_id);
}
 function cat_id_usingcat_name($cat_name){
    $ci = ci_instance();
    return $data = $ci->Main_model->category_id_usingname($cat_name);
}
function subcat_load_using_expid($expert_id){
    $ci = ci_instance();
    return $ci->Admin_model->subcat_load_using_expid($expert_id);
}
if(!function_exists('limit_wise_subcat')){
	function limit_wise_subcat($min_limit,$max_limit,$catid){
   	      $ci = ci_instance();
          return $data = $ci->Main_model->subcat_data_row_limitwise($min_limit,$max_limit,$catid);
         //print_r($data);
	}
}
function subcat_name_bysubcat_id($subcat_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->subcat_name_bysubcat_id($subcat_id);
}
function user_question_detail_text($user_id,$subcat_id,$chat_name,$q_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->user_question_detail_text($user_id,$subcat_id,$chat_name,$q_id);
}
function user_question_detail_text_history($user_id,$subcat_id,$chat_name,$q_id){
    	$ci = ci_instance();
	return $data = $ci->Main_model->user_question_detail_text_history($user_id,$subcat_id,$chat_name,$q_id);
}
function answer_data($user_id,$subcat_id,$qust_id,$advice_mode,$expert_id){
	$ci= ci_instance();
	return  $data = $ci->Main_model->answer_data($user_id,$subcat_id,$qust_id,$advice_mode,$expert_id);
}
function answer_data_groupchat_page($user_id,$subcat_id,$advice_mode,$q_id){
	$ci= ci_instance();
	return  $data = $ci->Main_model->answer_data_groupchat_page($user_id,$subcat_id,$advice_mode,$q_id);
}
function answer_data_grouptext($user_id,$subcat_id,$advice_mode,$q_id,$expert_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->answer_data_grouptext($user_id,$subcat_id,$advice_mode,$q_id,$expert_id);
}
function question_data($expert_id,$user_id,$subcat_id,$chat_name,$q_id){
	$ci= ci_instance();
	return  $data = $ci->Main_model->question_data($expert_id,$user_id,$subcat_id,$chat_name,$q_id);
}
function question_data_history($expert_id,$user_id,$subcat_id,$chat_name,$q_id){
    
	$ci= ci_instance();
	return  $data = $ci->Main_model->question_data_history($expert_id,$user_id,$subcat_id,$chat_name,$q_id);
}
 function expert_academic_data($expert_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->expert_academic_data($expert_id);
}
function expert_work_exp($expert_id){
		$ci = ci_instance();
	return $data = $ci->Main_model->expert_work_exp($expert_id);
}
function expert_award_data($expert_id){
	$ci = ci_instance();
	return $data = $ci->Main_model->expert_award_data($expert_id);
}
if(!function_exists('limit_wise_subcat2')){
	function limit_wise_subcat2($min_limit,$max_limit,$catid){
   	      $ci = ci_instance();
          return $data = $ci->Main_model->subcat_data_row_limitwise2($min_limit,$max_limit,$catid);
          //print_r($data);
	}
}


if(!function_exists('subcat_name')){
	function subcat_name($catid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_data_row($catid);
	}
}

//subcat_according_cat_id
if(!function_exists('all_subcat_according_catid')){
	function all_subcat_according_catid($catid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->all_subcat_according_catid($catid);
	}
}


if(!function_exists('all_category')){
	function all_category(){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->category_data();
	}
}
if(!function_exists('all_category_desc')){
	function all_category_desc(){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->category_data_desc();
	}
}
if(!function_exists('all_category_asc')){
	function all_category_asc(){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->category_data_asc();
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
   return $data = $ci->Admin_model->all_users();
	}
}



if(!function_exists('total_expert_subcat')){
	function total_expert_subcat($subcatid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_data_row_subcat($subcatid);
	}
}
if(!function_exists('total_expert')){
	function total_expert($catid){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->expert_data_row($catid);
	}
}
if(!function_exists('total_expert_cat')){
	function total_expert_cat($catid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->expert_data_row_cat($catid);
	}
}
if(!function_exists('subcat_namesubcatidwise')){
	function subcat_namesubcatidwise($subcatid){
   	      $ci = ci_instance();
   return $data = $ci->Main_model->subcat_namesubcatidwise($subcatid);
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
    return $data = $ci->Admin_model->inactiveexpert_catwise($catid);
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
function cat_name_withsubcat($id){
    $ci = ci_instance();
    return $ci->Admin_model->single_cat_data($id);
}
/*
function cat_name_withsubcat($id,$subcat_id){
    $ci = ci_instance();
    return $ci->Admin_model->expert_detail2($id,$subcat_id);
}
*/
function cat_name_using_subcatid($subcat_id){
	$ci = ci_instance();
  return $ci->Main_model->cat_name_using_subcatid($subcat_id);
}
function subcat_single($subcatid){
    $ci = ci_instance();
    return $ci->Main_model->subcat_data_single($subcatid);
}
function article_detail($cat_id){
	$ci= ci_instance();
	return $ci->Main_model->expert_article_cat_id($cat_id);
}
function article_detail_all($catid){
    $ci= ci_instance();
	return $ci->Main_model->expert_article_detail($catid);
}
function article_detail_subcatwise($subcat_id){
	$ci = ci_instance();
	return $ci->Main_model->subcat_article_detail($subcat_id);
}
function subcat_catwise($catid){
    $ci = ci_instance();
    return $ci->Admin_model->subcat_data($catid);
}
function expert_subcat_data($catid){
    $ci = ci_instance();
    return $ci->Main_model->expert_subcat_data($catid);
}
function expert_cat_id($expert_id){
    $ci = ci_instance();
    return $ci->Main_model->expert_cat_id($expert_id);
}
function expert_subcat_id($expert_id){
    $ci = ci_instance();
    return $ci->Main_model->expert_subcat_id($expert_id);
}
function expert_subcat_id_array($expert_id){
    $ci = ci_instance();
    return $ci->Main_model->expert_subcat_id_array($expert_id);
}
function allsubcat_in_expert($expert_id){
 $ci = ci_instance();	
    return $ci->Main_model->allsubcat_in_expert($expert_id);
}
function cat_idbyname($cat_name){
	$ci = ci_instance();
	return $ci->Main_model->cat_idbyname($cat_name);
}
function single_expert($expert_id){
            $ci = ci_instance();	
    return $ci->Main_model->single_expert_row($expert_id);
}
function expertdetail_incat_id($cat_id){
	$ci = ci_instance();
	return $ci->Main_model->expert_detail_incatid($cat_id);
}
function single_user($user_id){
	$ci = ci_instance();
	return $ci->Main_model->single_user_detail($user_id);
}

//admin helper

if(!function_exists('total_subcat')){
	function total_subcat($catid){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->subcat_data_row($catid);
	}
}
if(!function_exists('expert_inactive_video')){
	function expert_inactive_video($cat_id){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->expert_all_video($cat_id);
	}
}
if(!function_exists('expert_inactive_article')){
	function expert_inactive_article($cat_id){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->expert_all_article($cat_id);
	}
}

if(!function_exists('subcat_name')){
	function subcat_name($catid){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->expert_data_row($catid);
	}
}

if(!function_exists('all_category')){
	function all_category(){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->category_data();
	}
}
if(!function_exists('all_expert')){
	function all_expert(){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->expert_data();
	}
}
if(!function_exists('all_question')){
	function all_question(){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->all_question();
	}
}
if(!function_exists('all_answer')){
	function all_answer(){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->all_answer();
	}
}
if(!function_exists('all_users')){
	function all_users(){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->all_users();
	}
}

if(!function_exists('all_subadmin')){
	function all_subadmin(){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->all_subadmin();
	}
}
function subadmin_in_cat($cat_id){
     $ci = ci_instance();
   return $data = $ci->Admin_model->subadmin_in_cat($cat_id); 
}

if(!function_exists('total_expert_subcat')){
	function total_expert_subcat($subcatid){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->expert_data_row_subcat($subcatid);
	}
}
if(!function_exists('expert_subcatcatid_and_expert_wise')){
	function expert_subcatcatid_and_expert_wise($catid,$expert_id){
   	      $ci = ci_instance();
         return $data = $ci->Admin_model->expert_subcatcatid_and_expert_wise($catid,$expert_id);
	}
}

if(!function_exists('total_expert')){
	function total_expert($catid){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->expert_data_row($catid);
	}
}

if(!function_exists('academic_detail')){
	function academic_detail($expertid){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->expert_academic_detail($expertid);
	}
}
if(!function_exists('confrence_detail')){
	function confrence_detail($expertid){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->expert_confrence_detail($expertid);
	}
}
if(!function_exists('award_detail')){
	function award_detail($expertid){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->expert_award_detail($expertid);
	}
}

if(!function_exists('subcat_namesubcatidwise')){
	function subcat_namesubcatidwise($subcatid){
	    $subcatid = json_decode($subcatid);
   	      $ci = ci_instance();
   	      $data = array();
      $data = $ci->Admin_model->subcat_namesubcatidwise($subcatid);
      if($data != false){
          return $data;
      }
	}
}
if(!function_exists('subcat_name_subcatwise')){
	function subcat_name_subcatwise($subcatid){
   	      $ci = ci_instance();
   	      $data = array();
      $data = $ci->Main_model->subcat_data_single($subcatid);
      if($data != false){
          return $data;
      }
	}
}
function subcat_name_subcatidwise($subcatid){
   	      $ci = ci_instance();
   	      $data = array();
      $data = $ci->Main_model->subcat_detail_subcatidwise($subcatid);
      if($data != false){
          return $data;
      }
	}

function prodcast_detail_expert($expert_id,$subcat_id,$cat_id){
    $ci = ci_instance();
    $data = array();
    return $data = $ci->Main_model->single_podcast_detail($expert_id,$subcat_id,$cat_id);
}
if(!function_exists('subcat_name_subcatname_wise')){
	function subcat_name_subcatname_wise($subcatname){
   	      $ci = ci_instance();
   	      $data = array();
      $data = $ci->Main_model->single_subcat_data($subcatname);
      if($data != false){
          return $data;
      }
	}
}
if(!function_exists('total_question_incatwise')){
	function total_question_incatwise($catid){
   	      $ci = ci_instance();
   return $data = $ci->Admin_model->total_question_incatwise($catid);
	}
}
if(!function_exists('inactiveexpert_catwise')){
	function inactiveexpert_catwise($catid){
   	      $ci = ci_instance();
    return $data = $ci->Admin_model->inactiveexpert_catwise($catid);
	}
}
if(!function_exists('category_status')){
    function category_status($id,$val){
        $ci = ci_instance();
        if($val=='0'){
            $ci->Admin_model->change_status($id,$val);
        } else{
            $ci->Admin_model->change_status2($id,$val);
        }
    }
}

//admin
 function email_load($var1,$var2,$email_for){
     $ci = ci_instance();
		   $data = $ci->Main_model->email_template($email_for);
		   $email_text = $data[0]->email_text;
		   $mail_body  = str_replace(array('var1', 'var2'), array($var1, $var2), $email_text);
		   return $mail_body;
		  
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
	return $row = $ci->Admin_model->set_expert_row($cat_id);
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
function single_expert_row($expert_id){
        $ci = ci_instance();
   return $data = $ci->Admin_model->single_expert_row($expert_id);
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