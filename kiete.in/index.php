<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kiete | Fly Towards Wisdom</title>
<?php include 'includes/header.php'; ?>
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
								include 'includes/menu.php';
							?>
                            </div>
                        </div>
                    </div>
                    <!-- Main Page Content -->
                    <div class="col-md-9 mainpage">
                        <div id="content" class="content">
                        	<?php include 'includes/trending.php' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>