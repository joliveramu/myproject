<?php

namespace App\Controllers;
use App\Models\Student;

class Students extends BaseController
{
	public function index()
	{
        $student = new Student();
        $data['users'] = $student->orderBy('id','DESC')->findAll();
		return view('Student/index', $data);
	}

    // Call Add Student page
    public function addStudent()
    {
        return view('Student/addstudent');
    }

    // insert data
    public function saveData() {
        $student = new Student();
        $data = [
            'username' => $this->request->getVar('txtUsername'),
            'password'  => $this->request->getVar('txtPassword'),
        ];
        $student->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }

    // show single user
    public function showUser($id = null){
        $student = new Student();
        $data['user_obj'] = $student->where('id', $id)->first();
        return view('Student/editstudent', $data);
    }

    // update user data
    public function update(){
        $student = new Student();
        $id = $this->request->getVar('id');
        $data = [
            'username' => $this->request->getVar('txtUsername'),
            'password'  => $this->request->getVar('txtPassword'),
        ];
        $student->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
 
    // Delete Data
    public function delete($id = null){
        $student = new Student();
        $data['user'] = $student->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }    
}
