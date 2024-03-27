<?php
declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\JobRoleInputRequest;

interface JobRoleInterface
{

  /**
   * Get all job roles
   * @return JsonResponse
   */
  public function getAllJobRoles(): JsonResponse|Response;

  /**
   * Create a new job role
   * @param Request $request
   * @return JsonResponse
   */
  public function createJobRole(JobRoleInputRequest $request): JsonResponse|Response;

  /**
   * Delete a job role
   * @param int $id
   * @return JsonResponse
   */
  public function deleteJobRole(int $id): JsonResponse|Response;

  /**
   * Get a job role
   * @param int $id
   * @return JsonResponse
   */
  public function getJobRole($id): JsonResponse|Response;
}