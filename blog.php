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
            <header id="header" class="header blog">
                <img src="app/images/thunder.png" alt="">
                <div class="overlay has-fade"></div>
                <?php include(ROOT_PATH . "/includes/nav.php"); ?>
                <div class="header__content flex flex-jc-sb flex-ai-c">
                    <div class="welcome_msg text-reduction">
                        <h1>Welcome to AirPlaneSeries</h1>
                        <p>
                            I am your Co-Pilot,<br>
                            hold tight to your feelings. <br>
                            lets catch pips. <br>
                            <span>~ Jaystan Okputu</span>
                        </p>
                        <div class="flex">
                            <a href="register.php" class="btn">Join us!</a>
                            <a href="login.php" class="btn">Login In</a>
                        </div>

                    </div>
                    <!--- <div class="login_div">
                        <form action="" method="post">
                            <h2>Login</h2>
                            <input type="text" name="username" placeholder="Username" value="" autocomplete="off">
                            <input type="password" name="password" placeholder="Password">
                            <button class="btn" type="submit" name="login_btn">Sign in</button>
                        </form>
                    </div>--->
                </div>
            </header>
            <section class="content">
                <h2 class="content-title">Recent Articles</h2>
                <hr>
                <?php foreach ($posts as $post): ?>
                <div class="post">
                    <img src="<?php echo BASE_URL . '/app/images/' . $post['image']; ?>" class="post_image" alt="">
                    <!-- Added this if statement... -->
                    <?php if (isset($post['topic']['name'])): ?>
                    <a href="<?php echo BASE_URL . '/filtered_posts.php?topic=' . $post['topic']['id'] ?>"
                        class="btn category">
                        <?php echo $post['topic']['name'] ?>
                    </a>
                    <?php endif ?>
                    <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                        <div class="post_info">
                            <h3><?php echo $post['title'] ?></h3>
                            <div class="info">
                                <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
                                <span class="read_more">Read more...</span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach ?>
            </section>
            <?php include(ROOT_PATH . "/includes/footer.php"); ?>
