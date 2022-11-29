<?php

function t($text) {
  static $lang;

  if (!$lang) {
    $langPath = 'fr';
    if (isset($_GET['lang'])) {
      $langPath = $_GET['lang'];
      $_SESSION['language-trans'] = $langPath;
    } else if (isset($_SESSION['language-trans'])) {
      $langPath = $_SESSION['language-trans'];
    }

    $lang = parse_ini_file(__DIR__ . "/languages/" . $langPath . ".ini");
  }
  return (isset($lang[$text])) ? $lang[$text] : $text;
}

function base_path() {
  return rtrim(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']), "/") . "/";
}

function base_url() {
  return 'https://' . $_SERVER['SERVER_NAME'] . base_path();
}

function arg($no = null) {
  if (base_path() == '/') {
    $uri = explode("?", substr($_SERVER['REQUEST_URI'], 1));
  } else {
    $uri = explode(base_path(), $_SERVER['REQUEST_URI']);
    $uri = explode("?", $uri[1]);
  }
  $list = explode("/", $uri[0]);

  if (is_null($no)) {
    return $list;
  } else {
    return (isset($list[$no])) ? $list[$no] : '';
  }
}

function tpl($template, $variables = array()) {
  $templateFile = __DIR__ . "/tpl/" . $template . '.tpl.php';

  extract($variables, EXTR_SKIP);   // Extract the variables to a local namespace

  ob_start();                       // Start output buffering
  include "$templateFile";          // Include the template file
  $contents = ob_get_contents();    // Get the contents of the buffer
  ob_end_clean();                   // End buffering and discard

  return $contents;                   // Return the contents
}
