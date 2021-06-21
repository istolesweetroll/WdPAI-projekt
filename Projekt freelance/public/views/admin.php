<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style2.css">
    <title>FREELANCE</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/sitting on a couch.svg">
        </div>
        <div class="login-container">

            <div class="messages">
                <?php
                require_once "messages.php";
                messages();
                ?>
            </div>

            <button>+</button>
                <form action="newentry">
                <button>NEW ENTRY</button>
                </form>
            <form action="newproject">
                <button>NEW PROJECT</button>
            </form>
            <form action="manageprojects">
                <button>MANAGE PROJECTS</button>
            </form>
            <form action="accountsettings">
                <button>ACCOUNT SETTINGS</button>
            </form>
        <form action = "feedback">
                <button>SEND FEEDBACK</button>
            </form>

            <form action = "about">

         <button>ABOUT</button>

            </form>
            <form action = "logOut">
                <button>LOG OUT</button>
            </form>
        </div>
    </div>

</body>