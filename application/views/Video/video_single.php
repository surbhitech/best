<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Untitled Document</title>
<style>
.videoWrapper {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
	max-width:80%;
	margin:0 auto;
}
.videoWrapper iframe {
	position: absolute;
	top: 6;
	left: 0;
	width: 100%;
	height: 70%;
}
</style>

</head>

<body style="background:#000;">
<?php foreach($video_detail as $video){ ?>
<div class="videoWrapper">
    <!-- Copy & Pasted from YouTube -->
<iframe width="560" height="315" src="<?php echo $video->video_name; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<?php } ?>

</body>
</html>
