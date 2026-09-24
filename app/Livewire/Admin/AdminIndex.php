<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminIndex extends Component
{
    use WithPagination;

    public $pesquisa = '';
    public $situacao = 'ativos';

    public function administradores(){
        $admins = User::where('tipo', User::TIPO_ADMIN);

        if($this->situacao == 'excluídos'){
            $admins->onlyTrashed();
        } else if ($this->situacao == 'todos'){
            $admins->withTrashed();
        }

        $admins->where('name', 'like', '%'.$this->pesquisa.'%');
        $admins->orWhere('email', 'like', '%'.$this->pesquisa.'%');

        return $admins->latest()->paginate(10);
    }


    public function render()
    {
        return view('livewire.admin.admin-index')
        ->layout('layouts.app', ['title'=>'Administradores', 'admin' => true]);
    }
}
