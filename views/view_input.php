<?php

namespace bootstrap\views{
    
    class view_input extends view{
        
        const LARGE = 'input-lg';
        const NORMAL = '';
        const SMALL = 'input-sm';
        
        public function __construct($type = "text", $name = null, $value = null, $placeholder = null, $size = self::NORMAL){
            parent::__construct('input');
            
            
            $supported_types = array(
                'text', 'password', 'datetime', 'datetime-local', 'date', 'month',
                'time', 'week', 'number', 'email', 'url', 'search', 'tel', 'color',
                'checkbox', 'radio', 'file'
            );
            
            $type = strtolower($type);
            
            if (!in_array($type, $supported_types)) $type = "text";
            
            if (!in_array($type, array('file', 'radio', 'checkbox'))) $this->add_class('form-control');
            
            $this->attr('type', $type);
            
            if (!is_null($name)) $this->attr('name', $name);
            if (!is_null($placeholder)) $this->attr('placeholder', $placeholder);
            
            if (!is_null($value)){
                $this->attr('value', $value);
            }
            
            $this->size = $size;
        }
        
        public function pget_disabled(){
            return $this->has_attr('disabled');
        }
        
        public function pset_disabled($value){
            if ($value === true){
                $this->attr('disabled', '');
            }else{
                $this->remove_attr('disabled');
            }
        }
        
        public function pget_read_only(){
            return $this->has_attr('readonly');
        }
        
        public function pset_read_only($value){
            if ($value === true){
                $this->attr('readonly');
            }else{
                $this->remove_attr('readonly');
            }
        }
        
        public function pset_size($size){
            $this->remove_class(self::LARGE);
            $this->remove_class(self::SMALL);
            
            if ($size && $size != ""){
                $this->add_class($size);
            }
        }
        
        public function pget_size(){
            if ($this->has_class(self::LARGE)){
                return self::LARGE;
            }elseif($this->has_class(self::SMALL)){
                return self::SMALL;
            }else{
                return self::NORMAL;
            }
        }
        
    }
    
    
}

?>