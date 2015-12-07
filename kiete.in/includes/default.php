<?php
$trends = '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Fetching your knowledge..!</strong><br>It may take us a while to keep your stuff...</div>';

	$query = mysql_query("select * from watch group by views order by views DESC") or die(mysql_error());
	if($query)
	{
		$queryResult = mysql_fetch_array($query);
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
								<p><span class="views">'.$count.' Views</span><span class="likebox" id="likebox">';
						$color = '#000';
						$loggedin = 'important';
						if(isset($_SESSION['user']))
						{
							$markQuery = mysql_query("select * from mark where url='{$_GET['url']}' and username = '{$_SESSION['user']}'") or die(mysql_error());
							$marked = mysql_fetch_array($markQuery);
							if($marked['marked'] == 1)
								$color = '#FF3';	
							$loggedin = 'login';
						}
						
								echo '
								<i class="fa fa-star" style="color:'.$color.'" id="'.$loggedin.'" title="Mark as Important"></i></span></p>
							</div>
						</div>
						<div class="col-lg-1"></div>
					</div>
				</div>
				';
			}
		else
	 		echo $trends;
	}
	else
		echo $trends;
?>