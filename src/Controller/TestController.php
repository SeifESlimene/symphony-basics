<?php

namespace App\Controller;
use App\Taxes\Calculator;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController {
  // /**
  //  * @Route("/", name="index")
  //  */
  // public function index() {
  //   dd("Ca Fonctionne");
  // }
  /**
   * @Route("/test/{age<\d+>?0}", name="test", methods={"GET", "POST"}, host="127.0.0.1", schemes={"http", "https"})
   */
  public function test(Request $request, $age, LoggerInterface $logger, Calculator $calculator) {
    $logger->info("Mon Message de log");
    $tva = $calculator->calcul(100);
    dump($tva);
    return new Response("Vos avez $age ans!");
  }
}