<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdutoModel;
use App\Models\CategoriaModel;

class ProdutoController extends BaseController {

    protected ProdutoModel $produtoModel;
    protected CategoriaModel $categoriaModel;

    public function __construct() {
        $this->produtoModel = model(ProdutoModel::class);
        $this->categoriaModel = model(CategoriaModel::class);
    }

    public function index() {
        $produto = $this->produtoModel
            ->select('produtos.*, categorias.nome as categorias_nome')
            ->join('categorias', 'categorias.id = produtos.categoria_id', 'left')
            ->paginate(12);

        $data = [
            'produtos' => $produto,
            'pager' => $this->produtoModel->pager,
        ];

        return view('produtos/index', $data);
    }

    public function buscar() {
        $termo = $this->request->getGet('q');

        $produto = $this->produtoModel
            ->select('produtos.*, categorias.nome as categorias_nome')
            ->join('categorias', 'categorias.id = produtos.categoria_id', 'left')
            ->like('produtos.nome', $termo)
            ->orLike('produtos.descricao', $termo)
            ->paginate(12);

        $data = [
            'produtos' => $produto,
            'pager' => $this->produtoModel->pager,
        ];

        return view('produtos/index', $data);
    }
}
