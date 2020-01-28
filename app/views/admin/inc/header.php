<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT; ?>/images/favicon.ico">
  <!-- Import Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
  <!-- Material -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.css">
  <!-- Custom CSS File -->
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">
  <!-- <title><?php echo SITENAME; ?></title> -->
  <title><?php echo isset($data['html_title']) ? $data['html_title'] : SITENAME; ?></title>
</head>

<body>
  <?php require APPROOT . '/views/admin/inc/navbar.php'; ?>