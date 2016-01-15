<?php

namespace bootstrap\views{
    
    class view_pagination extends view{ //NOT TESTED
        
        const LARGE = 'pagination-lg';
        const NORMAL = '';
        const SMALL = 'pagination-sm';
        
        public function __construct($base_url, $number_of_pages, $current_page = 1, $size = self::NORMAL){
            parent::__construct('nav');
            /* We need to remove the pagination class from ourselves and add it to the ul below */
            $this->remove_class('pagination');
            
            $ul = new html_ul(array('class' => 'pagination'));
            $this->add($ul);
            
            $first_page = 1;
            $last_page = 10;
            
            if ($current_page <= 5){
                $first_page = 1;
                $last_page = 10;
                if ($number_of_pages < 10) $last_page = $number_of_pages;
            }elseif($current_page + 5 >= $number_of_pages){
                $first_page = $current_page - 5;
                $last_page = $number_of_pages;
            }else{
                $first_page = $current_page - 5;
                $last_page = $number_of_pages + 5;
            }
            
            if ($current_page == 1){
                $ul->add(new htmL_li(new html_a(new html_span('&laquo', array('aria-hidden' => 'true')), array('href' => sprintf($base_url, 1))), array('class' => 'disabled')));
            }else{
                $ul->add(new htmL_li(new html_a(new html_span('&laquo', array('aria-hidden' => 'true')), array('href' => sprintf($base_url, 1)))));
            }
            
            for($i = $first_page; $i <= $last_page; $i++){
                if ($i == $current_page){
                    $ul->add(new html_li(new html_a($i, array('href' => sprintf($base_url, $i))), array('class' => 'active')));
                }else{
                    $ul->add(new html_li(new html_a($i, array('href' => sprintf($base_url, $i)))));
                }
            }
            
            if ($current_page == $last_page){
                $ul->add(new htmL_li(new html_a(new html_span('&raquo', array('aria-hidden' => 'true')), array('href' => sprintf($base_url, 1))), array('class' => 'disabled')));
            }else{
                $ul->add(new htmL_li(new html_a(new html_span('&raquo', array('aria-hidden' => 'true')), array('href' => sprintf($base_url, 1)))));
            }
            
            $this->size = $size;
        }
        
        public function pget_size(){
            if ($this->find('.pagination')->has_class(self::LARGE)){
                return self::LARGE;
            }elseif($this->find('.pagination')->has_class(self::SMALL)){
                return self::SMALL;
            }
            
            return self::NORMAL;
        }
        
        public function pset_size($size){
            $this->find('.pagination')->remove_class(self::LARGE)->remove_class(self::SMALL);
            if ($size == self::LARGE){
                $this->find('.pagination')->add_class(self::LARGE);
            }elseif($size == self::SMALL){
                $this->find('.pagination')->add_class(self::SMALL);
            }
        }
        
    }
    
}

?>