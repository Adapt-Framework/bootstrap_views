<?php

namespace bootstrap\views{
    
    class view_page_header extends view{
        
        public function __construct($title, $sub_heading = null){
            parent::__construct('div', new view_h1($title, $sub_heading));
        }
        
    }
    
    
}

?>