<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style2.css">
    <title>FREELANCE</title>
</head>
<body>
<button id="back" style = "display: block; width: 3%; position: absolute;" >↺</button>
<?php

require_once "messages.php";
messages();

require_once 'src/repository/ProjectRepository.php';
$projectRepository = new ProjectRepository($_COOKIE['username']);
$wcr= $projectRepository ->getAllUserProjects($_COOKIE['username']);
?>
<form action ="main">
    <button id="back" style = "display: block; width: 3%; position: absolute;" >↺</button>
</form>

<div class="container">
    <div class="logo">
        <img src="public/img/planting a tree.svg">
    </div>
    <div class="login-container">
        <form action = "editProject" method = "post">
            <div id="demoFont"></div>
            <div class="select">
                <select id="project" name="project">
                    <option value="Which project do you want to edit?">Which project do you want to edit?</option>
                    <?php
                    asort($wcr);
                    reset($wcr);
                    foreach($wcr as $p => $w):
                        echo '<option value="'.$w.'">'.$w.'</option>';
                    endforeach;

                    ?>
                </select>
                <button type = "submit">EDIT PROJECT</button>

        </form>
    </div>
</div>
</body>