<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style2.css">
    <title>FREELANCE</title>
</head>

<body>
<button id="back" style = "display: block; width: 3%; position: absolute;" >↺</button>
<div class="messages">
    <?php

                require_once "messages.php";
                messages();

    require_once 'src/repository/ProjectRepository.php';
    $projectRepository = new ProjectRepository($_COOKIE['username']);
    $wcr= $projectRepository ->getAllUserProjects($_COOKIE['username']);
    ?>
</div>
<form action ="main">
<button id="back" >↺</button>
</form>
    <div class="container">
        <div class="logo">
            <img src="public/img/planting a tree.svg">
        </div>
        <div class="login-container">
            <form action = "markAsComplete">
                <div id="demoFont"></div>
                <div class="select">
                    <select id="project" name="project">
                        <option value="Which project do you want to mark as complete?">Which project do you want to mark as complete?</option>
                        <?php
                        asort($wcr);
                        reset($wcr);
                        foreach($wcr as $p => $w):
                            echo '<option value="'.$w.'">'.$w.'</option>';
                        endforeach;

                        ?>

                    </select>
    <div class="select_arrow">
    </div>
    <div class="control-group">


    </div>
    <label class="control control-checkbox">
        <input type="checkbox" />Email the client to inform of project completion

        <div class="control_indicator"></div>
    </label>
                <button>COMPLETE PROJECT</button>

            </form>
        </div>
    </div>
</body>