<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\RoleInterface;
use App\Repositories\Interfaces\PermissionInterface;
use App\Repositories\Interfaces\PermissionRoleInterface;
use Illuminate\Support\Facades\Gate;
use App\Models\Roles;

class RoleController extends Controller
{
    protected $model;
    protected $permission;
    protected $permission_role;
    
    public function __construct(
        RoleInterface $model,
        PermissionInterface $permission,
        PermissionRoleInterface $permission_role,
    ) {
        $this->model = $model;
        $this->permission = $permission;
        $this->permission_role = $permission_role;
    }

    public function index(Request $request)
    {
        if (Gate::denies('role-list')) {
            abort(403, 'Unauthorized');
        }

        $permission_roles = $this->model->listRolePermission($request->all());
        $roles = $this->model->list();

        return view('admin.role.index', compact('permission_roles','roles'));
    }

    public function edit($id)
    {
        if (Gate::denies('role-edit')) {
            abort(403, 'Unauthorized');
        }

        $all_permission = $this->permission->list();
        $permission = $this->permission_role->getInfoById($id);
        $infobyId =$this->model->getInfoById($id);

        return view('admin.role.edit', compact('all_permission', 'permission','infobyId'));
    }

    public function create()
    {
        if (Gate::denies('role-create')) {
            abort(403, 'Unauthorized');
        }

        $permissions = $this->permission->list();

        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = $this->model->create([
            'role_name' => $request['role_name'],
        ]);
 
        foreach ($request['permission_id'] as $id) {
            $this->permission_role->create([
                'role_id' => $role->id,
                'permission_id' => $id,
            ]);
        }

        return redirect()->route('admin.role.index')->withSuccess('Create Role Successfully');
    } 

    public function update(Request $request, $id)
    { 
        $permissionOld = $this->permission_role->getInfoById($id)->pluck('permission_id')->toArray();
        $PermissionsNew = $request->input('permission_id');
        
        $permissionOld = $permissionOld ?: [];
        $PermissionsNew = $PermissionsNew ?: [];

        $permissionsToAdds = array_diff($PermissionsNew, $permissionOld);
        $permissionsToDelete = array_diff($permissionOld, $PermissionsNew);

        foreach ($permissionsToDelete as $permission_id) {
            $this->permission_role->delete($id,$permission_id);
        }

        foreach ($permissionsToAdds as $permission_id) {
            $this->permission_role->create([
                'role_id' => $id,
                'permission_id' => $permission_id,
            ]);
        }
        return redirect()->route('admin.role.index')->withSuccess('Edit Role Successfully'); 
    }

    public function delete($id)
    {
        if (Gate::denies('role-delete')) {
            abort(403, 'Unauthorized');
        }

        $this->model->delete($id);
            
        return redirect()->route('admin.role.index')->withSuccess('Create Employee Successfully');
    }
}
