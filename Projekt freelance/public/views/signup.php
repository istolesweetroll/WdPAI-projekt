<!DOCTYPE html>
<head>
    <div class="messages">
        <?php
        if(isset($messages)){
            foreach($messages as $message) {
                echo $message;
            }
        }
        ?>
    </div>
    <link rel="stylesheet" type="text/css" href="public/css/style2.css">
    <title>SIGN UP</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/planting a tree.svg">
        </div>
        <div class="new-project-container">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <form class="signup" action="register" method="POST">
                <input name="username" type="text" placeholder="username">
                <input name="email" type="email" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <input name="repeatpassword" type="password" placeholder="repeat password">

                <button>SIGN UP</button>
            </form>
        </div>
    </div>
</body>