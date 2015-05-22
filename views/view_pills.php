<?php

namespace extensions\bootstrap_views{
    
    class view_pills extends view_nav{
        
        public function __construct($items = array(), $selected_item = null){
            parent::__construct('pills', $items, $selected_item);
        }
        
        public function pget_stacked(){
            return $this->has_class('nav-stacked');
        }
        
        public function pset_stacked($value){
            if ($value === true){
                $this->add_class('nav-stacked');
            }else{
                $this->remove_class('nav-stacked');
            }
        }
        
    }
    
    
}

?>