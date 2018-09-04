<?php

namespace App\Http;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function register(UserServiceInterface $userService, array $formData)
    {
        if(isset($formData['register']))
        {
            $user = UserDTO::create(
                $formData['username'],
                $formData['password'],
                $formData['first_name'],
                $formData['last_name'],
                $formData['born_on']
            );

            $userService->register(
                $user,
                $formData['confirm_password']
            );

            $this->redirect("login.php");


        } else {
            $this->render("users/register");
        }
    }
}