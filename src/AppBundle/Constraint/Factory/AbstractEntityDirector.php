<?php
    /**
     * Description courte du fichier
     * Description longue du fichier s'il y en a une
     * LICENSE: Informations sur la licence
     * @copyright  Copyright (c) 2011-2012 Council of Europe (www.coe.int)
     * @license    http://static.coe.int/licenses/lgpl
     * @version    $Id:$
     * @since      File available since Release xxx
     */
    
    namespace AppBundle\Constraint\Factory;
    
    
    abstract class AbstractEntityDirector
    {
        abstract function __construct(AbstractEntityBuilder $builder);
        abstract function buildEntity($entityDb);
        abstract function buildEntities($aEntities=array());
    
        /**
         * @return object
         */
        abstract function getEntity();
    
        /**
         * @return array
         */
        abstract function getEntities();
    }