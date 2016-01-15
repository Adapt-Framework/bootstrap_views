<?php

namespace bootstrap\views{
    
    class view_badge extends view{
        
        public function __construct($count){
            parent::__construct('span', $count);
        }
    }
    
}

?>