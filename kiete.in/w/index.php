<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kiete | Fly Towards Wisdom</title>
<?php include '../includes/header.php'; ?>
    <!-- Main Page -->
    <div class="row">
    	<div class="col-md-12">
        	<div class="page">
                <div class="row">
                    <div class="col-lg-3">
                    <!-- Side Navigation -->
                        <div class="side-nav">
                        	<h3>Knowledge Streams</h3>
                            <div class="panel-group" id="accordion">
                            	<div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1">Mechanical Engineering</a>
                                      </h4>
                                    </div>
                                    <div id="collapse-1" class="panel-collapse collapse">
                                      <div class="panel-body">
                                            <ul>
                                                <li>Fluid Dynamics</li>
                                                <li>Mechanics</li>
                                                <li>Direct Injection</li>
                                                <li>Indirect Injection</li>
                                            </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse0">Civil Engineering</a>
                                      </h4>
                                    </div>
                                    <div id="collapse0" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li>Sugar Manufacturing</li>
                                                <li>Steel Manufacture</li>
                                                <li>Gas Welding</li>
                                                <li>Cross Sections</li>
                                            </ul>
                                        </div>
                                    </div>
                                  </div>
                            <?php
								include '../includes/menu.php';
							?>
                            </div>
                        </div>
                    </div>
                    <!-- Main Page Content -->
                    <div class="col-md-9 mainpage">
                        <div id="content" class="content">
                        <?php
             							
                            if(isset($_GET['url']))
                            {
                                $query = mysql_query("select * from watch where url='{$_GET['url']}'");
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
                                        include '../includes/default.php';
                                    }
                                else
                                    include '../includes/default.php';
                                }
                            else
                             	include '../includes/default.php';
                            ?>
                            <!--<div class="heading">
                                <h2 align="center" id="video-title">Some Video</h2>
                            </div>
                            <div id="watch" class="watch">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-10">
                                        <iframe src="img/main.jpg" scrolling="no" height="380" width="100%" title="" class="center-block"></iframe>
                                        <!-- Socila icons 
                                        <div class="social">
                                            <p><span class="views">2124 Views</span><span class="likebox"><span class="like" id="like"><i class="fa fa-thumbs-up"></i></span> 2436 <span class="unlike"><i class="fa fa-thumbs-down"></i> </span> 23 </span></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>
                            </div>-->
                        </div>
                        <div id="suggestions">
                        	<div class="suggestions">
                            	<h3>Recommended for you</h3>
                            	<!--<div onclick="watch(url)" class="well alert-info btn-link">
                                    <a><strong>Cloud Computing</strong> Computers connected to Cloud or Internet</a>
                                </div>
                                <div onclick="watch(url)" class="well alert-info btn-link">
                                    <a><strong>Cloud Computing</strong> Computers connected to Cloud or Internet</a>
                                </div>-->
                            <?php
                                $suggestion = '<div class="alert alert-danger">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Fetching your knowledge..!</strong><br>It may take us a while to keep your stuff...</div>';
								
								if(isset($_GET['url']))
								{
									$branchQuery = mysql_query("select * from watch where branch = (select branch from watch where url='{$_GET['url']}') group by views order by views DESC") or die(mysql_error());
									if($branchQuery)
									{
										while($branchQueryResult = mysql_fetch_array($branchQuery))
										{
											$entered = 1;
											echo '
												<div class="well alert-info btn-link">
													<a href="watch.php?url='.$branchQueryResult['url'].'"><strong>'.$branchQueryResult['title'].'</strong> '.$branchQueryResult['views'].' </a>
												</div>                         
											';
										}
										if(!isset($entered))
											echo $suggestion;
									}
									else
										echo $suggestion;
								}
								else
									echo $suggestion;
							?>
								<h4 id="more" class="btn-link" align="center">More Knowledge</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="">
<input type="hidden" name="user" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']; ?>" />
<input type="hidden" name="url" value="<?php if(isset($_GET['url'])) echo $_GET['url']; ?>" />
</form>
<script>
var user = document.marker.user.value;
var url = document.marker.url.value;
function mark()
{
	if(user == "")
		{
			document.getElementById("loginalert").innerHTML = "Username or password is invalid";
			return;
		}
		else
		{	
			var http = new XMLHttpRequest();
			http.onreadystatechange = function(){
				if(http.readyState == 4 && http.status == 200)
				{
					if(http.responseText != "")
						document.getElementById("likebox").innerHTML = http.responseText;
				}
			}
			http.open("GET","mark.php?url="+ url,true);
			http.send();
		}		
}
</script>
<?php include '../includes/footer.php'; ?>