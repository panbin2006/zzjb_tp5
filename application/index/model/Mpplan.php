<?php

namespace app\index\model;

use think\Model;

class Mpplan extends Model
{
    //设置主键
    protected  $pk = 'planid';
    //自动过滤掉不存在的字段
    protected  $field = true;

    // 定义关联
    public function msaleodd(){
    	return $this->hasMany('Msaleodd','planid');
    }
}
