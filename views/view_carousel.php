<?php

namespace extensions\bootstrap_views{
    
    class view_carousel extends view{
        
        const NONE = '';
        const SLIDE = 'slide';
        
        public function __construct($show_indicators = true, $show_controls = true, $transition = self::SLIDE){
            parent::__construct('div');
            $this->set_id();
            $this->attr('data-ride', 'carousel');
            
            parent::add(new html_ol(array('class' => 'carousel-indicators')));
            parent::add(new html_div(array('class' => 'carousel-inner', 'role' => 'listbox')));
            parent::add(
                new html_a(
                    array(
                        new view_icon('chevron-left'),
                        new html_span('Previous', array('class' => 'sr-only'))
                    ),
                    array(
                        'class' => 'left carousel-control',
                        'href' => '#' . $this->attr('id'),
                        'role' => 'button',
                        'data-slide' => 'prev'
                    )
                )
            );
            parent::add(
                new html_a(
                    array(
                        new view_icon('chevron-right'),
                        new html_span('Next', array('class' => 'sr-only'))
                    ),
                    array(
                        'class' => 'right carousel-control',
                        'href' => '#' . $this->attr('id'),
                        'role' => 'button',
                        'data-slide' => 'next'
                    )
                )
            );
            
            $this->show_indicators = $show_indicators;
            $this->show_controls = $show_controls;
            $this->transition = $transition;
        }
        
        public function pget_transition(){
            if ($this->has_class(self::SLIDE)){
                return self::SLIDE;
            }
            
            return self::NONE;
        }
        
        public function pset_transition($value){
            $this->remove_class(self::SLIDE);
            $this->add_class($value);
        }
        
        public function pget_show_indicators(){
            return !$this->find('.carousel-indicators')->has_class('hidden');
        }
        
        public function pset_show_indicators($value){
            if ($value == true){
                $this->find('.carousel-indicators')->remove_class('hidden');
            }else{
                $this->find('.carousel-indicators')->add_class('hidden');
            }
        }
        
        public function pget_show_controls(){
            return !$this->find('.left.carousel-control')->has_class('hidden');
        }
        
        public function pset_show_controls($value){
            if ($value == true){
                $this->find('.carousel-control')->remove_class('hidden');
            }else{
                $this->find('.carousel-control')->add_class('hidden');
            }
        }
        
        public function add($slide, $caption = null){
            $item = new html_div($slide, array('class' => 'item'));
            if (!is_null($caption)){
                $item->add(new html_div($caption, array('class' => 'carousel-caption')));
            }
            
            $indicator = new html_li(array('data-target' => '#' . $this->attr('id'), 'data-slide-to' => "{$this->find('.carousel-inner .item')->size()}"));
            
            if ($this->find('.carousel-inner .item')->size() == 0){
                $item->add_class('active');
                $indicator->add_class('active');
            }
            $this->find('.carousel-indicators')->append($indicator);
            $this->find('.carousel-inner')->append($item);
        }
    }
    
}

?>