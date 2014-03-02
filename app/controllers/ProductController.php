<?php

class ProductController extends BaseController {
	
	public function getProduct() {
		$location = Input::get('location');
		
		$postal_code = "/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ] ?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/";

		$location = Input::get('location');
		$location = strtoupper($location);

		if (preg_match($postal_code, $location)) {
			$fsa = substr($location, 0, 3);
			
			$people = Person::where('location', '=', $fsa)->take(1)->orderBy('value', 'desc')->get()->toArray();
			if (count($people)> 0) {
				$age_exploded = explode(' ', $people['age']);
				$lower = (int)$age_exploded[0];
				$upper = (int)$age_exploded[2];

				//$product = Product::whereRaw('lower < ? AND upper > ?'))
			}
			

			return View::make('product');
		} else {
			return View::make('product')->with('location', $location);
		}
	}
}