<?php

class PeopleController extends BaseController {
	
	public function getPeople() {
		$postal_code = "/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ] ?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/";

		$location = Input::get('location');
		$location = strtoupper($location);

		if (preg_match($postal_code, $location)) {
			$fsa = substr($location, 0, 3);
			
			$people = Person::where('location', '=', $fsa)->take(5)->orderBy('value', 'desc')->get();
			
			return View::make('people')->with('people', $people->toArray())
										->with('location', $location);
		} else {
			return View::make('people')->with('people', array())
										->with('location', $location);
		}
	}
}