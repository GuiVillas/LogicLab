<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nome',
        'email',
        'senha',
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
        'nome' => 'required|max_length[150]',
        'email' => 'required|max_length[255]|min_length[8]|is_unique[usuarios.email]|valid_email',
        'senha' => 'required|max_length[255]',
    ];
    protected $validationMessages   = [
        'email' => [
            'is_unique' => 'Este endereço de e-mail já está cadastrado no sistema.',
            'valid_email' => 'Por favor, insira um endereço de e-mail valido.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['senhaHash'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['senhaHash'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function senhaHash(array $data) {
        if (!isset($data['data']['senha'])) {return $data;}

        $data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);

        return $data;
    }
}
