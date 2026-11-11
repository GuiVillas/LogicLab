<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table            = 'produtos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'categoria_id',
        'nome',
        'slug',
        'descricao',
        'preco',
        'estoque',
        'sku',
        'imagem',
        'ativo',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'categoria_id' => 'required|integer',
        'nome' => 'required|max_length[150]',
        'slug' => 'required|max_length[150]|is_unique[produtos.slug]',
        'descricao' => 'permit_empty',
        'preco' => 'required|numeric|greater_than_equal_to[0]',
        'estoque' => 'required|integer|greater_then_equal_to[0]',
        'sku' => 'required|max_length[100]|is_unique[produtos.sku]',
        'imagem' => 'permit_empty|max_length[255]',
        'ativo' => 'in_list[0,1]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
