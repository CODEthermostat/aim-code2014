<?php

class PeopleController extends BaseController {
	
	public function getPeople() {
		$postal_code = "/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ] ?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/";

		//$people_json = json_encode(array());
		$location = Input::get('location');
		$location = strtoupper($location);

		if (preg_match($postal_code, $location)) {
			$fsa = substr($location, 0, 3);
			
			$people = Person::where('location', '=', $fsa)->take(5)->orderBy('value', 'desc')->get();
			
			return View::make('people')->with('people', $people->toArray());
			//$people_json = json_encode(array('status' => 'success', 'data' => $people->toArray()));
		} else {
			return View::make('people')->with('people', array());
			//$people_json = json_encode(array('status' => 'error', 'data' => 'Incorrect postal code'));
		}

		//return $people_json;
	}
}