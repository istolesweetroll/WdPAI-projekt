<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style2.css">
    <title>ADD ENTRY - START TIMER</title>
</head>
<style type="text/css">
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
<div class="messages">
    <?php
    require_once 'src/repository/ProjectRepository.php';
    if(isset($messages)){
        foreach($messages as $message) {
            echo $message;
        }
    }
    $projectRepository = new ProjectRepository($_COOKIE['username']);
    $wcr= $projectRepository ->getAllUserProjects($_COOKIE['username']);
    ?>
</div>
<form action ="main">
<button id="back" >↺</button>
</form>
    <div class="container">

        <div class="logo">

            <img src="public/img/holding plant.svg">
        </div>

        <div class="login-container">
            <form class="login" action="timer">>
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

                        ?>

                    </select>

                    <input name="description" type="text" placeholder="provide short description of your entry">

                    <div class="select_arrow">
    </div>

                <button>START TIMER</button>

            </form>
        </div>
    </div>
</body>