<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap -->
    <? $template= Factory::getConfig('template');?>
    <link href="<?php echo $template;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $template;?>/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="<?php echo $template;?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $template;?>/css/normalize.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo $template;?>/js/my.js"></script>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
   <a href="/">

       <div class="slogon col-lg-3">OnCore GuestBook</div>
            </a>
            <div class="col-lg-5">
            <nav>
<ul class="menu">
    <li>
        <a href="/">Product </a>
    </li>
    <li>
        <a href="/">Customers </a>
    </li>
    <li>
        <a href="/">Company </a>
    </li>
    <li>
        <a href="/">Contact </a>
    </li>
</ul>
            </nav>
            </div>
<div class="col-lg-3">
    <form class="form-inline">


                <input type="text" class="search form-control" id="exampleInputAmount" placeholder="Искать">


    </form>
</div>
    </div>
    </div>

</header>







