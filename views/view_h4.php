<?php

namespace bootstrap\views{
    
    class view_h4 extends view{
        
        public function __construct($heading, $sub_heading = null){
            parent::__construct('h4', $heading);
            if (isset($sub_heading)) $this->add(new html_small($sub_heading));
        }
        
    }
    
    
}

?>