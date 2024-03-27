<?php
declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Employee;
use App\Repository\EmployeeRepository;
use App\Models\JobRole;
use App\Repository\JobRoleRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class EmployeeService
{
  private $employeeRepository;
  private $jobRoleRepository;

  public function __construct(EmployeeRepository $employeeRepository, JobRoleRepository $jobRoleRepository)
  {
    $this->employeeRepository = $employeeRepository;
    $this->jobRoleRepository = $jobRoleRepository;
  }

  /**
   * Get all employees
   * @return Array | Collection
   */
  public function getAllEmployees(): Array
  {
    $collection = $this->employeeRepository->findAll();
    $paginationData = [
      'message' => 'Employees retrieved successfully',
      'success' => true,
      'data' => $collection->items(),
      'current_page' => $collection->currentPage(),
      'total_pages' => $collection->lastPage(),
      'total_items' => $collection->total(),
      'next_page_url' => $collection->nextPageUrl(),
      'prev_page_url' => $collection->previousPageUrl(),
    ];
    return $paginationData;
  }

  /**
   * Create a new employee
   * @param array Employee $data | null
   */
  public function createEmployee(array $data): Employee | null
  {
    $employee = $this->employeeRepository->create($data);
    DB::table('employee_job_role')->insert([
      'employee_id' => $employee->id,
      'job_role_id' => $data['job_role_id'],
    ]);
    return $employee;
  }

  /**
   * Update an employee
   * @param array $data
   * @param int $id
   * @return Employee | null
   */
  public function updateEmployee(array $data, int $id): Collection | null
  {
    return $this->employeeRepository->findOneAndUpdate($data, $id);
  }

  /**
   * Delete an employee
   * @param int $id
   * @return bool
   */
  public function deleteEmployee(int $id): bool
  {
    return $this->employeeRepository->delete($id);
  }

  /**
   * Get an employee
   * @param int $id
   * @param string $name
   */
  public function getEmployee(int $id, string $name = ""): Collection | null
  {
    return $this->employeeRepository->findByIdOrName($id, $name);
  }
}