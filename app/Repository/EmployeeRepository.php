<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\Employee;
use App\Models\JobRole;
use App\Services\EmployeeService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class EmployeeRepository
{

  /*
  * Get all employees
  * @return Array | Collection
  */
  public function findAll(): LengthAwarePaginator
  {
    $perPage = 10; // Number of items per page
    return DB::table('employees')
        ->join('employee_job_role', 'employees.id', '=', 'employee_job_role.employee_id')
        ->join('job_roles', 'job_roles.id', '=', 'employee_job_role.job_role_id')
        ->select('employees.*', 'job_roles.title as job_role', 'employee_job_role.status')
        ->paginate($perPage);
  }

  /**
   * Create a new employee
   * @param array Employee $data | null
   */
  public function create(array $data): Employee | null
  {
    return Employee::create($data);
  }

  /**
   * Update an employee
   * @param array $data
   * @param int $id
   * @return Collection | null
   */
  public function findOneAndUpdate(array $data, int $id): Collection | null
  {
    $employee = Employee::find($id);
    $employee->first_name = $data['first_name'] ?? $employee->first_name;
    $employee->last_name = $data['last_name'] ?? $employee->last_name;
    $employee->email = $data['email'] ?? $employee->email;
    $employee->phone = $data['phone'] ?? $employee->phone;
    $employee->dob = $data['dob'] ?? $employee->dob;
    $employee->home_address = $data['home_address'] ?? $employee->home_address;
    $employee->save();

    $role = DB::table('employee_job_role')->where('employee_id', $id)->first();
    $role->status = $data['status'] ?? $role->status;
    $role->job_role_id = $data['job_role_id'] ?? $role->job_role_id;
    DB::table('employee_job_role')->where('employee_id', $id)->update(['job_role_id' => $role->job_role_id, 'status' => $role->status]);
    return $this->findByIdOrName($id, "");
  }

  /**
   * Delete an employee
   * @param int $id
   * @return bool
   */
  public function delete(int $id): bool
  {
    try {
      Employee::where('id', $id)->delete();
      return true;
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Get an employee
   * @param int $id
   * @param string $name
   * @return Employee | null
   */
  public function findByIdOrName(int $id, string $name = ""): Collection | null
  {
    return Employee::join('employee_job_role', 'employees.id', '=', 'employee_job_role.employee_id')
      ->join('job_roles', 'job_roles.id', '=', 'employee_job_role.job_role_id')
      ->select('employees.*', 'job_roles.title as job_role', 'employee_job_role.status')
      ->where('employees.id', $id)->orWhere('employees.first_name', $name)->orWhere('employees.last_name', $name)->get();
  }
}