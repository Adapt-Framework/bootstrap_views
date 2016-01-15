<?php

namespace bootstrap\views{
    
    class view_form extends view{
        
        const NORMAL = '';
        const INLINE = 'form-inline';
        const HORIZONTAL = 'form-horizontal';
        
        protected $_label_cols = 2;
        protected $_control_cols = 10;
        
        public function __construct($action = null, $method = null, $style = self::NORMAL){
            parent::__construct('form');
            if (!is_null($action)) $this->attr('action', $action);
            if (!is_null($method)) $this->attr('method', $method);
            
            $this->style = $style;
        }
        
        public function pget_label_cols(){
            return $this->_label_cols;
        }
        
        public function pset_label_cols($value){
            $this->_label_cols = $value;
        }
        
        public function pget_control_cols(){
            return $this->_control_cols;
        }
        
        public function pset_control_cols($value){
            $this->_control_cols = $value;
        }
        
        public function pget_style(){
            if ($this->has_class(self::INLINE)){
                return self::INLINE;
            }elseif($this->has_class(self::HORIZONTAL)){
                return self::HORIZONTAL;
            }else{
                return self::NORMAL;
            }
        }
        
        public function pset_style($style){
            $children = $this->get();
            
            if ($style == self::HORIZONTAL){
                $this->remove_class(self::INLINE);
                $this->add_class(self::HORIZONTAL);
                
                $this->clear();
                
                for($i = 0; $i < count($children); $i++){
                    $this->add($this->convert_form_group($children[$i], true));
                }
                
            }elseif($style == self::INLINE){
                $this->remove_class(self::HORIZONTAL);
                $this->add_class(self::INLINE);
                
                for($i = 0; $i < count($children); $i++){
                    $this->add($this->convert_form_group($children[$i], false));
                }
                
            }else{
                $this->remove_class(self::HORIZONTAL);
                $this->remove_class(self::INLINE);
                
                for($i = 0; $i < count($children); $i++){
                    $this->add($this->convert_form_group($children[$i], false));
                }
            }
        }
        
        public function add($item){
            if (is_array($item)){
                foreach($item as $i) $this->add($i);
            }
            
            parent::add($this->convert_form_group($item, $this->style == self::HORIZONTAL ? true : false));
        }
        
        public function convert_form_group($form_group, $horizontal = true){
            
            if ($horizontal && is_object($form_group) && $form_group instanceof \adapt\html){
                $groups = $form_group->find('.form-group');
                foreach($groups->get() as $group){
                    $label = $group->find('label');
                    $control = $label->next();
                    $icon = $group->find('.view.icon');
                    $help_text = $group->find('.help-block');
                    
                    for ($i = 1; $i <= 12; $i++){
                        $label->remove_class('col-xs-' . $i);
                        $label->remove_class('col-sm-' . $i);
                        $label->remove_class('col-md-' . $i);
                        $label->remove_class('col-lg-' . $i);
                        $control->remove_class('col-xs-' . $i);
                        $control->remove_class('col-sm-' . $i);
                        $control->remove_class('col-md-' . $i);
                        $control->remove_class('col-lg-' . $i);
                        $icon->remove_class('col-xs-' . $i);
                        $icon->remove_class('col-sm-' . $i);
                        $icon->remove_class('col-md-' . $i);
                        $icon->remove_class('col-lg-' . $i);
                        $help_text->remove_class('col-xs-' . $i);
                        $help_text->remove_class('col-sm-' . $i);
                        $help_text->remove_class('col-md-' . $i);
                        $help_text->remove_class('col-lg-' . $i);
                    }
                    
                    $label->add_class('col-sm-2');
                    $control = $control->detach();
                    
                    $col = new html_div($control->get(0), array('class' => 'col-sm-10'));
                    
                    $group->add($col);
                    
                    $icon = $icon->detach();
                    $col->add($icon->get(0));
                    
                    $help_text = $help_text->detach();
                    $col->add($help_text->get(0));
                    
                }
            }
            
            //if (is_object($form_group) && $form_group instanceof view_form_group){
            //    print 'c';
            //    $label = $form_group->find('label')->get(0);
            //    $control = $form_group->find('.input-group');
            //    if ($control->size() == 0){
            //        $control = $form_group->find('input');
            //    }
            //    
            //    if ($control->size() == 0){
            //        $control = $form_group->find('textarea');
            //    }
            //    
            //    if ($control->size() == 0){
            //        $control = $form_group->find('select');
            //    }
            //    
            //    if ($control->size() == 0){
            //        $control = $form_group->find('.form-control-static');
            //    }
            //    $control = $control->get(0);
            //    
            //    $icon = $form_group->find('.view.icon')->get(0);
            //    $help_text = $form_group->find('.help-block')->get(0);
            //    
            //    $form_group->clear();
            //    
            //    if ($horizontal == true){
            //        print 'bar';
            //        if ($label instanceof \frameworks\adapt\html){
            //            print 'foo';
            //            for($i = 1; $i <= 12; $i++) $label->remove_class('col-sm-' . $i);
            //            $label->add_class('col-sm-' . $this->label_cols);
            //            $form_group->add($label);
            //        }
            //        
            //        $form_group->add(new html_div(array($control, $icon), array('class' => 'col-sm-' . $this->control_cols)));
            //        
            //        if ($help_text instanceof \frameworks\adapt\html){
            //            for($i = 1; $i <= 12; $i++){
            //                $help_text->remove_class('col-sm-' . $i);
            //                $help_text->remove_class('col-sm-offset-' . $i);
            //                $help_text->add_class('col-sm-' . $this->control_cols);
            //                $help_text->add_class('col-sm-offset-' . $this->label_cols);
            //            }
            //            
            //            $form_group->add($help_text);
            //        }
            //        
            //    }else{
            //        if ($label instanceof \frameworks\adapt\html){
            //            for($i = 1; $i <= 12; $i++) $label->remove_class('col-sm-' . $i);
            //            $form_group->add($label);
            //        }
            //        
            //        $form_group->add(array($control, $icon));
            //        
            //        if ($help_text instanceof \frameworks\adapt\html){
            //            for($i = 1; $i <= 12; $i++){
            //                $help_text->remove_class('col-sm-' . $i);
            //                $help_text->remove_class('col-sm-offset-' . $i);
            //            }
            //            
            //            $form_group->add($help_text);
            //        }
            //    }
            //    
            //}
            
            return $form_group;
        }
    }
    
    
}


?>