<?php
namespace bbw_mvc\lib;

class Application{
    private Request $request;
    private Response $response;
    private Router $router;

    public function __construct()
    {
        $this->request=new Request;
        $this->response=new Response;
        $this->router=new Router($this->request,$this->response);
    }

    public function run(){
        $this->router->resolve();
    }
}