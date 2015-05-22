<?php

namespace extensions\bootstrap_views{
    
    class view_badge extends view{
        
        public function __construct($count){
            parent::__construct('span', $count);
        }
    }
    
}

?>