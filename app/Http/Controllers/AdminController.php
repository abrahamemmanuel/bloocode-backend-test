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
    $data = $this->employeeService->createEmployee($request->validated());
    return $data
    ? response()->json(['success' => true, 'message' => 'Employee created successfully', 'data' => $data], ResponseCode::HTTP_CREATED)
    : response()->json(['message' => 'Employee creation failed'], ResponseCode::HTTP_BAD_REQUEST);
  }

  public function updateEmployee(Request $request, int $id): JsonResponse|Response
  {
    
  }

  public function deleteEmployee(int $id): JsonResponse|Response
  {
  }

  public function getEmployee(int $id, Request $request): JsonResponse|Response
  {
    $name = $request->name ?? '';
    $data = $this->employeeService->getEmployee($id, $name);
    return $data
    ? response()->json(['success' => true, 'message' => 'Employee retrieved successfully', 'data' => $data], ResponseCode::HTTP_OK)
    : response()->json(['message' => 'Employee not found'], ResponseCode::HTTP_NOT_FOUND);
  }

  public function createJobRole(JobRoleInputRequest $request): JsonResponse|Response
  {
    $data = $this->jobRoleService->createJobRole($request->validated());
    return $data
    ? response()->json(['success' => true, 'message' => 'Job role created successfully', 'data' => $data], ResponseCode::HTTP_CREATED)
    : response()->json(['message' => 'Job role creation failed'], ResponseCode::HTTP_INTERNAL_SERVER_ERROR);
  }

  public function deleteJobRole(int $id): JsonResponse|Response
  {
    return $this->jobRoleService->deleteJobRole($id)
    ? response()->json(['success' => true, 'message' => 'Job role deleted successfully'], ResponseCode::HTTP_OK)
    : response()->json(['message' => 'Job role deletion failed'], ResponseCode::HTTP_INTERNAL_SERVER_ERROR);
  }

  public function getJobRole($id): JsonResponse|Response
  {
    return $this->jobRoleService->getJobRole($id)
    ? response()->json(['success' => true, 'message' => 'Job role retrieved successfully', 'data' => $this->jobRoleService->getJobRole($id)], ResponseCode::HTTP_OK)
    : response()->json(['message' => 'Job role not found'], ResponseCode::HTTP_NOT_FOUND);
  }

  public function getAllJobRoles(): JsonResponse|Response
  {
    $data = $this->jobRoleService->getAllJobRoles();
    return $data
    ? response()->json(['success' => true, 'message' => 'Job roles retrieved successfully', 'data' => $data], ResponseCode::HTTP_OK)
    : response()->json(['message' => 'Job roles not found'], ResponseCode::HTTP_NOT_FOUND);
  }
}

