<?php

namespace MickaelBaudoin\SimpleRender\Render;

/**
 * Description of simpleRender
 *
 * @author mickael baudoin
 */
class SimpleRender implements ISimpleRender{
    
    protected $pathLayouts = array();
    
    protected $nameLayout;
    
    protected $nameView;
    
    protected $pathViews = array();
    
    protected $view;
    
    protected $disableLayout = false;

    public $placeholderJs = "";

    public $title = "";
    
    public function setPathLayouts($string)
    {
        $this->pathLayouts[] = $string;
        return $this;
    }
    
    public function getPathLayouts()
    {
        return $this->pathLayouts;
    }
    
    public function setNameLayout($name)
    {
        $this->nameLayout = $name;
        return $this;
    }
    
    public function getNameLayout()
    {
        return $this->nameLayout;
    }
    
    public function setPathViews($string)
    {
        $this->pathViews[] = $string;
        return $this;
    }
    
    public function getPathViews()
    {
        return $this->pathViews;
    }
    
    public function setNameView($name)
    {
        $this->nameView = $name;
        return $this;
    }
    
    public function getNameView()
    {
        return $this->nameView;
    }
    
    public function getView($name)
    {
        $view = \Nagi88\SimpleRender\View\View::getInstance($name);
        $view->setPath($this->getPathViews());
        return $view;
    }
    
    public function disableLayout() {
        $this->disableLayout = true;
    }


    
    public function render($viewName = null, array $vars = array())
    {

    	if(null === $viewName){
            throw new \MickaelBaudoin\SimpleRender\Exception\NotViewException("view not found");
        }

		$view = $this->getView($viewName);
		$view->setVars($vars);
		
		//Retourne la vue sans le layout
		if($this->disableLayout){
		    return $view->render();
		}
		
		$exist = false;
		//Test si le layout exist
		foreach($this->pathLayouts as $pathLayout){
		    $layout = $pathLayout . $this->getNameLayout() . ".html";
		    if(file_exists($layout)){
			$exist = true;
		        break;
		    }
		}

		if($exist === false){
		    throw new \MickaelBaudoin\SimpleRender\Exception\NotLayoutException("layout not found");
		}

        

        ob_start();
        
        $view->render();

        //Si un path d'un script js est indiquer on l'ajoute a la fin du layout via $this->scriptJsPaths
        if( count($view->getScriptJsPaths()) > 0 ){
            foreach($view->getScriptJsPaths() as $jsPath){
                $this->placeholderJs .= "<script src='" . $jsPath . "'></script>";
            }
        }

        //On test si un titre a été défini par la vue
        if($view->getTitle() != null){
            $this->title = $view->getTitle();
        }

        //On récupère le flux envoyer par le render de la vue
        $content = ob_get_contents();
        //On clean le flux
        ob_end_clean();
        
        
        $layout = require $layout;
        ob_end_flush();
        
        return $layout;
    }
    
    
}
