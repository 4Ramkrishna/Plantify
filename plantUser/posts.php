<?php
include('db.php');

// Fetch and display posts
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Community Forum</title>
</head>
<body>
    <h1>Welcome to the Community Forum</h1>
    
    <!-- Display existing posts -->
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . $row['post_topic'] . "</h2>";
            echo "<p>" . $row['post_description'] . "</p>";
            echo "<p>Posted by: " . $row['emailId'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No posts yet.";
    }
    ?>

    <!-- Create a new post form -->
    <h2>Create a New Post</h2>
    <form action="create_post.php" method="post">
        <input type="text" name="email" placeholder="Your Email">
        <input type="text" name="post_topic" placeholder="Post Topic">
        <textarea name="post_description" placeholder="Post Description"></textarea>
        <input type="submit" value="Create Post">
    </form>

    <!-- Logout button (if user is logged in) -->
    <a href="logout.php">Logout</a>
</body>
</html>
