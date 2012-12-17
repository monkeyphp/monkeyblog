<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Monkeyblog\Model\Respository;

/**
 *
 * @author David White [monkeyphp] <david@monkeyphp.com>
 */
interface ArticleRepositoryInterface
{
    public function fetchAll();

    public function findByUuid($uuid);

    public function findBySlug($slug);

    public function save(\Monkeyblog\Model\Entity\Article $article);
}