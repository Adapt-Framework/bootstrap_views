<?php

namespace bootstrap\views{
    
    class view_breadcrumbs extends view{
        
        public function __construct($items){
            parent::__construct('ol');
            $this->add($items);
        }
        
        public function add($name, $url = null, $selected = false){
            if (!is_array($name) && is_assoc($name)){
                foreach($name as $label => $url) $this->add($label, $url);
            }elseif(!is_object($name) && is_string($name)){
                if ($selected == true){
                    $this->add(new html_li($name, array('class' => 'active')));
                }else{
                    $this->add(new html_li(new html_a($name, array('href' => $url))));
                }
            }
        }
        
        
    }
    
}

?>