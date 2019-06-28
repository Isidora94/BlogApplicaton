<?php 


class AdminBaseController
{
	protected $request;
	protected $accessability_scope = true;
	public function __construct($request)
	{
		$this->request = $request;
	}


	public function setScope($scope = true)
	{
		$this->accessability_scope = $scope;
	}
}