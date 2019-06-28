<?php 


function getBaseName($path)
{
	$path = substr($path, strpos($path, '/') + 1);
	return $path;
}