<?php 

include('./inc/functions.php');

class UploadPostImage
{
	private $base_dir = './uploads/';
	private $raw_data = array();

	public function upload($file)
	{
		$this->raw_data = $file;

		if ($file['error'] != 0) {
			return false;
		}

		$todays_year = date('Y');
		$todays_month = date('m');
		$uploads_dir = $this->base_dir;


		$this->createIfDoesntExist($uploads_dir, $todays_year);
		$uploads_dir .= $todays_year.'/';
		$this->createIfDoesntExist($uploads_dir, $todays_month);
		$uploads_dir .= $todays_month.'/';

		$res = move_uploaded_file($file['tmp_name'], $uploads_dir.$file['name']);
		return $res;
	}


	private function createIfDoesntExist($upload_dir, $folder_name)
	{
		$dir_found = false;
		$upload_dir_content = glob($upload_dir . '*');
		foreach ($upload_dir_content as $dir_name) {
			$dir_name = getBaseName($dir_name);
			if ($dir_name == $folder_name) {
				$dir_found = true;
				break;
			}
		}
		if (!$dir_found) {
			mkdir($upload_dir . $folder_name);		
		}
	}

}
?>