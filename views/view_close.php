<?php

namespace extensions\bootstrap_views{
    
    class view_close extends view{
        public function __construct(){
            $attr = array(
                'type' => 'button',
                'aria-label' => 'Close'
            );
            parent::__construct('button', $attr);
            $this->add_class('close');
            $this->add(new html_span('&times;', array('aria-hidden' => 'true')));
        }
    }
    
}

?>