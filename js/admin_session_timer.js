//SESSION TIMEOUT JAVASCRIPT
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
    window.location.href="AdminLogout.php?error=timeout";
}

function goActive() { //when user is active
    startTimer();
}
