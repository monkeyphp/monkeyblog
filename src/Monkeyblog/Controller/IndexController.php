<?php
/**
 * IndexController.php
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
 * @copyright  2011 David White (c) monkeyphp.com
 * @license    http://www.monkeyphp.com/
 * @version    Revision: ##VERSION##
 * @link       http://www.monkeyphp.com/
 * @since
 * @created    17-Dec-2012 19:29:54
 */
namespace Monkeyblog\Controller;

/**
 * Short description for class
 *
 * Long description for class (if any)...
 *
 * @category
 * @package
 * @subpackage
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 * @copyright  2011 David White (c) monkeyphp.com
 * @license    http://www.monkeyphp.com/
 * @version    Release: ##VERSION##
 * @link       http://www.monkeyphp.com/
 * @since
 */
class IndexController extends \Zend\Mvc\Controller\AbstractActionController
{

    /**
     * Instance of \Monkeyblog\Model\Repository\ArticleRepository
     *
     * @access protected
     * @var    \Monkeyblog\Model\Repository\ArticleRepository
     */
    protected $articleRepository;

    /**
     * Retrieve an instance of \Monkeyblog\Model\Repository\ArticleRepository from
     * the ServiceLocatorInterface
     *
     * @access protected
     * @return \Monkeyblog\Model\Repository\ArticleRepository
     */
    protected function getArticleRepository()
    {
        if (! isset($this->articleRepository)) {
            $this->articleRepository = $this->getServiceLocator()->get('Monkeyblog\Model\Repository\ArticleRepository');
        }
        return $this->articleRepository;
    }

    /**
     * List all instances of \Monkeyblog\Model\Entity\Article available from the
     * ArticleRepository
     *
     * @access public
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        return new \Zend\View\Model\ViewModel(array('articles' => $this->getArticleRepository()->fetchAll()));
    }

}