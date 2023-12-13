<?php
$config=[
    'signup_valid'=>
    [
        [
        'field'=>'email',
        'label'=>'Email',
        'rules'=>'required|is_unique[users.email]'
        ],
        [
        'field'=>'username',
        'label'=>'username',
        'rules'=>'required'
        ],
        [
        'field'=>'password',
        'label'=>'password',
        'rules'=>'required'
        ]
        ],

        'signin_valid'=>
    [
        // [
        // 'field'=>'email',
        // 'label'=>'Email',
        // 'rules'=>'required|is_unique[users.email]'
        // ],
        [
        'field'=>'username',
        'label'=>'username',
        'rules'=>'required'
        ],
        [
        'field'=>'password',
        'label'=>'password',
        'rules'=>'required'
        ]
   ]
    ];
 ?>