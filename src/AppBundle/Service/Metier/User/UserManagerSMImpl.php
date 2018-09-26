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
    
    
    use AppBundle\Constraint\Factory\AbstractEntityDirector;
    use AppBundle\Constraint\Factory\DTOEntityMapperInterface;
    use AppBundle\Datas\DataTransfertObject\User\UserDTO;
    use AppBundle\Datas\Entity\User;
    use Doctrine\ORM\EntityManagerInterface;
    use JMS\DiExtraBundle\Annotation as DI;
    use JMS\DiExtraBundle\Annotation\Inject;
    use JMS\DiExtraBundle\Annotation\Service;

    /**
     * @Service("app.service.metier.user_manager_sm",public=false, environments={"prod","dev","test"})
     */
    class UserManagerSMImpl implements UserManagerSM
    {
    
        private $entityManager = null;
        private $userRepository = null;
        private $factory = null;
        private $dtoEntityMapper = null;
        
        /**
         * UserManagerSMImpl constructor.
         * @param EntityManagerInterface $entityManager
         * @param AbstractEntityDirector $entityDirector
         * @param DTOEntityMapperInterface $DTOEntityMapper
         * @DI\InjectParams({
         *      "entityDirector" = @Inject("app.constraint.factory.user_dto_director"),
         *       "$DTOEntityMapper" = @Inject("app.constraint.factory.user_mapper")
         * })
         */
        public function __construct(EntityManagerInterface $entityManager,AbstractEntityDirector $entityDirector,DTOEntityMapperInterface $DTOEntityMapper) {
            $this->entityManager = $entityManager;
            $this->userRepository = $entityManager->getRepository(User::class);
            $this->factory = $entityDirector;
            $this->dtoEntityMapper = $DTOEntityMapper;
        }
    
        public function save(UserDTO $userDTO) {
            $user = new User();
            $this->dtoEntityMapper::mapToEntity($userDTO,$user);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }
    
        public function findById($userId) {
            $user = $this->userRepository->find($userId);
            return $user;
        }
    
        /**
         * @return array
         */
        public function findAll(){
            $users = $this->userRepository->findAll();
            $this->factory->buildEntities($users);
            return $this->factory->getEntities();
        }
    
        /**
         * @return array
         * @param array $criteria
         */
        public function findWhere($criteria = array()) {
            $users = $this->userRepository->findBy($criteria);
            $this->factory->buildEntities($users);
            return $this->factory->getEntities();
        }
    
        /**
         * @return array
         * @param int $page
         * @param int $pageSize
         */
        public function findWithPaginate($page = 1, $pageSize = 5) {
            $users = $this->userRepository->findAll();
            $usersPaging = array_chunk($users,$pageSize);
            $this->factory->buildEntities($usersPaging[$page]);
            return $this->factory->getEntities();
        }
    }