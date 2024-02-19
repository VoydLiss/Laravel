<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    use HasFactory;

		protected $fillable =['name', 'logo'];

		/**
     * Значения по умолчанию для атрибутов модели.
     *
     * @var array
     */
		protected $attributes = [
			'name' => 'Название организации'
		];
}
