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
      default:
        $content = $this->home();
        break;
    }
    echo tpl("wrapper", array("content" => $content));
  }

  private function home()
  {
    $date = date('l, jS F Y');
    $html = '<h1>' . c("Accueil") . '</h1>';
    $html .= '<p>' . c('accinfo') . '</p>';
    $html .= "<img src='https://cdn-icons-png.flaticon.com/512/5683/5683688.png' alt='helloworld'>"."</img>";
    $html .= "<h2>".fecha()."</h2>";
    return $html;
  }

  private function contact()
  {
    $html = '<h1>' . c("Contact") . '</h1>';
    $html .= '<p>' . c('contactinfo') . '</p>';
    $html .= "<img src='https://cdn-icons-png.flaticon.com/512/3815/3815596.png' alt='form'>"."</img>";
    return $html;
  }

  private function mentions()
  {
    $html = '<h1>' . c("Mentions") . '</h1>';
    $html .= '<p>' . c('Mentions-infos') . '</p>';
    $html .= "<img src='https://cdn-icons-png.flaticon.com/512/9033/9033089.png' alt='mentions légale'>"."</img>";
    return $html;
  }
  private function security()
  {
    $html = '<h1>' . c("Verification") . '</h1>';
    $html .= '<p>' . c('securite-info') . '</p>';
    $html .= "<article class='form'>".form()."</article>";
    return $html;
  }
}
