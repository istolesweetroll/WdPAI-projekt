<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style2.css">
    <title>FREELANCE</title>
    <style type="text/css">

</style>
</head>
<body>
<?php
require_once 'src/repository/ProjectRepository.php';
require_once "messages.php";
messages();

$projectRepository = new ProjectRepository($_COOKIE['username']);
$wcr= $projectRepository ->getAllUserProjects($_COOKIE['username']);
?>
<form action ="main">
    <button id="back" style = "display: block; width: 3%; position: absolute;" >↺</button>

</form>
    <div class="container">

        <div class="logo">
            <img src="public/img/girl video calling.svg">
        </div>
        <div class="new-project-container">
            <div class="login-container">
                <form class="login" action = "addEntryManually" method="post">
                    <div id="demoFont"></div>
                    <div class="select">

                        <select id="project" name="project">
                            <option value="Which project do you want to work on?">Which project do you want to work on?</option>
                            <?php
                            asort($wcr);
                            reset($wcr);
                            foreach($wcr as $p => $w):
                                echo '<option value="'.$w.'">'.$w.'</option>';
                            endforeach;
                            if(!empty($_POST['project'])) {
                                setcookie("project", $_POST['project']);
                            }
                            ?>

                        </select>

                        <div class="select_arrow">
        </div>

                  </div>
        <div class="new-project-container">
            <label for="entry-time"></label>When did you work on the project?<br/></div>
            <input type="datetime-local" id="entry-time"  required="required"
                   value="2021-06-12T19:30"
                   min="2020-06-07T00:00" max="2023-06-14T00:00">
            <label for="entry-time"></label>How long did you work on the project?<br/></label>
          
            <input type="time" id="appt"  value="00:00" required="required" name="appt">

               <input name="entry-description"  required="required" id="entry-description" type="text" placeholder="provide short description of your entry">


               <button>SUBMIT</button>
            </form>
        </div>
    </div>
</body>