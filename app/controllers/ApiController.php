<?php

class ApiController extends BaseController {
	
	public function getPeople($location = null) {
		$postal_code = "/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ] ?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/";

		$people_json = json_encode(array());
		$location = strtoupper($location);

		if (preg_match($postal_code, $location)) {
			$fsa = substr($location, 0, 3);
			
			$people = Person::where('location', '=', $fsa)->take(5)->orderBy('value', 'desc')->get();
			$people_json = json_encode(array('status' => 'success', 'data' => $people->toArray()));
		} else {
			$people_json = json_encode(array('status' => 'error', 'data' => 'Incorrect postal code'));
		}

		return $people_json;
	}
}