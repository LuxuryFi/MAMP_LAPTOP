

<?php
    $error = "";
    $result = "";

    if (isset($_POST['submit'])){
        $number = $_POST['number'];

        if (empty($number)){
            $error = "Không được để trống";
        }
        else if (!is_numeric($number)){
            $error = "Cần phải nhập số";
        }
        
        function isPrime($number){
            if ($number < 2){
                return FALSE;
            }
            $is_prime = TRUE;
            for ($i = 2; $i <= sqrt($number); $i++){
                if ($number % $i == 0){
                    $is_prime = FALSE;
                    break;
                }
            }
            
            return $is_prime;
        }


        if (empty($error)){
           if (isPrime($number)){
               $result = "$number là số nguyên tố";
           }
           else {
               $result = "$number không phải số nguyên tố";
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
                <th colspan="2" class="blue">Kiểm tra số nguyên tố</th>
            </tr>
            <tr>
                <td>Nhập số cần kiểm tra</td>
                <td><input type="text" name="number"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Kiểm tra"></td>
                <td class="blue"><label for="" name="result" id="result" ><?php echo isset($_POST['number']) ? $result : ''?></label></td>
            </tr>
        </table>
    </form>
    <h2><?php echo $error?></h2>
    
</body>
</html>