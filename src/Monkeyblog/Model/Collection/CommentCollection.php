<?php
/**
 * CommentCollection.php
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
 * @created    17-Dec-2012 18:56:09
 */
namespace Monkeyblog\Model\Collection;

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
class CommentCollection extends CollectionAbstract
{
    public function __construct(array $elements = array())
    {
        foreach ($elements as $element) {
            if ($element instanceof \Monkeyblog\Model\Entity\Comment) {
                $this->add($element);
            }
        }
    }

    public function add($element)
    {
        if (! $element instanceof \Monkeyblog\Model\Entity\Comment) {
            throw new \InvalidArgumentException(__METHOD__ . ' Invalid element supplied');
        }

        if ($this->contains($element)) {
            return;
        }
        return parent::add($element);
    }

    public function removeElement($element)
    {
        if ($element instanceof \Monkeyblog\Model\Entity\Comment) {
            return parent::removeElement($element);
        }
        throw new \InvalidArgumentException(__METHOD__ . ' Invalid element supplied');

    }
}