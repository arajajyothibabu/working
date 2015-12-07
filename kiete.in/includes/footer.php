<div class="footer container-fluid">
    	<p>&copy; 2015 <a class="btn-link" href="http://www.aascar.in">AASCAR Solutions.</a> All Rights Reserved <span class="terms"><a href="" class="btn-link">About Us</a> <a href="" class="btn-link">Contact Us</a> <a class="btn-link">Terms & Policy</a></span></p>
</div>
</body>
<script>
function progress(){
for(i=0;i<100;i++)
for(j=0;j<10000000;j++)
	if(j==1)
		document.getElementById("progress-status").style.width = i+"%";
document.getElementById("progress").style.display = "none";
}
$("#like").click(function(e) {
    progress();
});
</script>
<script>
$(document).ready(function(){
    $("#more").click(function(){
        $(this).button('loading');
    });   
});
//login modal
$(document).ready(function(){
    $("#login").click(function(){
        $("#myModal").modal();
    });
});
</script>
</html>
<?php
	// 5. Close connection
	if(isset($connection)){
	mysql_close($connection);
	}
?>