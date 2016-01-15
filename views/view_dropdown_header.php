<?php

namespace bootstrap\views{
    
    class view_dropdown_header extends view{
        
        public function __construct($name = ""){
            parent::__construct('li', $name, array('role' => 'presentation'));
        }
        
        
    }
    
    
}

?>