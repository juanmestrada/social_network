<?php

namespace socialsite\Http\Controllers;

use DB;
use socialsite\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	
	public function getResults(Request $request)
	{
		$query = $request->input('query');

		if(!$query) {
			return redirect()->route('home');
		}

		$users = User::where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'Like', "%{$query}%")->orWhere('username', "Like", "%{$query}%")->get();


		return view('search.results')->with('users', $users);
	}
}