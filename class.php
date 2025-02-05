<?php
include("../dbtools.php");
?>
<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// 從 HTTP 標頭中獲取 Authorization 欄位
$authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

// $authHeader = "123456";

// if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
    if ($authHeader!='') {
    // $jwt = $matches[1];
    $jwt = $authHeader;
    echo "Received JWT: $jwt"; // 用來檢查是否收到 JWT
} else {
    // 未提供 JWT
    http_response_code(400);
    echo '未提供 JWT';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Content</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- Navbar -->
    <!-- <header class="header">
        <div class="logo" onclick="location='../../AI_2.php'">LOGO</div>
        <nav>
            <a href="#">天賦創富</a>
            <a href="#">幸福關係</a>
            <a href="#">開悟覺醒</a>
        </nav>
        <div class="user-menu">
            <span>0 點</span>
            <span class="user-icon">👤</span>
            <span class="menu-icon">☰</span>
        </div>
    </header> -->

    <!-- Content Layout -->
    <div class="container">
        <!-- Left Sidebar -->
        <div class="sidebar">
            <div class="profile">
                <img src="../L2.jpg" alt="Profile Picture" class="profile-pic">
                <h4>姓名：張三</h4>
                <p>電話：0912-345-678</p>
            </div>
            <h3>課程內容</h3>
            <a href="#">找出你的優勢資源</a>
            <a href="../class1/class001.php">發掘你的天賦與專長</a>
            <a href="#">找出你的熱愛與喜好</a>
            <a href="#">決定課程的主題方向</a>
            <a href="#">設計對應的課程內容</a>
            <a href="#">Level 1.1</a>
            <a href="#">Level 1.2</a>
            <a href="#">分享與應用</a>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/FsF97Xhf9h8?si=aWV1VaBkFNnZJkHN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <!-- Chat Section -->
        <div class="chat">
            <div class="teacher-profile">
                <img src="../L1.jpg" alt="Teacher Picture" class="teacher-pic">
                <h4>老師：李四</h4>
                <button onclick="toggleChat()">與老師對話</button>
            </div>


            <div class="chat-window" id="chatWindow">
                <header>與老師聊天</header>
                <div class="messages">
                    <p>您好！有什麼問題嗎？</p>
                </div>
                <div class="input">
                    <input type="text" placeholder="輸入訊息...">
                    <button>送出</button>
                </div>
            </div>

        </div>

    </div>

    <script>
        // 用於切換聊天室視窗的函數
        function toggleChat() {
            const chatWindow = document.getElementById('chatWindow');
            if (chatWindow.style.display === 'none' || chatWindow.style.display === '') {
                chatWindow.style.display = 'flex';
                // 添加事件監聽，監測點擊事件
                document.addEventListener('click', handleClickOutside, true);
            } else {
                chatWindow.style.display = 'none';
                // 移除事件監聽
                document.removeEventListener('click', handleClickOutside, true);
            }
        }

        // 點擊視窗外隱藏聊天室的函數
        function handleClickOutside(event) {
            const chatWindow = document.getElementById('chatWindow');
            const chatIcon = document.querySelector('.chat-icon');
            if (!chatWindow.contains(event.target) && !chatIcon.contains(event.target)) {
                chatWindow.style.display = 'none';
                document.removeEventListener('click', handleClickOutside, true);
            }
        }
    </script>
</body>

</html>