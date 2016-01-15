<?php

namespace bootstrap\views{
    
    class view_jumbotron extends view{
        
        public function __construct($title = null, $full_width = false, $items = null){
            parent::__construct();
            if (!is_null($title)) parent::add(new html_h1($title));
            $this->add($items);
            $this->full_width = $full_width;
        }
        
        public function pget_full_width(){
            return $this->find('.container')->size() > 0 ? true : false;
        }
        
        public function pset_full_width($full_width){
            if ($full_width == true){
                if (!$this->full_width){
                    $container = new view_container($this->get());
                    $this->clear();
                    parent::add($container);
                }
            }else{
                if ($this->full_width){
                    if ($this->get(0) instanceof view_container){
                        $children = $this->get(0)->get();
                        $this->clear();
                        $this->add($children);
                    }
                }
            }
        }
        
        public function add($items){
            if ($this->full_width){
                if ($this->get(0) instanceof view_container){
                    $this->get(0)->add($items);
                }
            }else{
                parent::add($items);
            }
        }
        
    }
    
    
}

?>