
<!DOCTYPE html>

<head>

    <link rel="stylesheet" type="text/css" href="public/css/style2.css">
    <title>FREELANCE</title>
</head>

<body>
<?php
require_once "messages.php";
messages();

?>
<form action ="main">
    <button id="back" style = "display: block; width: 3%; position: absolute;" >↺</button>
 </form>
    <div class="container">

        <div class="logo">
            <img src="public/img/girl video calling.svg">
        </div>

        <div class="login-container">
      
             <form action="addentrymanually">

                <button>ADD NEW ENTRY MANUALLY</button>
    </form>

                <form action="starttimer">
                <button>START TIMER</button>
                
</form>

        </div>

    </div>

</body>