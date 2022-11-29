<?php

/**
 *
 * @author keith
 */
class controller {

  function __construct() {
    session_start();
  }

  public function run() {
    switch (arg(0)) {
      case "contact":
        $content = $this->contact();
        break;
      default:
        $content = $this->home();
        break;
    }
    echo tpl("wrapper", array("content" => $content));
  }

  private function home() {
    $html = '<h1>' . t("Accueil") . '</h1>';
    $html .= '<p>' . t('accinfo') . '</p>';
    return $html;
  }

  private function contact() {
    $html = '<h1>' . t("Contact") . '</h1>';
    $html .= '<p>' . t('contactinfo') . '</p>';
    return $html;
  }

}
