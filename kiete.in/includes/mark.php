<?php
	require_once 'includes/connections.php';
	require_once 'includes/session.php';
	if(isset($_SESSION['user']) && $likeQuery)
	{
		$userMarkQuery = mysql_query("select * from mark where url = '{$_GET['url']}' and username = '{$_SESSION['user']}'") or die(mysql_error());
		if($userMarkQuery)
		{
			$userMark = mysql_fetch_array($userMarkQuery);
			if($userMark['marked'] == 1)
			{
				$mark = 0;
				$color = '#FF3';
			}
			else 
			{
				$mark = 1;
				$color = '#000';
			}
			$markUpdateQuery = mysql_query("UPDATE mark set marked = '$mark' where url = '{$_GET['url']}' and username = '{$_SESSION['user']}'") or die(mysql_error());
		}
		else 
		{
			$userMarkQuery = mysql_query("INSERT into mark values('','{$_SESSION['user']}','{$_GET['url']}','1'") or die(mysql_error());
			$color = '#FF3';
		}
		echo '<i class="fa fa-star" id="important" style="color:'.$color.'" title="Mark as Important"></i>';
	}
?>