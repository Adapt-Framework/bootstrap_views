<?php

namespace bootstrap\views{
    
    class view_alert extends view{
        
        const SUCCESS = 'alert-success';
        const INFO = 'alert-info';
        const WARNING = 'alert-warning';
        const DANGER = 'alert-danger';
        
        public function __construct($message, $style = self::INFO, $dismissable = false){
            parent::__construct('div');
            parent::add($message);
            $this->attr('role', 'alert');
            $this->style = $style;
            $this->dismissable = $dismissable;
        }
        
        public function aset_style($style){
            $classes = array(
                self::SUCCESS, self::INFO,
                self::WARNING, self::DANGER
            );
            
            foreach($classes as $class){
                $this->remove_class($class);
            }
            
            $this->add_class($style);
        }
        
        public function aget_style(){
            $classes = array(
                self::SUCCESS, self::INFO,
                self::WARNING, self::DANGER
            );
            
            foreach($classes as $class){
                if ($this->has_classs($class)){
                    return $class;
                }
            }
        }
        
        public function aset_dismissable($value){
            if ($value == true){
                if (!$this->dismissable){
                    $this->add_class('alert-dismissable');
                    $this->find()->prepend(new view_close());
                }
            }else{
                if ($this->dismissable){
                    $this->find('.view.bs.close').detach();
                    $this->remove_class('alert-dismissable');
                }
            }
        }
        
        public function aget_dismissable(){
            return $this->has_class('alert-dismissable');
        }
        
        public function add($items){
            /*
             * Overridden to append the class 'alert-link' to a tags
             */
            if (is_array($items)) foreach($items as $item) $this->add($item);
            
            if ($item instanceof \adapt\html_a){
                $item->add_class('alert-link');
            }elseif($item instanceof \adapt\html){
                $item->find('a')->add_class('alert-link');
            }
            
            parent::add($item);
        }
        
    }
    
}

?>