<?php

namespace bootstrap\views{
    
    /*
     * Prevent direct access
     */
    defined('ADAPT_STARTED') or die;
    
    class view_dropdown_menu_item extends view{
        
        public function __construct($name = "", $url = "#", $disabled = false){
            parent::__construct('li', array('role' => 'presentation'));
            $this->add(new html_a($name, array('href' => $url, 'role' => 'menuitem', 'tabindex' => '-1')));
            
            $this->disabled = $disabled;
        }
        
        public function pget_disabled(){
            return $this->has_class('disabled');
        }
        
        public function pset_disabled($value){
            if ($value === true){
                $this->attr('disabled', '');
            }else{
                $this->remove_attr('disabled');
            }
        }
        
    }
    
    
}

?>