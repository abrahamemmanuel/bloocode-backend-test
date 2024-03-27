<?php
declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EmployeeInputRequest;

interface EmployeeInterface
{
  /**
   * Get all employees
   * @param Request $request
   * @return JsonResponse
   */
  public function getAllEmployees(): JsonResponse|Response;

  /**
   * Create a new employee
   * @param Request $request
   * @return JsonResponse
   */
  public function createEmployee(EmployeeInputRequest $request): JsonResponse|Response;

  /**
   * Update an employee
   * @param Request $request
   * @param int $id
   * @param array $data
   * @return JsonResponse
   */
  public function updateEmployee(Request $request, int $id): JsonResponse|Response;

  /**
   * Delete an employee
   * @param int $id
   * @return JsonResponse
   */
  public function deleteEmployee(int $id): JsonResponse|Response;

  /**
   * Get an employee
   * @param int $id, 
   * @param string $name
   * @return JsonResponse
   */
  public function getEmployee(int $id, Request $request): JsonResponse|Response;
}