<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use Modules\User\Models\UserModel;
use Modules\User\Models\UserRolesModel;


class LoginFilter implements FilterInterface
{
   /**
    * Instance of the main Request object.
    *
    * @var HTTP\IncomingRequest
    */
   protected $response;

   public function before(RequestInterface $request, $arguments = null)
   {
      if (!is_null(session()->get('s_NoK'))) {
         // $userid = session()->get('auth_user')['sess_userid'];
         // $userRoleObj = new UserRolesModel();
         // $hasAdminRole = $userRoleObj->where('role_id', 1)->find($userid);

         return TRUE;
         // if (is_null($hasAdminRole)) {
         //    //throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
         //    return redirect()->to(base_url("/"))->with('errors', ['status' => true, 'notify' => true, 'type' => 'info', 'messages' => 'Invalid request', 'showfooter' => false]);
         // }
      } else {
         //throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
         return redirect()->to(base_url("login"))->with('errors', ['status' => true, 'notify' => true, 'type' => 'info', 'messages' => 'Invalid request', 'showfooter' => false]);
      }
   }

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      // Do something here
   }
}
