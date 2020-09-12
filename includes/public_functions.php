<?php

//Returns all published posts
    function getPublishedPosts(){
        //init conn to db
        global $conn;
        $sql = "SELECT * FROM posts WHERE published=true";
        $result = mysqli_query($conn, $sql);

        //get post as assoc array
        $posts =mysqli_fetch_all($result, MYSQLI_ASSOC); 

        $final_posts = array();
        foreach ($posts as $post) {
            $post['topic'] = getPostTopic($post['id']); 
            array_push($final_posts, $post);
        }
        return $final_posts;
    }


    //Receives a post id and
    //Returns topic of the post

    function getPostTopic($post_id){
        global $conn;
        $sql = "SELECT * FROM topics WHERE id=
                (SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $topic = mysqli_fetch_assoc($result);
        return $topic;
    }

    //Returns all posts under a topic

    function getPublishedPostsByTopic($topic_id) {
        global $conn;
        $sql = "SELECT * FROM posts ps 
                WHERE ps.id IN 
                (SELECT pt.post_id FROM post_topic pt 
                    WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
                    HAVING COUNT(1) = 1)";
        $result = mysqli_query($conn, $sql);
        // fetch all posts as an associative array called $posts
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $final_posts = array();
        foreach ($posts as $post) {
            $post['topic'] = getPostTopic($post['id']); 
            array_push($final_posts, $post);
        }
        return $final_posts;
    }

    function getTopicNameById($id){
        global $conn;
        $sql = "SELECT name FROM topics WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $topic = mysqli_fetch_assoc($result);
        return $topic['name'];
    }


    //single post
    function getPost($slug){
	global $conn;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	}
	return $post;
    }
    //return All topics
    function getAllTopics()
    {
        global $conn;
        $sql = "SELECT * FROM topics";
        $result = mysqli_query($conn, $sql);
        $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $topics;
    }

    function isLoggedIn()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }else{
            return false;
        }
    }

        /*
        Accept email of user whose password is to be reset
        Send email to user to reset their password
        */
        //session_start();
        global $conn;
        $errors = [];
        $user_id = "";

        //$conn = mysqli_connect("localhost","root","", "blue-sky");
        $conn = mysqli_connect("remotemysql.com","DaQIGilviO","tz3KhX2HPY", "DaQIGilviO");
        if (!$conn) {
        die("Error connecting to Database" . mysqli_connect_error());
       }

        if (isset($_POST['reset-password'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        // ensure that the user exists on our system
        $query = "SELECT email FROM users WHERE email='$email'";
        $results = mysqli_query($conn, $query);

        if (empty($email)) {
            array_push($errors, "Your email is required");
        }else if(mysqli_num_rows($results) <= 0) {
            array_push($errors, "Sorry, no user exists on our system with that email");
        }
        // generate a unique random token of length 100
        $token = bin2hex(random_bytes(50));

        if (count($errors) == 0) {
            // store token in the password-reset database table against the user's email
            $sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
            $results = mysqli_query($conn, $sql);

            // Send email to user with the token in a link they can click on
            $to = $email;
            $subject = "Reset your password on bluesky-blog-wejapa.herokuapp.com";
            $msg = "Hi there, click on this :https://bluesky-blog-wejapa.herokuapp.com/new_pass.php?token=$token to reset your password on our site";
            $msg = wordwrap($msg,70);
            $headers = "From: info@bluesky-blog-wejapa.herokuapp.com";
            mail($to, $subject, $msg, $headers);
            header('location: pending.php?email=' . $email);
        }
        }

        // ENTER A NEW PASSWORD
        if (isset($_POST['new_password'])) {
        $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
        $new_pass_c = mysqli_real_escape_string($conn, $_POST['new_pass_c']);

        // Grab to token that came from the email link
        $token = $_SESSION['token'];
        if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
        if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
        if (count($errors) == 0) {
            // select email address of user from the password_reset table 
            $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
            $results = mysqli_query($conn, $sql);
            $email = mysqli_fetch_assoc($results)['email'];

            if ($email) {
            $new_pass = md5($new_pass);
            $sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
            $results = mysqli_query($conn, $sql);
            header('location: index.php');
            }
        }
        }
?>
