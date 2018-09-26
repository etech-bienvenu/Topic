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
    
    
    use AppBundle\Constraint\Factory\DTOEntityMapperInterface;
    use JMS\DiExtraBundle\Annotation as DI;

    /**
     * @DI\Service("app.constraint.factory.user_mapper")
     */
    class UserMapper implements DTOEntityMapperInterface
    {
    
        /**
         * @param object $entity
         * @param object $dto
         */
        static public function mapToDTO($entity, $dto) {
            $dto->setIId($entity->getId());
            $dto->setSNom($entity->getNom());
            $dto->setSPrenom($entity->getPrenom());
            $dto->setSPseudo($entity->getPseudo());
            $dto->setSPhoto($entity->getPhoto());
            $dto->setSDatenaissance($entity->getDatenaissance());
        }
    
        /**
         * @param object $dto
         * @param object $entity
         */
        static public function mapToEntity($dto, $entity) {
            $entity->setId($dto->getIId());
            $entity->setNom($dto->getSNom());
            $entity->setPrenom($dto->getSPrenom());
            $entity->setPseudo($dto->getSPseudo());
            $entity->setPhoto($dto->getSPhoto());
            $entity->setDatenaissance($dto->getSDatenaissance());
        }
    }