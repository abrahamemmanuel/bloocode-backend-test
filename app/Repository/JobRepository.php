<?php

namespace App\Repository;

use App\Models\JobRole;
use App\Services\JobRoleService;

class JobRoleRepository 
{
  /**
   * Get all job roles
   * @return Array | Collection
   */
  public function findAll(): Array | Collection
  {
    return JobRole::all();
  }

  /**
   * Create a new job role
   * @param array JobRole $data | null
   */
  public function create(array $data): JobRole | null
  {
    return JobRole::create($data);
  }

  /**
   * Update a job role
   * @param array $data
   * @param int $id
   * @return JobRole | null
   */
  public function findOneAndUpdate(array $data, int $id): JobRole | null
  {
    return JobRole::where('id', $id)->update($data);
  }

  /**
   * Delete a job role
   * @param int $id
   * @return bool
   */
  public function delete(int $id): bool
  {
    try {
      JobRole::where('id', $id)->delete();
      return true;
    } catch (\Exception $e) {
      return false;
    }
  }
}