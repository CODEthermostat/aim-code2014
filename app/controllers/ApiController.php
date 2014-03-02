<?php

class ApiController extends BaseController {
	
	public function getPeople($location = null) {
		//$api_key = "354754be8ab8820dda740c646f8361210f7b25deb1e8cdd586d1359863491eac";
		People::parseXML();
	}

}