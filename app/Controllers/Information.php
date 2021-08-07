<?php

namespace App\Controllers;
use App\Models\Info;

class Information extends BaseController
{
	public function index()
	{
        $info = new Info();
        $data['information'] = $info->orderBy('id','DESC')->findAll();
		return view('Info/index', $data);
	}

    // Call Add Student page
    public function addInfo()
    {
        return view('Info/addinfo');
    }

    // insert data
    public function saveData() {
        $info = new Info();
        $data = [
            'name' => $this->request->getVar('txtName'),
        ];
        $info->insert($data);
        return $this->response->redirect(site_url('/information-list'));
        
    }
}
