<?php
/**
 * CollectionAbstract.php
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
 * @created    17-Dec-2012 18:44:39
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
class CollectionAbstract implements CollectionInterface
{

    protected $elements = array();

    public function __construct(array $elements = array())
    {
        $this->elements = $elements;
    }

    public function count()
    {
        return count($this->elements);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->elements);
    }

    public function add($element)
    {
        $this->elements[] = $element;
        return $this;
    }

    public function contains($element)
    {
        return array_search($element, $this->elements, true);
    }

    public function remove($index)
    {
        if (isset($this->elements[$index])) {
            $removed = $this->elements[$index];
            unset($this->elements[$index]);

            return $removed;
        }

        return null;
    }

    public function removeElement($element)
    {
        $key = array_search($element, $this->elements, true);

        if ($key !== false) {
            unset($this->elements[$key]);

            return true;
        }

        return false;
    }

    public function toArray()
    {
        return $this->elements;
    }

}