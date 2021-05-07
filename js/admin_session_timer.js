//SESSION TIMEOUT JACASCRIPT
var timeoutID;
 
function setup() {
    this.addEventListener("mousemove", resetTimer, false);
    this.addEventListener("mousedown", resetTimer, false);
    this.addEventListener("keypress", resetTimer, false);
    this.addEventListener("DOMMouseScroll", resetTimer, false);
    this.addEventListener("mousewheel", resetTimer, false);
    this.addEventListener("touchmove", resetTimer, false);
    this.addEventListener("MSPointerMove", resetTimer, false);

    startTimer();
}
setup();

function startTimer() { //starts timer
    // wait 15 minutes before calling goInactive
    timeoutID = window.setTimeout(goInactive, 15*(60*1000));
}

function resetTimer(e) { //restarts timer
    window.clearTimeout(timeoutID);
    goActive();
}

function goInactive() { //when user is inactive
    alert("SESSION TIMEOUT: You have been logged out due to inactivity.");
    window.location.href="AdminLogout.php";
}

function goActive() { //when user is active
    startTimer();
}
