<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Livewire\Actions\Logout;

class SomeComponent extends Component
{
    public function logout()
    {
        // Memanggil kelas Logout yang telah Anda buat
        $logoutAction = new Logout();
        $logoutAction->__invoke();

        // Redirect atau lakukan hal lainnya jika diperlukan
    }

    public function render()
    {
        return view('livewire.some-component');
    }
}