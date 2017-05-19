<?php

namespace bootstrap\views{
    
    class view_pager extends view{
        
        public function __construct($next_label, $next_url, $next_disabled, $previous_label, $previous_url, $previous_disabled = false, $aligned = false){
            parent::__construct('nav');
            $this->remove_class('pager');
            $ul = new html_ul(array('class' => 'pager'));
            
            $next_li = new html_li();
            $previous_li = new html_li();
            
            if ($aligned){
                $next_li->add_class('next');
                $previous_li->add_class('previous');
            }
            
            if ($next_disabled) $next_li->add_class('disabled');
            if ($previous_disabled) $previous_li->add_class('disabled');
            
            $next_li->add(new html_a($next_label, array('href' => $next_url)));
            $previous_li->add(new html_a($previous_label, array('href' => $previous_url)));
            
            $ul->add($previous_li, $next_li);
            $this->add($ul);
        }
        
    }
    
}

?>