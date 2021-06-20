<!doctype html>
<title>Countdown</title>
<link rel="stylesheet" type="text/css" href="public/css/style2.css">
<style>

    html, body {
        height: 100%;
        background-image: url('../img/BananaLeaf_Preview_01_fx.png');
        margin: 0;
        padding: 0;
    }
    body {
        background: transparent linear-gradient(180deg, #A2B198 0%, #A2B198 100%) 0% 0% no-repeat padding-box;
        background-image: url('public/img/come-back-later.svg');
        color: #fff;
        font: 18px Cousine, Menlo, Monaco, monospace;
    }
    #timer {
        position: fixed;
        top: 0; right: 0; bottom: 0; left: 0;
        text-align: center;
        line-height: 90vh;
        font-size: 240px;
    }
    #control {
        position: fixed;
        top: 30px; left: 30px;
        opacity: 1;
        transition: 0.1s opacity;
    }

    button {
        background: transparent linear-gradient(180deg,#829b71 0%, #829b71 100%) 0% 0% no-repeat padding-box;

        border-radius: 19px;
       border: none;
        color: white;
        line-height: 2.5em;
    }
    #back {
    display: block;
    width: 3%;
    position: absolute;
}
#back:hover {
 border: none;

 background: orange;
 box-shadow: 0px 0px 1px #777;
}
</style>

<body>
<input type="hidden" name="timeTotal" >;
<div id="timer" onclick="toggleControls()"></div>

<div id="control">

    <button onclick="setTimer()">Set timer</button>
    <button onclick="resetTimer()">Reset</button>
    <a href="saveEntry"><button onclick="save()">Save entry</button></a>
</div>
<script>


    $endTime = (+localStorage.endTime || 0)

    function setTimer() {
        $duration = +prompt('How long to set the timer (minutes)', '15')
        $endTime = localStorage.endTime = $duration * 60e3 + Date.now()
        update()
    }
    function resetTimer() {
        $endTime = 0
    }
    function save(){

    }
    function toggleControls() {
      //  document.body.classList.toggle('controls-hidden');

    }

    function update() {
        $timeLeft = ($endTime-Date.now()); // Difference in time

        if ($timeLeft < 0) {
            setText('--:--')
        } else {
            $minutes = Math.floor($timeLeft / 60e3);
            $seconds = Math.floor($timeLeft / 1e3) % 60;
            document.cookie = "timeTotal" + "=" + ($duration- $minutes - 1) + ";"
            setText(`${$minutes}:${$seconds.toString(10).padStart(2, '0')}`)
              }
    }

    function setText(text) {
        document.getElementById('timer').textContent = text
    }

    setInterval(update, 200)

</script>


<?php
setcookie("projectName",$_GET["project"], time()+3600);  /* expire in 1 hour */
setcookie("projectDescription",$_GET["description"] , time()+3600);  /* expire in 1 hour */
?>
<form action ="main">
<button id="back" >↺</button>
</form>
</body>