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
    use AppBundle\Datas\DataTransfertObject\User\UserDTO;
    use JMS\DiExtraBundle\Annotation\Service;

    /**
     * @Service("app.constraint.factory.user_dto_builder",public=false,environments={"prod","dev","test"})
     */
    class UserDTOBuilder extends AbstractEntityBuilder
    {
        private $entityDTO=null;
        
        public function __construct(){
            $this->entityDTO = new UserDTO();
        }
        public function setId($id){
            $this->entityDTO->setIId($id);
        }
        
        public function setNom($nom){
            $this->entityDTO->setSNom($nom);
        }
        public function setPrenom($prenom){
            $this->entityDTO->setSPrenom($prenom);
        }
        
        public function setPseudo($pseudo){
            $this->entityDTO->setSPseudo($pseudo);
        }
        
        public function setDatenaissance($datenaissance){
            $this->entityDTO->setSDatenaissance($datenaissance);
        }
        
        public function setPhoto($photo){
            $this->entityDTO->setSPhoto($photo);
        }
    
        /**
         * @return UserDTO
         */
        public function getEntity(){
            return $this->entityDTO;
        }
    
        public function hidrateEntities($aEntities = array()) {
            $aResults = [];
            foreach ($aEntities as $entity){
                $userDTO = new UserDTO();
                $userDTO->setIId($entity->getId());
                $userDTO->setSNom($entity->getNom());
                $userDTO->setSPrenom($entity->getPrenom());
                $userDTO->setSPseudo($entity->getPseudo());
                $userDTO->setSPhoto($entity->getPhoto());
                $userDTO->setSDatenaissance($entity->getDatenaissance());
                array_push($aResults,$userDTO);
            }
            
            return $aResults;
        }
    }