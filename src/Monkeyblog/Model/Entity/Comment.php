<?php
/**
 * Comment.php
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
 * @created    17-Dec-2012 18:37:58
 */
namespace Monkeyblog\Model\Entity;

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
class Comment extends EntityAbstract
{

    /**
     * Instance of \Monkeyblog\Model\Entity\Article that this Comment belongs to
     *
     * @access protected
     * @var    \Monkeyblog\Model\Entity\Article
     */
    protected $article;

    /**
     * The body content of the Comment
     *
     * @access protected
     * @var    string
     */
    protected $body;

    /**
     * Boolean flag indicating that the Comment is published
     *
     * @access protected
     * @var    boolean
     */
    protected $isPublished;

    /**
     * The DateTime that the Comment was published
     *
     * @access protected
     * @var    \DateTime
     */
    protected $published;

    /**
     * Return the Article instance that this Comment belongs to
     *
     * @access public
     * @return \Monkeyblog\Model\Entity\Article|null
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set the Article instance that this Comment belongs to
     *
     * @param \Monkeyblog\Model\Entity\Article $article The Article instance
     *
     * @access public
     * @return \Monkeyblog\Model\Entity\Comment
     */
    public function setArticle(\Monkeyblog\Model\Entity\Article $article)
    {
        $this->article = $article;
        return $this;
    }

}