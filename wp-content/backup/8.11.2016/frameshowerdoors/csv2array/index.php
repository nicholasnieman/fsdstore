<?php
function csv_to_array($filename, $delimiter=','){
	if(!file_exists($filename) || !is_readable($filename))
		return FALSE;
	
	$header = NULL;
	$data = array();
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
		{
			/*echo '<pre>';
			print_r($row);
			echo '</pre>';*/
			if(!$header)
				$header = $row;
			else
				$data[] = $row[0];
		}
		fclose($handle);
	}
	return $data;
}

$vkas = csv_to_array('door.csv');

echo '<pre>';
print_r(array_unique($vkas));
echo '</pre>';
?>