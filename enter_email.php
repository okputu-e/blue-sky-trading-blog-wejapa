<?php include('includes/public_functions.php'); ?>
<?php require_once('includes/head_section.php'); ?>
<title>Password Reset PHP</title>
</head>

<body>
    <div class="container">

        <header class="header" id="header">
            <div class="overlay has-fade"></div>
            <?php include('includes/nav.php'); ?>
        </header>

        <div class="content">
            <form class="login-form" action="enter_email.php" method="post">
                <h2 class="form-title">Reset password</h2>
                <!-- form validation messages -->
                <?php include('includes/messages.php'); ?>
                <div class="form-group">
                    <label>Your email address</label>
                    <input type="email" name="email">
                </div>

                <button type="submit" name="reset-password" class="btn">Submit</button>
            </form>
        </div>

        <?php include("includes/footer.php"); ?>