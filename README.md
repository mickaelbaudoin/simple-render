
Un exemple est présenté dans le répertoire Examples.

<h2>Utilisation</h2>

<pre>
$simpleRender = new \Nagi88\SimpleRender\Render\SimpleRender();


$simpleRender->setPathLayouts(PATH_APP . "layouts/");
$simpleRender->setPathViews(PATH_APP . "views/");

//Recherche le layout default.html et la vue home.html
$simpleRender->setNameLayout("default");
$simpleRender->render("home", array('helloWorld' => 'Hello world'));
</pre>



