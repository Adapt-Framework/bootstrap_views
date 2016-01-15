<?php

namespace bootstrap\views{
    
    class view_media_list extends view{
        
        const LEFT = 'media-left';
        const RIGHT = 'media-right';
        
        const TOP = '';
        const MIDDLE = 'media-middle';
        const BOTTOM = 'media-bottom';
        
        public function __construct($media_item, $url, $title, $description = "", $alignment = self::LEFT, $vertical_alignment = false, $child_objects = array()){
            parent::__construct('div');
            $this->remove_class('media-list');
            $this->add_class('media');
            
            if ($media_item instanceof \adapt\html){
                $media_item->add_class('media-object');
            }
            
            $media_container = new html_div(new html_a($media_item, array('href' => $url)), array('class' => 'media-container'));
            $media_body = new html_div(array('class' => 'media-body'));
            $media_body->add(new html_h4($title, array('class' => 'media-heading')), $description);
            
            parent::add($media_container, $media_body);
            
            $this->align = $alignment;
            $this->vertical_align - $vertical_alignment;
            $this->add($child_objects);
        }
        
        public function pset_align($value = self::LEFT){
            $this->find('.media-container')->remove_class(self::LEFT)->remove_class(self::RIGHT)->add_class($value);
        }
        
        public function pget_align(){
            if ($this->find('.media-container')->has_class(self::LEFT)){
                return self::LEFT;
            }elseif($this->find('.media-container')->has_class(self::RIGHT)){
                return self::RIGHT;
            }
        }
        
        public function pset_vertical_align($value = self::MIDDLE){
            $this->find('.media-container')->remove_class(self::MIDDLE)->remove_class(self::BOTTOM)->add_class($value);
        }
        
        public function pget_vertical_align(){
            if ($this->find('.media-container')->has_class(self::MIDDLE)){
                return self::MIDDLE;
            }elseif($this->find('.media-container')->has_class(self::BOTTOM)){
                return self::BOTTOM;
            }else{
                return self::TOP;
            }
        }
        
        public function add($items){
            if (is_array($items)) foreach($items as $item) $this->add($item);
            $item = $items;
            
            $this->find('.media-body')->first->append($item);
        }
        
    }
    
}

?>