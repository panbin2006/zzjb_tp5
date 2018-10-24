<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\index\model\Mpactm  as MpactmModel;

class Mpactm extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($projectname='',$custname='')
    {
        // $list  =  MpactmModel::paginate(3); 
        // return json($list);
        $sql="select top 100  shtag, projectid,projectname,custname,pdate,execstate from mpactm where  projectname like '%".$projectname."%' or custname like '%".$custname."%'  order by pdate desc";
        $rows = Db::query($sql);
        return json_encode($rows);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data   = $request->param();
        $result = MpactmModel::create($data);
        return json($result);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $result = MpactmModel::get($id);
        $mpactds = $result->mpactd;
        return json($result);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $data   = $request->param();
        $result = MpactmModel::update($data,['projectid'=> $id]);
        return json($result);
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $result = MpactmModel::destroy($id);
        return json($result);
    }

    /**
    **合同审核
    *
    */
    public function sh($shstate,$projectid){

        $sql="update mpactm set trigtag='1',shtag='".$shstate."' where projectid='".$projectid."'";
        $rows = Db::query($sql);
        return json_encode($rows);
    }

}
