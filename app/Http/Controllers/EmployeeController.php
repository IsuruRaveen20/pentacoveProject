<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\EmployeeFacade\EmployeeFacade;
use Illuminate\Http\Request;


class EmployeeController extends ParentController
{
    use FormHelper;

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $response['employees'] = EmployeeFacade::all();
        $response['tc'] = $this;
        return view('pages.users.all')->with($response);
    }

    /**
     * create
     *
     * @return void
     */
    public function new()
    {
        return view('pages.users.new');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        EmployeeFacade::create($request->all());
        $response['alert-success'] = 'Employee Created Successfully';
        return redirect()->route('employees.all')->with($response);
    }

    /**
     * view
     *
     * @param  mixed $employee_id
     * @return void
     */
    public function view($employee_id)
    {
        $response['employees'] = EmployeeFacade::get($employee_id);
        EmployeeFacade::read($employee_id);
        return view('pages.users.view')->with($response);
    }

    /**
     * edit
     *
     * @param  mixed $employee_id
     * @return void
     */
    public function edit($employee_id)
    {
        $response['employee'] = EmployeeFacade::get($employee_id);
        $response['tc'] = $this;
        return view('pages.users.edit')->with($response);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $employee_id
     * @return void
     */
    public function update(Request $request,$employee_id)
    {
        EmployeeFacade::update($request->all(), $employee_id);
        $response['alert-success'] = 'Employee updated Successfully';
        return redirect()->route('employees.all')->with($response);
    }

     /**
      * delete
      *
      * @param  mixed $employee_id
      * @return void
      */
     public function delete($employee_id)
    {
        EmployeeFacade::delete($employee_id);
        $response['alert-success'] = 'Employee deleted successfully';
        return redirect()->back()->with($response);
    }

    /**
      * changeStatus
      *
      * @param  mixed $employee_id
      * @return void
      */

    public function changeStatus($employee_id)
    {
        $status = EmployeeFacade::changeStatus($employee_id);
        if ($status == 1) {
            $response['alert-success'] = 'Employee Published successfully';
        }else {
            $response['alert-success'] = 'Employee Drafted successfully';
        }
        return redirect()->back()->with($response);
    }

}
