<?php 
return[
    'news/([0-9]+)'=>'news/view/$1',
    'lesson/([0-9]+)'=>'lesson/view/$1',
    'game/([0-9]+)'=>'game/view/$1',
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'lesson'=>'lesson/index',
    'game'=>'game/index',
    'admin'=>'admin/index',
    'cabinet' =>'cabinet/index',
    '(\W+)' =>'news/index',
    'news'=>'news/index',
    ''=>'news/index',
];