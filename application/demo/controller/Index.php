<?php
namespace app\demo\controller;

use app\common\model\Test;
use think\Controller;
use think\facade\Request;

class Index extends Controller
{
    public function index()
    {
        $test = new Test();
        if (Request::isPost()){
            $param = Request::post();
            $res = $test->allowField(true)->save($param,['id'=>1]);
            if ($res){
                $this->success('操作成功');
            }
        }
        $result = $test->where(['id'=>1])->find()->toArray();
        $this->assign('name',$result['nickname']);
        return $this->fetch();
    }
}
