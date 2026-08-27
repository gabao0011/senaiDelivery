<?php

namespace App\Livewire\Dashboard;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $totalAdministradores = 0;
    public $totalClientes = 0;
    public $totalCategorias = 0;
    public $totalProdutos = 0;

    public $ultimosProdutos = [];

    public function mount()
    {
        //Contagem de Admins
        $this->totalAdministradores = User::where('tipo', User::TIPO_ADMIN)->count();
        //Contagem de Clientes
        $this->totalClientes = User::where('tipo', User::TIPO_CLIENTE)->count();
        //Contagem de Categorias e Produtos
        $this->totalCategorias = Categoria::count();
        $this->totalProdutos = Produto::count();

        $this->ultimosProdutos = Produto::with('categoria')->latest()->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.dashboard.index')->layout('layouts.app', ['admin' => true]);
    }
}
