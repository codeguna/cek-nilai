<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentPrint
 *
 * @property $id
 * @property $nim
 * @property $is_printed
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class StudentPrint extends Model
{
    
    static $rules = [
		'nim' => 'required',
		'is_printed' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nim','is_printed'];

    public function student()
    {
      return	$this->belongsTo(Student::class, 'nim');
    }

}
