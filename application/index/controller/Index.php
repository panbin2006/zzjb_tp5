<?php
namespace app\index\controller;
use think\Db;
class Index
{
    public function index()
    {
    	$result = Db::query("select * from mpplan where pdate>'2018-06-06'");
    	return json($result);
    	// phpinfo();
    }
}
