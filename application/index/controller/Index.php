<?php
namespace app\index\controller;
use think\Db;
use app\
class Index
{
    public function index($pdate)
    {
    	$result = Db::query("select * from mpplan where pdate>'2018-06-06'");
    	return json($result);
    	phpinfo();

    }
}
