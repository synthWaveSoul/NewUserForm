var preJsonData;

function readFile() {
    var selected = document.getElementById('idInputSelectFile').files[0];

    var reader = new FileReader();
    reader.addEventListener('loadend', function() {
        preJsonData = reader.result;
        var jsonData = JSON.parse(preJsonData)

        document.getElementById('authorName').innerHTML = jsonData.authorName;
        document.getElementById('authorTitle').innerHTML = jsonData.authorTitle;
        document.getElementById('formDate').innerHTML = jsonData.formDate;
        document.getElementById('formTime').innerHTML = jsonData.formTime;
        document.getElementById('name').innerHTML = jsonData.name;
        document.getElementById('surname').innerHTML = jsonData.surname;
        document.getElementById('department').innerHTML = jsonData.department;
        document.getElementById('jobTitle').innerHTML = jsonData.jobTitle;
        document.getElementById('reportingTo').innerHTML = jsonData.ReportTo;
        document.getElementById('startDate').innerHTML = jsonData.startDate;
        document.getElementById('laptop').innerHTML = yesNo(jsonData.laptop);
        document.getElementById('pc').innerHTML = yesNo(jsonData.pc);
        document.getElementById('monitor').innerHTML = yesNo(jsonData.monitor);
        document.getElementById('dockingStation').innerHTML = yesNo(jsonData.dockingStation);
        document.getElementById('mobile').innerHTML = yesNo(jsonData.mobile);
        document.getElementById('otherEquip').innerHTML = replaceN(jsonData.otherEquip);
        document.getElementById('landlineNumber').innerHTML = yesNo(jsonData.landlineNumber);
        document.getElementById('cctv').innerHTML = yesNo(jsonData.cctv);
        document.getElementById('Software_1').innerHTML = yesNo(jsonData.Software_1);
        document.getElementById('Software_2').innerHTML = yesNo(jsonData.Software_2);
        document.getElementById('office').innerHTML = yesNo(jsonData.office);
        document.getElementById('Software_3').innerHTML = yesNo(jsonData.Software_3);
        document.getElementById('sharepoint').innerHTML = yesNo(jsonData.sharepoint);
        document.getElementById('sharepointDetails').innerHTML = replaceN(jsonData.sharepointDetails);
        document.getElementById('gNDrive').innerHTML = yesNo(jsonData.gNDrive);
        document.getElementById('gNDriveDetails').innerHTML = replaceN(jsonData.gNDriveDetails);
        document.getElementById('otherSoftware').innerHTML = replaceN(jsonData.otherSoftware);
        document.getElementById('otherInfo').innerHTML = replaceN(jsonData.otherInfo);
    });
    reader.readAsText(selected);
}

function yesNo(a) {
    if (a == true) {
        return "YES";
    }else if (a == false) {
        return "NO";
    }
}

function replaceN(n) {
    var newLine = n.replace(/\n/g, "<br>");
    return newLine;
}

var previouslyCoped = "toClearColor";

function copy(c) {
    var copyText = document.getElementById(c).innerHTML;
    navigator.clipboard.writeText(copyText);

    document.getElementById(c).style.backgroundColor = 'green';

    if (document.getElementById(previouslyCoped).style.backgroundColor == 'green') {
        document.getElementById(previouslyCoped).style.backgroundColor = 'transparent';
        previouslyCoped = c;
    }else{
        previouslyCoped = c;
    }
}