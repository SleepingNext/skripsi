<?php
$base_url = "https://kepal-ecommerce.herokuapp.com";
//$base_url = "https://localhost/skripsi";
require_once __DIR__ . '/../vendor/autoload.php';
//~ require "flash.php";
//~ $msg = new \Plasticbrain\FlashMessages\FlashMessages();
?>
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo $base_url;?>/assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo $base_url;?>/assets/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto-->
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="<?php echo $base_url;?>/assets/bootstrap-select/css/bootstrap-select.min.css">
    <!-- owl carousel-->
    <link rel="stylesheet" href="<?php echo $base_url;?>/assets/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>/assets/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo $base_url;?>/assets/css/style.default.css" id="theme-stylesheet"><link id="new-stylesheet" rel="stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo $base_url;?>/assets/css/custom.css">
    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="<?php echo $base_url;?>/assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo $base_url;?>/assets/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $base_url;?>/assets/img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $base_url;?>/assets/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $base_url;?>/assets/img/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $base_url;?>/assets/img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $base_url;?>/assets/img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $base_url;?>/assets/img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $base_url;?>/assets/img/apple-touch-icon-152x152.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
