<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $agora = date('Y-m-d H:i:s');

        $categorias = [
            // Hardware
            ['nome' => 'Processadores',      'slug' => 'processadores',      'descricao' => 'Processadores Intel e AMD para desktop e workstation.'],
            ['nome' => 'Placas de Vídeo',    'slug' => 'placas-de-video',    'descricao' => 'Placas de vídeo NVIDIA GeForce e AMD Radeon para jogos e criação.'],
            ['nome' => 'Placas-Mãe',         'slug' => 'placas-mae',         'descricao' => 'Placas-mãe para plataformas Intel e AMD.'],
            ['nome' => 'Memórias RAM',       'slug' => 'memorias-ram',       'descricao' => 'Memórias DDR4 e DDR5 para desktop e notebook.'],
            ['nome' => 'SSDs',               'slug' => 'ssds',               'descricao' => 'SSDs SATA e NVMe M.2 para alto desempenho.'],
            ['nome' => 'HDs',                'slug' => 'hds',                'descricao' => 'Discos rígidos internos e externos para armazenamento em massa.'],
            ['nome' => 'Fontes',             'slug' => 'fontes',             'descricao' => 'Fontes de alimentação ATX com diversas potências e certificações.'],
            ['nome' => 'Gabinetes',          'slug' => 'gabinetes',          'descricao' => 'Gabinetes para PC nos formatos ATX, Micro-ATX e Mini-ITX.'],
            ['nome' => 'Coolers e Water Coolers', 'slug' => 'coolers-e-water-coolers', 'descricao' => 'Coolers a ar, water coolers e ventoinhas para refrigeração.'],

            // Periféricos
            ['nome' => 'Teclados',           'slug' => 'teclados',           'descricao' => 'Teclados mecânicos, de membrana e sem fio.'],
            ['nome' => 'Mouses',             'slug' => 'mouses',             'descricao' => 'Mouses gamer e de escritório, com e sem fio.'],
            ['nome' => 'Headsets',           'slug' => 'headsets',           'descricao' => 'Headsets e fones de ouvido com microfone.'],
            ['nome' => 'Monitores',          'slug' => 'monitores',          'descricao' => 'Monitores gamer, profissionais e ultrawide.'],
            ['nome' => 'Mousepads',          'slug' => 'mousepads',          'descricao' => 'Mousepads speed, control e extended.'],
            ['nome' => 'Webcams',            'slug' => 'webcams',            'descricao' => 'Webcams Full HD e 4K para streaming e videoconferência.'],

            // Computadores
            ['nome' => 'Notebooks',          'slug' => 'notebooks',          'descricao' => 'Notebooks gamer, para trabalho e uso doméstico.'],
            ['nome' => 'PCs Gamer',          'slug' => 'pcs-gamer',          'descricao' => 'Computadores montados prontos para jogos e produtividade.'],

            // Outros
            ['nome' => 'Redes e Wi-Fi',      'slug' => 'redes-e-wifi',       'descricao' => 'Roteadores, placas de rede, repetidores e switches.'],
            ['nome' => 'Cadeiras Gamer',     'slug' => 'cadeiras-gamer',     'descricao' => 'Cadeiras gamer e de escritório ergonômicas.'],
            ['nome' => 'Cabos e Adaptadores', 'slug' => 'cabos-e-adaptadores', 'descricao' => 'Cabos HDMI, DisplayPort, USB, adaptadores e conversores.'],
        ];

        $tabela = $this->db->table('categorias');

        foreach ($categorias as $categoria) {
            // Evita erro de chave única ao rodar o seeder mais de uma vez
            $existe = $tabela->where('slug', $categoria['slug'])->countAllResults();

            if ($existe > 0) {
                continue;
            }

            $tabela->insert($categoria + [
                'created_at' => $agora,
                'updated_at' => $agora,
            ]);
        }
    }
}