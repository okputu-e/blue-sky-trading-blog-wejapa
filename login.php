<?php  include('config.php'); ?>
<?php  include('includes/registration_login.php'); ?>
<?php  include('includes/head_section.php'); ?>
<title>LifeBlog | Sign in </title>
</head>

<body>
    <div class="container">
        <header class="header">
            <!-- Navbar -->
            <?php include( ROOT_PATH . '/includes/nav.php'); ?>
            <!-- // Navbar -->
        </header>


        <section class="content">
            <form method="post" action="login.php">
                <h2>Login</h2>
                <?php include(ROOT_PATH . '/includes/errors.php') ?>
                <input type="text" name="username" value="<?php echo $username; ?>" value="" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" class="btn" name="login_btn">Login</button>
                <p>
                    Not yet a member? <a href="register.php">Sign up</a>
                </p>
            </form>
        </section>
    </div>
    <!-- // container -->

    <!-- Footer -->
    <?php include( ROOT_PATH . '/includes/footer.php'); ?>
    <!-- // Footer -->