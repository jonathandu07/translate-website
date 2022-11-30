<?php

function t($text)
{
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
// #########################################################################
function base_path()
{
  return rtrim(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']), "/") . "/";
}

function base_url()
{
  return 'https://' . $_SERVER['SERVER_NAME'] . base_path();
}
// #########################################################################
function arg($no = null)
{
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
// #########################################################################
function tpl($template, $variables = array())
{
  $templateFile = __DIR__ . "/tpl/" . $template . '.tpl.php';

  extract($variables, EXTR_SKIP);   // Extract the variables to a local namespace

  ob_start();                       // Start output buffering
  include "$templateFile";          // Include the template file
  $contents = ob_get_contents();    // Get the contents of the buffer
  ob_end_clean();                   // End buffering and discard

  return $contents;                   // Return the contents
}
// #########################################################################
function form()
{
  include_once './security.php';
}
//#########################################################################
function contact_tpl($tpl, $var = array())
{
  $tplFile = __DIR__ . "/tpl/" . $tpl . '.tpl.php';

  extract($var, EXTR_SKIP);
  ob_start();
  include "$tplFile";
  $content = ob_get_contents();
  ob_end_clean();

  return $content;
}
// #########################################################################
function get_langue()
{
  static $langs;

  if (!$langs) {
    $langsPath = 'fr';
    if (isset($_GET['lang'])) {
      $langsPath = $_GET['lang'];
      $_SESSION['language-trans'] = $langsPath;
    } else if (isset($_SESSION['language-trans'])) {
      $langsPath = $_SESSION['language-trans'];
    }
  }
  return $langsPath;
}
// #########################################################################
function c($text)
{
  static $lang;

  if (!$lang) {
    $langPath = 'fr';
    if (isset($_GET['lang'])) {
      $langPath = get_langue();
      setcookie('lang', $langPath);
    } else if (isset($_COOKIE['lang'])) {
      $langPath = $_COOKIE['lang'];
    }

    $lang = parse_ini_file(__DIR__ . "/languages/" . $langPath . ".ini");
  }
  return (isset($lang[$text])) ? $lang[$text] : $text;
}
// #########################################################################
function fecha()
{
  // $t = array('fr' => 'fr_FR', 'en' => 'en_GB');

  // $local = $t[get_langue()];
  setlocale(LC_ALL, get_langue());
  $jour = strftime("%A");
  $fecha = strftime("%e");
  $mois = strftime("%B");
  $annee = strftime("%Y");
  $fechaDhoy = $jour . ' ' . $fecha . ' ' . $mois . ' ' . $annee;

  return $fechaDhoy;
}
