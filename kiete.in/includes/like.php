<?php
	require_once 'includes/connections.php';
	require_once 'includes/session.php';
	$likeQuery = mysql_query("select * from watch where url = '{$_GET['url']}'") or die(mysql_error());
	if(isset($_SESSION['user']) && $likeQuery)
	{
		$userLikeQuery = mysql_query("select * from likes where url = '{$_GET['url']}' and username = '{$_SESSION['user']}'") or die(mysql_error());
		if($userLikeQuery)
		{
			$likeUpdateQuery = mysql_query("UPDATE likes set like = '1' where url = '{$_GET['url']}' and username = '{$_SESSION['user']}'") or die(mysql_error());
		}
		else
			$insertLikeQuery = mysql_query("INSERT into likes values('','{$_GET['url']}','{$_SESSION['user']}','1'") or die(mysql_error()) or die(mysql_error());
		//incrementing like count for video
		$like = mysql_fetch_array($likeQuery);
		$likes = $like['likes']+1;
		$likeUpdateQuery = mysql_query("UPDATE watch set likes = '{$likes}' where url = '{$_GET['url']}'") or die(mysql_error());
		
		if($likeUpdateQuery)
			echo $likes;
	}
?>