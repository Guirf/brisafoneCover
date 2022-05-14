<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    public function index() {
    

        $user = filter_input(INPUT_POST, 'user');
        $ramal = filter_input(INPUT_POST, 'ramal');
        $context = filter_input(INPUT_POST, 'context');
        $password = filter_input(INPUT_POST, 'password');

        if ($ramal && $context && $password && $user) {

            // adiciona as informações nas 3 tabelas

            DB::insert('INSERT INTO ps_endpoints (id, transport, aors, auth, context, disallow, allow, direct_media, callerid, name) VALUES 
            (:id, :transport, :aors, :auth, :context, :disallow, :allow, :direct_media, :callerid, :name)', [
                'id' => $ramal,
                'transport' => "transport-udp",
                'aors' => $ramal,
                'auth' => $ramal,
                'context' => $context,
                'disallow' => "all",
                'allow' => "gsm",
                'direct_media' => "no",
                'callerid' => $user . " <" . $ramal . ">",
                'name' => $user
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

        // Lista as informações
        $lists = DB::select('SELECT * FROM ps_endpoints ORDER BY aors ASC');
        $data = DB::select('SELECT * FROM ps_contacts');



        return view('dashboard', [
            'lists' => $lists,
            'data' => $data
        ]);
    }

    public function delete($ramal_id)
    {

        DB::delete('DELETE FROM ps_endpoints WHERE id = :id', [
            'id' => $ramal_id
        ]);

        DB::delete('DELETE FROM ps_auths WHERE id = :id', [
            'id' => $ramal_id
        ]);

        DB::delete('DELETE FROM ps_aors WHERE id = :id', [
            'id' => $ramal_id
        ]);

        return redirect('/');
    }


    public function add() {



        return view('add');
    }
}
