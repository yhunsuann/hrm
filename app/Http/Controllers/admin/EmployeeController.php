<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\EmployeeInterface;
use App\Repositories\Interfaces\RoleInterface;
use App\Services\FileUploader;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;


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
        if (Gate::denies('employee-list')) {
            abort(403, 'Unauthorized');
        }

        $employees = $this->model->list($request->all());
   
        return view('admin.employee.index', compact('employees'));
    }

    public function edit($id)
    {
        if (Gate::denies('employee-edit')) {
            abort(403, 'Unauthorized');
        }
        
        $employee = $this->model->getInfoById($id);
        $roles = $this->role->list();

        return view('admin.employee.edit', compact('employee','roles'));
    }

    public function info($id)
    {  
        if (Gate::denies('employee-info')) {
            abort(403, 'Unauthorized');
        }

        $employee = $this->model->getInfoById($id);
        $roles = $this->role->list();

        return view('admin.employee.info', compact('employee','roles'));
    }

    public function create()
    {
        if (Gate::denies('employee-create')) {
            abort(403, 'Unauthorized');
        }

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
        ]);
        if ($validator->fails()) {
            return back()->withErrors('Please enter full information !'); 
        }

        $data = array();
        if ($request->has('upload_image')) {
            $file_name = $this->fileUploader->uploadFile($request,'employee');
            if ($file_name !== null) {
                $request->merge(['image' => $file_name]);
                $data['image'] = $request->image;
            }
        }
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }
        $data['full_name'] = $request->full_name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['number_phone'] = $request->number_phone;
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
            'password'=> 'required',
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
        $data['password'] = Hash::make($request->password);
        $data['role_id'] = $request->role_id;
   
        $this->model->create($data);
        
        return redirect()->route('admin.employee.index')->withSuccess('Create Employee Successfully');
    }

    public function delete( $id)
    {
        if (Gate::denies('employee-delete')) {
            abort(403, 'Unauthorized');
        }
        
        $this->model->delete($id);
        
        return redirect()->route('admin.employee.index')->withSuccess('Create Employee Successfully');
    }
}
