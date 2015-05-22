<?php

namespace extensions\bootstrap_views{
    
    class view_panel extends view{
        
        const NORMAL = '';
        const PRIMARY = 'panel-primary';
        const SUCCESS = 'panel-success';
        const INFO = 'panel-info';
        const WARNING = 'panel-warning';
        const DANGER = 'panel-danger';
        
        protected $_heading;
        protected $_body;
        protected $_footer;
        
        public function __construct($content = null, $title = null, $style = self::NORMAL){
            parent::__construct('div');
            $this->_heading = new html_div(array('class' => 'panel-heading'));
            $this->_body = new html_div(array('class' => 'panel-body'));
            $this->_footer = new html_div(array('class' => 'panel-footer'));
            parent::add($this->_heading, $this->_body, $this->_footer);
            
            $this->body->add($content);
            $this->title = $title;
            $this->style = $style;
        }
        
        public function pget_style(){
            if ($this->has_class(self::PRIMARY)){
                return self::PRIMARY;
            }elseif($this->has_class(self::SUCCESS)){
                return self::SUCCESS;
            }elseif($this->has_class(self::INFO)){
                return self::INFO;
            }elseif($this->has_class(self::WARNING)){
                return self::WARNING;
            }elseif($this->has_class(self::DANGER)){
                return self::DANGER;
            }
            
            return self::NORMAL;
        }
        
        public function pset_style($style){
            $classes = array(
                self::PRIMARY, self::SUCCESS, self::INFO,
                self::WARNING, self::DANGER
            );
            
            foreach($classes as $class){
                $this->remove_class($class);
            }
            
            if (in_array($style, $classes)){
                $this->add_class($style);
            }
        }
        
        public function pget_title(){
            return $this->_heading->find('.panel-title')->text();
        }
        
        public function pset_title($title){
            if ($this->_heading->find('.panel-title')->size() > 0){
                if (!is_object($title) && is_string($title) && $title != ""){
                    $this->_heading->find('.panel-title')->text($title);
                }elseif(is_object($title) && $title instanceof frameworks\adapt\html){
                    $this->_heading->find('.panel-title')->detach();
                    if (strlen($title->tag) == 2 && substr($title->tag, 0, 1) == 'h'){
                        $title->add_class('panel-title');
                    }
                    
                    $this->_heading->add($title);
                }
            }else{
                if (!is_object($title) && is_string($title) && $title != ""){
                    $this->_heading->add(new html_h3($title, array('class' => 'panel-heading')));
                }elseif(is_object($title) && $title instanceof frameworks\adapt\html){
                    if (strlen($title->tag) == 2 && substr($title->tag, 0, 1) == 'h'){
                        $title->add_class('panel-title');
                    }
                    
                    $this->_heading->add($title);
                }
            }
        }
        
        public function pget_heading(){
            return $this->_heading;
        }
        
        public function pget_body(){
            return $this->_body;
        }
        
        public function pget_footer(){
            return $this->_footer;
        }
        
        public function add($item){
            if (is_array($item)) foreach($item as $i) $this->add($i);
            
            if (is_object($item) && $item instanceof html){
                if ($item->tag == 'table' && $item->has_class('table')){
                    parent::add($item);
                }elseif($item instanceof view_list_group){
                    parent::add($item);
                }else{
                    $this->_body->add($item);
                }
            }else{
                $this->_body->add($item);
            }
        }
        
        public function render(){
            if ($this->_header->count() == 0){
                $this->find('.panel-header')->detach();
            }
            
            if ($this->_footer->count() == 0){
                $this->find('.panel-footer')->detach();
            }
            
            return parent::render();
        }
        
    }
    
}

?>