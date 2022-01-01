<?php
    //清除缓存控制器
    class CacheAction extends CommonAction{
        //清除缓存视图
        public function index(){
            $this->display();
        }
        
        //前台缓存
        public function home() {
            
            //清文件缓存
            $dirs = array('home/Runtime/');
            @mkdir('Runtime',0777,true);
            
            //清理缓存
            foreach($dirs as $value) {
                $this->rmdirr($value);
            }
            
            $this->success('前台缓存清除成功！',U('Cache/index'));
        }

        //后台缓存
        public function admin() {

            //清文件缓存
            $dirs = array('admin/Runtime/');
            @mkdir('Runtime',0777,true);
            
            //清理缓存
            foreach($dirs as $value) {
                $this->rmdirr($value);
            }
            
            $this->success('后台缓存清除成功！',U('Cache/index'));
        }

        //删除缓存方法
        public function rmdirr($dirname) {
            
            if (!file_exists($dirname)) {
                return false;
            }
            
            if (is_file($dirname) || is_link($dirname)) {
                return unlink($dirname);
            }

            $dir = dir($dirname);

            if($dir){
                while (false !== $entry = $dir->read()) {
                    if ($entry == '.' || $entry == '..') {
                        continue;
                    }
                    //递归
                    $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
                }
            }
            
            $dir->close();
            return rmdir($dirname);
        }
    }
?>
