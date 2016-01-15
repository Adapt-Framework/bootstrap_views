<?php

namespace bootstrap\views{
    
    class view_input_static extends view{
        
        public function __construct($value = null){
            parent::__construct('p', $value, array('class' => 'form-control-static'));
        }
        
    }
    
}

?>