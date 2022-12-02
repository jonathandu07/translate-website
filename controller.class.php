<?php

/**
 *
 * @author keith
 */
class controller
{

  function __construct()
  {
    session_start();
  }

  public function run()
  {
    switch (arg(0)) {
      case "contact":
        $content = $this->contact();
        break;
      case "mentions-legales":
        $content = $this->mentions();
        break;
      case "security":
        $content = $this->security();
        break;
      case "ws":
        $this->ws();
        $content = $this->ws();
        break;
      default:
        $content = $this->home();
        break;
    }
    echo tpl("wrapper", array("content" => $content));
  }
  private function home()
  {
    return tpl('home', array());
  }

  private function contact()
  {
    return tpl('contact', array());
  }

  private function ws()
  {
    header('Content-Type: application/json');

    $action = $_GET['action'];
    $key = $_GET['key'];
    $translate = $_GET['translate'];
    $ini= get_ini();
    // var_dump($active);

    echo json_encode($ini);
  }

  private function mentions()
  {
    return tpl('mentions', array());
  }

  private function security()
  {

    return tpl('security', array());
  }
}
