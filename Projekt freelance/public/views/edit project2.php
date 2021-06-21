<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style2.css">
    <title>FREELANCE</title>
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
<select id="project" name="project">
    <option value="Which project do you want to edit?">Which project do you want to edit?</option>
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
    <div class="container">
        <div class="logo">
            <img src="public/img/artist.svg">
        </div>
        <div class="new-project-container">
            <form action = "saveEditChanges" class="new project">
                <?php
                $projectRepository = new ProjectRepository();
               $project = $projectRepository ->getProjectInfo($_COOKIE['project_id']);
                $projectTitle =  $project -> getProjecttitle();
                $projectDescription = $project ->getProjectdescription();
                $projectDeadline= $project ->getProjectdeadline();
                echo'           <input name="project name" required="required"  type="text" placeholder="'.$projectTitle.'">';
                echo ' <input name="project description" required="required"  type="text" placeholder="'.$projectDescription.'">';
                echo'<label for="deadline"></label>Change project deadline<br/></label>';
                echo '        <input name = "projectdeadline" type="datetime-local" id="meeting-time"
                       value="2021-06-12T19:30"
                       min="2020-06-07T00:00" max="2023-06-14T00:00">'
                       ?>
                <button>SUBMIT</button>
                
            </form>
        </div>
    </div>
</body>