<?php

namespace AppBundle\Controller;

use AppBundle\Datas\Entity\User;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    
    /**
     * @return array
     * @Rest\View()
     * @Rest\Get("/users")
     */
    public function getUsersAction(){
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $users;
    }
    
    /**
     * @return object
     * @param $userId
     * @Rest\View()
     * @Rest\Get("/users/{userId}")
     */
    public function getUserAction($userId) {
        
        $oUser = $this->getDoctrine()->getRepository(User::class)->findOneBy(['id'=>$userId]);
        
        return $oUser;
    }
    
    /**
     * @return User
     * @param Request $request
     * @Rest\View()
     * @Rest\Post("/users")
     */
    public function postUserAction(Request $request)
    {
        $user = new User(
            $request->get('nom'),
            $request->get('prenom'),
            $request->get('pseudo'),
            $request->get('photo')
        );
        $user->setDateNaissance("06 Mai 1991");
        $errors = $this->get('validator')->validate($user);
        
        if (count($errors)>0){
            throw new HttpException(400,'Entity not valide');
        }else{
            $em = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();
            return $user;
        }
    }
    
    /**
     * @param $userId
     * @Rest\View()
     * @Rest\Delete("/users/{userId}")
     */
    public function deleteUserAction($userId=1) {
        
        $em = $this->getDoctrine()->getManager();
        $oUser = $em->getRepository(User::class)->find($userId);
        if(!empty($oUser)){
            $em->remove($oUser);
            $em->flush();
        }
    }
    
    /**
     * @return \Symfony\Component\Validator\ConstraintViolationListInterface
     * @param Request $request
     * @param $userId
     * @Rest\View()
     * @Rest\Put("/users/{userId}")
     */
    public function putUserAction(Request $request,$userId) {
        
        $em = $this->getDoctrine()->getManager();
        $oUserToUpdate = $em->getRepository(User::class)->find($userId);
        if(!empty($oUserToUpdate)){
               $oUserToUpdate->setNom($request->get('nom'));
               $oUserToUpdate->setPrenom($request->get('prenom'));
               $oUserToUpdate->setPhoto($request->get('photo'));
               $oUserToUpdate->setPseudo($request->get('pseudo'));
               $oUserToUpdate->setDateNaissance($request->get('date_naissance'));
               $validator = $this->get('validator');
            $errors = $validator->validate($oUserToUpdate);
            if (count($errors)>0){
                return $errors;
            }else{
               $em->flush();
            }
        }
    }
    
    
    /**
     *
     * @param Request $request
     * @param $userId
     * @Rest\View()
     * @Rest\Patch("/users/{userId}")
     */
    public function patchUserAction(Request $request,$userId) {
    
    }
}
