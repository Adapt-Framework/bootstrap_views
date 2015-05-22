<?php

namespace extensions\bootstrap_views{
    
    class view_container_fluid extends view{
        
        public function __construct($data = null, $attributes = array()){
            parent::__construct('div', $data, $attributes);
        }
        
    }
    
    
}

?>