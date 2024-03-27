<?php
declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\JobInputRequest;

interface JobRoleInterface
{
  /**
   * Get all job roles
   * @param Request $request
   * @return JsonResponse
   */
  public function getAllJobRoles(): JsonResponse|Response;

  /**
   * Create a new job role
   * @param Request $request
   * @return JsonResponse
   */
  public function createJobRole(JobInputRequest $request): JsonResponse|Response;

  /**
   * Update a job role
   * @param Request $request
   * @param int $id, array $data
   * @return JsonResponse
   */
  public function updateJobRole(array $data, int $id): JsonResponse|Response;

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