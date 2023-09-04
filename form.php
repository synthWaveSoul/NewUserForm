<?php

	session_start();
	
	if (!isset($_SESSION['logged']))
	{
		header('Location: index.php');
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
    <link rel="stylesheet" href="form.css">
    <script type="text/javascript" src="main.js"></script>
	<script src="sweetalert2.all.min.js"></script>
	<script src="FileSaver.js"></script>
</head>
<body onload="dateTime();goActiveClosePopupButton();">
	<div class="bar" id="idBar">
		<div class="col" style="width:148px; position:absolute">
			<div class="welcome" id="move1">Welcome</div>
			
		</div>
		<div class="col">
			<div class="barInput" id="move2"><input type="text" name="authorName" id="idBarInputClass1" value="<?php echo $_SESSION['fullName'];?>" readonly></div>
			<div class="barInput" id="move3"><input type="text" name="authorTitle" id="idBarInputClass2" value="<?php echo $_SESSION['title'];?>" readonly></div>
		</div>
		<div class="col">
			<div class="barInput" id="move4"><input type="text" name="date" id="idDate" readonly></div>
			<div class="barInput" id="move5"><input type="text" name="time" id="idTime" readonly></div>
		</div>
		<div class="logoutButton">
			<input type="button" id="idLogoutButton" value="Logout" onclick="location.href = 'logout.php';">
		</div>
	</div>

	<div class="startPopup" id="idStartPopup">
		<span style="font-weight: bold; letter-spacing: 2px; color: red;">Please ensure spelling name at new user is correct !!!</span><br><br>
		If the error in the name is discovered after the account has been created, a new account will have to be created again, the configuration of the laptop will have to be set up from scratch and the user will lose everything he/she had in the system before (this includes for example  all Teams history and meetings).
		<br><br>
		This also applies if the first name is swapped with the surname
		<input type="button" id="buttonClosePopup" value="I have understood that   (5)" onclick="colsePopup();" disabled>
	</div>

	<header style="margin-bottom: 50px; background: radial-gradient(circle, rgb(69, 100, 110) 0%, rgb(77, 104, 113) 100%);">
		<h1>New user form</h1>
		<h3>Please fill in the form below correctly, it will help to prepare a workstation for a new employee efficiently and without delay</h3>
	</header>
	<main>

		<div class="userDetails">
			<p>User details</p>
			<div class="center">
				<div class="col">
					<div class="oneInput" id="idName">

							<div style="float: left; margin-left: 98px;">Name</div>
							<div class="imgCaution">
								<div class="btn btn-primary tooltip">
										<div class="tooltipTextAppearanceIcon"><img src="caution.png"></div>
									<div class="top" id="idToAutoHover" style="width: 550px;">
										<div class="textContenet" style="border-radius: 8px 8px 8px 8px; background-color:#191919;">
										<span style="font-weight: bold; letter-spacing: 2px; color: red;">Please ensure spelling is correct !!!</span><br><br>
										If the error in the name is discovered after the account has been created, a new account will have to be created again, the configuration of the laptop will have to be set up from scratch and the user will lose everything he/she had in the system before (this includes for example  all Teams history and meetings).
										<br><br>
										This also applies if the first name is swapped with the surname
										</div>
										<i></i>
									</div>
								</div>
							</div>
						<br>
						<input type="text" id="idInputName" name="name" onfocus="focusFunction('idName')" onfocusout="outFocusFunction('idName')">
					</div>
					<div class="oneInput" id="idSurname">
					<div style="float: left; margin-left: 93px;">Surname</div>
							<div class="imgCaution">
								<div class="btn btn-primary tooltip">
										<div class="tooltipTextAppearanceIcon"><img src="caution.png"></div>
									<div class="top" style="width: 550px;">
										<div class="textContenet" style="border-radius: 8px 8px 8px 8px; background-color:#191919;">
										<span style="font-weight: bold; letter-spacing: 2px; color: red;">Please ensure spelling is correct !!!</span><br><br>
										If the error in the name is discovered after the account has been created, a new account will have to be created again, the configuration of the laptop will have to be set up from scratch and the user will lose everything he/she had in the system before (this includes for example  all Teams history and meetings).
										<br><br>
										This also applies if the first name is swapped with the surname
										</div>
										<i></i>
									</div>
								</div>
							</div>
						<br>
						<input type="text" id="idInputSurname" name="surname" onfocus="focusFunction('idSurname')" onfocusout="outFocusFunction('idSurname')">
					</div>
					<div class="oneInput" id="idDepartment">
						Department <br>
						<input type="text" name="department" id="idInputDepartment" onfocus="focusFunction('idDepartment')" onfocusout="outFocusFunction('idDepartment')">
					</div>
				</div>
				<div class="col">
					<div class="oneInput" id="idJobTitle">
						Job Title <br>
						<input type="text" name="jobTitle" id="idInputTitle" onfocus="focusFunction('idJobTitle')" onfocusout="outFocusFunction('idJobTitle')">
					</div>
					<div class="oneInput" id="idReporting">
						Reporting to <br>
						<input type="text" name="reportingTo" id="idInputReportingTo" onfocus="focusFunction('idReporting')" onfocusout="outFocusFunction('idReporting')">
					</div>
					<div class="oneInput" id="idUserStartDate">
						User Start Date <br>
						<input type="text" name="startDate" id="idInputStartDate" onfocus="focusFunction('idUserStartDate')" onfocusout="outFocusFunction('idUserStartDate')">
					</div>
				</div>
			</div>
		</div>

		<div class="hardReq">
			<p>Equipment required</p>
			<div class="checkBox">
					<div class="onlyOne">
						<label class="container">Laptop<input type="radio" id="idLaptop" name="lapOrPc"><span class="checkmark"></span></label>
						<label class="container">Desktop<input type="radio" id="idDesktop" name="lapOrPc"><span class="checkmark"></span></label>
					</div>
					<div class="multiple">
						<label class="container2">Monitor<input type="checkbox" id="idMonitor" name="monitor"><span class="checkmark2"></span></label>
						<label class="container2">Mobile phone<input type="checkbox" id="idMobilePhone" name="mobilePhone" onclick="showDetailsSim();"><span class="checkmark2"></span></label>
						<div id="idDivSim" style="padding: 0; height: 0px;">
							<label class="container2">Check this if the user is also to have a SIM card and the ability to make calls. Otherwise the phone will only be usable on site for Outlook and Teams<input type="checkbox" id="idSim" name="sim"><span class="checkmark2"></span></label>
						</div>
					</div>
				<div class="other" id="idEquipmentOther">
					<span style="font-weight: 550;">Other</span><br>
					<span style="color:white;">(e.g. external two monitors, special hardware requirements ...)</span><br>
					<textarea name="otherEquipment" id="idInputEquipmentOther" onfocus="focusFunction('idEquipmentOther')" onfocusout="outFocusFunction('idEquipmentOther')"></textarea>
				</div>
			</div>
		</div>

		<div class="misc">
			<p>Miscellaneous</p>
			<div class="landNum">
				<label class="container2">Landline number<input type="checkbox" id="idCheckboxLandline" name="landline"><span class="checkmark2"></span></label>
				<div class="detailText">
					Please note that a physical phone will not be provided<br>
					Jabber application will be installed on user laptop/desktop and mobile phone to operate the internal phone number
				</div>
			</div>
			<div class="cctv" id="idCctvDiv">
				<label class="container2">CCTV<input type="checkbox" name="cctv" id="idCctvCheckbox" onclick="showDetails();"><span class="checkmark2"></span></label>
				<div class="detailText" id="idCctvDetails">
					To get access to CCTV, you need to send an email to important person with a copy to IT, with a request to approve access<br>
					Please also specify which cameras you require access to
				</div>
			</div>
		</div>

		<div class="software">
			<p>Software</p>
					<div class="multiple" style="margin-left: 40px; margin-right: 40px;">
						<label class="container2">Software_1<input type="checkbox" id="idCheckboxSoftware_1" name="Software_1"><span class="checkmark2"></span></label>
						<label class="container2">Software_2<input type="checkbox" id="idCheckboxSoftware_2" name="Software_2"><span class="checkmark2"></span></label>
						<label class="container2">Office (including Outlook and Teams)<input type="checkbox" id="idCheckboxOffice" name="office"><span class="checkmark2"></span></label>
						<label class="container2">Software_3<input type="checkbox" id="idCheckboxSoftware_3" name="Software_3"><span class="checkmark2"></span></label>
						<label class="container2">Sharepoint files<input type="checkbox" name="Sharepoint" id="idSharepointCheckbox" onclick="showDetailsSharepoint();"><span class="checkmark2"></span></label>
						<div class="otherSharepoint" id="idSharepointDetails">
							Please specify exactly which files on Sharepoint need to be accessed<br>
							<textarea id="idInputSharepointDetails" name="otherSharepoint" onfocus="focusFunction('idSharepointDetails')" onfocusout="outFocusFunction('idSharepointDetails')"></textarea>
						</div>
						<label class="container2" style="margin-top: 0;">G / N drive files<input type="checkbox" name="gDrive" id="idGNDriveCheckbox" onclick="showTextareaFilePath()"><span class="checkmark2"></span></label>
						<div class="filePaths" id="idFilePaths">
							Please specify the full path to each file one below the other
							<div class="btn btn-primary tooltip"> <div class="tooltipTextAppearance"><span style="border-bottom: dotted 2px;display: inline-block; line-height: 17px;">see details</span></div>
								<div class="top" id="idToAutoHoverDrives">
									<div class="textContenet">
										The path to the file should look exactly like the following<br>
										G:\folder\name
									</div>
									<img src="path.png" />
									<i></i>
								</div>
							</div>
							<br>
							<textarea id="idGNDriveDetails" name="otherGDrive" style="height: 300px; margin-bottom: 17px" onfocus="focusFunction('idFilePaths')" onfocusout="outFocusFunction('idFilePaths')"></textarea>
						</div>
					</div>
					<div class="other" id="idSoftwareOther">
						<span style="font-weight: 550;">Other software required</span>
						<textarea id="idOtherSoftware" name="otherSoftware" onfocus="focusFunction('idSoftwareOther')" onfocusout="outFocusFunction('idSoftwareOther')"></textarea>
					</div>
		</div>

		<div class="otherInfo">
			<p>Email groups</p>
			Please list below all the mailing groups to which the new user has to be assigned
			<div class="other" style="border: none;">
				<textarea id="idMailGroups" name="mailGroups" style="margin: 0;"></textarea>
			</div>
		</div>

		<div class="otherInfo">
			<p>Other information</p>
			<div class="other" style="border: none;">
				<textarea id="idOtherInfo" name="otherGeneral" style="margin: 0;"></textarea>
			</div>
		</div>

		<div class="submitClass">
			<div class="submitButton">
				<input type="button" value="submit" onclick="submitForm();">
			</div>
		</div>

	</main>

	<script>
		var scrolled = document.getElementById("idBar");
		var move3 = document.getElementById('move3');
		var move4 = document.getElementById('move4');
		var move5 = document.getElementById('move5');
		var button = document.getElementById('idLogoutButton');

		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
				scrolled.style.borderRadius = "0 0 40px 40px";
				scrolled.style.boxShadow = "0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0)";
				scrolled.style.height = "41px";
				move3.style.left = "400px";
				move3.style.top = "0px";
				move4.style.left = "650px";
				move5.style.left = "900px";
				move5.style.top = "0px";
				button.style.height = "36px";
				button.style.borderRadius = "40px 0 77px 40px";
			}else{
				scrolled.style.borderRadius = "40px";
				scrolled.style.boxShadow = "none";
				scrolled.style.height = "90px";
				move3.style.left = "150px";
				move3.style.top = "36px";
				move4.style.left = "400px";
				move5.style.left = "400px";
				move5.style.top = "36px";
				button.style.height = "86px";
				button.style.borderRadius = "40px";
			}
		}
	</script>

	<script type="text/javascript" src="main.js"></script>
	<script type="text/javascript" src="activeInput.js"></script>
</body>
</html>