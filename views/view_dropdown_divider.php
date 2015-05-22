<?php

namespace extensions\bootstrap_views{
    
    class view_dropdown_divider extends view{
        
        public function __construct($name = "", $url = "#", $disabled = false){
            parent::__construct('li', array('role' => 'presentation', 'class' => 'divider'));
        }
        
        
    }
    
    
}

?>