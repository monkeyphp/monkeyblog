<?php
/**
 * BlogMapper.php
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
 * @created    17-Dec-2012 18:40:30
 */
namespace Monkeyblog\Model\Mapper;

use Monkeyblog\Model\Collection\ArticleCollection;
use Monkeyblog\Model\Entity\Article;
use Monkeyblog\Model\Entity\Comment;
use Monkeyblog\Model\Table\ArticleTable;
use Monkeyblog\Model\Table\CommentTable;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
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
class ArticleMapper implements ServiceLocatorAwareInterface, EventManagerAwareInterface
{

    /**
     * @access protected
     * @var    EventManagerInterface
     */
    protected $events;

    /**
     * Instance of Monkeyblog\Model\Table\ArticleTable
     *
     * @access protected
     * @var    ArticleTable
     */
    protected $articleTable;

    /**
     * Instance of Monkeyblog\Model\Table\CommentTable
     *
     * @access protected
     * @var    CommentTable
     */
    protected $commentTable;

    /**
     * Lazy load and return an instance of Monkeyblog\Model\Table\ArticleTable
     *
     * @acsess protected
     * @return ArticleTable
     */
    protected function getArticleTable()
    {
        if (! isset($this->articleTable)) {
            $this->articleTable = $this->getServiceLocator()->get('Monkeyblog\Model\Table\ArticleTable');
        }
        return $this->articleTable;
    }

    /**
     * Lazy load and return an instance of CommentTable
     *
     * @access protected
     * @return CommentTable
     */
    protected function getCommentTable()
    {
        if (! isset($this->commentTable)) {
            $this->commentTable = $this->getServiceLocator()->get('Monkeyblog\Model\Table\CommentTable');
        }
        return $this->commentTable;
    }

    /**
     * Return an ArticleCollection instance containing all instances of
     * Monkeyblog\Model\Entity\Article available in the ArticleTable
     *
     * @access public
     * @return ArticleCollection
     */
    public function fetchArticles()
    {
        $collection = new ArticleCollection();

        foreach ($this->getArticleTable()->fetchAll() as $article) {

            foreach ($this->getCommentTable()->fetchByArticleUuid($article->getUuid()) as $comment) {
                $article->addComment($comment);
                $comment->setArticle($article);
            }

            $collection->add($article);
        }

        return $collection;
    }

    public function findBySlug($slug)
    {

    }

    public function findByUuid($uuid)
    {
        if (! is_string($uuid)) {
            throw new \InvalidArgumentException(__METHOD__ . ' expects a string');
        }

        if (null !== ($article = $this->getArticleTable()->findByUuid($uuid))) {
            foreach ($this->getCommentTable()->fetchByArticleUuid($article->getUuid()) as $comment) {
                $article->addComment($comment);
                $comment->setArticle($article);
            }
        }

        return null;
    }



    public function saveArticle(Article $article)
    {

    }

    public function saveComment(Comment $comment)
    {

    }


    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    public function setEventManager(EventManagerInterface $events)
    {
        $events->setIdentifiers(array(
            __CLASS__,
            get_called_class(),
        ));
        $this->events = $events;
        return $this;
    }

    public function getEventManager()
    {
        if (null === $this->events) {
            $this->setEventManager(new EventManager());
        }
        return $this->events;
    }
}