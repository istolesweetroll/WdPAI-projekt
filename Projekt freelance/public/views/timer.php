<!doctype html>
<title>FREELANCE</title>
<link rel="stylesheet" type="text/css" href="public/css/style2.css">


<body style = "background-color: rgba(162,177,152,1);
        color:blanchedalmond;">
<?php
require_once "messages.php";
messages();
?>

<input type="hidden" name="timeTotal" >
<div id="timer" style = "        position: fixed;
        top: 0; right: 0; bottom: 0; left: 0;
        text-align: center;
        line-height: 90vh;
        font-size: 240px;
"onclick="toggleControls()"></div>

<div id="control" style=" position: fixed;
        top: 30px; left: 30px;
        opacity: 1;
        transition: 0.1s opacity;
 ">

    <button onclick="setTimer()">Set timer</button>
    <button onclick="resetTimer()">Reset</button>
    <form action = "saveEntry">
        <button onclick="save()">Save entry</button>
    </form>

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

</form>
</body>