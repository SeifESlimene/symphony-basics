<?php

namespace App\Controller;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController {
  protected $logger;
  public function __construct(LoggerInterface $logger) {
    $this->logger = $logger;
  }
  /**
   * @Route("/", name="index")
   */
  public function index() {
    $this->logger->info("Mon Message de log");
    dd("Ca Fonctionne");
  }
  /**
   * @Route("/test/{age<\d+>?0}", name="test", methods={"GET", "POST"}, host="127.0.0.1", schemes={"http", "https"})
   */
  public function test(Request $request, $age) {

    return new Response("Vos avez $age ans!");
  }
}