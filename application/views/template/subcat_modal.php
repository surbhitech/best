<section class="sub_headerpop">
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
<div class="fullcontainer">
<div class="row">
<div class="col-md-10 ">
<div class="header-nav1 mysettop_uper">
<ul id="myTab" class="nav setmyiteng nav-pills setmyset  small-text">
	<li class="tellme1 advice_<?php echo $cat_id; ?>">
	<?php if($cat_id =='1' or $cat_id =='2' or $cat_id =='5' or $cat_id =='6' or $cat_id =='7' or $cat_id =='9' ){ $advicer = "Advicers"; } 
	if($cat_id=='8'){ $advicer = 'Counselors'; }
	if($cat_id=='3' or $cat_id=='4'){ $advicer=''; }
	 $cat_data = cat_name($cat_id);							?>
		<a href="#tab_<?php echo $cat_data[0]['cat_class']; ?>" data-toggle="modal" data-target="#<?php echo $cat_data[0]['cat_id']; ?>">
			<?php echo $cat_data[0]['cat_name']." " .$advicer;  ?>
		</a>
	</li>
	<li class="subcatpage">
		<?php
		$subcat_id = $subcat[0]['subcat_id'];
		echo $subcat[0]['subcat_name']; 
		$subcat_name = $subcat[0]['subcat_name']; ?>
	</li>
</ul>
</div>
<section class="newmodel">
<div class="container">
<div class="modal mod_1" id="1" role="dialog">
<?php $category_id = '1';
$advicer='Advicers';				 
$subcat_row = total_subcat($category_id);	  
$category_name = cat_name($category_id);	  
$total_li = $subcat_row/20;	   
$total_li = ceil($total_li);	   
$min_limit = ''; $max_limit  = '';	
if($category_id =='1'){ $color1 = "#770000;"; $color = "#fff5ea"; }
?>				   
<div class="modal-dialog">						<!-- Modal content-->						
<div class="modal-content">							
<div class="modal-header" style="color:white;background-color:<?php echo $color1; ?>; font-size:11px;">		<button type="button" class="close" data-dismiss="modal">&times;</button>					
<h4 class="modal-title" style=""><span> </span>&nbsp;<?php echo $category_name[0]['cat_name']." ".$advicer; ?>&nbsp; </h4></div>							
<div class="modal-body" style="background:<?php echo $color; ?>">								
<div class="anble1">		
<p style="color: #041b59;text-align: left;">
<?php echo $category_name[0]['cat_name']." ".$advicer; ?> :</p></div>		
<ul class="modaldoctor"><?php for($i=0; $i<$total_li; $i++){ ?>	
<li class="ddayed"><div class="howit">	    
<?php 
if($i==0){      $min_limit=$i; $max_limit=$min_limit+20; }	           
else if($i==1){ $min_limit=20; $max_limit=20; } 
else if($i==2){ $min_limit=40; $max_limit=20; }
else if($i==3){ $min_limit=60; $max_limit=20; }
else if($i==4){ $min_limit=80; $max_limit=20;  }	    	    
else if($i==5){ $min_limit=100; $max_limit=20;  }	    	    
$subcat1 = limit_wise_subcat2($min_limit,$max_limit,$category_id);
if(!empty($subcat1)){	
foreach($subcat1 as $sub){ $subcat_name1 = str_replace(" ","-",$sub->subcat_name); ?>         
<a href="<?php echo base_url().$category_name[0]['cat_name']."/".$subcat_name1; ?>">			
<?php echo $sub->subcat_name; ?> </a> <br><?php } } ?>										
</div></li><?php } ?>	
</ul>	
<div class="anbles"><p><a	href="<?php echo base_url(); ?>Home/General"style="color: #fd4834;">click here if you are not able to find your speciality</a></p>		
</div>
</div>
</div>
</div>
</div>
<div class="modal mod_2" id='2' role="dialog">
<?php $category_id = '2';	  
$subcat_row = total_subcat($category_id);	  
$category_name = cat_name($category_id);	  
$total_li = $subcat_row/20;	   
$total_li = ceil($total_li);	   
$min_limit = '';		$max_limit  = '';	
if($category_id =='2'){ $color1  = "#83863b;"; $color = ""; }	?>				   
<div class="modal-dialog">						<!-- Modal content-->						
<div class="modal-content">							
<div class="modal-header" style="color:white;background-color:<?php echo $color1; ?>; font-size:11px;">						<button type="button" class="close" data-dismiss="modal">&times;</button>					
<h4 class="modal-title" style=""><span> </span>&nbsp;<?php echo $category_name[0]['cat_name']." ".$advicer; ?> </h4></div>							
<div class="modal-body" style="background:<?php echo $color; ?>">								
<div class="anble1">		
<p style="color: #041b59;text-align: left;">
<?php echo $category_name[0]['cat_name']." ".$advicer; ?></p></div>		
<ul class="modaldoctor"><?php for($i=0; $i<$total_li; $i++){ ?>	
<li class="ddayed"><div class="howit">	    
<?php 
if($i==0){      $min_limit=$i; $max_limit=$min_limit+20; }	           
else if($i==1){ $min_limit=20; $max_limit=20; } 
else if($i==2){ $min_limit=40; $max_limit=20; }
else if($i==3){ $min_limit=60; $max_limit=20; }
else if($i==4){ $min_limit=80; $max_limit=20;  }	    	    
else if($i==5){ $min_limit=100; $max_limit=20;  }	    
$subcat1 = limit_wise_subcat2($min_limit,$max_limit,$category_id);		
if(!empty($subcat1)){	
foreach($subcat1 as $sub){ $subcat_name1 = str_replace(" ","-",$sub->subcat_name); ?>         
<a href="<?php echo base_url().$category_name[0]['cat_name']."/".$subcat_name1; ?>">			
<?php echo $sub->subcat_name; ?> </a> <br><?php } } ?>										
</div></li><?php } ?>	
</ul>	
<div class="anbles"><p ><a	href="<?php echo base_url(); ?>Home/General"style="color: #fd4834;">click here if you are not able to find your speciality</a></p>		
</div>
</div>
</div>
</div>
</div>
<div class="modal mod_3" id="3" role="dialog">
<?php $category_id = '3';	  
$subcat_row = total_subcat($category_id);	  
$category_name = cat_name($category_id);	  
$total_li = $subcat_row/20;	   
$total_li = ceil($total_li);	   
$min_limit = '';		$max_limit  = '';	
if($category_id =='3'){$color1  = "#bc7e50;"; $color = "#EFE0D6";		}	?>				   
<div class="modal-dialog">						<!-- Modal content-->						
<div class="modal-content">							
<div class="modal-header" style="color:white;background-color:<?php echo $color1; ?>; font-size:11px;">						<button type="button" class="close" data-dismiss="modal">&times;</button>					
<h4 class="modal-title" style=""><span> </span>&nbsp;<?php echo $category_name[0]['cat_name']; ?></h4></div>							
<div class="modal-body" style="background:<?php echo $color; ?>">								
<div class="anble1">		
<p style="color: #041b59;text-align: left;">
<?php echo $category_name[0]['cat_name']; ?></p></div>		
<ul class="modaldoctor"><?php for($i=0; $i<$total_li; $i++){ ?>	
<li class="ddayed"><div class="howit">	    
<?php 
if($i==0){      $min_limit=$i; $max_limit=$min_limit+20; }	           
else if($i==1){ $min_limit=20; $max_limit=20; } 
else if($i==2){ $min_limit=40; $max_limit=20; }
else if($i==3){ $min_limit=60; $max_limit=20; }
else if($i==4){ $min_limit=80; $max_limit=20;  }	    	    
else if($i==5){ $min_limit=100; $max_limit=20;  }
$subcat1 = limit_wise_subcat2($min_limit,$max_limit,$category_id);
if(!empty($subcat1)){	
foreach($subcat1 as $sub){ $subcat_name1 = str_replace(" ","-",$sub->subcat_name); ?>         
<a href="<?php echo base_url().$category_name[0]['cat_name']."/".$subcat_name1; ?>">			
<?php echo $sub->subcat_name; ?> </a> <br><?php } } ?>										
</div></li><?php } ?>	
</ul>	
<div class="anbles"><p><a	href="<?php echo base_url(); ?>Home/General"style="color: #fd4834;">click here if you are not able to find your speciality</a></p>		
</div>
</div>
</div>
</div>
</div>
<div class="modal mod_4" id="4"  role="dialog">
<?php $category_id = '4';	  
$subcat_row = total_subcat($category_id);	  
$category_name = cat_name($category_id);	  
$total_li = $subcat_row/20;	   
$total_li = ceil($total_li);	   
$min_limit = '';		$max_limit  = '';	
if($category_id =='4'){ $color1 = "#7d8bb1;";$color = "#E0E3ED";		}	?>				   
<div class="modal-dialog">						<!-- Modal content-->						
<div class="modal-content">							
<div class="modal-header" style="color:white;background-color:<?php echo $color1; ?>; font-size:11px;">						<button type="button" class="close" data-dismiss="modal">&times;</button>					
<h4 class="modal-title" style=""><span> </span>&nbsp;<?php echo $category_name[0]['cat_name']; ?></h4></div>							
<div class="modal-body" style="background:<?php echo $color; ?>">								
<div class="anble1">		
<p style="color: #041b59;text-align: left;">
<?php echo $category_name[0]['cat_name']; ?></p></div>		
<ul class="modaldoctor"><?php for($i=0; $i<$total_li; $i++){ ?>	
<li class="ddayed"><div class="howit">	    
<?php 
if($i==0){      $min_limit=$i; $max_limit=$min_limit+20; }	           
else if($i==1){ $min_limit=20; $max_limit=20; } 
else if($i==2){ $min_limit=40; $max_limit=20; }
else if($i==3){ $min_limit=60; $max_limit=20; }
else if($i==4){ $min_limit=80; $max_limit=20;  }	    	    
else if($i==5){ $min_limit=100; $max_limit=20;  }
$subcat1 = limit_wise_subcat2($min_limit,$max_limit,$category_id);
if(!empty($subcat1)){	
foreach($subcat1 as $sub){ $subcat_name1 = str_replace(" ","-",$sub->subcat_name); ?>         
<a href="<?php echo base_url().$category_name[0]['cat_name']."/".$subcat_name1; ?>">			
<?php echo $sub->subcat_name; ?> </a> <br><?php } } ?>										
</div></li><?php } ?>	
</ul>	
<div class="anbles"><p><a	href="<?php echo base_url(); ?>Home/General"style="color: #fd4834;">click here if you are not able to find your speciality</a></p>		
</div>
</div>
</div>
</div>
</div>
<div class="modal mod_5" id="5"  role="dialog">
<?php $category_id = '5';	  
$subcat_row = total_subcat($category_id);	  
$category_name = cat_name($category_id);	  
$total_li = $subcat_row/20;	   
$total_li = ceil($total_li);	   
$min_limit = '';		$max_limit  = '';	
if($category_id =='5'){ $color1 = "#7b3631"; $color = "#F0DBD9"; }	?>				   
<div class="modal-dialog">						<!-- Modal content-->						
<div class="modal-content">							
<div class="modal-header" style="color:white;background-color:<?php echo $color1; ?>; font-size:11px;">						<button type="button" class="close" data-dismiss="modal">&times;</button>					
<h4 class="modal-title" style=""><span> </span>&nbsp;<?php echo $category_name[0]['cat_name']; ?>&nbsp;Advicers </h4></div>							
<div class="modal-body" style="background:<?php echo $color; ?>">								
<div class="anble1">		
<p style="color: #041b59;text-align: left;">
<?php echo $category_name[0]['cat_name']; ?>Advicers :</p></div>		
<ul class="modaldoctor"><?php for($i=0; $i<$total_li; $i++){ ?>	
<li class="ddayed"><div class="howit">	    
<?php 
if($i==0){      $min_limit=$i; $max_limit=$min_limit+20; }	           
else if($i==1){ $min_limit=20; $max_limit=20; } 
else if($i==2){ $min_limit=40; $max_limit=20; }
else if($i==3){ $min_limit=60; $max_limit=20; }
else if($i==4){ $min_limit=80; $max_limit=20;  }	    	    
else if($i==5){ $min_limit=100; $max_limit=20;  }
$subcat1 = limit_wise_subcat2($min_limit,$max_limit,$category_id);	    
if(!empty($subcat1)){	
foreach($subcat1 as $sub){ $subcat_name1 = str_replace(" ","-",$sub->subcat_name); ?>         
<a href="<?php echo base_url().$category_name[0]['cat_name']."/".$subcat_name1; ?>">			
<?php echo $sub->subcat_name; ?> </a> <br><?php } } ?>										
</div></li><?php } ?>	
</ul>	
<div class="anbles"><p><a	href="<?php echo base_url(); ?>Home/General"style="color: #fd4834;">click here if you are not able to find your speciality</a></p>		
</div>
</div>
</div>
</div>
</div>
<div class="modal mod_6" id="6" role="dialog">
<?php $category_id = '6';	  
$subcat_row = total_subcat($category_id);	  
$category_name = cat_name($category_id);	  
$total_li = $subcat_row/20;	   
$total_li = ceil($total_li);	   
$min_limit = ''; $max_limit  = '';	
if($category_id =='6'){ $color1 = "#C65900"; $color = "#FFDEC4"; }
?>				   
<div class="modal-dialog">						<!-- Modal content-->						
<div class="modal-content">							
<div class="modal-header" style="color:white;background-color:<?php echo $color1; ?>; font-size:11px;">						<button type="button" class="close" data-dismiss="modal">&times;</button>					
<h4 class="modal-title" style=""><span> </span>&nbsp;<?php echo $category_name[0]['cat_name']; ?>&nbsp;Advicers </h4></div>							
<div class="modal-body" style="background:<?php echo $color; ?>">								
<div class="anble1">		
<p style="color: #041b59;text-align: left;">
<?php echo $category_name[0]['cat_name']; ?>Advicers :</p></div>		
<ul class="modaldoctor"><?php for($i=0; $i<$total_li; $i++){ ?>	
<li class="ddayed"><div class="howit">	    
<?php 
if($i==0){      $min_limit=$i; $max_limit=$min_limit+20; }	           
else if($i==1){ $min_limit=20; $max_limit=20; } 
else if($i==2){ $min_limit=40; $max_limit=20; }
else if($i==3){ $min_limit=60; $max_limit=20; }
else if($i==4){ $min_limit=80; $max_limit=20;  }	    	    
else if($i==5){ $min_limit=100; $max_limit=20;  }
$subcat1 = limit_wise_subcat2($min_limit,$max_limit,$category_id);	    
if(!empty($subcat1)){	
foreach($subcat1 as $sub){ $subcat_name1 = str_replace(" ","-",$sub->subcat_name); ?>         
<a href="<?php echo base_url().$category_name[0]['cat_name']."/".$subcat_name1; ?>">			
<?php echo $sub->subcat_name; ?> </a> <br><?php } } ?>										
</div></li><?php } ?>	
</ul>	
<div class="anbles"><p><a	href="<?php echo base_url(); ?>Home/General"style="color: #fd4834;">click here if you are not able to find your speciality</a></p>		
</div>
</div>
</div>
</div>
</div>
<div class="modal mod_7" id="7" role="dialog">
<?php $category_id = '7';	  
$subcat_row = total_subcat($category_id);	  
$category_name = cat_name($category_id);	  
$total_li = $subcat_row/20;	   
$total_li = ceil($total_li);	   
$min_limit = '';		$max_limit  = '';	
if($category_id =='7'){ $color1 = "#4c8077"; $color = "#DAE9E7";		}
?>				   
<div class="modal-dialog">						<!-- Modal content-->						
<div class="modal-content">							
<div class="modal-header" style="color:white;background-color:<?php echo $color1; ?>; font-size:11px;">						<button type="button" class="close" data-dismiss="modal">&times;</button>					
<h4 class="modal-title" style=""><span> </span>&nbsp;<?php echo $category_name[0]['cat_name']; ?>&nbsp;Advicers </h4></div>							
<div class="modal-body" style="background:<?php echo $color; ?>">								
<div class="anble1">		
<p style="color: #041b59;text-align: left;">
<?php echo $category_name[0]['cat_name']; ?>Advicers :</p></div>		
<ul class="modaldoctor"><?php for($i=0; $i<$total_li; $i++){ ?>	
<li class="ddayed"><div class="howit">	    
<?php 
if($i==0){      $min_limit=$i; $max_limit=$min_limit+20; }	           
else if($i==1){ $min_limit=20; $max_limit=20; } 
else if($i==2){ $min_limit=40; $max_limit=20; }
else if($i==3){ $min_limit=60; $max_limit=20; }
else if($i==4){ $min_limit=80; $max_limit=20;  }	    	    
else if($i==5){ $min_limit=100; $max_limit=20;  }
$subcat1 = limit_wise_subcat2($min_limit,$max_limit,$category_id);
if(!empty($subcat1)){	
foreach($subcat1 as $sub){ $subcat_name1 = str_replace(" ","-",$sub->subcat_name); ?>         
<a href="<?php echo base_url().$category_name[0]['cat_name']."/".$subcat_name1; ?>">			
<?php echo $sub->subcat_name; ?> </a> <br><?php } } ?>										
</div></li><?php } ?>	
</ul>	
<div class="anbles"><p><a	href="<?php echo base_url(); ?>Home/General"style="color: #fd4834;">click here if you are not able to find your speciality</a></p>		
</div>
</div>
</div>
</div>
</div>
<div class="modal mod_8" id="8" role="dialog">
<?php $category_id = '8';	  
$subcat_row = total_subcat($category_id);	  
$category_name = cat_name($category_id);	  
$total_li = $subcat_row/20;	   
$total_li = ceil($total_li);	   
$min_limit = '';		$max_limit  = '';	
if($category_id =='8'){ $color1 = "#1358D2";	$color = "#fdfdfd";}
?>				   
<div class="modal-dialog">						<!-- Modal content-->						
<div class="modal-content">							
<div class="modal-header" style="color:white;background-color:<?php echo $color1; ?>; font-size:11px;">						<button type="button" class="close" data-dismiss="modal">&times;</button>					
<h4 class="modal-title" style=""><span> </span>&nbsp;<?php echo $category_name[0]['cat_name']; ?>&nbsp; Counselors </h4></div>							
<div class="modal-body" style="background:<?php echo $color; ?>">								
<div class="anble1">		
<p style="color: #041b59;text-align: left;">
<?php echo $category_name[0]['cat_name']." "; ?>Psychologists :</p></div>		
<ul class="modaldoctor"><?php for($i=0; $i<$total_li; $i++){ ?>	
<li class="ddayed"><div class="howit">	    
<?php 
if($i==0){      $min_limit=$i; $max_limit=$min_limit+20; }	           
else if($i==1){ $min_limit=20; $max_limit=20; } 
else if($i==2){ $min_limit=40; $max_limit=20; }
else if($i==3){ $min_limit=60; $max_limit=20; }
else if($i==4){ $min_limit=80; $max_limit=20;  }	    	    
else if($i==5){ $min_limit=100; $max_limit=20;  }
$subcat1 = limit_wise_subcat2($min_limit,$max_limit,$category_id);   
if(!empty($subcat1)){	
foreach($subcat1 as $sub){ $subcat_name1 = str_replace(" ","-",$sub->subcat_name); ?>         
<a href="<?php echo base_url().$category_name[0]['cat_name']."/".$subcat_name1; ?>">			
<?php echo $sub->subcat_name; ?> </a> <br><?php } } ?>										
</div></li><?php } ?>	
</ul>	
<div class="anbles"><p><a	href="<?php echo base_url(); ?>Home/General"style="color: #fd4834;">click here if you are not able to find your speciality</a></p>		
</div>
</div>
</div>
</div>
</div>
<div class="modal mod_9" id="9" role="dialog">
<?php $category_id = '9';	  
$subcat_row = total_subcat($category_id);	  
$category_name = cat_name($category_id);	  
$total_li = $subcat_row/20;	   
$total_li = ceil($total_li);	   
$min_limit = '';	$max_limit  = '';	
if($category_id =='9'){$color1 = "#814400"; $color = "#FFE1C1";	}	?>				   
<div class="modal-dialog">						<!-- Modal content-->						
<div class="modal-content">							
<div class="modal-header" style="color:white;background-color:<?php echo $color1; ?>; font-size:11px;">						<button type="button" class="close" data-dismiss="modal">&times;</button>					
<h4 class="modal-title" style=""><span> </span>&nbsp;<?php echo $category_name[0]['cat_name']; ?>&nbsp;Advicers </h4></div>							
<div class="modal-body" style="background:<?php echo $color; ?>">								
<div class="anble1">		
<p style="color: #041b59;text-align: left;">
<?php echo $category_name[0]['cat_name']; ?>Advicers :</p></div>		
<ul class="modaldoctor"><?php for($i=0; $i<$total_li; $i++){ ?>	
<li class="ddayed"><div class="howit">	    
<?php 
if($i==0){      $min_limit=$i; $max_limit=$min_limit+20; }	           
else if($i==1){ $min_limit=20; $max_limit=20; } 
else if($i==2){ $min_limit=40; $max_limit=20; }
else if($i==3){ $min_limit=60; $max_limit=20; }
else if($i==4){ $min_limit=80; $max_limit=20;  }	    	    
else if($i==5){ $min_limit=100; $max_limit=20;  }
$subcat1 = limit_wise_subcat2($min_limit,$max_limit,$category_id);	    
if(!empty($subcat1)){	
foreach($subcat1 as $sub){ $subcat_name1 = str_replace(" ","-",$sub->subcat_name); ?>         
<a href="<?php echo base_url().$category_name[0]['cat_name']."/".$subcat_name1; ?>">			
<?php echo $sub->subcat_name; ?> </a> <br><?php } } ?>										
</div></li><?php } ?>	
</ul>	
<div class="anbles"><p><a	href="<?php echo base_url(); ?>Home/General"style="color: #fd4834;">click here if you are not able to find your speciality</a></p>	
</div>
</div>
</div>
</div>
</div>
</div>
</section>

</div>
</div>
</div>
</section>