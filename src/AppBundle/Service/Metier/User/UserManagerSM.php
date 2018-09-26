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
    
    namespace AppBundle\Service\Metier\User;
    
    
    use AppBundle\Datas\DataTransfertObject\User\UserDTO;

    interface UserManagerSM
    {
        public function save(UserDTO $userDTO);
        public function findById($userId);
        public function findAll();
        public function findWhere($criteria=array());
        public function findWithPaginate($page=1,$pageSize=5);
    }