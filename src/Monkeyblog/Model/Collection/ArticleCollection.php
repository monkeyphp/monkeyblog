<?php
/**
 * ArticleCollection.php
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
 * @created    17-Dec-2012 18:50:40
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
class ArticleCollection extends CollectionAbstract
{

    public function __construct(array $elements = array())
    {
        foreach ($elements as $element) {
            if ($element instanceof \Monkeyblog\Model\Entity\Article) {
                $this->add($element);
            }
        }
    }

    public function add($element)
    {
        if ($element instanceof \Monkeyblog\Model\Entity\Article) {
            return parent::add($element);
        }
        throw new \InvalidArgumentException(__METHOD__ . ' Invalid element supplied');
    }

    public function removeElement($element)
    {
        if ($element instanceof \Monkeyblog\Model\Entity\Article) {
            return parent::removeElement($element);
        }
        throw new \InvalidArgumentException(__METHOD__ . ' Invalid element supplied');

    }

}