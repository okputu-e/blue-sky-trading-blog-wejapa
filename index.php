<?php require_once("config.php"); ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php'); ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php'); ?>

<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>

<?php require_once(ROOT_PATH . "/includes/head_section.php"); ?>
</head>

<body>

    <body>
        <!-- container - wraps whole page -->
        <div class="wrapper">
            <header id="header" class="header">
                <img src="./app/images/bg_sky_two.png" alt="">
                <div class="overlay has-fade"></div>
                <?php include(ROOT_PATH . "/includes/nav.php"); ?>
                <div class="header__content flex flex-jc-sb flex-ai-c">
                    <div class="welcome_msg text-reduction">
                        <h1>Welcome<br>
                            <span>We are BlueSkyTradingHub</span>
                        </h1>

                        <p>I am your Pilot<br>
                            <span>~ Dr Ray</span>
                        </p>
                        <a href="blog.php" class="btn">Fly with us</a>
                    </div>
                </div>
            </header>
            <section class="content">
                <div class="content__container">
                    <h2 class="content__title">About Us</h2>
                    <hr>

                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non aspernatur unde officiis doloribus
                        commodi qui debitis rem labore reiciendis, voluptate, fugiat ea quia provident, fugit sint at
                        quidem odit. Nulla dicta nisi vero quis beatae eveniet? Facilis, consectetur? Necessitatibus
                        modi quia est atque harum hic recusandae eaque, impedit repellat accusamus aliquid dolore
                        reiciendis velit corrupti doloribus error minus doloremque accusantium voluptas voluptatum
                        dolorum odio? Doloribus quisquam dicta, eaque debitis dolorum aliquid. Maxime ipsa molestias
                        vitae dignissimos rem porro neque ducimus?
                    </p>
                </div>
            </section>
            <?php include(ROOT_PATH . "/includes/footer.php"); ?>