<?php
require_once 'vendor/autoload.php'; // 載入 firebase/php-jwt 函式庫

use \Firebase\JWT\JWT;

$key = "your_secret_key";  // 這是你的密鑰，用來驗證 JWT 的簽名

// 從 GET 請求的查詢參數中取得 token
if (isset($_GET['token'])) {
    $jwt = $_GET['token'];  // 獲取 URL 查詢參數中的 token
    
    try {
        // 解碼並驗證 JWT
        $decoded = JWT::decode($jwt, $key, array('HS256'));  // 使用對稱加密驗證 JWT
        
        // 驗證成功，取得 Payload 資料
        echo "Token is valid. User ID: " . $decoded->data->id;
    } catch (Exception $e) {
        // 驗證失敗
        echo "Failed to authenticate token: " . $e->getMessage();
    }
} else {
    echo "Authorization token not found.";
}
?>
