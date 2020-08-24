<?php
    $error = "";
    $result = "";

    if (isset($_POST['submit'])){
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        
        if (isset($_POST['calculation'])) {
            $calculation = $_POST['calculation'];
        }

    
        if (empty($number1) && empty($number2)){
            $error = "Không được để trống";
        }
        else if (!is_numeric($number1) || !is_numeric($number2)){
            $error = "Cần phải nhập số";
        }

        if (empty($error)){
            
            switch ($calculation){
                case 0:
                   $result = $number1 + $number2;
                   break;
                case 1:
                    $result = $number1 - $number2;
                    break;
                case 2:
                    $result = $number1 * $number2;
                    break;
                case 3:
                    $result = $number1 / $number2;
                    break;
                case 4:
                    $result = $number1 % $number2;
                    break;
            }
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<form action="" method="POST">
        <table>
            <tr>
                <th colspan="2" class="blue">
                    Thực hành toán tử
                </th>
            </tr>
            <tr>
                <td>Nhập số thứ nhất</td>
                <td><input type="text" name="number1"></td>
            </tr>
            <tr>
                <td>Nhập số thứ hai</td>
                <td><input type="text" name="number2"></td>
            </tr>
            <tr>
                <td>Chọn phép tính</td>
                <td>
                    <input type="radio" name="calculation" value="0" <?php  if ((isset($calculation)) && $calculation == '0') echo 'checked'; ?>>+<br>
                    <input type="radio" name="calculation" value="1" <?php   if  ( (isset($$calculation)) && $calculation == '1') echo 'checked' ; ?>>-<br>
                    <input type="radio" name="calculation" value="2" <?php   if  ( (isset($calculation)) && $calculation == '2')  echo 'checked' ; ?>>*<br>
                    <input type="radio" name="calculation" value="3" <?php  if  ( (isset($calculation)) && $calculation == '3')  echo 'checked' ; ?>>/<br>
                    <input type="radio" name="calculation" value="4" <?php   if  ( (isset($calculation)) && $calculation == '4') echo 'checked' ; ?>>%<br>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Kết quả"></td>
                <td class="blue"><?php echo (!empty($result)) ? $result : '' ?></td>
            </tr>
        </table>
    </form>
    <h2><?php echo $error ?></h2>
</body>
</html>