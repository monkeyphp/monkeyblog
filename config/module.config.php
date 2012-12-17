<?php
/**
 * module.config.php
 *
 * Long description for file (if any)...
 *
 * LICENSE: Copyright David White [monkeyphp] <david@monkeyphp.com> http://www.monkeyphp.com/
 *
 * PHP Version 5.3.6
 *
 * @category
 * @package    Expression package is undefined on line 12, column 18 in Templates/Scripting/EmptyPHP.php.
 * @subpackage
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 * @copyright  2011 David White (c) monkeyphp.com
 * @license    http://www.monkeyphp.com/
 * @version    Revision: ##VERSION##
 * @link       http://www.monkeyphp.com/
 * @since
 * @created    17-Dec-2012 20:24:40
 */
return array(

    'controllers' => array(
        'invokables' => array(
            'Monkeyblog\Controller\Index' => 'Monkeyblog\Controller\IndexController'
        )
    ),

    'router' => array(
        'routes' => array(
            'monkeyblog' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/blog',
                    'defaults' => array(
                        'controller' => 'Monkeyblog\Controller\Index',
                        'action'     => 'index'
                    )
                )
            )
        )
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'index' => __DIR__ . '../view'
        )
    )

);