<?php
namespace app\easyui\controller;

use think\Controller;
class Demo extends Controller
{
    public function index()
    {
        if ($this->request->isPost()) {
            $model = \app\easyui\model\Demo::search($this->request->param());
            $data = $model->toArray();

            return \think\Response::create(['total' => $data['total'], 'rows' => $data['data']], 'json');
        }

        return $this->fetch();
    }

    public function create()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $validate = $this->validate($data, [
                'name' => 'require',
                'email' => 'require',
                'age' => 'require'
            ]);

            if ($validate !== true) {
                return '{"code":500,"msg":"'.$validate.'"}';
            }

            $model = new \app\easyui\model\Demo();
            $model->data($data);
            if ($model->save() === false) {
                return '{"code":500,"msg":"failure"}';
            } else {
                return '{"code":200,"msg":"success"}';
            }
        }

        $this->assign('model', []);

        return \think\Response::create($this->fetch(), 'html');
    }

    public function update()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $validate = $this->validate($data, [
                'id' => 'require',
                'name' => 'require',
                'email' => 'require',
                'age' => 'require'
            ]);

            if ($validate !== true) {
                return '{"code":500,"msg":"'.$validate.'"}';
            }

            $model = $this->find($data['id']);
            unset($data['id']);
            foreach ($data as $k => $v) {
                $model->setAttr($k, $v);
            }

            if ($model->save() !== false) {
                return '{"code":200,"msg":"success"}';
            }

            return '{"code":500,"msg":"'.$model->getError().'"}';
        }

        $this->assign('model', $this->find($this->request->get('id')));

        return \think\Response::create($this->fetch(), 'html');
    }

    public function remove()
    {
        $data = $this->request->post();
        $validate = $this->validate($data, ['id' => 'require']);

        if ($validate !== true) {
            return '{"code":500,"msg":"'.$validate.'"}';
        }

        try {
            $model = $this->find($data['id']);
            $model->delete();

            return \think\Response::create(['code' => 200, 'msg' => 'success'], 'json');
        } catch (\Exception $e) {
            
        }

        return \think\Response::create(['code' => 500, 'msg' => $model->getError()], 'json');
    }

    /**
     * @return \app\easyui\model\Demo
     */
    public function find($id)
    {
        return \app\easyui\model\Demo::findOrFail($id);
    }
}