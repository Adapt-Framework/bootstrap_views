<?php

namespace extensions\bootstrap_views{
    
    class view_img extends view{
        
        const NORMAL = '';
        const ROUNDED = 'img-rounded';
        const CIRCLE = 'img-circle';
        const THUMBNAIL = 'img-thumbnail';
        
        public function __construct($src, $alt = "", $responsive = true, $shape = self::NORMAL){
            parent::__construct('img');
            
        }
        
        public function aset_responsive($value){
            if ($value == true){
                $this->add_class('img-responsive');
            }else{
                $this->remove_class('img-responsive');
            }
        }
        
        public function aget_responsive(){
            return $this->has_class('img-responsive');
        }
        
        public function aset_shape($value){
            $classes = array(self::ROUNDED, self::CIRCLE, self::THUMBNAIL);
            foreach($classes as $class) $this->remove_class($value);
            $this->add_class($value);
        }
        
        public function aget_shape(){
            $classes = array(self::ROUNDED, self::CIRCLE, self::THUMBNAIL);
            foreach($classes as $class){
                if ($this->has_class($class)) return $class;
            }
            
            return self::NORMAL;
        }
        
    }
    
    
}

?>