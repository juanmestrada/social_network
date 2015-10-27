<?php

namespace socialsite\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model 
{
	protected $table = "statuses";

	protected $fillable = [
		'body'
	];
		
	public function user()
	{
		return $this->belongsTo('socialsite\Models\User', 'user_id');
	}

	public function scopeNotReply($query)
	{
		return $query->whereNull('parent_id');
	}

	public function replies()
	{
		return $this->hasMany('socialsite\Models\Status', 'parent_id');
	}

	public function likes()
	{
		return $this->morphMany('socialsite\Models\Like', 'likeable');
	}
}