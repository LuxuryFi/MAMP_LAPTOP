
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="title" content="Seo Meta title">
    <meta name="description" content="Seo Meta description">
    <meta name="keyword" content="Seo Meta keyword">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->title_page ?></title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>

</head>
<body>
    <div class="header"></div>
    <div class="main-content">
        <div class="container">
            <?php if(!empty($this->error)) :?>
                <div class="alert alert-danger">
                    <?php $this->error ?>
                </div>
            <?php endif;?>
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif;?>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif;?>
        </div>
        <?php echo $this->content; ?>
    </div>
    <div class="footer"></div>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>