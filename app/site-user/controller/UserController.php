<?php
/**
 * UserController
 * @package site-user
 * @version 0.0.1
 */

namespace SiteUser\Controller;

use SiteUser\Library\Meta;
use LibUser\Library\Fetcher;
use LibFormatter\Library\Formatter;

class UserController extends \Site\Controller
{
    public function meAction(){
        if(!$this->user->isLogin()){
            $next = $this->router->to('siteMeLogin', [], ['next'=>$this->req->url]);
            return $this->res->redirect($next);
        }

        $user = Fetcher::getOne(['id'=>$this->user->id]);
        $user = Formatter::format('user', $user);

        $params = [
            'user' => $user,
            'meta' => Meta::single($user)
        ];

        $this->res->render('user/me', $params);
        $this->res->send();
    }
}