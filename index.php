<?php

	session_start();
	
	if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
	{
		header('Location: form.php');
		exit();
	}

	
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>New user form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <script type="text/javascript" src="main.js"></script>
	<script src="sweetalert2.all.min.js"></script>
</head>
<body>
    <div class="login-div"></div>
	<div class="rgb">
        <div class="logo"></div>
        <div class="title">New user form</div>
        <div class="fields">
            <form action="connect.php" method="POST" id="form">
            <div class="username"><svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M14.023,12.154c1.514-1.192,2.488-3.038,2.488-5.114c0-3.597-2.914-6.512-6.512-6.512
								c-3.597,0-6.512,2.916-6.512,6.512c0,2.076,0.975,3.922,2.489,5.114c-2.714,1.385-4.625,4.117-4.836,7.318h1.186
								c0.229-2.998,2.177-5.512,4.86-6.566c0.853,0.41,1.804,0.646,2.813,0.646c1.01,0,1.961-0.236,2.812-0.646
								c2.684,1.055,4.633,3.568,4.859,6.566h1.188C18.648,16.271,16.736,13.539,14.023,12.154z M10,12.367
								c-2.943,0-5.328-2.385-5.328-5.327c0-2.943,2.385-5.328,5.328-5.328c2.943,0,5.328,2.385,5.328,5.328
								C15.328,9.982,12.943,12.367,10,12.367z"></path>
						</svg><input type ="username" id="idLogin" name="username" class="user-input" placeholder="Username" /></div>
            <div class="password"><svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
						</svg><input type ="password" id="idPass" name="password" class="pass-input" placeholder="Password" /></div>
            </form>
        </div>
        <div class="err">
			<?php
				if (isset($_SESSION['error']))
				{
					echo $_SESSION['error'];
					unset ($_SESSION['error']);
				}
			?>
		</div>
        <button class="signin-button" id="btnLogin" onclick="submitLogin();">LOG IN</button>

		<div class="btn btn-primary tooltip"> <div class="tooltipTextAppearance"><div class="howTo">How to log in?</div></div>
								<div class="top" id="idToAutoHoverDrives">
									<div class="textContenet">
									Login and password are the same like for Windows<br>
									Login looks like - name.surname (dot between)
									</div>
									<i></i>
								</div>
							</div>
    
	</div>

<script>
	// After clicking the Enter key inside pass input LOG IN button will trigger
	document.getElementById('idPass').addEventListener("keypress", function(event) {
		if (event.key === "Enter") {
			event.preventDefault();
			document.getElementById('btnLogin').click();
		}
	});
</script>

</body>
</html>