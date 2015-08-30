<h2>Example</h2>

<pre>
$simpleRender = new \Nagi88\SimpleRender\Render\SimpleRender();


$simpleRender->setPathLayouts(PATH_APP . "layouts/");
$simpleRender->setPathViews(PATH_APP . "views/");

//Search default.html and view test.html
$simpleRender->setNameLayout("default");
$simpleRender->render("test", array('helloWorld' => 'Hello world'));
</pre>

<h2>Exemple layout</h2>
créer une page html default.html
<pre>
  "<! doctype html>"
  "<html>"
  	"<head>"
  		<meta charset="utf8"/>
  		<title>Test simple render</title>
  		<link rel="stylesheet" type="text/css" href="./css/main.css" />
  	</head>
  
  	<body>
  		<h1>Premier test de rendu</h1>
  		<div class="content">
  			<?php echo $content; //affiche le contenu des vues?>
  		</div>
  		<?php echo $this->placeholderJs; //Affiche les balise script selon les path indiquer depuis une vue?>
  	</body>
  </html>
</pre>

<h2>Exemple vue</h2>
Créer une vue home.html
<pre>
  <p>
  	bienvenue sur home.html
  </p>
  <p>
  	<?php echo $helloWorld;?>
  </p>
  
  
  <?php $this->addScriptJsPath('/js/path/test.js'); ?>
  <?php $this->addScriptJsPath('/js/path/test/test2.js'); ?>
</pre>


