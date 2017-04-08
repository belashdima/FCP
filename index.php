<?php
/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

    // common site settings
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // setup system files
    define('ROOT', dirname(__FILE__));
    require_once ('components/Router.php');
    //
    $router = new Router();
    $router->run();

?>