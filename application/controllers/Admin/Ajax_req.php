<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_req extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
	  }
	  public function prodcastset(){
	      $prodcast_id = $this->input->post('prodcast_id');
	      $status = $this->input->post('status');
	      $prodcast_detail  = $this->Admin_model->prodcast_detail_by_id($prodcast_id);
	      if($status==1){
	          $data  = array("set_status"=>0,"prod_id"=>$prodcast_id);
	      } else{
	          $data  = array("set_status"=>1,"prod_id"=>$prodcast_id);
	           }
	     $res =  $this->Admin_model->update_set_prodcast_status($data);
	     if($res == true){ echo "1"; } else{ echo "0"; }
	  }
	public function status_data()
	{
	    $id = $this->input->post('table_id');
	    $tablename = $this->input->post('tablename');
	    $columnname = $this->input->post('columnname');
	    $value = $this->input->post('value');
	    return $response = $this->Admin_model->status_fetch($id,$tablename,$columnname,$value);
	}
	public function Category_load(){
	    $cat_id = $this->input->post('cat_id');
	    $subcategory = $this->Main_model->subcat_data($cat_id);
	    echo "<option value=''>--Select Subcategory--</option>";
	    foreach($subcategory as $row){
	        echo "<option value='".$row->subcat_id."'>".$row->subcat_name."</option>";
	    }
	}
	public function Expert_load(){
	    $subcat_id = $this->input->post('subcat_id');
	    $cat_id = $this->input->post('cat_id');
	    $expert = $this->Admin_model->expert_detail2($cat_id,$subcat_id);
	    echo "<option value=''>--Select Expert--</option>";
	    if($expert !=''){
	    foreach($expert as $row){
	        echo "<option value='".$row->expert_id."'>".$row->expert_name."</option>";
	    }
	   } else{ echo false; }
	}
	public function load_prodcast_data(){
	    $expert_id = $this->input->post('expert_id');
	    $subcat_id = $this->input->post('subcat_id');
	    $prodcast_data = $this->Admin_model->prodcast_data_expert($expert_id,$subcat_id);
	    if($prodcast_data){
	        $num = 1;
	    foreach($prodcast_data as $row){
	        ?>
	        	<tr class="warning" id="main_head">
                                        <td><?php echo $num; ?></td>
										<td><input type="radio" id="radio_btn_<?php echo $row->id; ?>" onchange="submit_button(this.value)" name="id" value="<?php echo $row->id; ?>" /></td>

										<td><?php echo $row->prodcast_title; ?></td>

										<td><audio controls>  <source src="<?php echo $row->file_link; ?>"></audio></td>

									<!--	<td>

	  <?php //if($row->prodcast_id >'0'){ ?>
	  <a  href="javascript:void()">
	      <span class='btn btn-sm btn-success' style='text-decoration:none; color:#fff'>Prodcast Set</span></a>
	<?php// } else{ ?>
	  <a  href="javascript:void()">
	      <span class='btn btn-sm btn-danger' style='text-decoration:none; color:#fff'>Prodcast UnSet</span></a><?php //} ?></td>-->								
	</tr>

<?php $num = $num+1; } } else{ ?>

 <div class='alert alert-danger'>Empty Data... </div>

<?php } ?>
	        <?php
	    }
public function Expert_load_using_catid(){
	    $cat_id = $this->input->post('cat_id');
	    $expert = $this->Admin_model->expert_detail_catwise($cat_id);
	    echo "<option value=''>--Select Expert--</option>";
	    if($expert !=''){
	    foreach($expert as $row){
	        echo "<option value='".$row->expert_id."'>".$row->expert_name."</option>";
	    }
	   } else{ echo false; }
	    
	}
	public function subcat_load_using_expid(){
	    $expert_id = $this->input->post('expert_id');
	    $subcat = $this->Admin_model->subcat_load_using_expid($expert_id);
	    echo "<option value=''>--Select Subcategory--</option>";
	    if($subcat !=''){
	    foreach($subcat as $row){
	        echo "<option value='".$row->expert_subcat_id."'>".$row->subcat_name."</option>";
	    }
	   } else{ echo false; }
	}
	public function expert_detail_load(){
	    $expert_id = $this->input->post('expert_id');
	    $subcat_id = $this->input->post('subcat_id');
	    $data = $this->Admin_model->expert_detail_slider($expert_id,$subcat_id);
	    if($data){
	    echo json_encode($data); }else{ return false; }
	}

}
