<?php
require_once 'coon.php';
require_once 'google-api.php';
require_once 'google-setting.php';

if(isset($_GET['code'])){

    $get = new GooogleLoginApi();
    $data = $get->AccessToken(CLIENT_ID,CLIENT_REDIRECT_URL,CLIENT_SECRET, $_GET['code']);
    $user = $get->GetUserProfileInfo($data['access_token']);

    $name    = $user['name'];
    $email  = $user['email'];
    $passwords = sha1(md5($email));
    $picture   = $user['picture'];
  

    $varmi   = $conn->prepare("SELECT * FROM user WHERE email=:e ");
    $varmi->execute([':e' => $email,]);
    if($varmi->rowCount()){

        $guncelle  = $conn->prepare("UPDATE user SET name=:n,picture=:r WHERE email=:e ");
        $guncelle->execute([':n' => $name,':r'=>$picture,':e'=>$email,]);

    }else{

        $ekle   = $conn->prepare("INSERT INTO user values
            name      =:n,
            email     =:e,
            password  =:p,
            picture   =:r
          
        ");

        $ekle->execute([
            ':n'    => $name,
            ':e'    => $email,
            ':p'    => $passwords,
            ':r'    => $picture
          
        ]);

    }


    $_SESSION['oturum'] = true;
    $_SESSION['name']   = $name;
    $_SESSION['email'] = $email;
    $_SESSION['picture']  = $picture;
    header('Location:home.php');

}

?>