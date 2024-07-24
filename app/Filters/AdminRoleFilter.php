<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use Modules\Dashboard\Models\Login_m;


class AdminRoleFilter implements FilterInterface
{
   /**
    * Instance of the main Request object.
    *
    * @var HTTP\IncomingRequest
    */
   protected $response;

   public function before(RequestInterface $request, $arguments = null)
   {
      if (!is_null(session()->get('s_KP'))) {
         $allow_access = array('1', '2');
         $noKP = session()->get('s_KP');
         $userRoleObj = new Login_m();

         $hasAdminRole = $userRoleObj->getUserRole($noKP);
         foreach ($hasAdminRole as $row) {
            $roleID = $row->usrroles_roleid;
            if(in_array($roleID, $allow_access)){
               
            }
         }

         
         if (is_null($hasAdminRole)) {
            //throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            return redirect()->to(base_url("/"))->with('errors', ['status' => true, 'notify' => true, 'type' => 'info', 'messages' => 'Invalid request', 'showfooter' => false]);
         }
      } else {
         //throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
         return redirect()->to(base_url("/"))->with('errors', ['status' => true, 'notify' => true, 'type' => 'info', 'messages' => 'Invalid request', 'showfooter' => false]);
      }
   }

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      // Do something here
   }
}
