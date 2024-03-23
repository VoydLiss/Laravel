<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

		/**
     * Значения по умолчанию для атрибутов модели.
     *
     * @var array
     */
		protected $fillable = [
			'phone',
			'office_num',
			'office',
		];
}
