<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style2.css">
    <title>LOG IN</title>
</head>

<body>

    <div class="container">

        <div class="logo">
            <img src="public/img/holding plant.svg">
        </div>
        <div class="login-container">


                <div class="messages">

                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>

                </div>
            <form class="login" action="login" method="post">
                <input name="username" type="text" required="required" placeholder="username">
                <input name="password" type="password" required="required" placeholder="password">
                <button type = "submit" >LOG IN</button>
                <P>
                    <A class=wsnextlink1 href="signup">Not a user? Sign up!</A>
                    </P>

            </form>

        </div>
    </div>
</body>