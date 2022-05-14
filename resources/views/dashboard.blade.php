<?php

$comb = "abcdefghi!@#$%*jklmnopqrstuvwx@!#@$#%*yzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%*-+=";
$shfl = str_shuffle($comb);
$pwd = substr($shfl, 0, 12);

?>
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @can('users')
                        Dados do usuário
                    @elsecan('admin')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Ramal</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $list)
                                    <tr>
                                        <th scope="row"><?php echo $list->aors; ?></th>
                                        <td><?php echo $list->name; ?></td>
                                        <td>
                                            @foreach($data as $info)
                                                @if($info->endpoint == $list->aors)
                                                    Online
                                                @else
                                                    Offline
                                                @endif
                                            @endforeach
                                        </td>
                                        <td scope="col">
                                            <a href="/clicktocall/2000/<?php echo $list->aors;?>"><button type="button" ><img width="25"  src="https://cdn-icons-png.flaticon.com/128/25/25453.png"></button><a>
                                            <a href="/clicktocall/2000/<?php echo $list->aors;?>"><button type="button" ><img width="30" src="https://cdn-icons-png.flaticon.com/512/6932/6932392.png"></button><a>   
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
