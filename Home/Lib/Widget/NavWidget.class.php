<?php
    class NavWidget extends Widget {
        public function render($data){
            if(S('data')){
                $data = S('data');
            }else{
                $data['nav'] = M('nav')->order('navrand')->limit(10)->select();
            }
        	S('data',$data,3600 * 24);
            return $this->renderFile('',$data);
        }
    }
?>