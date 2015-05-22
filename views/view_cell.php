<?php

namespace extensions\bootstrap_views{
    
    class view_cell extends view{
        
        public function __construct($data = null, $col_span_xs = null, $col_span_sm = null, $col_span_md = null, $col_span_lg = null){
            parent::__construct('div', $data);
            $this->col_span_lg = $col_span_lg;
            $this->col_span_md = $col_span_md;
            $this->col_span_sm = $col_span_sm;
            $this->col_span_xs = $col_span_xs;
        }
        
        
        
    }
    
}

?>