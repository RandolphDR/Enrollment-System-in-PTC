<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_no',
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'gender',
        'birth_date',
        'civil_status',
        'birthplace',
        'phone_no',
        'address',
    ];

    protected $casts = [
        'birthplace' => 'array',
        'address' => 'array'
    ];

    protected static function booted()
    {
        static::creating(function ($employee) {
            if (is_null($employee->birthplace)) {
                $employee->birthplace = [
                    'street' => null,
                    'city' => null,
                    'province' => null,
                    'country' => null,
                    'postal_code' => null,
                ];
            }

            if (is_null($employee->address)) {
                $employee->address = [
                    'street' => null,
                    'city' => null,
                    'province' => null,
                    'country' => null,
                    'postal_code' => null,
                ];
            }
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function employment() {
        return $this->belongsTo(Employment::class);
    }
}
