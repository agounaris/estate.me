<?php 

class WebUser extends CWebUser{
 private $_user;
 //is the user a superadmin ?
 function getIsSuperAdmin(){
  return ( $this->user && $this->user->accessLevel == User::LEVEL_SUPERADMIN );
 }
 //is the user an administrator ?
 function getIsAdmin(){
  return ( $this->user && $this->user->accessLevel >= User::LEVEL_ADMIN );
 }
 //get the logged user
 function getUser(){
  if( $this->isGuest )
   return;
  if( $this->_user === null ){
   $this->_user = User::model()->findByPk( $this->id );
  }
  return $this->_user;
 }
}