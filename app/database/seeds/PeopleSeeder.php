<?php

class PeopleSeeder extends Seeder {
	public static function parseXML() {
		$meta_file = public_path()."/people_meta.xml";
		//$data_file = public_path()."/people_meta.xml";
		$data_file = public_path()."/people.xml";

		$structure = simplexml_load_file($meta_file);
		$namespaces = $structure->getNamespaces(true);
		$code_lists = $structure->CodeLists[0]->children($namespaces["structure"]);
		
		$parsed_geo = array();
		foreach($code_lists[0] as $geo_data) {
			$attrs = $geo_data->attributes();
			if ($attrs['value'] != null) {
				$parsed_geo[$attrs['value']->__toString()] = trim($geo_data->Description->__toString());
			}
		}

		$parsed_age_gender = array();
		foreach($code_lists[1] as $age_gender_data) {
			$attrs = $age_gender_data->attributes();
			if ($attrs['value'] != null) {
				$parsed_age_gender[$attrs['value']->__toString()] = trim($age_gender_data->Description[0]->__toString());
			}
		}

		/*echo "<pre>";
		var_dump($parsed_geo);
		echo "</pre>";
		echo "<pre>";
		var_dump($parsed_age_gender);
		echo "</pre>";*/

		$data = simplexml_load_file($data_file);
		$namespaces = $data->getNamespaces(true);
		$series = $data->DataSet->children($namespaces["generic"]);
		
		$parsed_people = array();
		foreach($series as $seriesKeyObs) {
			$series_key = $seriesKeyObs->SeriesKey;
			$series_obs = $seriesKeyObs->Obs;
			$geo_attr = $series_key->Value[0]->attributes();
			$age_gender_attr = $series_key->Value[1]->attributes();
			$value_attr = $series_obs->ObsValue->attributes();
			
			$value = array();
			$value['location'] = $parsed_geo[trim($geo_attr['value']->__toString())];
			$value['age'] = $parsed_age_gender[trim($age_gender_attr['value']->__toString())];
			if ((int)trim($age_gender_attr['value']->__toString()) < 22) {
				// In the structure xml, values >= 22 means female
				$value['gender'] = 'Male';
			} else {
				$value['gender'] = 'Female';
			}
			$value['value'] = trim($value_attr['value']->__toString());
			$parsed_people[] = (int)$value;
		}

		return $parsed_people;
	}

	public function run() {
		DB::table('people')->delete();

		$people = $this->parseXML();

		foreach ($people as $person) {
			Person::create($person);
		}
	}
}