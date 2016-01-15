<?php

namespace bootstrap\views{
    
    class view extends \adapt\view{
        
        const NONE = '';
        const FLOAT_RIGHT = 'pull-right';
        const FLOAT_LEFT = 'pull-left';
        
        public function __construct($tag = 'div', $data = null, $attributes = array()){
            parent::__construct($tag, $data, $attributes);
            $this->add_class('bootstrap');
        }
        
        public function aset_float($value){
            $classes = array(self::FLOAT_RIGHT, self::FLOAT_LEFT);
            foreach($classes as $class){
                $this->remove_class($class);
            }
            
            $this->add_class($value);
        }
        
        public function aget_float(){
            $classes = array(self::FLOAT_RIGHT, self::FLOAT_LEFT);
            foreach($classes as $class){
                if ($this->has_class($class)){
                    return $class;
                }
            }
            
            return self::NONE;
        }
        
        public function aset_center_block($value){
            if ($value == true){
                $this->add_class('center-block');
            }else{
                $this->remove_class('center-block');
            }
        }
        
        public function aget_center_block(){
            return $this->has_class('center-block');
        }
        
        public function aset_hidden($value){
            if ($value == true){
                $this->remove_class('show');
                $this->add_class('hidden');
            }else{
                $this->remove_class('hidden');
                $this->add_class('show');
            }
        }
        
        public function aget_hidden(){
            return $this->has_class('hidden');
        }
        
        public function aset_visible($value){
            if ($value == true){
                $this->remove_class('invisible');
            }else{
                $this->add_class('invisible');
            }
        }
        
        public function aget_visible(){
            return !$this->has_class('invisible');
        }
        
        public function aset_col_span_lg($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-lg-{$i}");
                }
                $this->add_class("col-lg-{$size}");
            }
        }
        
        public function aget_col_span_lg(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-lg-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_span_md($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-md-{$i}");
                }
                $this->add_class("col-md-{$size}");
            }
        }
        
        public function aget_col_span_md(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-md-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_span_sm($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-sm-{$i}");
                }
                $this->add_class("col-sm-{$size}");
            }
        }
        
        public function aget_col_span_sm(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-sm-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_span_xs($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-xs-{$i}");
                }
                $this->add_class("col-xs-{$size}");
            }
        }
        
        public function aget_col_span_xs(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-xs-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_offset_lg($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-lg-offset-{$i}");
                }
                $this->add_class("col-lg-offset-{$size}");
            }
        }
        
        public function aget_col_offset_lg(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-lg-offset-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_offset_md($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-md-offset-{$i}");
                }
                $this->add_class("col-md-offset-{$size}");
            }
        }
        
        public function aget_col_offset_md(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-md-offset-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_offset_sm($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-sm-offset-{$i}");
                }
                $this->add_class("col-sm-offset-{$size}");
            }
        }
        
        public function aget_col_offset_sm(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-sm-offset-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_offset_xs($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-xs-offset-{$i}");
                }
                $this->add_class("col-xs-offset-{$size}");
            }
        }
        
        public function aget_col_offset_xs(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-xs-offset-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_push_lg($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-lg-push-{$i}");
                }
                $this->add_class("col-lg-push-{$size}");
            }
        }
        
        public function aget_col_push_lg(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-lg-push-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_push_md($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-md-push-{$i}");
                }
                $this->add_class("col-md-push-{$size}");
            }
        }
        
        public function aget_col_push_md(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-md-push-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_push_sm($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-sm-push-{$i}");
                }
                $this->add_class("col-sm-push-{$size}");
            }
        }
        
        public function aget_col_push_sm(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-sm-push-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_push_xs($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-xs-push-{$i}");
                }
                $this->add_class("col-xs-push-{$size}");
            }
        }
        
        public function aget_col_push_xs(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-xs-push-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_pull_lg($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-lg-pull-{$i}");
                }
                $this->add_class("col-lg-pull-{$size}");
            }
        }
        
        public function aget_col_pull_lg(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-lg-pull-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_pull_md($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-md-pull-{$i}");
                }
                $this->add_class("col-md-pull-{$size}");
            }
        }
        
        public function aget_col_pull_md(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-md-pull-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_pull_sm($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-sm-pull-{$i}");
                }
                $this->add_class("col-sm-pull-{$size}");
            }
        }
        
        public function aget_col_pull_sm(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-sm-pull-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
        
        public function aset_col_pull_xs($size){
            if (isset($size)){
                for($i = 1; $i <= 12; $i++){
                    $this->remove_class("col-xs-pull-{$i}");
                }
                $this->add_class("col-xs-pull-{$size}");
            }
        }
        
        public function aget_col_pull_xs(){
            for($i = 1; $i <= 12; $i++){
                if ($this->has_class("col-xs-pull-{$i}")){
                    return $i;
                }
            }
            
            return 1;
        }
    }

}

?>