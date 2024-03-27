<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'home_address',
    ];

    protected $casts = [
        'dob' => 'datetime',
    ];

    public function role()
    {
        return $this->HasOne(JobRole::class, 'employee_job_role', 'employee_id', 'job_role_id')->withPivot('status');
    }
}
