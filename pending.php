<?php include('includes/public_functions.php'); ?>
<?php require_once('includes/head_section.php'); ?>
<title>Password Reset PHP</title>
</head>

<body>
    <div class="container">
        <header class="header" id="header">
            <div class="overlay has-fade"></div>
            <!-- Navbar -->
            <?php include('includes/nav.php'); ?>
            <!-- // Navbar -->
        </header>

        <section class="content">
            <form class="login-form" action="login.php" method="post" style="text-align: center;">
                <p>
                    We sent an email to <b><?php echo $_GET['email'] ?></b> to help you recover your account.
                </p>
                <p>Please login into your email account and click on the link we sent to reset your password</p>
            </form>
        </section>


        <?php include("includes/footer.php"); ?>