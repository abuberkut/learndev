<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADMIN INDEX</title>
    <link rel="stylesheet" href="/template/css/bootstrap.css">
</head>
<body>
    <ul>
       <p class="text-danger">HELLO, dear <?=$_SESSION['user_name']?></p>
        <li value="user"><a class="btn btn-success" onclick="return things.load('user')">Users</a>
        <div class="admin" id="users"></div></li>
        
        <li value="lesson"><a class="btn btn-success" onclick="return things.load('lesson')">Lessons</a><div class="admin" id="lessons"></div></li>
        
        <li value="game"><a class="btn btn-success" onclick="return things.load('game')">Games</a><div class="admin" id="games"></div></li>
        
        <li value="question"><a class="btn btn-success" onclick="return things.load('question')">Questions</a><div class="admin" id="questions"></div></li>
        <li value="comment"><a class="btn btn-success" onclick="return things.load('comment')">Comments</a><div class="admin" id="comments"></div></li>
        <li value="news"><a class="btn btn-success" onclick="return things.load('news')">News</a><div class="admin" id="news"></div></li>
    </ul>
    <button class="btn"><a href="/">BACK TO MAIN PAGE</a></button>
    <script src="/template/js/main.js"></script>
</body>
</html>