<h2>Example</h2>

<pre>
$simpleRender = new \Nagi88\SimpleRender\Render\SimpleRender();


$simpleRender->setPathLayouts(PATH_APP . "layouts/");
$simpleRender->setPathViews(PATH_APP . "views/");

//Search default.html and view test.html
$simpleRender->setNameLayout("default");
$simpleRender->render("test", array('test' => 'tefsfsfsfsf'));
</pre>
