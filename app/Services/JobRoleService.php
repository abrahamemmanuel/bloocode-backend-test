<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\JobRole;
use App\Repository\JobRoleRepository;

class JobService
{
  private $jobRoleRepository;

  public function __construct(JobRoleRepository $jobRoleRepository)
  {
    $this->jobRoleRepository = $jobRoleRepository;
  }

  /**
   * Get all job roles
   * @return Array | Collection
   */
  public function getAllJobRoles(): Array | Collection
  {
    return $this->jobRoleRepository->findAll();
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
   * Update a job role
   * @param array $data
   * @param int $id
   * @return JobRole | null
   */
  public function updateJobRole(array $data, int $id): JobRole | null
  {
    return $this->jobRoleRepository->findOneAndUpdate($data, $id);
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
   * @param string $name
   * @return JobRole | null
   */
  public function getJobRole(int $id): JobRole | null
  {
    return $this->jobRoleRepository->findOne($id);
  }
}