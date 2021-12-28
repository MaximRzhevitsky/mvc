<?php

return [
    'admin'=>'Admin/login',
    'sort/([a-zA-Z-]+)'=>'Index/index/$1',
    'home' => 'index/index/$1',
    'edit_comment/([0-9]+)'=>'Admin/editComment/$1',
    'delete_comment/([0-9]+)'=>'Admin/deleteComment/$1',
    'cabinet'=>'Admin/Cabinet',
    'publicate/([0-9]+)'=>'Admin/publicate/$1',
];
