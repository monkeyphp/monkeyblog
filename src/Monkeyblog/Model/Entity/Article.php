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
 * @created    17-Dec-2012 18:36:12
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
class Article extends EntityAbstract
{

    /**
     * The title of the Article
     *
     * @access protected
     * @var    string
     */
    protected $title;

    /**
     * The slug for the Article (based on the title)
     *
     * @access protected
     * @var    string
     */
    protected $slug;

    /**
     * The Article body content
     *
     * @access protected
     * @var    string
     */
    protected $body;

    /**
     * Boolean indicating that the Article is published or not
     *
     * @access protected
     * @var    boolean
     */
    protected $isPublished;

    /**
     * The DateTime that the Article was published
     *
     * @access protected
     * @var    \DateTime
     */
    protected $published;

    /**
     * Instance of \Monkeyblog\Model\Collection\CommentCollection containing
     * instances of \Monkeyblog\Model\Entity\Comment that belong to this Article
     *
     * @access protected
     * @var    \Monkeyblog\Model\Collection\CommentCollection
     */
    protected $commentCollection;

    /**
     * Lazy load and return a CommentCollection instance
     *
     * @access public
     * @return \Monkeyblog\Model\Collection\CommentCollection
     */
    public function getCommentCollection()
    {
        if (! isset($this->commentCollection)) {
            $this->commentCollection = new \Monkeyblog\Model\Collection\CommentCollection();
        }
        return $this->commentCollection;
    }

    /**
     * Add a Comment to this Article
     *
     * @param \Monkeyblog\Model\Entity\Comment $comment The Comment to add to this Article
     *
     * @access public
     * @return \Monkeyblog\Model\Entity\Article
     */
    public function addComment(\Monkeyblog\Model\Entity\Comment $comment)
    {
        $this->getCommentCollection()->add($comment);
        return $this;
    }

}