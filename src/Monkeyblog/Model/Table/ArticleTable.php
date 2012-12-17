<?php
/**
 * Article.php
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
 * @created    17-Dec-2012 18:24:17
 */
namespace Monkeyblog\Model\Table;

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
class ArticleTable
{

    protected $tableGateway;

    public function __construct(\Zend\Db\TableGateway\TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function findBySlug($slug)
    {
        if (! is_string($slug)) {
            throw new \InvalidArgumentException(__METHOD__ . ' expects a string');
        }

        $resultSet = $this->getTableGateway()->select(array('slug' => $slug));

        return $resultSet->current();
    }

    public function findByUuid($uuid)
    {
        if (! is_string($uuid)) {
            throw new \InvalidArgumentException(__METHOD__ . ' expects a string');
        }

        $resultSet = $this->getTableGateway()->select(array('uuid' => $uuid));

        return $resultSet->current();
    }

    public function saveArticle(\Monkeyblog\Model\Entity\Article $article)
    {

    }

    public function deleteArticle(\Monkeyblog\Model\Entity\Article $article)
    {

    }

}