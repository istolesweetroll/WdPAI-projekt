<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style2.css">
    <title>FREELANCE</title>
</head>
<body>
<div class="messages">
    <?php
    require_once 'src/repository/ProjectRepository.php';
    require_once "messages.php";
    messages();
    $projectRepository = new ProjectRepository($_COOKIE['username']);
    $wcr= $projectRepository ->getAllUserProjects($_COOKIE['username']);
    ?>
</div>
<form action ="main">
<button id="back" style = "display: block; width: 3%; position: absolute;" >↺</button>
</form>
    <div class="container">

        <div class="logo">

            <img src="public/img/holding plant.svg">
        </div>

        <div class="login-container">

            <form class="login" action="timer">
                <input name="description" type="text" required = "required" placeholder="provide short description of your entry">

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

                <button>START TIMER</button>

            </form>
        </div>
    </div>
</body>