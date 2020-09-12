<?php include('includes/public_functions.php'); ?>
<?php require_once('includes/head_section.php'); ?>
<title>Password Reset PHP</title>

</head>

<body>
    <?php
        if($_GET['token'])
        $_SESSION['token'] = $GET['token'];
    ?>
    <div class="container">

        <header class="header" id="header">
            <div class="overlay has-fade"></div>
            <?php include('includes/nav.php'); ?>
        </header>

        <section class="content">
            <form class="login-form" action="new_password.php" method="post">
                <h2 class="form-title">New password</h2>
                <!-- form validation messages -->
                <?php include('includes/messages.php'); ?>
                <div class="form-group">
                    <label>New password</label>
                    <input type="password" name="new_pass">
                </div>
                <div class="form-group">
                    <label>Confirm new password</label>
                    <input type="password" name="new_pass_c">
                </div>

                <button type="submit" name="new_password" class="btn">Submit</button>

            </form>
        </section>

        <?php include("includes/footer.php"); ?>