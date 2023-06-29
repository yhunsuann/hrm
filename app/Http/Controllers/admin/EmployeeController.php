<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\EmployeeInterface;
use App\Repositories\Interfaces\RoleInterface;
use App\Services\FileUploader;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    protected $model;
    protected $role;
    protected $fileUploader;
    
    public function __construct(
        EmployeeInterface $model,
        RoleInterface $role
    ) {
        $this->model = $model;
        $this->role = $role;
        $this->fileUploader = new FileUploader;
    }

    public function index(Request $request)
    {
        $emlpoyees = $this->model->list($request->all());
   
        return view('admin.employee.index', compact('emlpoyees'));
    }

    public function edit($id)
    {
        $employee = $this->model->getInfoById($id);
        $roles = $this->role->list();

        return view('admin.employee.edit', compact('employee','roles'));
    }

    public function create()
    {
        $roles = $this->role->list();

        return view('admin.employee.create', compact('roles'));
    }

    public function update(Request $request, $id)
    { 
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'number_phone' => 'required',
            'bank_account' => 'required',
            'bank_name' => 'required',
            'birthday' => 'required',
            'sex' => 'required',
            'role_id'=> 'required',
            'upload_image' => 'required|image',
        ]);
        if ($validator->fails()) {
            return back()->withErrors('Please enter full information !'); 
        }

        $data = array();
        if ($request->has('upload_image')) {
            $file_name = $this->fileUploader->uploadFile($request,'employee');
            if ($file_name !== null) {
                $request->merge(['image' => $file_name]);
            }
        }
        
        $data['full_name'] = $request->full_name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['number_phone'] = $request->number_phone;
        $data['image'] = $request->image;
        $data['bank_account'] = $request->bank_account;
        $data['bank_name'] = $request->bank_name;
        $data['birthday'] = $request->birthday;
        $data['sex'] = $request->sex;
        $data['role_id'] = $request->role_id;
  
        $this->model->update($data,$id);

        return redirect()->route('admin.employee.index')->withSuccess('Edit Recruitments Successfully');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'number_phone' => 'required',
            'bank_account' => 'required',
            'bank_name' => 'required',
            'birthday' => 'required',
            'sex' => 'required',
            'role_id'=> 'required',
            'upload_image' => 'required|image',
        ]);
        if ($validator->fails()) {
            return back()->withErrors('Please enter full information !'); 
        }

        if ($request->has('upload_image')) {
            $file_name = $this->fileUploader->uploadFile($request, 'employee');
            if ($file_name !== null) {
                $request->merge(['image' => $file_name]);
            }
        }
     
        $data = array();
        $data['full_name'] = $request->full_name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['number_phone'] = $request->number_phone;
        $data['image'] = $request->image;
        $data['bank_account'] = $request->bank_account;
        $data['bank_name'] = $request->bank_name;
        $data['birthday'] = $request->birthday;
        $data['sex'] = $request->sex;
        $data['role_id'] = $request->role_id;

        $this->model->create($data);

        return redirect()->route('admin.employee.index')->withSuccess('Create Employee Successfully');
    }

    public function delete($id)
    {
      $this->model->delete($id);
  
      return redirect()->route('admin.employee.index')->withSuccess('Create Employee Successfully');
    }
    
}
