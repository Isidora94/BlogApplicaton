<?php 

class EntityBaseController
{

	protected $request;
	protected $accessability_scope = false;
	public function __construct($request)
	{
		$this->request = $request;
	}


	public function setScope($scope = false)
	{
		$this->accessability_scope = $scope;
	}
}