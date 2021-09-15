 <?
 include_once("../../config.php");
$url = '../images/'."_".$_FILES['upload']['name'];

$url1 = '../admin/images/'."_".$_FILES['upload']['name'];
 //extensive suitability check before doing anything with the file...
    if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
    {
		$k=1;
       $message = "No file uploaded.";
    }
    else if ($_FILES['upload']["size"] == 0)
    {
		$k=1;
       $message = "The file is of zero length.";
    }
    else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png"))
    {
		$k=1;
       $message = "The image must be in either JPG or PNG format.";
    }
    else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
    {
		$k=1;
       $message = "You may be attempting to hack our server.";
    }
    else {
		$k=0;
      $message = "";
      $move =move_uploaded_file($_FILES['upload']['tmp_name'], $url);
 	  
		$move1 =move_uploaded_file($_FILES['upload']['tmp_name'], $url1);  
	   copy('../images/'."_".$_FILES['upload']['name'],'../admin/images/'."_".$_FILES['upload']['name']);
	  
	  
      if(!$move)
      {
         $message = "Error moving uploaded file.";
      }
	  $url="./images/"."_".$_FILES['upload']['name'];
    }
	echo "<b>".$message."</b>";
 if($message=="")
 {
$funcNum = $_GET['CKEditorFuncNum'] ;
echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
 }
?>