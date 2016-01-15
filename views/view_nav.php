<?php

namespace bootstrap\views{
    
    class view_nav extends view{
        
        public function __construct($type = 'tabs', $items = array(), $selected_item = null){
            $tag = 'ul';
            switch($type){
            case "pills":
            case "tabs":
                $type = "nav-{$type}";
                break;
            case "navbar":
                $type = "{$type}-nav";
                break;
            case "breadcrumbs":
                $type = "";
                $tag = 'ol';
                break;
            }
            parent::__construct($tag, array('class' => 'nav ' . $type));
            $this->add($items);
            
            $this->selected_item = $selected_item;
        }
        
        public function pget_selected_item(){
            return $this->find('.active')->text();
        }
        
        public function pset_selected_item($item){
            $this->find('.active')->remove_class('active');
            $children = $this->get();
            foreach($children as $child){
                if ($child instanceof \adapt\html){
                    if ($child->find('a')->text() == $item){
                        $child->add_class('active');
                        break;
                    }
                }
            }
        }
        
        public function pget_justified(){
            return $this->has_class('nav-justified');
        }
        
        public function pset_jusified($value){
            if ($value === true){
                $this->add_class('nav-justified');
            }else{
                $this->remove_class('nav-justified');
            }
        }
        
        public function disabled_item($item){
            $children = $this->get();
            foreach($children as $child){
                if ($child instanceof \adapt\html){
                    if ($child->find('a')->text() == $item){
                        $child->add_class('disabled');
                        break;
                    }
                }
            }
        }
        
        public function is_disabled($item){
            $children = $this->get();
            foreach($children as $child){
                if ($child instanceof \adapt\html){
                    if ($child->find('a')->text() == $item){
                        return $child->has_class('disabled');
                    }
                }
            }
        }
        
        public function add($name, $url = null, $disabled = false){
            if (is_array($name) && !is_assoc($name)){
                foreach($name as $item) $this->add($item);
            }elseif (is_array($name) && is_assoc($name) && is_null($url)){
                foreach($name as $key => $url){
                    parent::add(new html_li(new html_a($key, array('href' => $url)), array('role' => 'presentation')));
                }
            }elseif(!is_object($name) && is_string($name) && is_string($url)){
                $item = new html_li(new html_a($name, array('href' => $url)), array('role' => 'presentation'));
                if ($disabled == true) $item->add_class('disabled');
                parent::add($item);
            }elseif(is_object($name) && $name instanceof view_dropdown){
                $item = new html_li(array('role' => 'presentation', 'class' => 'dropdown'));
                $caret = $name->find('.caret')->detach();
                
                $button = $name->find('button')->get(0);
                $parts = array_merge($button->get(), $caret->get());
                
                
                
                //$label = $name->find('button')->text();
                //if (is_null($label) || $label == ""){
                //    $button = $name->find('button')->get(0);
                //    if ($button instanceof \extensions\adapt\html){
                //        $label = array($button->get(), $caret->get(0));
                //    }
                //}else{
                //    $label = array($label, $caret->get(0));
                //}
                $id = $name->find('button')->attr('id'); //Shift the id to the a tag so aria-labelledby is correct
                $item->add(new html_a($parts, array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'href' => '#', 'role' => 'button', 'aria-expanded' => 'false', 'id' => $id)));
                //$item->add($dropdown_menu->get(0));
                $item->add($name->find('.dropdown-menu')->get(0));
                parent::add($item);
            }
        }
        
    }
    
}

?>