<?php

namespace bootstrap\views{
    
    class view_well extends view{
        
        const STANDARD = '';
        const LARGE = 'well-lg';
        const SMALL = 'well-sm';
        
        public function __construct($items, $size = self::STANDARD){
            parent::__construct('div', $items);
        }
        
        public function aset_size($value){
            $this->remove_class(self::SMALL);
            $this->remove_class(self::LARGE);
            
            $this->add_class($value);
        }
        
        public function aget_size(){
            if ($this->has_class(self::SMALL)) return self::SMALL;
            if ($this->has_class(self::LARGE)) return self::LARGE;
            return self::STANDARD;
        }
        
    }
    
}

?>