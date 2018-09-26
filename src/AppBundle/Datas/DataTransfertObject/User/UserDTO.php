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
    
    namespace AppBundle\Datas\DataTransfertObject\User;
    
    
    class UserDTO
    {
        private $iId;
        private $sNom;
        private $sPrenom;
        private $sPseudo;
        private $sDatenaissance;
        private $sPhoto;
        
        /**
         * @return int
         */
        public function getIId()
        {
            return $this->iId;
        }
    
        /**
         * @return UserDTO
         * @param int $iId
         */
        public function setIId($iId)
        {
            $this->iId = $iId;
            return $this;
        }
    
        /**
         * @return string
         */
        public function getSNom()
        {
            return $this->sNom;
        }
    
        /**
         * @return UserDTO
         * @param mixed $sNom
         */
        public function setSNom($sNom)
        {
            $this->sNom = $sNom;
            return $this;
        }
    
        /**
         * @return string
         */
        public function getSPrenom()
        {
            return $this->sPrenom;
        }
    
        /**
         * @return UserDTO
         * @param mixed $sPrenom
         */
        public function setSPrenom($sPrenom)
        {
            $this->sPrenom = $sPrenom;
            return $this;
        }
    
        /**
         * @return string
         */
        public function getSPseudo()
        {
            return $this->sPseudo;
        }
    
        /**
         * @return UserDTO
         * @param mixed $sPseudo
         */
        public function setSPseudo($sPseudo)
        {
            $this->sPseudo = $sPseudo;
            return $this;
        }
    
        /**
         * @return mixed
         */
        public function getSDatenaissance()
        {
            return $this->sDatenaissance;
        }
    
        /**
         * @return UserDTO
         * @param string $sDatenaissance
         */
        public function setSDatenaissance($sDatenaissance)
        {
            $this->sDatenaissance = $sDatenaissance;
            return $this;
        }
    
        /**
         * @return mixed
         */
        public function getSPhoto()
        {
            return $this->sPhoto;
        }
    
        /**
         * @param mixed $sPhoto
         */
        public function setSPhoto($sPhoto)
        {
            $this->sPhoto = $sPhoto;
        }
        
        
    }