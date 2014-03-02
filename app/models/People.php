<?php

Class People extends Eloquent {
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

		echo "<pre>";
		var_dump($parsed_geo);
		echo "</pre>";
		echo "<pre>";
		var_dump($parsed_age_gender);
		echo "</pre>";

		//$data = simplexml_load_file($data_file);
		$structure = simplexml_load_file($data_file);
		$namespaces = $structure->getNamespaces(true);
		$series = $structure->DataSet->children($namespaces["structure"]);
		
		$parsed_people = array();
		foreach($series as $seriesKeyObs) {
			$series_key = $seriesKeyObs->SeriesKey;
			$series_obs = $seriesKeyObs->Obs;
			$geo_attr = $series_key->Value[0]->attributes();
			$age_gender_attr = $series_key->Value[1]->attributes();
			$value_attr = $series_obs->ObsValue->attributes();
			
			$value = array();
			$value['geo'] = $geo_attr['value']->__toString();
			$value['age_gender'] = $age_gender_attr['value']->__toString();
			$value['value'] = $value_attr['value']->__toString();
			$parsed_people[] = $value;
		}


		echo "==================================================\n";
		echo "<pre>";
		var_dump($parsed_people);
		echo "</pre>";


		//echo "<pre>";
		//var_dump($data);
		//echo "</pre>";
		//$namespaces = $data->getNamespaces(true);
		// $data_set = $data->CodeLists->children();
		// echo "<pre>";
		// 	var_dump($data_set);
		// 	echo "</pre>";
		
		//$data_set = $data->DataSet->children();
		//$parsed_data = array();
		/*foreach($data_set as $series) {
			//$entry = array();
			echo "<pre>";
			var_dump($data);
			echo "</pre>";
			/*$seriesKey = $series->SeriesKey;
			foreach ($seriesKey as $key) {
				$key
			}
			$seriesValue = $series->Obs;
		}*/
		/*$xmlr = new XMLReader();
		$xmlr->open($data_file);

		$doc = new DOMDocument();

		while ($xmlr->read() && $xmlr->name !== 'generic:Series');

		$node = $xmlr->expand();
		while ($xmlr->name === 'generic:Series') {
			$node = simplexml_import_dom($doc->importNode($xmlr->expand(), true));

			var_dump($node);

			$xmlr->next();
		}*/
	}
}