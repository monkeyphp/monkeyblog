<?php
/**
 * ArticleRepository.php
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
 * @created    17-Dec-2012 19:25:00
 */
namespace Monkeyblog\Model\Respository;

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
class ArticleRepository implements ArticleRepositoryInterface
{

    /**
     * Instance of \Monkeyblog\Model\Mapper\ArticleMapper for retrieving
     * Articles from the domain
     *
     * @access protected
     * @var    \Monkeyblog\Model\Mapper\ArticleMapper
     */
    protected $articleMapper;

    /**
     * Constructor
     *
     * @param \Monkeyblog\Model\Mapper\ArticleMapper $articleMapper The ArticleMapper instance
     *
     * @access public
     * @return void
     */
    public function __construct(\Monkeyblog\Model\Mapper\ArticleMapper $articleMapper)
    {
        $this->articleMapper = $articleMapper;
    }

    /**
     * Retrieve an instance of ArticleCollection containing all Articles in the domain
     *
     * @access public
     * @return \Monkeyblog\Model\Collection\ArticleCollection
     */
    public function fetchAll()
    {
        return $this->articleMapper->fetchArticles();
    }

    public function findBySlug($slug)
    {
        return $this->articleMapper->findBySlug($slug);
    }

    public function findByUuid($uuid)
    {
        return $this->articleMapper->findByUuid($uuid);
    }

    public function save(\Monkeyblog\Model\Entity\Article $article)
    {
        return $this->articleMapper->saveArticle($article);
    }

}