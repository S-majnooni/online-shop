let time = 70000;
function settime(){
    if (time == 0) return;
    let h = Math.floor(time/3600);
    let m = Math.floor((time%3600)/60);
    let s = (time%3600) %60;
    document.querySelector("#hour").innerHTML = s;
    document.querySelector("#minute").innerHTML = m;
    document.querySelector("#secound").innerHTML = h;
}

setInterval(() => {
    time -= 1;
    settime();
}, 1000);