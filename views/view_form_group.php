<?php

namespace extensions\bootstrap_views{
    
    class view_form_group extends view{
        
        const NONE = '';
        const SUCCESS = 'has-success';
        const WARNING = 'has-warning';
        const ERROR = 'has-error';
        
        public function __construct($control, $label = null, $help_text = null, $validation_state = self::NONE){
            parent::__construct('div');
            if (is_object($control) && ($control instanceof view_input || $control instanceof view_select || $control instanceof view_input_static || $control instanceof view_input_group || $control instanceof view_textarea)){
                $control->set_id();
                if(is_object($label) && $label instanceof html && $label->tag == 'label'){
                    $label->attr('for', $control->attr('id'));
                    $label->add_class('control-label');
                }elseif(is_string($label)){
                    $this->add(new html_label($label, array('for' => $control->attr('id'), 'class' => 'control-label')));
                }else{
                    $this->add(new html_label(array('for' => $control->attr('id'), 'class' => 'sr-only', 'class' => 'control-label')));
                }
                
                $this->add($control);
                //parent::add($control);
                //print $control;
                //print $this;
                if (is_string($help_text)){
                    $help = new html_span($help_text, array('class' => 'help-block'));
                    $help->set_id();
                    $control->attr('aria-describedby', $help->attr('id'));
                    $this->add($help);
                }
            }
        }
        
        /*
         * Properties
         */
        public function pget_validation_state(){
            if ($this->has_class(self::SUCCESS)){
                return self::SUCCESS;
            }elseif ($this->has_class(self::WARNING)){
                return self::WARNING;
            }elseif ($this->has_class(self::ERROR)){
                return self::ERROR;
            }else{
                return self::NONE;
            }
        }
        
        public function pset_validation_state($value){
            if ($value == self::NONE){
                $this->remove_class('has-feedback');
                $this->remove_class('has-success');
                $this->remove_class('has-warning');
                $this->remove_class('has-error');
                $this->find('.view.bootstrap.icon')->detach();
            }elseif($value == self::ERROR){
                $this->add_class('has-feedback');
                $this->remove_class('has-success');
                $this->remove_class('has-warning');
                $this->add_class('has-error');
                $this->find('.view.bootstrap.icon')->detach();
                $icon = new view_icon('remove');
                $icon->add_class('form-control-feedback');
                $this->find('input,select,p.form-control-static')->after($icon);
            }elseif($value == self::WARNING){
                $this->add_class('has-feedback');
                $this->remove_class('has-success');
                $this->add_class('has-warning');
                $this->remove_class('has-error');
                $this->find('.view.bootstrap.icon')->detach();
                $icon = new view_icon('warning-sign');
                $icon->add_class('form-control-feedback');
                $this->find('input,select,p.form-control-static')->after($icon);
            }elseif($value == self::SUCCESS){
                $this->add_class('has-feedback');
                $this->add_class('has-success');
                $this->reove_class('has-warning');
                $this->remove_class('has-error');
                $this->find('.view.bootstrap.icon')->detach();
                $icon = new view_icon('ok');
                $icon->add_class('form-control-feedback');
                $this->find('input,select,p.form-control-static')->after($icon);
            }
        }
        
        public function pget_label(){
            $this->find('label')->text();
        }
        
        public function pset_label($label){
            if (is_object($label) && $label instanceof html){
                $this->find('label')->replace_with($label);
            }elseif(is_string($label)){
                $this->find('label')->text($label);
            }
        }
        
        public function pget_help_text(){
            return $this->find('.help-block')->text();
        }
        
        public function pset_help_text($help_text){
            if (is_object($help_text) && $help_text instanceof html){
                $help_text->add_class('help-block');
                $this->find('.help-block')->replace_with($help_text);
            }elseif(is_string($help_text)){
                $this->find('.help-block')->text($help_text);
            }
        }
        
        
    }
    
}

?>