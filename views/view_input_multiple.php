<?php

namespace bootstrap\views{
    
    abstract class view_input_multiple extends view{
        
        protected $_control;
        
        public function __construct($control, $label = null, $inline = false){
            if (($control instanceof view_input || $control instanceof \adapt\html_input) && in_array($control->attr('type'), array('radio', 'checkbox'))){
                $type = $control->attr('type');
                
                if ($inline == true){
                    parent::__construct('label', array($control, ' ', $label), array('class' => $type . '-inline'));
                }else{
                    parent::__construct('div', new html_label(array($control, $label)), array('class' => $type));
                }
                
                $this->_control = $control;
                
                $this->disabled = $control->disabled;
                
            }
        }
        
        
        public function pget_disabled(){
            return $this->has_attr('disabled');
        }
        
        public function pset_disabled($value){
            if ($value === true){
                $this->attr('disabled', '');
                $this->_control->disabled = true;
            }else{
                $this->remove_attr('disabled');
                $this->_control->disabled = false;
            }
        }
        
    }
    
    
}

?>