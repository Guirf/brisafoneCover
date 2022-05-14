<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller {
    
    public function logar() {

        $cpf = filter_input(INPUT_POST, 'cpf');
        $password = filter_input(INPUT_POST, 'password');

        $data = DB::select("SELECT * FROM users WHERE cpf = :cpf AND password = :password", [
            'cpf' => $cpf,
            'password' => $password
        ]);

        if($cpf && $password) {

            if(count($data) === 1) {
                return redirect('/');
            } else {
                echo 'CPF ou senha incorretos!';
            }
        }

        return view('login');
       

        
        
    }

    public function registrar() {

        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $cpf = filter_input(INPUT_POST, 'cpf');
        
        if($name && $email && $password && $cpf) {

            $data = DB::select('SELECT * FROM users where cpf = :cpf AND email = :email', [
                'cpf' => $cpf,
                'email' => $email
            ]);

            if(count($data) === 0) {
                DB::insert('INSERT INTO users (name, email, password, cpf) VALUES (:name, :email, :password, :cpf)', [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'cpf' => $cpf,
                ]);
            } else {
                echo 'Usuário já cadastrado!';
            }
        }

        return view('registre-se');
    }
}
