<?php

namespace bootstrap\views{
    
    class view_responsive_embed extends view{
        
        const SIZE_4_BY_3 = 'embed-responsive-4by3';
        const SIZE_16_BY_9 = 'embed-responsive-16by9';
        
        public function __construct($item, $size = self::SIZE_16_BY_9){
            parent::__construct('div');
            $this->remove_class('responsive-embed');
            $this->add_class('embed-responsive');
            
            $this->size = $size;
            $this->add($item);
        }
        
        public function pset_size($size){
            $this->remove_class(self::SIZE_16_BY_9);
            $this->remove_class(self::SIZE_4_BY_3);
        }
        
        public function pget_size(){
            if ($this->has_class(self::SIZE_16_BY_9)){
                return self::SIZE_16_BY_9;
            }else{
                return self::SIZE_4_BY_3;
            }
        }
        
        public function add($item){
            $this->clear(); //Remove all current children
            if (is_object($item) && $item instanceof \adapt\html && in_array($item->tag, array('iframe', 'embed', 'video', 'object'))){
                $item->add_class('embed-responsive-item');
            }
            
            parent::add($item);
        }
        
    }
    
}

?>