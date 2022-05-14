<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller {
    
    public function add() {
        
        return view('add');
        
    }

    public function addReturn() {

        $name = filter_input(INPUT_POST, 'name');
        $ramal = filter_input(INPUT_POST, 'ramal');
        $department = filter_input(INPUT_POST, 'department');
        $password = filter_input(INPUT_POST, 'password');

        if ($ramal && $department && $password && $name) {

            // adiciona as informações nas 3 tabelas

            DB::insert('INSERT INTO ps_endpoints (id, transport, aors, auth, context, disallow, allow, direct_media, callerid, name, department) VALUES 
            (:id, :transport, :aors, :auth, :context, :disallow, :allow, :direct_media, :callerid, :name, :department)', [
                'id' => $ramal,
                'transport' => "transport-udp",
                'aors' => $ramal,
                'auth' => $ramal,
                'context' => "ramais",
                'disallow' => "all",
                'allow' => "gsm",
                'direct_media' => "no",
                'callerid' => $name . " <" . $ramal . ">",
                'name' => $name,
                'department' => $department
            ]);

            DB::insert('INSERT INTO ps_auths (id, auth_type, password, username) VALUES (:id, :auth_type, :password, :username)', [
                'id' => $ramal,
                'auth_type' => "userpass",
                'password' => $password,
                'username' => $ramal
            ]);

            DB::insert('INSERT INTO ps_aors (id, max_contacts) VALUES (:id, :max_contacts)', [
                'id' => $ramal,
                'max_contacts' => "1"
            ]);
        }

       
       return redirect ('dashboard');
    }
}
