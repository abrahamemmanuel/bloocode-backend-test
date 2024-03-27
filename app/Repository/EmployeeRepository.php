<?php

namespace App\Repository;

use App\Models\Employee;
use App\Models\JobRole;
use App\Services\EmployeeService;

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
  public function findByIdOrName(int $id, string $name): Employee | null
  {
    return Employee::where('id', $id)->orWhere('first_name', $name)->orWhere('last_name', $name)->get();
  }
}