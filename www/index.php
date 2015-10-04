<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>rating</title>
    <link rel="stylesheet" href="css/main.css" type="text/css"/>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

    <!--script type="text/javascript" src="js/jquery.js"></script-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/underscore.js"></script>
    <script type="text/javascript" src="js/backbone.js"></script>
    <script type="text/javascript" src="js/model.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</head>

<body>
	<div id="wrapper" class="wrapper">
		<?php
            require "predis/autoload.php";

            Predis\Autoloader::register();

            try {
                $redis = new Predis\Client();
                // This connection is for a remote server
                /*
                    $redis = new PredisClient(array(
                        "scheme" => "tcp",
                        "host" => "153.202.124.2",
                        "port" => 6379
                    ));
                */
                // получаем строу по ключу

                // finally
                $data = 'ae';
                print_r($data);
            }
            catch (Exception $e) {
                die($e->getMessage());
            }
		?>
	</div>
</body>
</html>
