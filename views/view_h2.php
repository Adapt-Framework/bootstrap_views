<?php

namespace extensions\bootstrap_views{
    
    class view_h2 extends view{
        
        public function __construct($heading, $sub_heading = null){
            parent::__construct('h2', $heading);
            if (isset($sub_heading)) $this->add(new html_small($sub_heading));
        }
        
    }
    
    
}

?>