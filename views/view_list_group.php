<?php

namespace bootstrap\views{
    
    class view_list_group extends view {
        
        const SUCCESS = 'list-group-item-success';
        const INFO = 'list-group-item-info';
        const WARNING = 'list-group-item-warning';
        const DANGER = 'list-group-item-danger';
        const NORMAL = '';
        
        public function __construct(){
            parent::__construct('div');
        }
        
        public function add($content, $url = "#", $badge = null, $style = self::NORMAL, $active = false, $disabled = false){
            if ($content){
                $item = new html_a(array('href' => $url, 'class' => 'list-group-item'));
                if (!is_null($badge)){
                    if (is_object($badge) && $badge instanceof \adapt\html){
                        $item->add($badge);
                    }elseif(!is_object($badge) && (is_string($badge) || is_int($badge))){
                        $item->add(new view_badge($badge));
                    }
                }
                
                if ($content instanceof \adapt\html){
                    $content->find('h1,h2,h3,h4,h5,h6')->add_class('list-group-item-heading');
                    $content->find('p')->add_class('list-group-item-text');
                }
                
                $item->add($content);
                $item->add_class($style);
                if ($active){
                    $item->add_class('active');
                }
                if ($disabled){
                    $this->add_class('disabled');
                }
                
                parent::add($item);
            }
        }
        
    }
    
    
}

?>