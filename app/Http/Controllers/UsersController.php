<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    private  $users =
        [
            [
                'name' => 'AAA',
                'Surname' => 'SURAAA',
                'BirthDay' => '1992',
            ],
            [
                'name' => 'BBB',
                'Surname' => 'SURBBB',
                'BirthDay' => '2000',
            ],
            [
                'name' => 'CCC',
                'Surname' => 'SURCCC',
                'BirthDay' => '1850',
            ]
        ];

    public function getUsersList(){


        $data = array(
            'users' => $this->users
        );

        return view('users.users-list', $data);
    }

    public function getUserDetail($id){

        return view('users.user-detail',$this->users[$id-1] );
    }
}
