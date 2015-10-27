<?php

namespace socialsite\Http\Controllers;
use Auth;
use socialsite\Models\Status;

class HomeController extends Controller
{
	public function index()
	{
		if (Auth::check()) {
			$statuses = Status::notReply()->where(function($query) {
				return $query->where('user_id', Auth::user()->id)
				->orWhereIn('user_id', Auth::user()->friends()->lists('id')
					);
			})
			->orderBy('created_at', 'dec')
			->paginate(10);

			return view('timeline.index')->with('statuses', $statuses);
		}
		return view('home'); 
	}
}