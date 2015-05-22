<?php

namespace extensions\bootstrap_views{
    
    class view_navbar extends view{
        
        const NORMAL = 'navbar-default';
        const INVERTED = 'navbar-inverse';
        
        public function __construct($items = null, $fluid = false, $inverted = false){
            parent::__construct('nav');
            
            $menu = new html_div(array('class' => 'collapse navbar-collapse'));
            $menu->set_id();
            
            $header = new html_div(array('class' => 'navbar-header'));
            $button = new html_button(
                array(
                    'type' => "button",
                    'class' => "navbar-toggle collapsed",
                    'data-toggle' => "collapse",
                    'data-target' => "#" . $menu->attr('id')
                )
            );
            
            $header->add($button);
            
            $button->add(new html_span("Toggle navigation", array('class' => 'sr-only')));
            $bar = new html_span(array('class' => 'icon-bar'));
            $button->add($bar, $bar, $bar);
            
            
            
            
            $container = new html_div(array('class' => 'container'));
            $container->add($header,  $menu);
            
            parent::add($container);
            
            $this->fluid = $fluid;
            $this->inverted = $inverted;
        }
        
        public function pget_inverted(){
            return $this->has_class(self::INVERTED);
        }
        
        public function pset_inverted($value){
            if ($value === true){
                $this->remove_class(self::NORMAL);
                $this->add_class(self::INVERTED);
            }else{
                $this->add_class(self::NORMAL);
                $this->remove_class(self::INVERTED);
            }
        }
        
        public function pget_fluid(){
            return $this->find('> div')->has_class('container-fluid');
        }
        
        public function pset_fluid($value){
            if ($value === true){
                $this->find('div.container')->add_class('container-fluid')->remove_class('container');
            }else{
                $this->find('div.fluid-container')->add_class('container')->remove_class('container-fluid');
            }
        }
        
        public function pget_fixed_to_top(){
            return $this->has_class('navbar-fixed-top');
        }
        
        public function pset_fixed_to_top($value){
            if ($value == true){
                $this->fixed_to_bottom = false;
                $this->add_class('navbar-fixed-top');
            }else{
                $this->remove_class('navbar-fixed-top');
                $this->fixed_to_top_padding = false;
            }
        }
        
        public function pset_fixed_to_top_padding($value_and_units = false){
            /*
             * Ok, this is like the biggest hack ever.
             * We could insert a style tag right here which
             * would be messy, or we could go right to the dom
             * and append it to the head or we could style the
             * body.  I'm choosing inserting a style in the head.
             */
            if ($value_and_units !== false){
                $style = new html_style("body{ padding-top: {$value};", array('id' => 'owned-by-adapt-id-' . $this->instance_id));
                $this->dom->find('head')->append($style);
            }else{
                $this->dom->find("#owned-by-adapt-id-" . $this->instance_id)->detach();
            }
        }
        
        public function pget_fixed_to_bottom(){
            return $this->has_class('navbar-fixed-bottom');
        }
        
        public function pset_fixed_to_bottom($value){
            if ($value == true){
                $this->fixed_to_top = false;
                $this->add_class('navbar-fixed-bottom');
            }else{
                $this->remove_class('navbar-fixed-bottom');
                $this->fixed_to_bottom_padding = false;
            }
        }
        
        public function pset_fixed_to_bottom_padding($value_and_units = false){
            /*
             * Ok, this is like the biggest hack ever.
             * We could insert a style tag right here which
             * would be messy, or we could go right to the dom
             * and append it to the head or we could style the
             * body.  I'm choosing inserting a style in the head.
             */
            if ($value_and_units !== false){
                $style = new html_style("body{ padding-bottom: {$value};", array('id' => 'owned-by-adapt-id-' . $this->instance_id));
                $this->dom->find('head')->append($style);
            }else{
                $this->dom->find("#owned-by-adapt-id-" . $this->instance_id)->detach();
            }
        }
        
        public function pget_static_top(){
            return $this->has_class('navbar-static-top');
        }
        
        public function pset_static_top($value){
            if ($value == true){
                $this->add_class('navbar-static-top');
            }else{
                $this->remove_class('navbar-static-top');
            }
        }
        
        public function pget_brand(){
            return $this->find('.navbar-brand')->text();
        }
        
        public function pset_brand($brand){
            if ($this->find('.navbar-brand')->size() == 0){
                $this->find('.navbar-header')->append(new html_a($brand, array('href' => '#', 'class' => 'navbar-brand')));
            }else{
                $this->find('.navbar-brand')->text($brand);
            }
        }
        
        public function pget_brand_url(){
            return $this->find('.navbar-brand')->attr('href');
        }
        
        public function pset_brand_url($url){
            if ($this->find('.navbar-brand')->size() == 0){
                $this->find('.navbar-header')->append(new html_a("", array('href' => $url, 'class' => 'navbar-brand')));
            }else{
                $this->find('.navbar-brand')->attr('href', $url);
            }
        }
        
        
        public function add($name, $url = null, $disabled = false){
            if (!is_object($name) && is_string($name)){
                /* Add a single link */
                
                /* Do we currently have a nav? */
                $nav = null;
                $child_count = $this->find('.navbar-collapse')->children()->size();
                if ($child_count > 0){
                    /* Is the last element a nav? */
                    $last_item = $this->find('.navbar-collapse')->children()->get($child_count - 1);
                    if ($last_item instanceof view_nav){
                        $nav = $last_item;
                    }
                }
                
                if (is_null($nav)){
                    $nav = new view_nav('navbar');
                    $this->find('.navbar-collapse')->append($nav);
                }
                
                $nav->add($name, $url, $disabled);
                
            }elseif($name instanceof view_button){
                $name->add_class('navbar-btn');
                $this->find('.navbar-collapse')->append($name);
            }elseif($name instanceof \frameworks\adapt\html && $name->tag == 'p'){
                $name->add_class('navbar-text');
                $this->find('.navbar-collapse')->append($name);
            }elseif($name instanceof view_dropdown){
                /* Do we currently have a nav? */
                $nav = null;
                $child_count = $this->find('.navbar-collapse')->children()->size();
                if ($child_count > 0){
                    /* Is the last element a nav? */
                    $last_item = $this->find('.navbar-collapse')->children()->get($child_count - 1);
                    if ($last_item instanceof view_nav){
                        $nav = $last_item;
                    }
                }
                
                if (is_null($nav)){
                    $nav = new view_nav('navbar');
                    $this->find('.navbar-collapse')->append($nav);
                }
                
                $nav->add($name);
            }elseif($name instanceof view_form){
                $name->style = view_form::INLINE;
                $name->remove_class('form-inline');
                $name->add_class('navbar-form');
                $this->find('.navbar-collapse')->append($nav);
            }
        }
        
    }
    
    
}

?>