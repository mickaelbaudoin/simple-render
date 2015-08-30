<?php

namespace MickaelBaudoin\SimpleRender\Render;

/**
 *
 * @author mickael baudoin
 */
interface ISimpleRender {
    
    public function setPathLayouts($string);
    
    public function getPathLayouts();
    
    public function setNameLayout($name);
    
    public function getNameLayout();
    
    public function setPathViews($string);
    
    public function getPathViews();
    
    public function setNameView($name);
    
    public function getNameView();
    
    public function getView($name);
    
    public function render($viewName, array $vars = array());
    
    public function disableLayout();
}
