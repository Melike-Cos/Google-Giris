<?php 
 require_once 'coon.php';
require_once 'google-setting.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>


<?php (isset($_SESSION['oturum'])) ?>

<h2>Hoşgeldiniz, <?php echo $_SESSION['name'];?></h2>
<img src="<?php echo $_SESSION['picture'];?>" width="200" height="200" />
<br>
<a href="logout.php">Çıkış Yap</a>

    
</body>
</html>