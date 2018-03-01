<?php
/**
 * Created by PhpStorm.
 * User: IES TRASSIERRA
 * Date: 12/02/2018
 * Time: 13:45
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
 public function homepageAction()
 {
     return $this->render('main/homepage.html.twig');
 }
}