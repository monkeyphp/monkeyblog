<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Monkeyblog\Model\Collection;

/**
 *
 * @author David White [monkeyphp] <david@monkeyphp.com>
 */
interface CollectionInterface extends \Countable, \IteratorAggregate
{

    public function toArray();

    public function add($element);

    public function remove($index);

    public function removeElement($element);

    public function contains($element);

}