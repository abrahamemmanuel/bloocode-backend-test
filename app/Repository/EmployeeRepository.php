<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\Employee;
use App\Models\JobRole;
use App\Services\EmployeeService;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository
{

  /*
  * Get all employees
  * @return Array | Collection
  */
  public function findAll(): Array | Collection
  {
    return Employee::all();
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
   * @return Employee | null
   */
  public function findOneAndUpdate(array $data, int $id): Employee | null
  {
    DB::table('employee_job_role')->where('employee_id', $id)->update([
      'job_role_id' => $data['job_role_id'],
    ]);
    return Employee::where('id', $id)->update($data);
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
      ->select('employees.*', 'job_roles.title as job_role')
      ->where('employees.id', $id)->orWhere('employees.first_name', $name)->orWhere('employees.last_name', $name)->get();
  }
}