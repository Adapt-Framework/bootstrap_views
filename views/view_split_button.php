<?php

namespace bootstrap\views{
    
    class view_split_button extends view{
        
        public function __construct($name, $items = null){
            parent::__construct();
            $this->add_class('btn-group');
            parent::add(new view_button($name));
            $button = new view_button(new view_caret());
            $button->set_id();
            $button->add_class('dropdown-toggle');
            $button->attr('data-toggle', 'dropdown');
            $button->attr('aria-expanded', 'true');
            parent::add($button);
            
            $menu = new html_ul($items, array('class' => 'dropdown-menu', 'role' => 'menu', 'aria-labelledby' => $button->attr('id')));
            parent::add($menu);
        }
        
        public function add($items){
            if (is_array($items)) foreach($items as $item) $this->add($item);
            
            $this->find('.dropdown-menu')->append($items);
        }
        
    }
    
    
}

?>