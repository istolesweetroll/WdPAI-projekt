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
            <img src="public/img/planting a tree.svg">
        </div>
        <div class="login-container">

                <form action="seeprojectinfo">
                <button >SEE PROJECTS INFO</button>
</form>
<form action="editproject">
                <button>EDIT PROJECT</button>
</form>
<form action="deleteproject">
                <button>DELETE PROJECT</button>
</form>
<form action ="completeproject">
                <button>MARK PROJECT AS COMPLETE</button>
</form>
        </div>
    </div>
</body>