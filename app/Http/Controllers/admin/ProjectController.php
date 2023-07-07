<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Repositories\Interfaces\ProjectInterface;
use App\Repositories\Interfaces\EmployeeInterface;
use App\Services\FileUploader;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\RoleInterface;
use App\Repositories\Interfaces\EmployeeProjectInterface;
use Illuminate\Support\Facades\Gate;
use App\Models\Projects;

class ProjectController extends Controller
{
    protected $model;
    protected $fileUploader;
    protected $role;
    protected $employee;
    protected $employee_project;

    
    public function __construct(
        ProjectInterface $model,
        RoleInterface $role,
        EmployeeInterface $employee, 
        EmployeeProjectInterface $employee_project
    ) {
        $this->model = $model;
        $this->fileUploader = new FileUploader;
        $this->role = $role;
        $this->employee = $employee;
        $this->employee_project = $employee_project;
    }

    public function index(Request $request)
    {
        if (Gate::denies('project-list')) {
            abort(403, 'Unauthorized');
        }

        $projects = $this->model->list($request->all());
      
        return view('admin.project.index')->with('projects',$projects);
    }

    public function getEmployeeRole(Request $request)
    {
        $employees = $this->employee->getEmployeeRole($request->id);
        
        return response()->json($employees);
    }
    
    public function edit($id)
    {
        if (Gate::denies('project-edit')) {
            abort(403, 'Unauthorized');
        }
        
        $project = $this->model->getInfoById($id);
        $employees_of_projects = $this->employee_project->getInfoById($id); 
             
        return view('admin.project.edit', compact('project', 'employees_of_projects'));
    }

    public function create()
    {
        if (Gate::denies('project-create')) {
            abort(403, 'Unauthorized');
        }
        
        return view('admin.project.create');
    }

    public function createTeam($id)
    {
        if (Gate::denies('project-create')) {
            abort(403, 'Unauthorized');
        }
        
        $roles = $this->role->list();
        $employees_of_projects = $this->employee_project->getInfoById($id);
        
        return view('admin.project.create-team',compact('roles', 'employees_of_projects'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required',
            'description' => 'required',
            'upload_image' => 'required|image',
        ]);
        if ($validator->fails()) {
            return back()->withErrors('Please enter full information !'); 
        }

        if ($request->has('upload_image')) {
            $file_name = $this->fileUploader->uploadFile($request, 'project');
            if ($file_name !== null) {
                $request->merge(['image' => $file_name]);
            }
        }
     
        $data = array();
        $data['project_name'] = $request->project_name;
        $data['description'] = $request->description;
        $data['start_date'] = $request->start_date;
        $data['end_start'] = $request->end_start;
        $data['image'] = $request->image;
   
        $this->model->create($data);

        return redirect()->route('admin.project.index')->withSuccess('Create Project Successfully');
    }

    public function update(Request $request, $id)
    { 
        $validator = Validator::make($request->all(), [
            'project_name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors('Please enter full information !'); 
        }

        $data = array();
        if ($request->has('upload_image')) {
            $file_name = $this->fileUploader->uploadFile($request, 'project');
            if ($file_name !== null) {
                $request->merge(['image' => $file_name]);
                $data['image'] = $request->image;
            }
        }
        
        $data['project_name'] = $request->project_name;
        $data['description'] = $request->description;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_start;
       
  
        $this->model->update($data,$id);

        return redirect()->route('admin.project.index')->withSuccess('Edit Project Successfully');
    }

    public function delete($id)
    {
        if (Gate::denies('project-delete')) {
            abort(403, 'Unauthorized');
        }
        
      $this->model->delete($id);
        
      return redirect()->route('admin.project.index')->withSuccess('Create Project Successfully');
    }

    public function storeTeam(Request $request)
    {        
        $this->employee_project->addTeam($request->all());

        return redirect()->route('admin.project.index')->withSuccess('Add Team Successfully');
    }
}
