<?php
    /*
        views/users/register.php
    */ 
    


?>


<div class="container">
    <form action="" method="POST">
        <h1>Form đăng ký</h1>
        <div clas="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="confirm_password">
                Nhập lại password
            </label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control">
        </div>
        <div class="form-group">
    
            <input type="submit" name="register" class="btn btn-primary" value="Đăng ký">
        </div>
    </form>
</div>