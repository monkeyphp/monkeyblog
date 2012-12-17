<?php
/**
 * Module.php
 *
 * Long description for file (if any)...
 *
 * LICENSE: Copyright David White [monkeyphp] <david@monkeyphp.com> http://www.monkeyphp.com/
 *
 * PHP Version 5.3.6
 *
 * @category
 * @package
 * @subpackage
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 * @copyright  2012 David White (c) monkeyphp.com
 * @license    http://www.monkeyphp.com/
 * @version    Revision: ##VERSION##
 * @link       http://www.monkeyphp.com/
 * @since
 * @created    17-Dec-2012 20:21:58
 */
namespace Monkeyblog;

/**
 * Short description for class
 *
 * Long description for class (if any)...
 *
 * @category
 * @package
 * @subpackage
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 * @copyright  2012 David White (c) monkeyphp.com
 * @license    http://www.monkeyphp.com/
 * @version    Release: ##VERSION##
 * @link       http://www.monkeyphp.com/
 * @since
 */
class Module
{

    /**
     * Return Service config
     *
     * @access public
     * @return array
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Monkeyblog\Model\Repository\ArticleRepository' => function($sm) {
                    $articleMapper = $sm->get('Monkeyblog\Model\Mapper\ArticleMapper');
                    $articleRepository = new \Monkeyblog\Model\Respository\ArticleRepository($articleMapper);
                    return $articleRepository;
                },
                'Monkeyblog\Model\Mapper\ArticleMapper' => function($sm) {
                    $articleMapper = new \Monkeyblog\Model\Mapper\ArticleMapper();
                    return $articleMapper;
                },
                'Monkeyblog\Model\Table\ArticleTable' => function($sm) {
                    $tableGateway = $sm->get('ArticleTableGateway');
                    $table = new \Monkeyblog\Model\Table\CommentTable($tableGateway);
                    return $table;
                },
                'Monkeyblog\Model\Table\CommentTable' => function($sm) {
                    $tableGateway = $sm->get('CommentTableGateway');
                    $table = new \Monkeyblog\Model\Table\CommentTable($tableGateway);
                    return $table;
                },
                'ArticleTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Monkeyblog\Model\Entity\Article());
                    return new \Zend\Db\TableGateway\TableGateway('article', $dbAdapter, null, $resultSetPrototype);
                },
                'CommentTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Monkeyblog\Model\Entity\Comment());
                    return new \Zend\Db\TableGateway\TableGateway('contact', $dbAdapter, null, $resultSetPrototype);
                }
            )
        );
    }

    /**
     * Return module configs
     *
     * @access public
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Return autoloader configs
     *
     * @access public
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}