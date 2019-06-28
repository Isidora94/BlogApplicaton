<?php
 

class Router
{
    private $request;
    private $routes = array(
 
    );
 
    private $allowed_routes = array(
        'admin',
        'page',
    );
 
    public function __construct($request)
    {

        $this->request = $request;
        $controller_slug = $request->requested_path_parts[0];


        if ($controller_slug != 'admin'){
            $controller_slug = 'page';
        }
        
        $controller = $this->instantiateController($controller_slug);
 
    }
 
    private function instantiateController($controller_slug)
    {
        $controlerName = 'Base' . ucfirst($controller_slug) . 'Controller';
        return new $controlerName($this->request);
    }

    private function ifRequestAuthorized()
    {
       
    }
}