<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Date
 *
 * @property $id_date
 * @property $fk_employee
 * @property $phone
 * @property $email
 * @property $street
 * @property $cologne
 * @property $cp
 * @property $state
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Date extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_date', 'fk_employee', 'phone', 'email', 'street', 'cologne', 'cp', 'state'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'fk_employee', 'id_employee');
    }
    
}
