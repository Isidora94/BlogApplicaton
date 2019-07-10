<?php 

class Pages
{
	public static function AllPages()
	{
		global $conn;
		
		$query = 'select * from pages';
		$res = $conn->query($query);
		$pages = [];
		while ($page = $res->fetch_object()) {
			$pages[] = $page; 
		}
		return $pages;
	}

	public function getPageContent($name)
	{
		global $conn;

		$query = 'select * from pages where page_name = "'.$name.'"';
		// var_dump($query);
		$res = $conn->query($query);
		$page = $res->fetch_object();
		return $page;
	}

	public function edit_content($name, $content)
	{
		global $conn;

		$content = $conn->real_escape_string($content);
		$content = htmlspecialchars($content);
		
		$query = 'update pages set content = "'.$content.'" WHERE page_name = "'.$name.'"';
		var_dump($query);
		$res = $conn->query($query);
		return $res;
	}
}