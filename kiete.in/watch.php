<?php
require_once 'includes/connection.php';
$message = '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>No Video Found...</strong><br>Sorry for the Inconvinience...</div>';

if(isset($_GET['url']))
{
	$query = mysql_query("select * from watch where url='{$_GET[url]}'");
	if($query)
	{
		$queryResult = mysql_fecth_array($query);
		if($queryResult)
		{
			$count = $queryResult['views'] + 1;
			$increasingViewCount = mysql_query("UPDATE watch set views = '{$count}' where url = '{$_GET['url']}'");
			echo '
			<div class="heading">
				<h2 align="center" id="video-title">'.$queryResult['title'].'</h2>
			</div>
			<div id="watch" class="watch">
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10">
						<iframe src="https://www.youtube.com/watch?v='.$queryResult['url'].'" scrolling="no" height="380" width="100%" title="" class="center-block"></iframe>
						<!-- Socila icons -->
						<div class="social">
							<p><span class="views">'.$count.' Views</span><span class="likebox"><span class="like" id="like"><i class="fa fa-thumbs-up"></i></span> <span id="likes">'.$queryResult['likes'].'</span> <span class="unlike"><i class="fa fa-thumbs-down"></i> </span> <span id="unlikes">'.$queryResult['unlikes'].'</span> </span></p>
						</div>
					</div>
					<div class="col-lg-1"></div>
				</div>
			</div>
			';
			}
		else
			echo $message;
		}
	else
		echo $message;
	}
else
 echo $message; 
?>