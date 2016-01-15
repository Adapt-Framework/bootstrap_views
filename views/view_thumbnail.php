<?php

namespace bootstrap\views{
    
    class view_thumbnail extends view{ //NOT TESTED
        
        public function __construct($image, $caption = null, $url = null){
            if (is_null($url)){
                parent::__construct('div');
            }else{
                parent::__construct('a', array('href' => $url));
            }
            
            if (is_object($image) && $image instanceof \adapt\html){
                $this->add($image);
            }elseif (!is_object($image) && is_string($image)){
                $this->add(new view_img($image));
            }
            
            if (!is_null($caption)){
                $cap = new html_div(array('class' => 'caption'));
                $this->add($cap);
                if (is_object($caption) && $caption instanceof \adapt\html){
                    $cap->add($caption);
                }elseif(!is_object($caption) && is_string($caption)){
                    $cap->add(new html_p($caption));
                }
            }
        }
        
    }
    
}

?>