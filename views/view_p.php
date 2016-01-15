<?php

namespace bootstrap\views{
    
    class view_p extends view{
        
        const NONE = '';
        const LEFT = 'text-left';
        const RIGHT = 'text-right';
        const CENTER = 'text-center';
        const JUSTIFIED = 'text-justified';
        const NOWRAP = 'text-nowrap';
        
        const LOWERCASE = 'text-lowercase';
        const UPPERCASE = 'text-uppercase';
        const CAPITALIZE = 'text-capitalize';
        
        const MUTED = 'text-muted';
        const PRIMARY = 'text-primary';
        const SUCCESS = 'text-success';
        const INFO = 'text-info';
        const WARNING = 'text-warning';
        const DANGER = 'text-danger';
        
        const BG_PRIMARY = 'bg-primary';
        const BG_SUCCESS = 'bg-success';
        const BG_INFO = 'bg-info';
        const BG_WARNING = 'bg-warning';
        const BG_DANGER = 'bg-danger';
        
        
        public function __construct($text, $lead = false, $alignment = self::NONE, $transform = self::NONE, $style = self::NONE, $background = self::NONE){
            parent::__construct('p', $text);
            $this->lead = $lead;
            $this->alignment = $alignment;
            $this->transform = $transform;
            $this->style = $style;
            $this->background = $background;
        }
        
        public function aset_lead($value){
            if ($value == true){
                $this->add_class('lead');
            }else{
                $this->remove_class('lead');
            }
        }
        
        public function aget_lead(){
            return $this->has_class('lead');
        }
        
        public function aset_alignment($alignment){
            $classes = array(
                self::LEFT, self::RIGHT, self::CENTER,
                self::JUSTIFIED, self::NOWRAP
            );
            
            foreach($classes as $class){
                $this->remove_class($class);
            }
            
            $this->add_class($alignment);
        }
        
        public function aget_alignment(){
            $classes = array(
                self::LEFT, self::RIGHT, self::CENTER,
                self::JUSTIFIED, self::NOWRAP
            );
            
            foreach($classes as $class){
                if ($this->has_class($class)){
                    return $class;
                }
            }
            
            return self::NONE;
        }
        
        public function aset_transform($value){
            $classes = array(
                self::UPPERCASE, self::LOWERCASE, self::CAPITALIZE
            );
            
            foreach($classes as $class) $this->remove_class($class);
            
            $this->add_class($value);
        }
        
        public function aget_transform(){
            $classes = array(
                self::UPPERCASE, self::LOWERCASE, self::CAPITALIZE
            );
            
            foreach($classes as $class){
                if ($this->has_class($class)){
                    return $class;
                }
            }
            
            return self::NONE;
        }
        
        public function aset_style($style){
            $classes = array(
                self::MUTED, self::PRIMARY, self::SUCCESS, self::INFO,
                self::WARNING, self::DANGER
            );
            
            foreach($classes as $class) $this->remove_class($class);
            $this->add_class($style);
        }
        
        public function aget_style(){
            $classes = array(
                self::MUTED, self::PRIMARY, self::SUCCESS, self::INFO,
                self::WARNING, self::DANGER
            );
            
            foreach($classes as $class){
                if ($this->has_class($class)) return $class;
            }
            
            return self::NONE;
        }
        
        public function aset_background($value){
            $classes = array(
                self::BG_PRIMARY, self::BG_SUCCESS, self::BG_INFO,
                self::BG_WARNING, self::BG_DANGER
            );
            
            foreach($classes as $class) $this->remove_class($class);
            $this->add_class($value);
        }
        
        public function aget_background(){
            $classes = array(
                self::BG_PRIMARY, self::BG_SUCCESS, self::BG_INFO,
                self::BG_WARNING, self::BG_DANGER
            );
            
            foreach($classes as $class){
                if ($this->has_class($class)) return $class;
            }
            
            return self::NONE;
        }
        
    }
    
}

?>