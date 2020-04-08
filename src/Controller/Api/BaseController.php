<?php


namespace App\Controller\Api;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    protected function success($data, int $code = 200)
    {
        return $this->json([
            'code' => $code,
            'message' => '',
            'data' => $data
        ], $code);
    }
}