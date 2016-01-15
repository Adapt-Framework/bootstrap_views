<?php

namespace bootstrap\views{
    
    class view_button extends view{
        
        const STANDARD = "btn-default";
        const PRIMARY = "btn-primary";
        const SUCCESS = "btn-success";
        const INFO = "btn-info";
        const WARNING = "btn-warning";
        const DANGER = "btn-danger";
        const LINK = "btn-link";
        
        const LARGE = 'btn-lg';
        const NORMAL = '';
        const SMALL = 'btn-sm';
        const EXTRA_SMALL = 'btn-xs';
        
        public function __construct($label, $size = self::NORMAL, $style = self::STANDARD){
            parent::__construct('button', $label);
            $this->attr('type', 'button');
            $this->add_class('btn');
            $this->size = $size;
            $this->style = $style;
        }
        
        public function aset_style($style){
            $classes = array(
                self::STANDARD, self::PRIMARY, self::SUCCESS, self::INFO,
                self::WARNING, self::DANGER, self::LINK
            );
            
            foreach($classes as $class) $this->remove_class($class);
            $this->add_class($style);
        }
        
        public function aget_style(){
            $classes = array(
                self::STANDARD, self::PRIMARY, self::SUCCESS, self::INFO,
                self::WARNING, self::DANGER, self::LINK
            );
            
            foreach($classes as $class){
                if ($this->has_class($class)) return $class;
            }
            
            /* We have no default style... whoops */
            $this->add_class(self::STANDARD);
            return self::STANDARD;
        }
        
        public function aset_size($size){
            $this->remove_class(self::LARGE);
            $this->remove_class(self::SMALL);
            $this->remove_class(self::EXTRA_SMALL);
            
            if ($size && $size != ""){
                $this->add_class($size);
            }
        }
        
        public function aget_size(){
            if ($this->has_class(self::LARGE)){
                return self::LARGE;
            }elseif($this->has_class(self::SMALL)){
                return self::SMALL;
            }elseif($this->has_class(self::EXTRA_SMALL)){
                return self::EXTRA_SMALL;
            }else{
                return self::NORMAL;
            }
        }
        
        public function aset_block($value){
            if ($value == true){
                $this->add_class('btn-block');
            }else{
                $this->remove_class('btn-block');
            }
        }
        
        public function aget_block(){
            if ($this->has_class('btn-block')){
                return true;
            }else{
                return false;
            }
        }
        
        public function aset_disabled($value){
            if ($value == true){
                $this->attr('disabled', 'disabled');
            }else{
                $this->remove_attr('disabled');
            }
        }
        
        public function aget_disabled(){
            if ($this->attr('disabled') == 'disabled'){
                return true;
            }else{
                return false;
            }
        }
        
    }
    
}

?>