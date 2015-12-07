// JavaScript Document

function mark()
{
	if(username.length < 6 || password.length < 6)
		{
			document.getElementById("loginalert").innerHTML = "Username or password is invalid";
			return;
		}
		else
		{	
			logintext.style.display = 'none';
			loginloader.style.display = 'block';
		}
		var http = new XMLHttpRequest();
		http.onreadystatechange = function(){
			if(http.readyState == 4 && http.status == 200)
			{
				if(http.responseText == "invalid")
				{
					document.getElementById("loginalert").innerHTML = "Username or password are incorrect";
					loginloader.style.display = 'none';
					logintext.style.display = 'block';
					}
				else
				{
					$("#login").hide(200);
					$("#chat").show(200);
					$("#logout").show(200);
					document.getElementById("user").innerHTML = username;
					document.getElementById("chatwindow").innerHTML = http.responseText;
					placeWindow();
					}
				}
		}
		http.open("GET","login.php?user="+ username + "&pass="+ password,true);
		http.send();		
}