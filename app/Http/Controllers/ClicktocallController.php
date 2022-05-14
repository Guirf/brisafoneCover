<?php

namespace App\Http\Controllers;
use PAMI\Client\Impl\ClientImpl as PamiClient;
use PAMI\Message\Action\OriginateAction;
use PAMI\Message\Action\LogoffAction;


use Illuminate\Http\Request;

class ClickTocallController extends Controller {
    
    public function ctc($numeroB) {
        
        $array =  array(
            'host' => '127.0.0.1',
            'scheme' => 'tcp://',
            'port' => '5038',
            'username' => 'ctc',
            'secret' => 'root',
            'connect_timeout' => 60000,
            'read_timeout' => 60000
        );

        $conexao = new PamiClient($array);
        $conexao->open();

        $action = new OriginateAction('PJSIP/2000@ramais');
        $action->setContext('ramais');
        $action->setExtension($numeroB);
        $action->setPriority('1');
        $action->setAsync(true);

        $conexao->send($action);

        $action2 = new LogoffAction();
        $conexao->send($action2);

        $conexao->close();

       return redirect('/');
    }

    public function redirect() {
        return redirect('/');
    }

}
