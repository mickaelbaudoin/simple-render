<?php

namespace MickaelBaudoin\SimpleRender\View;

/**
 * Description of View
 *
 * @author mickael baudoin
 */
class View implements IView{
    protected $paths = array();
    
    protected $name;
    
    protected $vars = array();
    
    protected $view;

    protected $scriptJsPaths = array();

    protected $title = null;

    public function __construct($name) {
        $this->name = $name;
    }
    
    public static function getInstance($name)
    {
        return new self($name);
    }
    
    public function setPath($path)
    {        
        if(is_array($path)){
            $pathDefault = $this->paths;
            $this->paths = array_merge($pathDefault,$path);
        }else{
            $this->paths[] = $path;
        }
        
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setVars(array $vars = array())
    {
        $this->vars = array_merge($this->vars, $vars);
        return $this;
    }

    public function addScriptJsPath($string)
    {
        $this->scriptJsPaths[] = $string;
        return $this;
    }

    public function getScriptJsPaths()
    {
        return $this->scriptJsPaths;
    }

    public function setTitle($string)
    {
        $this->title = $string;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
    public function render()
    {
        $exist = false;
        foreach($this->paths as $path){
            $viewPath = $path . $this->getName() . ".html";
            if(file_exists($viewPath)){
                $exist = true;
                break;
            }
        }
        
        if($exist === false){
            throw new \MickaelBaudoin\SimpleRender\Exception\NotViewException("view not found");
        }
        
        //Extract variables of $this->vars
        ob_start();
        extract($this->vars);
        ob_end_flush();
        $view = require $viewPath;
        return $view;
    }
}
