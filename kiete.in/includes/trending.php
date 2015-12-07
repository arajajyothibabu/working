<?php
//require_once 'includes/connection.php';
$trends = '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Fetching your knowledge..!</strong><br>It may take us a while to keep your stuff...</div>';

	$query = mysql_query("select * from watch group by views order by views DESC") or die(mysql_error());
	if($query)
	{
		while($queryResult = mysql_fetch_array($query))
		{
			$entered = 1;
			echo '
				<div class="well alert-info btn-link">
					<a href="'.$queryResult['url'].'"><strong>'.$branchQueryResult['title'].'</strong> '.$branchQueryResult['views'].' </a>
				</div>                         
			';
		}
		if(!isset($entered))
			echo $trends;
	}
	else
		echo $trends;
?>