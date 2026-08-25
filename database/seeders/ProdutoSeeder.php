<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = [
            'Lanhces' => [
                ['nome' => 'X-burger', 'descricao' => 'Pão, hambúrger, queijo, e molho especial', 'preco' => 18.90, 'destaque' => true],
                ['nome' => 'X-bacon', 'descricao' => 'Pão, hambúrger, queijo, bacon e salada', 'preco' => 18.90, 'destaque' => true],
            ],

            'Porções' => [
                ['nome' => 'Batata frita', 'descricao' => 'Batata frita com molho especial', 'preco' => 12.90, 'destaque' => true],
                ['nome' => 'Calabresa acebolada', 'descricao' => 'Calabresa fatiada com cebola', 'preco' => 29.90, 'destaque' => true],
            ],

            'Bebidas' => [
                ['nome' => 'Refrigerante', 'descricao' => 'Refrigerante lata', 'preco' => 6.00, 'destaque' => false],
                ['nome' => 'Suco de Laranja', 'descricao' => 'Suco natural de laranja', 'preco' => 10.00, 'destaque' => false],
            ],
            'Sobremesas' => [
                ['nome' => 'Sorvete', 'descricao' => 'Sorvete com cobertura', 'preco' => 10.00, 'destaque' => false],
                ['nome' => 'Pudim', 'descricao' => 'Fatia de Pudim', 'preco' => 9.90, 'destaque' => false],
            ],
        ];

        foreach ($produtos as $nomeCategoria => $itens) {
            $categoria = Categoria::where('nome', $nomeCategoria)->firstOrFail();

            foreach ($itens as $produto) {
                Produto::create(
                    [
                        'categoria_id' => $categoria->id,
                        'nome' => $produto['nome'],
                        'descricao' => $produto['descricao'],
                        'preco' => $produto['preco'],
                        'destaque' => $produto['destaque'],
                        'caminho_imagem' => null,
                        'ativo' => true,
                        'destaque' => $produto['destaque']
                    ]
                );
            }
        }
    }
}
