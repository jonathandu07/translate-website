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
    $html = '<h1>' . t("Accueil") . '</h1>';
    $html .= '<p>' . t('accinfo') . '</p>';
    $html .= "<img src='https://cdn-icons-png.flaticon.com/512/5683/5683688.png' alt='helloworld'>"."</img>";
    return $html;
  }

  private function contact()
  {
    $html = '<h1>' . t("Contact") . '</h1>';
    $html .= '<p>' . t('contactinfo') . '</p>';
    $html .= "<img src='https://cdn-icons-png.flaticon.com/512/3815/3815596.png' alt='form'>"."</img>";
    return $html;
  }

  private function mentions()
  {
    $html = '<h1>' . t("Mentions") . '</h1>';
    $html .= '<p>' . t('Mentions-infos') . '</p>';
    $html .= "<img src='https://cdn-icons-png.flaticon.com/512/9033/9033089.png' alt='mentions légale'>"."</img>";
    return $html;
  }
  private function security()
  {
    $html = '<h1>' . t("Verification") . '</h1>';
    $html .= '<p>' . t('securite-info') . '</p>';
    $html .= "<article>".form()."</article>";
    return $html;
  }
}
