<?php

namespace extensions\bootstrap_views{
    
    class view_row extends view{
        
        public function __construct($items = null){
            parent::__construct('div', $items);
        }
        
    }
    
    
}

?>