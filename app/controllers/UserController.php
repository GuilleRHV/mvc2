<?php

namespace App\Controllers;

require_once "../app/models/User.php";

use App\Models\User;

class UserController
{
    public function index()
    {
        //buscar datos
        $users = User::all();
        require("../app/views/user/index.php");
    }

    public function show($args)
    {
        //args es un array, tomamos el id con uno de estos métodos
        // $id = (int) $args[0];
        list($id) = $args;
        $user = User::find($id);
        require('app/views/user/show.php');
    }
}
