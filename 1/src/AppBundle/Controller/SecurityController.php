<?php
/**
 * Created by PhpStorm.
 * User: Cyrian
 * Date: 02/11/2020
 * Time: RAS
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SecurityController extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }

}