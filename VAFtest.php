<?php

session_start();
$simple="";
$average="";
$complex="";

$resultSim="";
$resultAve="";
$resultCom="";
$Calculate="";

$simpleAc="";
$averageAc="";
$complexAc="";

$resultSimAC= "";
$resultAveAC= "";
$resultComAC= "";
$CalculateAc="";

$simpleUUCW="";
$averageUUCW="";
$complexUUCW="";
$simpleUAW="";
$averageUAW="";
$complexUAW="";

$uucw="";
$uaw="";
$vaf="";
$CalculateUCP="";
$resultUCP="";

// $vaf="";
$uucwUCP="";
$uawUCP="";


$vaf = (double) $vaf;
$CalculateUCP = (double) $CalculateUCP;
$resultUCP = (double) $resultUCP;
// $resultUCP="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["calUUCW"])) {

// Xử lý tính toán UUCW
        $simple = $_POST["simple"];
        $average = $_POST["average"];
        $complex = $_POST["complex"];
        $Calculate = $simple * 5 + $average * 10 + $complex * 15;

        $resultSim = $simple * 5;
        $resultAve = $average * 10;
        $resultCom = $complex * 15;

        $simpleUUCW = $simple;
        $averageUUCW = $average;
        $complexUUCW = $complex;

// Lưu trữ kết quả trong phiên làm việc
        $_SESSION["resultSim"] = $resultSim;
        $_SESSION["resultAve"] = $resultAve;
        $_SESSION["resultCom"] = $resultCom;
        $_SESSION["Calculate"] = $Calculate;

        $_SESSION["simpleUUCW"] = $simpleUUCW;
        $_SESSION["averageUUCW"] = $averageUUCW;
        $_SESSION["complexUUCW"] = $complexUUCW;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["calUAW"])) {

// Xử lý tính toán UAW
        $simpleAc = $_POST["simpleAc"];
        $averageAc = $_POST["averageAc"];
        $complexAc = $_POST["complexAc"];
        $CalculateAc = $simpleAc * 1 + $averageAc * 2 + $complexAc * 3;

        $resultSimAc = $simpleAc * 1;
        $resultAveAc = $averageAc * 2;
        $resultComAc = $complexAc * 3;

        $simpleUAW = $simpleAc;
        $averageUAW = $averageAc;
        $complexUAW = $complexAc;


// Lưu trữ kết quả trong phiên làm việc
        $_SESSION["CalculateAc"] = $CalculateAc;
        $_SESSION["resultSimAc"] = $resultSimAc;
        $_SESSION["resultAveAc"] = $resultAveAc;
        $_SESSION["resultComAc"] = $resultComAc;

        $_SESSION["simpleUAW"] = $simpleUAW;
        $_SESSION["averageUAW"] = $averageUAW;
        $_SESSION["complexUAW"] = $complexUAW;
    }
}


//Xử lý tính toán UCP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["calUCP"])) {
    // Xử lý tính toán UCP
    $uucw = $_POST["uucw"];
    $uaw = $_POST["uaw"];
    $vaf = $_POST["vaf"];
    $CalculateUCP = ($uucw + $uaw) * (double)$vaf ;
    $resultUCP = ($uucw + $uaw) * (double)$vaf ;
    // $resultSim = $simple * 5;
    // $resultAve = $average * 10;
    // $resultCom = $complex * 15;
    
    $uucwUCP = $uucw;
    $uawUCP = $uaw;
    $vafUCP = $vaf;
    
    // Lưu trữ kết quả trong phiên làm việc
    $_SESSION["CalculateUCP"] = $CalculateUCP;
    // $_SESSION["resultSim"] = $resultSim;
    // $_SESSION["resultAve"] = $resultAve;
    // $_SESSION["resultCom"] = $resultCom;
    
    $_SESSION["uucwUCP"] = $uucwUCP;
    $_SESSION["uawUCP"] = $uawUCP;
    $_SESSION["vafUCP"] = $vafUCP;
    }
    }
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculate_UseCasePoint</title>
        <link rel="stylesheet" href="uucw.css">
        <link rel="stylesheet" href="tcf.css">
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#calculateForm").submit(function(event) {
                event.preventDefault(); // Ngăn chặn việc gửi form thông qua trình duyệt

                var formData = $(this).serialize(); // Lấy dữ liệu form

                $.ajax({
                    type: "POST",
                    url: "calculateVAF.php",
                    data: formData,
                    success: function(response) {
                         var vafTotal = "VAF= 0.65 +0.01(ΣFj)<br><b>VAF= " + response + "</b>";
                        
                $(".tcf_total_result").html(vafTotal);
                $(".tcf_total_display").show();

                $(".vaf_result").html(response); // Hiển thị kết quả vào bảng khác
                $(".ucp_table").show();
                    }
                });
            });
        });
    </script>
    </head>
   <!--  <style>
    body {
    background-image: url("https://wallpapers-clan.com/wp-content/uploads/2022/08/meme-gif-pfp-1.gif");
    background-repeat: no-repeat;
    background-size: cover;
    }
    </style>  -->
    <body>
     <header>
            <div class="top">
                <h1 class="top_Title">Use Case Point Calculator Tool</h1>
                <!--<a href="">
                    <button class="btb_Help" style="float: right;">Help</button>
                </a>-->
            </div>
        </header>
        <section>
             <h2>1. Calculate the UUCW</h2>
                <p> Identify and Weight Use Case</p>
                <div class="container">
                    <div class="uucw_container">
                        <div class="uucw_input">
                            <form action="" class="uucw_form" method="post">
                                <fieldset>
                                    <p>
                                        <label for="sumSim" class="input_label">
                                            <span class="text">
                                                Number of
                                                <b>Simple</b>
                                                user case
                                                <span class="tooltip tooltip_1">
                                                    <i class="fa fa-question-circle">
                                                    ?
                                                    </i>
                                                    <span class="tooltip_text">1 to 3 transactions</span>
                                                </span>
                                            </span>
                                            
                                            <input class="input_text1" type="number" name="simple" id="simple" value="<?php echo isset($_POST['simple']) ? $_POST['simple'] : ''; ?>" required>
                                        </label>
                                    </p>
                                    <p>
                                        <label for="average" class="input_label">
                                            <span class="text">
                                                Number of
                                                <b>Average</b>
                                                user case
                                                <span class="tooltip tooltip_1">
                                                    <i class="fa fa-question-circle">?</i>
                                                    <span class="tooltip_text">4 to 7 transactions</span>
                                                </span>
                                            </span>
                                            <input class="input_text2" type="number" name="average" id="average" value="<?php echo isset($_POST['average']) ? $_POST['average'] : ''; ?>" required>
                                        </label>
                                    </p>
                                    <p>
                                        <label for="complex" class="input_label">
                                            <span class="text">
                                                Number of
                                                <b>Complex</b>
                                                user case
                                                <span class="tooltip tooltip_1">
                                                    <i class="fa fa-question-circle">?</i>
                                                    <span class="tooltip_text">8 or more transactions</span>
                                                </span>
                                            </span>
                                            
                                            <input class="input_text3" type="number" name="complex" id="complex" value="<?php echo isset($_POST['complex']) ? $_POST['complex'] : ''; ?>" required>
                                        </label>
                                    </p>
                                </fieldset>
                                <button class="btn_calc" type="submit" name="calUUCW" value="calUUCW">Caculate UUCW </button>
                            </form>
                        </div>
                        <div class="uucw_output">
                            <table class="uucw_table">
                                <thead>
                                    <tr>
                                        <th>Use Case Classification</th>
                                        <th>Weight</th>
                                        <th>x</th>
                                        <th>Number Of UseCases</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Simple</td>
                                        <td>5</td>
                                        <td>x</td>
                                         <td><?php echo isset($_SESSION["simpleUUCW"]) ? $_SESSION["simpleUUCW"] : ''; ?></td>
                                        <td><?php echo isset($_SESSION["resultSim"]) ? $_SESSION["resultSim"] : ''; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Average</td>
                                        <td>10</td>
                                        <td>x</td>
                                       <td><?php echo isset($_SESSION["averageUUCW"]) ? $_SESSION["averageUUCW"] : ''; ?></td>
                                        <td><?php echo isset($_SESSION["resultAve"]) ? $_SESSION["resultAve"] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Complex</td>
                                        <td>15</td>
                                        <td>x</td>
                                       <td><?php echo isset($_SESSION["complexUUCW"]) ? $_SESSION["complexUUCW"] : ''; ?></td>
                                        <td><?php echo isset($_SESSION["resultCom"]) ? $_SESSION["resultCom"] : ''; ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="td_total total_cell" colspan="4">Total:</td>
                                    <td class="td_total" id="uucw_table_result"> <?php echo isset($_SESSION["Calculate"]) ? $_SESSION["Calculate"] : ''; ?></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                
                <h2>2. Calculate the UAW</h2>
                <p>Identify and Weight Actor</p>
                <div class="container">
                    <div class="uucw_container">
                        <div class="uucw_input">
                            <form action="" class="uaw_form" method="post">
                                <fieldset>
                                    <p>
                                        <label for="simpleAC" class="input_label">
                                            <span class="text">
                                                Number of
                                                <b>simple</b>
                                                Actors
                                                <span class="tooltip tooltip_1">
                                                    <i class="fa fa-question-circle"></i>
                                                    <span class="tooltip_text">(1 to 3 transaction)</span>
                                                </span>
                                            </span>
                                            
                                            <input class="input_text4" type="number" name="simpleAc" id="simpleAc" value="<?php echo isset($_POST['simpleAc']) ? $_POST['simpleAc'] : ''; ?>" required>
                                        </label>
                                    </p>
                                    <p>
                                        <label for="averageAc" class="input_label">
                                            <span class="text">
                                                Number of
                                                <b>Average</b>
                                                Actors
                                                <span class="tooltip tooltip_1">
                                                    <i class="fa fa-question-circle"></i>
                                                    <span class="tooltip_text">(1 to 3 transaction)</span>
                                                </span>
                                            </span>
                                            <input class="input_text5" type="number" name="averageAc" id="averageAc" value="<?php echo isset($_POST['averageAc']) ? $_POST['averageAc'] : ''; ?>" required>
                                        </label>
                                    </p>
                                    <p>
                                        <label for="complexAc" class="input_label">
                                            <span class="text">
                                                Number of
                                                <b>complex</b>
                                                Actors
                                                <span class="tooltip tooltip_1">
                                                    <i class="fa fa-question-circle"></i>
                                                    <span class="tooltip_text">(1 to 3 transaction)</span>
                                                </span>
                                            </span>
                                            <input class="input_text6" type="number" name="complexAc" id="complexAc" value="<?php echo isset($_POST['complexAc']) ? $_POST['complexAc'] : ''; ?>" required>
                                        </label>
                                    </p>
                                </fieldset>
                                <button class="btn_calc" type="submit" name="calUAW" value="calUAW" >Caculate UAW</button>
                            </form>
                        </div>
                        <div class="uucw_output">
                            <table class="uucw_table">
                                <thead>
                                    <tr>
                                        <th>Actor Classification</th>
                                        <th>Weight</th>
                                        <th>x</th>
                                        <th>Number Of Actors</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Simple</td>
                                        <td>1</td>
                                        <td>x</td>
                                        <td><?php echo isset($_SESSION["simpleUAW"]) ? $_SESSION["simpleUAW"] : ''; ?></td>
                                        <td><?php echo isset($_SESSION["resultSimAc"]) ? $_SESSION["resultSimAc"] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Average</td>
                                        <td>2</td>
                                        <td>x</td>
                                        <td><?php echo isset($_SESSION["averageUAW"]) ? $_SESSION["averageUAW"] : ''; ?></td>
                                        <td><?php echo isset($_SESSION["resultAveAc"]) ? $_SESSION["resultAveAc"] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Complex</td>
                                        <td>3</td>
                                        <td>x</td>
                                        <td><?php echo isset($_SESSION["complexUAW"]) ? $_SESSION["complexUAW"] : ''; ?></td>
                                        <td><?php echo isset($_SESSION["resultComAc"]) ? $_SESSION["resultComAc"] : ''; ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="td_total total_cell" colspan="4">Total:</td>
                                    <td class="td_total" id="uaw_table_result"> <?php echo isset($_SESSION["CalculateAc"]) ? $_SESSION["CalculateAc"] : ''; ?></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            <h2>3. Calculate the VAF</h2>
            <!-- <p>...</p> -->
            <form method="POST" id="calculateForm">
                <div class="tcf_container">
                    <div class="tcf_input">
                        <div class="tcf_table">
                            <div class="tcf_row">
                                <div id="tcf_hd1" class="tcf_cell">Factor</div>
                                <div id="tcf_hd2" class="tcf_cell">Description</div>
                                <div id="tcf_hd4" class="tcf_cell">Rating</div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F1</div>
                                <div class="tcf_cell">Data Communications</div>
                                <div class="tcf_cell">
                                    <fieldset id="F1_fieldset">
                                        <input type="radio" name="F1[]" value="0" id="F10">
                                        <label for="F11">0</label>
                                        <input type="radio" name="F1[]" value="1" id="F11">
                                        <label for="F11">1</label>
                                        <input type="radio" name="F1[]" value="2" id="F12">
                                        <label for="F12">2</label>
                                        <input type="radio" name="F1[]" value="3" id="F13">
                                        <label for="F13">3</label>
                                        <input type="radio" name="F1[]" value="4" id="F14">
                                        <label for="F14">4</label>
                                        <input type="radio" name="F1[]" value="5" id="F15">
                                        <label for="F15">5</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F2</div>
                                <div class="tcf_cell">Distributed Data Processing</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F2[]" value="0" id="F20">
                                        <label for="F20">0</label>
                                        <input type="radio" name="F2[]" value="1" id="F21">
                                        <label for="F21">1</label>
                                        <input type="radio" name="F2[]" value="2" id="F22">
                                        <label for="F22">2</label>
                                        <input type="radio" name="F2[]" value="3" id="F23">
                                        <label for="F23">3</label>
                                        <input type="radio" name="F2[]" value="4" id="F24">
                                        <label for="F24">4</label>
                                        <input type="radio" name="F2[]" value="5" id="F25">
                                        <label for="F25">5</label>
                                        
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F3</div>
                                <div class="tcf_cell">Performance</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F3[]" value="0" id="F30">
                                        <label for="F30">0</label>
                                        <input type="radio" name="F3[]" value="1" id="F31">
                                        <label for="F31">1</label>
                                        <input type="radio" name="F3[]" value="2" id="F32">
                                        <label for="F32">2</label>
                                        <input type="radio" name="F3[]" value="3" id="F33">
                                        <label for="F33">3</label>
                                        <input type="radio" name="F3[]" value="4" id="F34">
                                        <label for="F34">4</label>
                                        <input type="radio" name="F3[]" value="5" id="F35">
                                        <label for="F35">5</label>
                                        
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F4</div>
                                <div class="tcf_cell">Heavily Used Configuration</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F4[]" value="0" id="F40">
                                        <label for="F40">0</label>
                                        <input type="radio" name="F4[]" value="1" id="F41">
                                        <label for="F41">1</label>
                                        <input type="radio" name="F4[]" value="2" id="F42">
                                        <label for="F42">2</label>
                                        <input type="radio" name="F4[]" value="3" id="F43">
                                        <label for="F43">3</label>
                                        <input type="radio" name="F4[]" value="4" id="44">
                                        <label for="F44">4</label>
                                        <input type="radio" name="F4[]" value="5" id="F45">
                                        <label for="F45">5</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F5</div>
                                <div class="tcf_cell">Transaction Rate</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F5[]" value="0" id="F50">
                                        <label for="F50">0</label>
                                        <input type="radio" name="F5[]" value="1" id="F51">
                                        <label for="F51">1</label>
                                        <input type="radio" name="F5[]" value="2" id="F52">
                                        <label for="F52">2</label>
                                        <input type="radio" name="F5[]" value="3" id="F53">
                                        <label for="F53">3</label>
                                        <input type="radio" name="F5[]" value="4" id="F54">
                                        <label for="F54">4</label>
                                        <input type="radio" name="F5[]" value="5" id="F55">
                                        <label for="F55">5</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F6</div>
                                <div class="tcf_cell">On-line Data Entry</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F6[]" value="0" id="F60">
                                        <label for="F60">0</label>
                                        <input type="radio" name="F6[]" value="1" id="F61">
                                        <label for="F61">1</label>
                                        <input type="radio" name="F6[]" value="2" id="F62">
                                        <label for="F62">2</label>
                                        <input type="radio" name="F6[]" value="3" id="F63">
                                        <label for="F63">3</label>
                                        <input type="radio" name="F6[]" value="4" id="F64">
                                        <label for="F64">4</label>
                                        <input type="radio" name="F6[]" value="5" id="F65">
                                        <label for="F65">5</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F7</div>
                                <div class="tcf_cell">End-User Efficiency</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F7[]" value="0" id="F70">
                                        <label for="70">0</label>
                                        <input type="radio" name="F7[]" value="1" id="F71">
                                        <label for="F71">1</label>
                                        <input type="radio" name="F7[]" value="2" id="F72">
                                        <label for="F72">2</label>
                                        <input type="radio" name="F7[]" value="3" id="F73">
                                        <label for="F73">3</label>
                                        <input type="radio" name="F7[]" value="4" id="F74">
                                        <label for="F74">4</label>
                                        <input type="radio" name="F7[]" value="5" id="F75">
                                        <label for="F75">5</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F8</div>
                                <div class="tcf_cell">On-line Update</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F8[]" value="0" id="F80">
                                        <label for="F80">0</label>
                                        <input type="radio" name="F8[]" value="1" id="F81">
                                        <label for="F81">1</label>
                                        <input type="radio" name="F8[]" value="2" id="F82">
                                        <label for="F82">2</label>
                                        <input type="radio" name="F8[]" value="3" id="F83">
                                        <label for="F83">3</label>
                                        <input type="radio" name="F8[]" value="4" id="F84">
                                        <label for="F84">4</label>
                                        <input type="radio" name="F8[]" value="5" id="F85">
                                        <label for="F85">5</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F9</div>
                                <div class="tcf_cell">Complex Processing</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F9[]" value=0 id="F90">
                                        <label for="F90">0</label>
                                        <input type="radio" name="F9[]" value="1" id="F91">
                                        <label for="F91">1</label>
                                        <input type="radio" name="F9[]" value="2" id="F92">
                                        <label for="F92">2</label>
                                        <input type="radio" name="F9[]" value="3" id="F93">
                                        <label for="F93">3</label>
                                        <input type="radio" name="F9[]" value="4" id="F94">
                                        <label for="F94">4</label>
                                        <input type="radio" name="F9[]" value="5" id="F95">
                                        <label for="F95">5</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F10</div>
                                <div class="tcf_cell">Reusability</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F10[]" value=0 id="F100">
                                        <label for="F100">0</label>
                                        <input type="radio" name="F10[]" value="1" id="F101">
                                        <label for="F101">1</label>
                                        <input type="radio" name="F10[]" value="2" id="F102">
                                        <label for="F102">2</label>
                                        <input type="radio" name="F10[]" value="3" id="F103">
                                        <label for="F103">3</label>
                                        <input type="radio" name="F10[]" value="4" id="F104">
                                        <label for="F104">4</label>
                                        <input type="radio" name="F10[]" value="5" id="F105">
                                        <label for="F105">5</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F11</div>
                                <div class="tcf_cell">Installation Ease</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F11[]" value=0 id="F110">
                                        <label for="F110">0</label>
                                        <input type="radio" name="F11[]" value="1" id="F111">
                                        <label for="F111">1</label>
                                        <input type="radio" name="F11[]" value="2" id="F112">
                                        <label for="F112">2</label>
                                        <input type="radio" name="F11[]" value="3" id="F113">
                                        <label for="F113">3</label>
                                        <input type="radio" name="F11[]" value="4" id="F114">
                                        <label for="F114">4</label>
                                        <input type="radio" name="F11[]" value="5" id="F115">
                                        <label for="F115">5</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F12</div>
                                <div class="tcf_cell">Operational Ease</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F12[]" value=0 id="F120">
                                        <label for="F120">0</label>
                                        <input type="radio" name="F12[]" value="1" id="F121">
                                        <label for="F121">1</label>
                                        <input type="radio" name="F12[]" value="2" id="F122">
                                        <label for="F122">2</label>
                                        <input type="radio" name="F12[]" value="3" id="F123">
                                        <label for="F123">3</label>
                                        <input type="radio" name="F12[]" value="4" id="F124">
                                        <label for="F124">4</label>
                                        <input type="radio" name="F12[]" value="5" id="F125">
                                        <label for="F125">5</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F13</div>
                                <div class="tcf_cell">Multiple Sites</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F13[]" value=0 id="F130">
                                        <label for="F130">0</label>
                                        <input type="radio" name="F13[]" value="1" id="F131">
                                        <label for="F131">1</label>
                                        <input type="radio" name="F13[]" value="2" id="F132">
                                        <label for="F132">2</label>
                                        <input type="radio" name="F13[]" value="3" id="F133">
                                        <label for="F133">3</label>
                                        <input type="radio" name="F13[]" value="4" id="F134">
                                        <label for="F134">4</label>
                                        <input type="radio" name="F13[]" value="5" id="F135">
                                        <label for="F135">5</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="tcf_row">
                                <div class="tcf_cell">F14</div>
                                <div class="tcf_cell">Facilitate  Change</div>
                                <div class="tcf_cell">
                                    <fieldset id="F2_fieldset">
                                        <input type="radio" name="F14[]" value=0 id="F140">
                                        <label for="F140">0</label>
                                        <input type="radio" name="F14[]" value="1" id="F141">
                                        <label for="F141">1</label>
                                        <input type="radio" name="F14[]" value="2" id="F142">
                                        <label for="F142">2</label>
                                        <input type="radio" name="F14[]" value="3" id="F143">
                                        <label for="F143">3</label>
                                        <input type="radio" name="F14[]" value="4" id="F144">
                                        <label for="F144">4</label>
                                        <input type="radio" name="F14[]" value="5" id="F145">
                                        <label for="F145">5</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tcf_output" >
                        <div class="tcf_total_display">
                            
                            <label class="tcf_total_result"></label>
                            <p>
                                
                                <span class="tcf_result"></span>
                            </p>
                        </div>
                        <button class="tcf_calc_btn" type="submit" name="calVAF" value="calVAF" >Calculate VAF</button>
                    </div>
                </div>
            </form>
            <div id="vafResult"></div>
   

        <script type="text/javascript">
        // Đoạn mã JavaScript tại đây
        
        </script>
        <?php
        // Tiếp tục phần mã PHP ở đây
        ?>
            <h2>2.Calculate the UCP</h2>
              
              <p>
                  The UCP is calculated based on the following formula:<br>
                  UCP = (UUCW + UAW) x VAF
              </p>
              <div class="container">
                  <div class="uucw_container">
                      <div class="uucw_input">
                          <form action="" class="uaw_form" method="post">
                              <fieldset>
                                  <p>
                                      <label for="simpleAC" class="input_label">
                                          <span class="text">
                                              Unadjusted Use Case Weight (UUCW)
                                              <span class="tooltip tooltip_1">
                                                  <i class="fa fa-question-circle"></i>
                                                  <span class="tooltip_text">(1 to 3 transaction)</span>
                                              </span>
                                          </span>
                                          <input class="input_text7" type="text" name="uucw" id="uucw" value="<?php echo isset($_POST['uucw']) ? $_POST['uucw'] : ''; ?>" required>
                                      </label>
                                  </p>
                                  <p>
                                      <label for="averageAc" class="input_label">
                                          <span class="text">
                                              Unadjusted Actor Weight (UAW)
                                              <span class="tooltip tooltip_1">
                                                  <i class="fa fa-question-circle"></i>
                                                  <span class="tooltip_text">(1 to 3 transaction)</span>
                                              </span>
                                          </span>
                                          
                                          <input class="input_text8" type="text" name="uaw" id="uaw" value="<?php echo isset($_POST['uaw']) ? $_POST['uaw'] : ''; ?>" required>
                                      </label>
                                  </p>
                                  <p>
                                      <label for="complexAc" class="input_label">
                                          <span class="text">
                                              Value Adjustment Factor (VAF)
                                              <span class="tooltip tooltip_1">
                                                  <i class="fa fa-question-circle"></i>
                                                  <span class="tooltip_text">(1 to 3 transaction)</span>
                                              </span>
                                          </span>
                                          
                                          <input class="input_text9" type="text" name="vaf" id="vaf" value="<?php echo isset($_POST['vaf']) ? $_POST['vaf'] : ''; ?>" required>
                                      </label>
                                  </p>
                              </fieldset>
                              <button class="btn_calc" type="submit" name="calUCP" value="calUCP" >Caculate UCP</button>
                          </form>
                      </div>
                      <div class="uucw_output">
                          <table class="uucw_table">
                              <thead>
                                  <tr>
                                      <th>UUCW</th>
                                      <th>UAW</th>
                                      <th>VAF</th>
                                      <th>Result</th>
                                  </tr>
                                  <tr>
                                      <td><?php echo isset($_SESSION["uucw"]) ? $_SESSION["uucw"] : '';echo $uucw ?></td>
                                      <td><?php echo isset($_SESSION["uaw"]) ? $_SESSION["uaw"] : '';echo $uaw ?></td>
                                      <td><?php echo isset($_SESSION["vaf"]) ? $_SESSION["vaf"] : '';echo $vaf ?></td>
                                      <td><?php echo isset($_SESSION["resultUCP"]) ? $_SESSION["resultUCP"] : '';echo $resultUCP ?></td>                                       
                                  </tr>
                              </thead>                        
                          </table>
                      </div>
                  </div>
              </div>   
		       
            <div class="nav_button_area">
                <a href="">
                    <button id="uucw_newCaculation_btn" class="new">New Caculation</button>
                    
                </a>
            </div>

            
        </section>
        
    </body>
</html>
