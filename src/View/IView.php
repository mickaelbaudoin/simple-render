<?php

namespace Nagi88\SimpleRender\View;

/**
 *
 * @author mickael baudoin
 */
interface IView {
    
    /**
     * @return string
     */
    public function getName();
    
    /**
     * @return view
     */
    public function render();
    
    /**
     * set array associat
     */
    public function setVars(array $vars = array());
    
    /**
     * @return IView
     */
    public static function getInstance($name);
    
    /**
     * set array 
     */
    public function setPath($path);
}
