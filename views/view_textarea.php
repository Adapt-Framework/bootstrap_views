<?php

namespace extensions\bootstrap_views{
    
    class view_textarea extends view{
        
        public function __construct($name = null, $value = null, $rows = null){
            parent::__construct('textarea', $value);
            if (!is_null($name)) $this->attr('name', $name);
            if (!is_null($rows)) $this->attr('rows', $rows);
            $this->add_class('form-control');
        }
        
    }
    
    
}

?>