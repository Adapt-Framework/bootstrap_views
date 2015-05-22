<?php

namespace extensions\bootstrap_views{
    
    class view_button_group extends view{
        
        const LARGE = 'btn-group-lg';
        const NORMAL = '';
        const SMALL = 'btn-group-sm';
        const EXTRA_SMALL = 'btn-group-xs';
        
        public function __construct($buttons = null, $size = self::NORMAL){
            parent::__construct('div', $buttons);
            $this->add_class('btn-group');
            $this->attr('role', 'group');
            $this->size = $size;
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
        
        public function aset_vertical_align($value){
            if ($value == true){
                $this->add_class('btn-group-vertical');
                $this->remove_class('btn-group');
            }else{
                $this->add_class('btn-group');
                $this->remove_class('btn-group-vertical');
            }
        }
        
        public function aget_vertical_align(){
            if ($this->has_class('btn-group')){
                return false;
            }else{
                return true;
            }
        }
        
        public function aset_justified($value){
            if ($value == true){
                $this->add_class('btn-group-justified');
            }else{
                $this->remove_class('btn-group-justified');
            }
        }
        
        public function aget_justified(){
            return $this->has_class('btn-group-justified');
        }
        
        public function add($items){
            if (is_array($items)) foreach($items as $item) $this->add($item);
            
            if ($items instanceof view_dropdown){
                $items->remove_class('dropdown');
                $items->add_class('btn-group');
            }
            
            parent::add($items);
        }
    }
    
}

?>