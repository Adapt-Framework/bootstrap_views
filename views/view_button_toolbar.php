<?php

namespace bootstrap\views{
    
    class view_button_toolbar extends view{
        
        public function __construct($groups = null){
            parent::__construct('div', $groups);
            $this->add_class('btn-toolbar');
            $this->attr('role', 'toolbar');
        }
        
    }
    
}

?>