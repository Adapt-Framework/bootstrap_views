<?php

namespace extensions\bootstrap_views{
    
    class view_dropdown extends view{
        
        protected $_menu;
        
        public function __construct($name, $items = null){
            $button = new view_button(array($name, new view_caret()));
            $button->set_id();
            $button->add_class('dropdown-toggle');
            $button->attr('data-toggle', 'dropdown');
            $button->attr('aria-expanded', 'true');
            $this->_menu = new html_ul($items, array('class' => 'dropdown-menu', 'role' => 'menu', 'aria-labelledby' => $button->attr('id')));
            parent::__construct();
            parent::add($button);
            
            
            parent::add($this->_menu);
        }
        
        public function add($items){
            /*if (is_array($items)){
                foreach($items as $item) $this->add($item);
                return;
            }*/
            $this->_menu->add($items);
            //print 'x';
            //$this->find('.dropdown-menu')->append($items);
        }
        
    }
    
    
}

?>