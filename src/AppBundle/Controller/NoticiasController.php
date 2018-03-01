<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo
 * Date: 27/02/2018
 * Time: 18:34
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Noticia;

class NoticiasController extends Controller
{


    /**
     * @Route("noticia")
     */
    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $listaNoticias = $em->getRepository('AppBundle:Noticia')
            ->findAll();
        return $this->render('noticias/listanoticias.html.twig',[
            'listaNoticias'=> $listaNoticias,

        ]);
    }
    /**
     * @Route("listaopelcorsa")
     */
    public function listOpel(){
        $em = $this->getDoctrine()->getManager();
        $listaCorsa = $em->getRepository('AppBundle:Noticia')
            ->findAllOpelCorsa();
        return $this->render('noticias/listacorsa.html.twig',[
            'listaCorsa'=> $listaCorsa,

        ]);
    }

    /**
     * @Route("insertnoticia")
     */
    public function newNoticia()
    {
        $noticia = new Noticia(
            1,
            'Esto no es una Noticia',
            'El alumno que supo la nota de su examen despues de que fuese la recuperacion del mismo',
            'notas');



        $em = $this->getDoctrine()->getManager();
        $em->persist($noticia);
        $em->flush();

        return new RedirectResponse('noticia');
    }
    /**
     * @Route("newopel")
     */
    public function newOpel()
    {
        $noticia = new Noticia(
            1,
            'Vendo Opel Corsa',
            'Solo tiene un par de kilometros, lo compre por una coña con un colega',
            'opel');



        $em = $this->getDoctrine()->getManager();
        $em->persist($noticia);
        $em->flush();

        return new RedirectResponse('noticia');
    }


    /**
     * @Route("/noticia/{titulo}")
     */
    public function showAction($titulo)
    {
        return  $this->render('noticias/noticia.html.twig',[
            'titulo' =>$titulo,
        ]);

    }
}