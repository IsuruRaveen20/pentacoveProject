<?php

namespace domain\Services\EmployeeService;

use App\Models\Employee;

class EmployeeService
{
    public function __construct()
    {
        $this->employees = new Employee();
    }

    public function all()
    {
        return $this->employees->all();
    }

    public function getActive()
    {
        return $this->employees->getActive();
    }

    public function totalCountOfUsers()
    {
        return $this->employees->getActive()->count();
    }

    public function create(array $data)
    {
        return $this->employees->create($data);
    }

    public function get($employee_id)
    {
        return $this->employees->find($employee_id);
    }

    public function forRelated($employee_id)
    {
        return $this->employees->forRelated($employee_id);
    }


    public function update(array $data, $employee_id)
    {
        $employees = $this->employees->find($employee_id);
        $employees->update($this->edit($employees, $data));
    }

    protected function edit(Employee $employee, $data)
    {
        return array_merge($employee->toArray(), $data);
    }


    public function delete($employee_id)
    {
        return $this->employees->find($employee_id)->delete();
    }

    public function changeStatus($employee_id)
    {
        $employees = $this->employees->find($employee_id);
        if ($employees->status == 0) {
            $employees->status = 1;
            $employees->update();
            return 1;
        } else {
            $employees->status = 0;
            $employees->update();
            return 0;
        }
    }
}
