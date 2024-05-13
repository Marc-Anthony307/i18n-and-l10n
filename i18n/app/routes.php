<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('User/register' , 'User,register');
$this->addRoute('User/login' , 'User,login');
$this->addRoute('User/logout' , 'User,logout');
$this->addRoute('User/update' , 'User,update');
$this->addRoute('User/delete' , 'User,delete');
$this->addRoute('User/securePlace' , 'Profile,index');
$this->addRoute('Profile/index' , 'Profile,index');
$this->addRoute('Profile/create' , 'Profile,create');
$this->addRoute('Profile/modify' , 'Profile,modify');
$this->addRoute('Profile/delete' , 'Profile,delete');
$this->addRoute('User/home', 'Profile,home');   //homepage for only users
$this->addRoute('Home/home', 'User,home');  //homepage for everyone
$this->addRoute('Publication/index' , 'Profile,index');
$this->addRoute('Publication/create' , 'Publication,create');
$this->addRoute('Publication/modify' , 'Publication,modify');
$this->addRoute('Publication/delete' , 'Publication,delete');
$this->addRoute('User/publications' , 'User,publications');
$this->addRoute('Publication/viewPublication/{publication_id}','Publication,viewPublication');
$this->addRoute('Publication/edit/{publication_id}','Publication,update');
$this->addRoute('Publication/delete/{publication_id}','Publication,delete');
$this->addRoute('Comment/add' , 'Comment,addComment');
$this->addRoute('User/search', 'User,home');





