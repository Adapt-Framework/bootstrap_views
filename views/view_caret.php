<?php

namespace extensions\bootstrap_views{
    
    class view_caret extends view{
        public function __construct(){
            parent::__construct('span');
            $this->add_class('caret');
        }
    }
    
}

?>