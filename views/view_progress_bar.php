<?php

namespace extensions\bootstrap_views{
    
    class view_progress_bar extends view{ //NOT TESTED
        
        const NORMAL = '';
        const SUCCESS = 'progress-bar-success';
        const INFO = 'progress-bar-info';
        const WARNING = 'progress-bar-warning';
        const DANGER = 'progress-bar-danger';
        
        public function __construct($percentage_complete = 0, $style = self::NORMAL, $show_label = false, $striped = false, $animated = false){
            parent::__construct('div');
            $this->remove_class('progress-bar');
            $this->add_class('progress');
            $bar = new html_div(new html_span("{$percentage_complete}%", array('class' => 'sr-only')), array('class' => 'progress-bar', 'role' => 'progressbar', 'aria-valuenow' => $percentage_complete, 'aria-valuemin' => 0, 'aria-valuemax' => 100, 'style' => "width: {$percentage_complete}%"));
            $this->add($bar);
        }
        
        public function pget_percentage_complete(){
            return $this->find('.progress-bar')->attr('aria-valuenow');
        }
        
        public function pset_percentage_complete($value){
            if ($value >= 0 && $value <= 100){
                $this->find('.progress-bar')->attr('aria-valuenow', $value)->attr('style', "width: {$value}%")->text("{$value}%");
            }
        }
        
        public function pget_style(){
            if ($this->find('.progress-bar')->has_class(self::SUCCESS)){
                return self::SUCCESS;
            }elseif ($this->find('.progress-bar')->has_class(self::INFO)){
                return self::INFO;
            }elseif ($this->find('.progress-bar')->has_class(self::WARNING)){
                return self::WARNING;
            }elseif ($this->find('.progress-bar')->has_class(self::DANGER)){
                return self::DANGER;
            }else{
                return self::NORMAL;
            }
        }
        
        public function pset_style($style){
            $this->find('.progress-bar')->remove_class(self::SUCCESS);
            $this->find('.progress-bar')->remove_class(self::INFO);
            $this->find('.progress-bar')->remove_class(self::WARNING);
            $this->find('.progress-bar')->remove_class(self::DANGER);
            $this->find('.progress-bar')->add_class($style);
        }
        
        public function pget_show_label(){
            return !$this->find('.progress-bar span')->has_class('sr-only');
        }
        
        public function pset_show_label($value){
            if ($value == true){
                $this->find('progress-bar span')->remove_class('sr-only');
            }else{
                $this->find('progress-bar span')->add_class('sr-only');
            }
        }
        
        public function pget_striped(){
            return $this->find('.progress-bar')->has_class('progress-bar-striped');
        }
        
        public function pset_striped($value){
            if ($value == true){
                $this->find('.progress-bar')->add_class('progress-bar-striped');
            }else{
                $this->find('.progress-bar')->remove_class('progress-bar-striped');
            }
        }
        
        public function  pget_animated(){
            return $this->find('.progress-bar')->has_class('active');
        }
        
        public function pset_animated($value){
            if ($value == true){
                $this->striped = true;
                $this->find('.progress-bar')->add_class('active');
            }else{
                $this->find('.progress-bar')->remove_class('active');
            }
        }
        
    }
    
}

?>