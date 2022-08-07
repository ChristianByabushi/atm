<?php
namespace APp\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ControlConnection implements FilterInterface
{
    public function before( RequestInterface $request, $arguments = null) 
    {  // on vérigie si la session isLoggedIn existe 
            //user_connected        
        if(!session()->get('user_connected')){
         return redirect()->to('/'); 
        }
    } 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }

}

?>