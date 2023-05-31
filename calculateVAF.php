<?php
session_start();

$VAF = 0.65;
// Kiểm tra xem dữ liệu đã được gửi đi hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $F1 = isset($_POST["F1"]) ? $_POST["F1"] : array(); // Kiểm tra và lấy dữ liệu của F1
    $F2 = isset($_POST["F2"]) ? $_POST["F2"] : array(); 
    $F3 = isset($_POST["F3"]) ? $_POST["F3"] : array(); 
    $F4 = isset($_POST["F4"]) ? $_POST["F4"] : array();
    $F5 = isset($_POST["F5"]) ? $_POST["F5"] : array();
    $F6 = isset($_POST["F6"]) ? $_POST["F6"] : array(); 
    $F7 = isset($_POST["F7"]) ? $_POST["F7"] : array(); 
    $F8 = isset($_POST["F8"]) ? $_POST["F8"] : array(); 
    $F9 = isset($_POST["F9"]) ? $_POST["F9"] : array(); 
    $F10 = isset($_POST["F10"]) ? $_POST["F10"] : array(); 
    $F11 = isset($_POST["F11"]) ? $_POST["F11"] : array(); 
    $F12 = isset($_POST["F12"]) ? $_POST["F12"] : array(); 
    $F13 = isset($_POST["F13"]) ? $_POST["F13"] : array(); 
    $F14 = isset($_POST["F14"]) ? $_POST["F14"] : array(); 
    
    // Lưu trữ các giá trị F vào session
$_SESSION['F1'] = $F1;
$_SESSION['F2'] = $F2;
$_SESSION['F3'] = $F3;
$_SESSION['F4'] = $F4;
$_SESSION['F5'] = $F5;
$_SESSION['F6'] = $F6;
$_SESSION['F7'] = $F7;
$_SESSION['F8'] = $F8;
$_SESSION['F9'] = $F9;
$_SESSION['F10'] = $F10;
$_SESSION['F11'] = $F11;
$_SESSION['F12'] = $F12;
$_SESSION['F13'] = $F13;
$_SESSION['F14'] = $F14;

    // Tính tổng 
    $sumF = array_sum($F1) + array_sum($F2) + array_sum($F3) + array_sum($F4) + array_sum($F5) + array_sum($F6) + array_sum($F7) + array_sum($F8) + array_sum($F9) + array_sum($F10) + array_sum($F11) + array_sum($F12) + array_sum($F13) + array_sum($F14) ;

    // Tính giá trị VAF
    $VAF += 0.01 * $sumF;
}





// Lưu trữ giá trị VAF vào session
$_SESSION['VAF'] = $VAF;

// Trả về giá trị VAF cho client
echo $VAF;
?>
