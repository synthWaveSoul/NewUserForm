function submitLogin() {
    if (document.getElementById('idLogin').value == "" || document.getElementById('idPass').value == "") {
        Swal.fire({
            icon: 'error',
            title: 'Please enter login and password',
          })
    }else{
        document.getElementById('form').submit();
    }
}

function dateTime() {
    var date = new Date();
    var y = date.getFullYear();
    var m = date.getMonth();
    if (m<10) m = "0"+m;
    var d = date.getDate();
    if (d<10) d = "0"+d;

    var nowDate = d+"/"+m+"/"+y;

    document.getElementById('idDate').value = nowDate;

    clock();
}

function clock() {
    var time = new Date();
    var h = time.getHours();
    if (h<10) h = "0"+h;
    var m = time.getMinutes();
    if (m<10) m = "0"+m;
    var s = time.getSeconds();
    if (s<10) s = "0"+s;

    var nowTime = h+":"+m+":"+s

    document.getElementById('idTime').value = nowTime;

    setTimeout("clock()",1000);
}

function submitForm() {
    if (document.getElementById('idInputName').value == "" ||
        document.getElementById('idInputSurname').value == "" ||
        document.getElementById('idInputDepartment').value == "" ||
        document.getElementById('idInputTitle').value == "" ||
        document.getElementById('idInputReportingTo').value == "" ||
        document.getElementById('idInputStartDate').value == "") {
            Swal.fire({
                icon: 'error',
                title: 'Please fill in all fields in the "User details" section',
              });
        }else{
            if (document.getElementById('idGNDriveDetails').value === "") {
                  Swal.fire({
                    title: 'Are you sure the user is not to have access to anything on the network drives?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        submit();
                    }
                  })
            }else{
                submit();
            }
        }
}

function submit() {

    var fAuthorName = document.getElementById('idBarInputClass1').value;
    var fAuthorTitle = document.getElementById('idBarInputClass2').value;
    var fFormDate = document.getElementById('idDate').value;
    var fFormTime = document.getElementById('idTime').value;
    var fName = document.getElementById('idInputName').value;
    var fSurname = document.getElementById('idInputSurname').value;
    var fDepartment = document.getElementById('idInputDepartment').value;
    var fJobTitle = document.getElementById('idInputTitle').value;
    var fReportTo = document.getElementById('idInputReportingTo').value;
    var fStartDate = document.getElementById('idInputStartDate').value;
    var flaptop = document.getElementById('idLaptop').checked;
    var fPC = document.getElementById('idDesktop').checked;
    var fMonitor = document.getElementById('idMonitor').checked;
    var fMobile = document.getElementById('idMobilePhone').checked;
    var fsim = document.getElementById('idSim').checked;
    var fEquipOther = document.getElementById('idInputEquipmentOther').value;
    var fLandlineNumber = document.getElementById('idCheckboxLandline').checked;
    var fCctv = document.getElementById('idCctvCheckbox').checked;
    var fSoftware_1 = document.getElementById('idCheckboxSoftware_1').checked;
    var fSoftware_2 = document.getElementById('idCheckboxSoftware_2').checked;
    var fOffice = document.getElementById('idCheckboxOffice').checked;
    var fSoftware_3 = document.getElementById('idCheckboxSoftware_3').checked;
    var fSharepoint = document.getElementById('idSharepointCheckbox').checked;
    var fSharepointDetails = document.getElementById('idInputSharepointDetails').value;
    var fGNDrive = document.getElementById('idGNDriveCheckbox').checked;
    var fGNDriveDetails = document.getElementById('idGNDriveDetails').value;
    var fOtherSoftware = document.getElementById('idOtherSoftware').value;
    var fMailGroup = document.getElementById('idMailGroups').value;
    var fOtherInfo = document.getElementById('idOtherInfo').value;

    var newUserData = {
        "authorName" : fAuthorName,
        "authorTitle" : fAuthorTitle,
        "formDate" : fFormDate,
        "formTime" : fFormTime,
        "name" : fName,
        "surname" : fSurname,
        "department" : fDepartment,
        "jobTitle" : fJobTitle,
        "ReportTo" : fReportTo,
        "startDate" : fStartDate,
        "laptop" : flaptop,
        "pc" : fPC,
        "monitor" : fMonitor,
        "mobile" : fMobile,
        "sim" : fsim,
        "otherEquip" : fEquipOther,
        "landlineNumber" : fLandlineNumber,
        "cctv" : fCctv,
        "Software_1" : fSoftware_1,
        "Software_2" : fSoftware_2,
        "office" : fOffice,
        "Software_3" : fSoftware_3,
        "sharepoint" : fSharepoint,
        "sharepointDetails" : fSharepointDetails,
        "gNDrive" : fGNDrive,
        "gNDriveDetails" : fGNDriveDetails,
        "otherSoftware" : fOtherSoftware,
        "mailGroup" : fMailGroup,
        "otherInfo" : fOtherInfo
    }

    var nameSafe = fName.replace(/[^0-9a-z]/gi, '');
    var surnameSafe = fSurname.replace(/[^0-9a-z]/gi, '');

    var newUserName = nameSafe + " " + surnameSafe;

    var jsonNewUserData = JSON.stringify(newUserData, null, 2);

    var blob = new Blob([jsonNewUserData], {type: "text/plain;charset=utf-8"});
    saveAs(blob, "New user details - " + newUserName + ".json");

    showOK(newUserName);
}

function showOK(name) {
    Swal.fire({
        icon: 'success',
        title: 'Form successfully filled in ',
        text: 'The form has generated and saved a file called "New user details - ' + name + '" on your computer. Now please make a ticket and attach the generated file to it'
      });
}

function important() {
    ///////////////
    //not in use
    ///////////////
    //red exclamation mark visible after page load
    document.getElementById('idToAutoHover').style.visibility = 'visible';
    document.getElementById('idToAutoHover').style.opacity = '1';
    //and disappears after 3s
    setTimeout(() => {
        document.getElementById('idToAutoHover').style.removeProperty('visibility');
        document.getElementById('idToAutoHover').style.removeProperty('opacity');
    }, 3000);
}

var areYouSure = '<div style="font-size:70px; margin:30px">Are you really sure you understand this correctly?</div> <input type="button" value="Let me read it again" onclick="goBackPopup();"> <input type="button" value="YES" onclick="colsePopupSure();">'

var areYouSureBack = '<span style="font-weight: bold; letter-spacing: 2px; color: red;">Please ensure spelling name at new user is correct !!!</span><br><br>If the error in the name is discovered after the account has been created, a new account will have to be created again, the configuration of the laptop will have to be set up from scratch and the user will lose everything he/she had in the system before (this includes for example  all Teams history and meetings).<br><br>This also applies if the first name is swapped with the surname<input type="button" id="buttonClosePopup" value="I have understood that" onclick="colsePopup();">';

function goBackPopup() {
    document.getElementById('idStartPopup').innerHTML = areYouSureBack;
}

function colsePopup() {
    document.getElementById('idStartPopup').innerHTML = areYouSure;
}

function colsePopupSure() {
    document.getElementById('idStartPopup').style.backgroundColor = "#40740b";
    document.getElementById('idStartPopup').style.animation = "none";
    document.getElementById('idStartPopup').style.border = "solid 9px #264607";

    var x = Math.floor((Math.random() * 6) + 1);

    var y = "OK";

    if (x===1){
        y="Thank you :)";
    }else if (x===2){
        y="Challenge accepted";
    }else if (x===3){
        y="I really am";
    }else if (x===4){
        y="I really am";
    }else if (x===5){
        y="You won't be disappointed";
    }else if (x===6){
        y="OK";
    }

    var areYouSureVery = '<div class="gif"><img src="'+x+'.gif" /></div> <input type="button" value="'+y+'" onclick="colsePopupVerySure();">';

    document.getElementById('idStartPopup').innerHTML = areYouSureVery;
}

function colsePopupVerySure() {
    document.getElementById('idStartPopup').style.visibility = "hidden";
}

var timeLeft = 5;

function goActiveClosePopupButton() {
    const countingTimeout = setTimeout(countingDown, 1000);    
}

function countingDown() {
    if (timeLeft > 1) {
        timeLeft = timeLeft -1;
        document.getElementById('buttonClosePopup').value = "I have understood that   ("+ timeLeft +")";
        goActiveClosePopupButton();
    }else{
        document.getElementById('buttonClosePopup').value = "I have understood that";
        document.getElementById('buttonClosePopup').disabled = false;
    }
}