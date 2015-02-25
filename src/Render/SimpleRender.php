<?php

namespace Nagi88\SimpleRender\Render;

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
        $view = View::getInstance($name);
        $view->setPath($this->getPathViews());
        return $view;
    }
    
    public function disableLayout() {
        $this->disableLayout = true;
    }
    
    public function render($viewName, array $vars = array())
    {
        $view = $this->getView($viewName);
        $view->setVars($vars);
        
        //Return view without layout
        if($this->disableLayout){
            return $view->render();
        }
        
        //Test if layout exist in paths
        foreach($this->pathLayouts as $pathLayout){
            $layout = $pathLayout . $this->getNameLayout() . ".html";
            if(file_exists($layout)){
                break;
            }
        }
        
        //Buffer
        ob_start();
        
        $view->render();
        //On récupère le flux envoyer par le render de la vue
        $content = ob_get_contents();
        //On clean le flux
        ob_end_clean();
        
        
        $layout = require $layout;
        ob_end_flush();
        
        return $layout;
    }
    
    
}
