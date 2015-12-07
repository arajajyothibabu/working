<?php
require_once 'connection.php';
$i = 1;
$branchQuery = mysql_query("select * from branches") or die(mysql_error());
if($branchQuery)
{
	while($branchQueryResult = mysql_fetch_array($branchQuery))
	{
		echo '
			<div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">'.$branchQueryResult['name'].'</a>
				  </h4>
				</div>
				<div id="collapse'.$i.'" class="panel-collapse collapse">
				  <div class="panel-body">
						<ul>';
		$i += 1;
		$topicQuery = mysql_query("select * from watch where branch = '{$branchQueryResult['sno']}'") or die(mysql_error());
		if($topicQuery)
		{
			while($topicQueryResult = mysql_fetch_array($topicQuery))
			{
				echo  '<li class="btn-link"><a href="'.$topicQueryResult['url'].'">'.$topicQueryResult['title'].'</a></li>';
			}
		}
		echo '		</ul>
				  </div>
				</div>
			 </div>';
	}
}
?>