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
    
    namespace AppBundle\Constraint\Factory\User;
    
    
    use AppBundle\Constraint\Factory\AbstractEntityBuilder;
    use AppBundle\Constraint\Factory\AbstractEntityDirector;
    use JMS\DiExtraBundle\Annotation as DI;

    /**
     * @DI\Service("app.constraint.factory.user_dto_director",public=false,environments={"dev","test","prod"})
     */
    class UserDTODirector extends AbstractEntityDirector
    {
        private $builder = null;
        private $entities = [];
    
        /**
         * UserDTODirector constructor.
         * @param AbstractEntityBuilder $builder
         * @DI\InjectParams({
         *     "builder" = @DI\Inject("app.constraint.factory.user_dto_builder")
         * })
         *
         */
        public function __construct(AbstractEntityBuilder $builder) {
                $this->builder = $builder;
        }
    
        function buildEntity($entityDb) {
            $this->builder->setId($entityDb->getId());
            $this->builder->setNom($entityDb->getNom());
            $this->builder->setPrenom($entityDb->getPrenom());
            $this->builder->setPseudo($entityDb->getPseudo());
            $this->builder->setDatenaissance($entityDb->getDatenaissance());
            $this->builder->setPhoto($entityDb->getPhoto());
        }
    
        function buildEntities($aEntities = array()) {
            $this->entities = $this->builder->hidrateEntities($aEntities);
        }
    
        function getEntity(){
            return $this->builder->getEntity();
        }
    
        /**
         * @return array
         */
        function getEntities() {
            return $this->entities;
        }
    }