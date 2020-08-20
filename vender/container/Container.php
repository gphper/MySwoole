<?php
namespace vender\container;

class Container{

    private static $instance;

    private $bindings;

    /**
     * 私有化构造函数，实现单例模式
     * Container constructor.
     */
    private function __construct()
    {

    }

    /**
     * 获取 container 对象
     * @author cjp 20200820
     * @return Container
     */
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 绑定
     * @author cjp 20200820
     * @param $key
     * @param $value
     */
    public function bind($key,$value){
        $this->bindings[$key] = $value;
    }

    /**
     * 实例化
     * @author cjp 20200820
     * @param $key
     * @return mixed
     */
    public function make($key){
        if($this->bindings[$key]){
            return $this->bindings[$key];
        }
    }

    /**
     * 获取所有绑定
     * @author cjp 20200820
     * @return mixed
     */
    public function getAll(){
        return $this->bindings;
    }

}
