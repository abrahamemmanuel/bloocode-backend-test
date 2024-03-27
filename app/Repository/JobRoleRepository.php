<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\JobRole;
use App\Services\JobRoleService;
use Illuminate\Database\Eloquent\Collection;

class JobRoleRepository 
{
  /**
   * Create a new job role
   * @param array JobRole $data | null
   */
  public function create(array $data): JobRole | null
  {
    return JobRole::create($data);
  }

  /**
   * Get all job roles
   * @param null
   * @return Array | Collection
   */
  public function findAll(): Collection | null
  {
    return JobRole::all();
  }

  /**
   * Find a job role
   * @param int $id
   */
  public function findOne(int $id): JobRole | null
  {
    return JobRole::find($id);
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