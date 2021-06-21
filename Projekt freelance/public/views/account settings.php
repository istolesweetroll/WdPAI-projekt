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
        
        <div class="new-project-container">
            
            <form class="new project">
                
                <input name="username" required="required" type="text" placeholder="change username">
                <input name="email" required="required"  type="email" placeholder="change email">
                <input name="password" required="required"  type="password" placeholder="change password">
                <input name="password" required="required"  type="password" placeholder="repeat changed password">
                <div id="demoFont"></div>
                <div class="select">
    <select>
        <option>Change your freelance branch</option>
        <option> Graphic design</option></option>
        <option>Programming/web developement</option>
        <option>Embroidery</option>
        <option>Painting</option>
        <option>Knitting</option>
        <option>Voiceover acting</option>
        <option>Sculpturing</option>
        <option>Writing</option>
        <option>Video content creation/streaming</option>
        <option>Translating</option>
        <option>Teaching/tutoring</option>
        <option>Other</option>
        
    </select>
    <div class="select_arrow">
    </div>

</div>


                <button>SAVE CHANGES</button>
        
            </form>
        </div>
    </div>
</body>