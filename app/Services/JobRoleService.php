<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\JobRole;
use App\Repository\JobRoleRepository;

class JobRoleService
{
  private $jobRoleRepository;

  public function __construct(JobRoleRepository $jobRoleRepository)
  {
    $this->jobRoleRepository = $jobRoleRepository;
  }

  /**
   * Create a new job role
   * @param array JobRole $data | null
   */
  public function createJobRole(array $data): JobRole | null
  {
    return $this->jobRoleRepository->create($data);
  }

  /**
   * Delete a job role
   * @param int $id
   * @return bool
   */
  public function deleteJobRole(int $id): bool
  {
    return $this->jobRoleRepository->delete($id);
  }

  /**
   * Get a job role
   * @param int $id
   * @return JobRole | null
   */
  public function getJobRole(int $id): JobRole | null
  {
    return $this->jobRoleRepository->findOne($id);
  }
}