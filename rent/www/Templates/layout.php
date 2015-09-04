<!DOCTYPE html>
<html>
<head>
    <title>Test rent</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/css/main.css" type="text/css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="<?php $this->checkActiveMenuItem("index", $parameters["action"])?>"><a href="/">Main</a></li>
                    <li role="presentation" class="<?php $this->checkActiveMenuItem("orderNew", $parameters["action"])?>"><a href="/order/new">Create order</a></li>
                    <li role="presentation" class="<?php $this->checkActiveMenuItem("order", $parameters["action"])?>"><a href="/order">Orders list</a></li>
                    <li role="presentation" class="<?php $this->checkActiveMenuItem("apartment", $parameters["action"])?>"><a href="/apartment">Apartments list</a></li>
                </ul>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <?php include_once $view; ?>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>