<?php
require_once 'connection.php';
require_once 'session.php';
?>
<meta name="description" content="A standard approach to gain the domain knowledge through virtual visit to practicality for students and knowledge seekers. KIETE - gain Knowledge through Innovation and Exploration by learning new Technologies with great Enthusiasm." />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="kiete, knowledge, student, engineering, medicine, computer, educations, internet, online, video, videos, practical, wisdom, college, graduate, graduation, free" />
<link rel="stylesheet" href="http://localhost:8080/kiete.in/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="http://localhost:8080/kiete.in/css/custom.css" type="text/css" />
<link rel="stylesheet" href="http://localhost:8080/kiete.in/css/font-awesome.css" type="text/css" />
<script src="http://localhost:8080/kiete.in/js/jquery.js" type="text/javascript"></script>
<script src="http://localhost:8080/kiete.in/js/bootstrap.js" type="text/javascript"></script>
<script src="http://localhost:8080/kiete.in/js/custom.js" type="text/javascript"></script>
<style>
</style>
</head>
<body>
<div class="container-fluid">
	<div class="page-header row">
    	<div class="col-lg-2">
        	<span class="logo"><a href="http://www.kiete.in"><img src="http://localhost:8080/kiete.in/img/kietelogo.png" title="KIETE - Fly Towards Wisdom" /></a></span>
        </div>
        <div class="col-lg-6">
        	<h1 align="right" class="title visible-lg">Fly Towards Wisdom</h1>
        </div>
        <div class="col-lg-4">
        <?php
			if(isset($_SESSION['user']))
				echo '<span class="dropdown account">
                <span href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> '.$_SESSION['user'].'<b class="caret"></b></span>
                <ul class="dropdown-menu">
					<li>
                        <a href=""><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </span>';
			else
				echo '<span class="fa fa-sign-in fa-2x account" id="login" title="Sign In"></span>';
				 
		?>
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
            
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 style="color:white;"><span class="fa fa-lock"></span> Login</h4>
                    </div>
                    <div class="modal-body">
                    	<div class="row">
                            <div class="col-md-3"></div>
                                <div class="col-md-6">
                                      <form role="form" action="" method="post">
                                        <div class="form-group">
                                          <label for="username"><span class="fa fa-user"></span> Username</label>
                                          <input type="text" class="form-control" id="username" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                          <label for="password"><span class="fa fa-eye-slash"></span> Password</label>
                                          <input type="password" class="form-control" id="password" placeholder="Enter password">
                                        </div>
                                        <div class="checkbox">
                                          <label><input type="checkbox" value="" checked>Remember me</label>
                                        </div>
                                        <button type="submit" style="color:white; background-color:#C39;" class="btn btn-default btn-block"><span class="fa fa-sign-in"></span> Login</button>
                                      </form>
                            	</div>
                        	<div class="col-md-3"></div>
                           </div>
                    	</div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-default btn-info pull-left" data-dismiss="modal"><span class="fa fa-remove"></span> Cancel</button>
                      <p>Not a member? <a href="#">Sign Up</a></p>
                      <p>Forgot <a href="#">Password?</a></p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- progress bar -->
    <div class="progress" id="progress" style="height:4px; display:none;">
        <div id="progress-status" class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="height:4px;">
        </div>
    </div>


