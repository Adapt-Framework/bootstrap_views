<?php

namespace bootstrap\views{
    
    class view_container extends view{
        
        public function __construct($data = null, $attributes = array()){
            parent::__construct('div', $data, $attributes);
        }
        
    }
    
    
}

?>