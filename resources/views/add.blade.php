<?php
$comb = "abcdefghi!@#$%*jklmnopqrstuvwx@!#@$#%*yzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%*-+=";
$shfl = str_shuffle($comb);
$pwd = substr($shfl,0,12);
?>

<x-app-layout>
  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Big Container -->
      <div class="border-b border-gray-200 bg-white p-6">
        @can('users') Dados do usuário @elsecan('admin')

        <form method="POST" action="{{ route('add') }}">
          <!-- Form -->

          <div class="p-8">
            <!-- Grid -->
            <div class="grid grid-cols-2 gap-4 p-2">
              <!-- Nome -->
              <div class="flex flex-col">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="mt-1" type="text" name="name" required autocomplete="current-name" />
              </div>
              <!-- Fim Nome -->

              <!-- Ramal -->
              <div class="flex flex-col">
                <x-label for="ramal" :value="__('Ramal')" />

                <x-input id="ramal" class="mt-1" type="text" name="ramal" required autocomplete="current-ramal" />
              </div>
              <!-- Fim Ramal -->

              <!-- CPF -->
              <div class="flex flex-col">
                <x-label for="cpf" :value="__('CPF')" />

                <x-input id="cpf" class="mt-1" type="number" name="cpf" required autocomplete="current-cpf" />
              </div>
              <!-- Fim CPF -->

              <!-- Senha -->
              <div class="flex flex-col">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="mt-1" type="text" name="password" required autocomplete="current-password" value="<?php echo $pwd; ?>" />
              </div>
              <!-- Fim Senha -->
            </div>
            <!--Fim Grid-->
          </div>
          <!-- Fim Container -->

          <div class="mt-4">
            <!-- Botão -->
            <x-button> {{ __('Adicionar') }} </x-button>
          </div>
          <!-- Fim Botão -->
        </form>
        <!-- Fim Form -->
        @endcan
      </div>
      <!-- Fim Big Container -->
    </div>
  </div>
</x-app-layout>
