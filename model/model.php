<?php

	function open($file)
	{
		$json = fopen($file, 'r+');
		$temp = fgets($json);

		fseek($json, 0);

		$data = json_decode($temp,JSON_OBJECT_AS_ARRAY);

		return $data;
	}

?>