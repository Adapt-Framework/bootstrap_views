<?php

namespace bootstrap\views{
    
    class view_tabs extends view_nav{
        
        public function __construct($items = array(), $selected_item = null){
            parent::__construct('tabs', $items, $selected_item);
        }
        
    }
    
    
}

?>