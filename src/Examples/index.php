<?php
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

$simpleRender = new MickaelBaudoin\SimpleRender\Render\SimpleRender();

$simpleRender->setPathLayouts(__DIR__ . "/layouts/");
$simpleRender->setPathViews(__DIR__ . "/views/");

$simpleRender->setNameLayout("default");
$simpleRender->render("home", array('test' => 'test1'));


?>
