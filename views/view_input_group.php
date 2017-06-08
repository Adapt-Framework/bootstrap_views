<?php

namespace bootstrap\views{
    
    class view_input_group extends view{
        
        public function __construct($control = null, $pre_addon = null, $post_addon = null){
            parent::__construct();
            if (!is_null($pre_addon)){
                $class = 'input-group-addon';
                if ($pre_addon instanceof view_button){
                    $class = 'input-group-btn';
                    $this->add(new html_div($pre_addon, array('class' => $class)));
                }elseif($pre_addon instanceof view_dropdown){
                    $pre_addon->remove_class('dropdown');
                    $pre_addon->add_class('input-group-btn');
                    $this->add($pre_addon);
                }elseif($pre_addon instanceof view_dropdown){
                    $pre_addon->remove_class('btn-group');
                    $pre_addon->add_class('input-group-btn');
                    $this->add($pre_addon);
                }else{
                    $this->add(new html_div($pre_addon, array('class' => $class)));
                }
            }
            $this->add($control);
            if (!is_null($post_addon)){
                $class = 'input-group-addon';
                if ($post_addon instanceof view_button){
                    $class = 'input-group-btn';
                    $this->add(new html_div($post_addon, array('class' => $class)));
                    //$post_addon->add_class($class);
                    //$this->add($post_addon);
                }elseif($post_addon instanceof view_dropdown){
                    $post_addon->remove_class('dropdown');
                    $post_addon->add_class('input-group-btn');
                    $this->add($post_addon);
                }elseif($post_addon instanceof view_split_button){
                    $post_addon->remove_class('btn-group');
                    $post_addon->add_class('input-group-btn');
                    $this->add($post_addon);
                }else{
                    $this->add(new html_div($post_addon, array('class' => $class)));
                }
            }
        }
        
    }
    
    
}

?>