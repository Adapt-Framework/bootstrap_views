<?php

namespace bootstrap\views{
    
    class view_label extends view{
        
        const STANDARD = 'label-default';
        const PRIMARY = 'label-primary';
        const SUCCESS = 'label-success';
        const INFO = 'label-info';
        const WARNING = 'label-warning';
        const DANGER = 'label-danger';
        
        public function __construct($text, $style = self::STANDARD){
            parent::__construct('span', $text);
            $this->style = $style;
        }
        
        public function aset_style($style){
            $classes = array(
                self::STANDARD, self::PRIMARY, self::SUCCESS,
                self::INFO, self::WARNING, self::DANGER
            );
            
            foreach($classes as $class){
                $this->remove_class($class);
            }
            
            $this->add_class($style);
        }
        
        public function aget_style(){
            $classes = array(
                self::STANDARD, self::PRIMARY, self::SUCCESS,
                self::INFO, self::WARNING, self::DANGER
            );
            
            foreach($classes as $class){
                if ($this->has_class($class)) return $class;
            }
        }
    }
    
}

?>