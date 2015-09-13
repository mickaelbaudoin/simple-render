
<h2>Use</h2>

<pre>
$simpleRender = new \MickaelBaudoin\SimpleRender\Render\SimpleRender();


$simpleRender->setPathLayouts(PATH_APP . "layouts/");
$simpleRender->setPathViews(PATH_APP . "views/");

//Recherche le layout default.html et la vue home.html
$simpleRender->setNameLayout("default");
$simpleRender->render("home", array('helloWorld' => 'Hello world'));
</pre>



