function focusFunction(divClassName) {
    document.getElementById(divClassName).style.color = "chartreuse";
}

function outFocusFunction(divClassName) {
    document.getElementById(divClassName).style.color = "white";
}

function showDetails() {
    if (document.getElementById("idCctvCheckbox").checked == true) {
        document.getElementById("idCctvDiv").style.height = "143px";
    }else{
        document.getElementById("idCctvDiv").style.height = "50px";
    }
}

function showDetailsSim() {
    if (document.getElementById("idMobilePhone").checked == true) {
        document.getElementById("idDivSim").style.padding = "0 15px 15px 15px";
        document.getElementById("idDivSim").style.height = "99px";
    }else{
        document.getElementById("idDivSim").style.padding = "0";
        document.getElementById("idDivSim").style.height = "0";
        if (document.getElementById("idSim").checked == true) {
            document.getElementById("idSim").checked = false;
        }
    }
}

function showDetailsSharepoint() {
    if (document.getElementById("idSharepointCheckbox").checked == true) {
        document.getElementById("idSharepointDetails").style.height = "170px";
        setTimeout(() => {
            if(document.getElementById("idSharepointCheckbox").checked == true) {
                document.getElementById("idSharepointDetails").style.overflow = "visible"
            }
        }, 400);
    }else{
        document.getElementById("idSharepointDetails").style.height = "0";
        document.getElementById("idSharepointDetails").style.overflow = "hidden"
    }
}

function showTextareaFilePath() {
    if (document.getElementById("idGNDriveCheckbox").checked == true) {
        document.getElementById("idFilePaths").style.height = "360px";
        setTimeout(() => {
            if(document.getElementById("idGNDriveCheckbox").checked == true) {
                document.getElementById("idFilePaths").style.overflow = "visible"
            }
        }, 400);

        document.getElementById('idToAutoHoverDrives').style.visibility = 'visible';
        document.getElementById('idToAutoHoverDrives').style.opacity = '1';

        setTimeout(() => {
        document.getElementById('idToAutoHoverDrives').style.removeProperty('visibility');
        document.getElementById('idToAutoHoverDrives').style.removeProperty('opacity');
        }, 3000);
    }else{
        document.getElementById("idFilePaths").style.height = "0";
        document.getElementById("idFilePaths").style.overflow = "hidden"
    }
}