<?php
require_once 'includes/connection.php';
$suggestion = '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Fetching your knowledge..!</strong><br>It may take us a while to keep your stuff...</div>';

if(isset($_GET['url']))
{
	$branchQuery = mysql_query("select * from watch where branch = (select branch from watch where url='{$_GET[url]}') group by views order by views DESC ROWNUM < 11") or die(mysql_error());
	if($branchQuery)
	{
		while($branchQueryResult = mysql_fetch_array($branchQuery))
		{
			echo '
				<div onclick="watch('.$branchQueryResult['url'].')" class="well alert-info btn-link">
					<a><strong>'.$branchQueryResult['title'].'</strong> '.$branchQueryResult['views'].' </a>
				</div>                         
			';
		}
	}
	else
		echo $suggestion;
}
else
	echo $suggestion;
?>