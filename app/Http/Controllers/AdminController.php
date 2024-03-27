<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\EmployeeInterface;
use App\Http\Requests\EmployeeInputRequest;
use App\Http\Requests\JobInputRequest;
use App\Services\EmployeeService;
use App\Services\JobRoleService;
use App\Http\Controllers\Controller;

class AdminController extends Controller implements EmployeeInterface, JobRoleInterface
{
  public function getAllEmployees(): JsonResponse|Response
  {
  }

  public function createEmployee(EmployeeInputRequest $request): JsonResponse|Response
  {
  }

  public function updateEmployee(array $data, int $id): JsonResponse|Response
  {
  }

  public function deleteEmployee(int $id): JsonResponse|Response
  {
  }

  public function getEmployee(int $id, string $name): JsonResponse|Response
  {
  }

  public function getAllJobRoles(): JsonResponse|Response
  {
  }

  public function createJobRole(JobInputRequest $request): JsonResponse|Response
  {
  }

  public function updateJobRole(array $data, int $id): JsonResponse|Response
  {
  }

  public function deleteJobRole(int $id): JsonResponse|Response
  {
  }

  public function getJobRole($id): JsonResponse|Response
  {
    
  }
}

