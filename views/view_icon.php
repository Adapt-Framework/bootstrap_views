<?php

namespace extensions\bootstrap_views{
    
    
    class view_icon extends view{
        
        public function __construct($icon_name){
            parent::__construct('span');
            $this->add_class('glyphicon');
            $this->add_class('glyphicon-' . $icon_name);
        }
        
    }
    
    
}

?>