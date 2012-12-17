<?php
/**
 * EntityAbstract.php
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
 * @created    17-Dec-2012 18:37:12
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
abstract class EntityAbstract
{

    /**
     * DateTime representing the date time that the Entity was created
     *
     * @access protected
     * @var    \DateTime
     */
    protected $created;

    /**
     * DateTime representing the date time that the Entity was modified
     *
     * @access protected
     * @var    \DateTime
     */
    protected $modified;

    /**
     * The Uuid of the Entity
     *
     * @access protected
     * @var    string
     */
    protected $uuid;

}