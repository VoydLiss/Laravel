<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
		use Sluggable;
    use HasFactory;

	protected $fillable = ['title', 'description', 'content', 'category_id','thumbnail'];
	
	protected $attributes	= [
		"content" => "Lorem ipsum...",
	];

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
	
	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable(): array
	{
			return [
					'slug' => [
							'source' => 'title'
					]
			];
	}

	public static function uploadImage(Request $request, $image = null)
	{
		if($request->hasFile('thumbnail')){
			if ($image) {
				Storage::delete($image);
			}
			$folder = date('Y-m-d');
			return $request->file('thumbnail')->store("images/{$folder}");
		}
		return null;
	}

	public function getImage()
	{
		if(!$this->thumbnail){
			return asset("no-image.png");
		}
		return asset("uploads/{$this->thumbnail}");

	}

}
