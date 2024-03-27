<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Interfaces\EmployeeInterface;
use App\Interfaces\JobRoleInterface;
use App\Http\Requests\EmployeeInputRequest;
use App\Http\Requests\JobRoleInputRequest;
use App\Services\EmployeeService;
use App\Services\JobRoleService;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class AdminController extends Controller implements EmployeeInterface, JobRoleInterface
{
  private $employeeService;
  private $jobRoleService;

  public function __construct(EmployeeService $employeeService, JobRoleService $jobRoleService)
  {
    $this->employeeService = $employeeService;
    $this->jobRoleService = $jobRoleService;
  }

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

  public function createJobRole(JobRoleInputRequest $request): JsonResponse|Response
  {
    $data = $this->jobRoleService->createJobRole($request->validated());
    return $data
    ? response()->json(['success' => true, 'message' => 'Job role created successfully', 'data' => $data], ResponseCode::HTTP_CREATED)
    : response()->json(['message' => 'Job role creation failed'], ResponseCode::HTTP_INTERNAL_SERVER_ERROR);
  }

  public function updateJobRole(array $data, int $id): JsonResponse|Response
  {
  }

  public function deleteJobRole(int $id): JsonResponse|Response
  {
  }

  public function getJobRole($id): JsonResponse|Response
  {
    return $this->jobRoleService->getJobRole($id)
    ? response()->json(['success' => true, 'message' => 'Job role retrieved successfully', 'data' => $this->jobRoleService->getJobRole($id)], ResponseCode::HTTP_OK)
    : response()->json(['message' => 'Job role not found'], ResponseCode::HTTP_NOT_FOUND);
  }
}

