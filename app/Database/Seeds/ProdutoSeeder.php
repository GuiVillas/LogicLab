<?php

namespace App\Database\Seeds;

use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\Seeder;

/**
 * Popula a tabela "produtos" com modelos reais do mercado.
 * Os preços são aproximados e ilustrativos (em reais), não são preços de loja.
 *
 * Requer que o CategoriaSeeder já tenha sido executado.
 *
 * Formato de cada produto:
 * [nome, slug, preco, estoque, descricao, ativo (opcional, padrão true)]
 */
class ProdutoSeeder extends Seeder
{
    public function run()
    {
        $agora = date('Y-m-d H:i:s');

        $catalogo = [
            // ---------------------------------------------------------- Hardware
            'processadores' => [
                'prefixo'  => 'CPU',
                'produtos' => [
                    ['AMD Ryzen 5 5600 3.5GHz (4.4GHz Turbo), 6 Núcleos, 12 Threads, AM4', 'amd-ryzen-5-5600', 680.00, 25, 'Processador AMD Ryzen 5 de 6 núcleos para a plataforma AM4, excelente custo-benefício para jogos.'],
                    ['AMD Ryzen 7 7800X3D 4.2GHz (5.0GHz Turbo), 8 Núcleos, 16 Threads, AM5', 'amd-ryzen-7-7800x3d', 2490.00, 8, 'Processador AMD Ryzen 7 com tecnologia 3D V-Cache, focado em desempenho máximo em jogos.'],
                    ['Intel Core i5-12400F 2.5GHz (4.4GHz Turbo), 6 Núcleos, 12 Threads, LGA 1700', 'intel-core-i5-12400f', 790.00, 0, 'Processador Intel de 12ª geração, 6 núcleos, sem vídeo integrado. Requer placa de vídeo dedicada.'],
                ],
            ],
            'placas-de-video' => [
                'prefixo'  => 'GPU',
                'produtos' => [
                    ['Placa de Vídeo NVIDIA GeForce RTX 4060 8GB GDDR6', 'placa-de-video-nvidia-geforce-rtx-4060-8gb', 1999.00, 15, 'Placa de vídeo com DLSS 3 e Ray Tracing, ideal para jogos em Full HD e QHD.'],
                    ['Placa de Vídeo AMD Radeon RX 7600 8GB GDDR6', 'placa-de-video-amd-radeon-rx-7600-8gb', 1499.00, 12, 'Placa de vídeo AMD RDNA 3 para jogos em Full HD com ótimo desempenho.'],
                    ['Placa de Vídeo NVIDIA GeForce RTX 4070 SUPER 12GB GDDR6X', 'placa-de-video-nvidia-geforce-rtx-4070-super-12gb', 4199.00, 5, 'Placa de vídeo de alto desempenho para jogos em QHD e 4K com Ray Tracing e DLSS 3.'],
                ],
            ],
            'placas-mae' => [
                'prefixo'  => 'MB',
                'produtos' => [
                    ['Placa-Mãe ASUS TUF Gaming B550M-Plus WiFi II, AMD AM4, mATX, DDR4', 'placa-mae-asus-tuf-gaming-b550m-plus-wifi-ii', 1050.00, 10, 'Placa-mãe micro-ATX para processadores Ryzen AM4, com Wi-Fi 6 e slot M.2.'],
                    ['Placa-Mãe Gigabyte B650 Gaming X AX, AMD AM5, ATX, DDR5', 'placa-mae-gigabyte-b650-gaming-x-ax', 1250.00, 7, 'Placa-mãe ATX para a plataforma AM5 com memória DDR5, Wi-Fi 6E e suporte a PCIe 5.0.'],
                    ['Placa-Mãe MSI PRO B760M-E, Intel LGA 1700, mATX, DDR4', 'placa-mae-msi-pro-b760m-e', 680.00, 14, 'Placa-mãe micro-ATX para processadores Intel de 12ª, 13ª e 14ª geração com memória DDR4.'],
                ],
            ],
            'memorias-ram' => [
                'prefixo'  => 'RAM',
                'produtos' => [
                    ['Memória Kingston Fury Beast 16GB (1x16GB) DDR4 3200MHz CL16', 'memoria-kingston-fury-beast-16gb-ddr4-3200mhz', 220.00, 40, 'Memória DDR4 de 16GB com perfil XMP, excelente para PCs gamer e de trabalho.'],
                    ['Memória Corsair Vengeance 32GB (2x16GB) DDR5 6000MHz CL36', 'memoria-corsair-vengeance-32gb-ddr5-6000mhz', 780.00, 18, 'Kit dual channel DDR5 de 32GB com alta frequência para plataformas Intel e AMD modernas.'],
                    ['Memória XPG Spectrix D35G RGB 16GB (2x8GB) DDR4 3200MHz', 'memoria-xpg-spectrix-d35g-rgb-16gb-ddr4-3200mhz', 330.00, 22, 'Kit dual channel DDR4 de 16GB com iluminação RGB.'],
                ],
            ],
            'ssds' => [
                'prefixo'  => 'SSD',
                'produtos' => [
                    ['SSD Kingston NV2 500GB M.2 2280 NVMe PCIe 4.0', 'ssd-kingston-nv2-500gb-m2-nvme', 280.00, 50, 'SSD NVMe de 500GB com leitura de até 3.500MB/s, ótimo para sistema e jogos.'],
                    ['SSD WD Blue SN580 1TB M.2 2280 NVMe PCIe 4.0', 'ssd-wd-blue-sn580-1tb-m2-nvme', 450.00, 30, 'SSD NVMe de 1TB com alto desempenho e boa eficiência energética.'],
                    ['SSD Samsung 870 EVO 1TB SATA 2.5"', 'ssd-samsung-870-evo-1tb-sata', 600.00, 3, 'SSD SATA de 1TB com excelente durabilidade, ideal para upgrade de PCs e notebooks.'],
                ],
            ],
            'hds' => [
                'prefixo'  => 'HDD',
                'produtos' => [
                    ['HD Seagate BarraCuda 1TB 7200RPM 3.5" SATA', 'hd-seagate-barracuda-1tb-7200rpm', 300.00, 20, 'Disco rígido interno de 1TB para armazenamento de arquivos e jogos.'],
                    ['HD WD Blue 2TB 5400RPM 3.5" SATA', 'hd-wd-blue-2tb-5400rpm', 450.00, 16, 'Disco rígido interno de 2TB, confiável para uso diário e armazenamento em massa.'],
                    ['HD Seagate IronWolf 4TB NAS 5900RPM 3.5" SATA', 'hd-seagate-ironwolf-4tb-nas', 900.00, 0, 'Disco rígido de 4TB projetado para servidores NAS e funcionamento contínuo.'],
                ],
            ],
            'fontes' => [
                'prefixo'  => 'PSU',
                'produtos' => [
                    ['Fonte Corsair CV550 550W 80 Plus Bronze', 'fonte-corsair-cv550-550w-80-plus-bronze', 330.00, 30, 'Fonte ATX de 550W com certificação 80 Plus Bronze para PCs de entrada e intermediários.'],
                    ['Fonte Corsair RM750e 750W 80 Plus Gold Totalmente Modular', 'fonte-corsair-rm750e-750w-80-plus-gold', 800.00, 12, 'Fonte totalmente modular de 750W com certificação 80 Plus Gold e operação silenciosa.'],
                    ['Fonte MSI MAG A650BN 650W 80 Plus Bronze', 'fonte-msi-mag-a650bn-650w-80-plus-bronze', 380.00, 20, 'Fonte ATX de 650W com certificação 80 Plus Bronze e boa estabilidade de tensão.'],
                ],
            ],
            'gabinetes' => [
                'prefixo'  => 'CAS',
                'produtos' => [
                    ['Gabinete NZXT H5 Flow ATX Mid Tower com Lateral em Vidro Temperado', 'gabinete-nzxt-h5-flow', 650.00, 9, 'Gabinete mid tower com ótimo fluxo de ar e painel frontal perfurado.'],
                    ['Gabinete Cooler Master MasterBox MB520 ARGB ATX Mid Tower', 'gabinete-cooler-master-masterbox-mb520-argb', 400.00, 15, 'Gabinete com três fans ARGB frontais e lateral em vidro temperado.'],
                    ['Gabinete Corsair 4000D Airflow ATX Mid Tower', 'gabinete-corsair-4000d-airflow', 700.00, 7, 'Gabinete com excelente refrigeração e espaço para montagens organizadas.'],
                ],
            ],
            'coolers-e-water-coolers' => [
                'prefixo'  => 'COL',
                'produtos' => [
                    ['Cooler para Processador Cooler Master Hyper 212 Black Edition', 'cooler-cooler-master-hyper-212-black-edition', 200.00, 25, 'Cooler a ar com heatpipes de cobre, compatível com sockets Intel e AMD.'],
                    ['Cooler para Processador DeepCool AK400', 'cooler-deepcool-ak400', 170.00, 30, 'Cooler a ar com 4 heatpipes, silencioso e com ótimo custo-benefício.'],
                    ['Water Cooler Corsair iCUE H100i Elite Capellix 240mm', 'water-cooler-corsair-icue-h100i-elite-capellix-240mm', 1000.00, 6, 'Water cooler de 240mm com iluminação RGB e controle via software iCUE.'],
                ],
            ],

            // -------------------------------------------------------- Periféricos
            'teclados' => [
                'prefixo'  => 'TEC',
                'produtos' => [
                    ['Teclado Mecânico Gamer Redragon Kumara K552 TKL Switch Outemu Blue', 'teclado-redragon-kumara-k552-tkl-outemu-blue', 220.00, 35, 'Teclado mecânico compacto (TKL) com iluminação LED e switches Outemu Blue.'],
                    ['Teclado Gamer Logitech G213 Prodigy RGB', 'teclado-logitech-g213-prodigy-rgb', 280.00, 18, 'Teclado de membrana com iluminação RGB e resistente a respingos. Produto descontinuado.', false],
                    ['Teclado Mecânico Gamer HyperX Alloy Origins 60', 'teclado-hyperx-alloy-origins-60', 550.00, 8, 'Teclado mecânico 60% compacto com estrutura em alumínio e iluminação RGB.'],
                ],
            ],
            'mouses' => [
                'prefixo'  => 'MOU',
                'produtos' => [
                    ['Mouse Gamer Logitech G203 Lightsync RGB 8000 DPI', 'mouse-logitech-g203-lightsync-rgb', 130.00, 60, 'Mouse gamer com 6 botões, sensor de 8000 DPI e iluminação RGB personalizável.'],
                    ['Mouse Gamer Razer DeathAdder Essential 6400 DPI', 'mouse-razer-deathadder-essential-6400-dpi', 150.00, 22, 'Mouse gamer ergonômico com sensor óptico de 6400 DPI. Produto descontinuado.', false],
                    ['Mouse Gamer Logitech G502 Hero 25600 DPI', 'mouse-logitech-g502-hero-25600-dpi', 280.00, 14, 'Mouse gamer com sensor HERO de 25600 DPI, pesos ajustáveis e 11 botões programáveis.'],
                ],
            ],
            'headsets' => [
                'prefixo'  => 'HST',
                'produtos' => [
                    ['Headset Gamer HyperX Cloud Stinger 2', 'headset-hyperx-cloud-stinger-2', 300.00, 20, 'Headset gamer leve e confortável com microfone giratório e drivers de 50mm.'],
                    ['Headset Gamer Sem Fio Logitech G435 Lightspeed', 'headset-logitech-g435-lightspeed', 400.00, 15, 'Headset sem fio ultraleve com conexão Lightspeed e Bluetooth.'],
                    ['Headset Gamer Redragon Zeus X H510 RGB 7.1', 'headset-redragon-zeus-x-h510-rgb', 280.00, 24, 'Headset gamer USB com som surround 7.1 virtual e iluminação RGB.'],
                ],
            ],
            'monitores' => [
                'prefixo'  => 'MON',
                'produtos' => [
                    ['Monitor Gamer LG UltraGear 24" IPS Full HD 144Hz 1ms 24GN600-B', 'monitor-lg-ultragear-24gn600-b', 900.00, 10, 'Monitor gamer de 24 polegadas com painel IPS, 144Hz e tempo de resposta de 1ms.'],
                    ['Monitor Gamer Samsung Odyssey G5 27" Curvo WQHD 165Hz', 'monitor-samsung-odyssey-g5-27-curvo-wqhd', 1500.00, 6, 'Monitor curvo de 27 polegadas com resolução WQHD e taxa de atualização de 165Hz.'],
                    ['Monitor Gamer AOC Hero 24G2 24" IPS Full HD 144Hz', 'monitor-aoc-hero-24g2', 850.00, 11, 'Monitor gamer com painel IPS de 24 polegadas, bordas finas e 144Hz.'],
                ],
            ],
            'mousepads' => [
                'prefixo'  => 'PAD',
                'produtos' => [
                    ['Mousepad Gamer SteelSeries QcK Large', 'mousepad-steelseries-qck-large', 120.00, 45, 'Mousepad de tecido com superfície otimizada para precisão e base antiderrapante.'],
                    ['Mousepad Gamer Razer Gigantus V2 Large', 'mousepad-razer-gigantus-v2-large', 150.00, 28, 'Mousepad de tecido macio com base de borracha antiderrapante.'],
                    ['Mousepad Gamer Redragon Flick L Speed', 'mousepad-redragon-flick-l-speed', 80.00, 50, 'Mousepad speed com costura reforçada nas bordas.'],
                ],
            ],
            'webcams' => [
                'prefixo'  => 'CAM',
                'produtos' => [
                    ['Webcam Logitech C270 HD 720p', 'webcam-logitech-c270-hd-720p', 150.00, 40, 'Webcam HD com microfone embutido, ideal para videoconferências.'],
                    ['Webcam Logitech C920s Pro Full HD 1080p', 'webcam-logitech-c920s-pro-full-hd', 500.00, 17, 'Webcam Full HD com proteção de privacidade e microfone estéreo.'],
                    ['Webcam Razer Kiyo Full HD 1080p com Ring Light', 'webcam-razer-kiyo-full-hd-ring-light', 600.00, 5, 'Webcam Full HD com anel de luz integrado, ideal para streaming.'],
                ],
            ],

            // ------------------------------------------------------ Computadores
            'notebooks' => [
                'prefixo'  => 'NOT',
                'produtos' => [
                    ['Notebook Acer Aspire 5 A515-57 Intel Core i5, 8GB RAM, SSD 512GB, 15.6" Full HD', 'notebook-acer-aspire-5-a515-57-core-i5', 3300.00, 8, 'Notebook para trabalho e estudos com tela Full HD e SSD de 512GB.'],
                    ['Notebook Gamer Lenovo IdeaPad Gaming 3i Core i5, 16GB RAM, SSD 512GB, RTX 3050', 'notebook-gamer-lenovo-ideapad-gaming-3i-rtx-3050', 4500.00, 6, 'Notebook gamer com placa de vídeo RTX 3050 e tela de 15.6 polegadas.'],
                    ['Notebook Gamer ASUS TUF Gaming F15 Core i5, 16GB RAM, SSD 512GB, RTX 4050', 'notebook-gamer-asus-tuf-gaming-f15-rtx-4050', 6500.00, 3, 'Notebook gamer com certificação militar de durabilidade e placa de vídeo RTX 4050.'],
                ],
            ],
            'pcs-gamer' => [
                'prefixo'  => 'PCG',
                'produtos' => [
                    ['PC Gamer Ryzen 5 5600, RTX 4060 8GB, 16GB DDR4, SSD 500GB NVMe', 'pc-gamer-ryzen-5-5600-rtx-4060', 5200.00, 6, 'Computador montado para jogos em Full HD com ótimo desempenho.'],
                    ['PC Gamer Intel Core i5-12400F, RX 7600 8GB, 16GB DDR4, SSD 500GB NVMe', 'pc-gamer-core-i5-12400f-rx-7600', 4600.00, 4, 'Computador montado com processador Intel e placa de vídeo AMD para jogos em Full HD.'],
                    ['PC Gamer Ryzen 7 7800X3D, RTX 4070 SUPER 12GB, 32GB DDR5, SSD 1TB NVMe', 'pc-gamer-ryzen-7-7800x3d-rtx-4070-super', 11500.00, 2, 'Computador topo de linha para jogos em QHD e 4K e para criação de conteúdo.'],
                ],
            ],

            // ------------------------------------------------------------ Outros
            'redes-e-wifi' => [
                'prefixo'  => 'NET',
                'produtos' => [
                    ['Roteador Wi-Fi TP-Link Archer C6 AC1200 Gigabit Dual Band', 'roteador-tp-link-archer-c6-ac1200', 250.00, 28, 'Roteador dual band com portas Gigabit e quatro antenas.'],
                    ['Roteador Wi-Fi 6 TP-Link Archer AX23 AX1800 Dual Band', 'roteador-tp-link-archer-ax23-ax1800', 380.00, 20, 'Roteador Wi-Fi 6 com maior velocidade e menor latência para várias conexões simultâneas.'],
                    ['Switch TP-Link TL-SG108 8 Portas Gigabit', 'switch-tp-link-tl-sg108-8-portas-gigabit', 160.00, 15, 'Switch de mesa com 8 portas Gigabit, plug and play.'],
                ],
            ],
            'cadeiras-gamer' => [
                'prefixo'  => 'CAD',
                'produtos' => [
                    ['Cadeira Gamer ThunderX3 TGC12', 'cadeira-gamer-thunderx3-tgc12', 1100.00, 6, 'Cadeira gamer com ajuste de altura, encosto reclinável e apoio de braços.'],
                    ['Cadeira Gamer Husky Gaming Snow', 'cadeira-gamer-husky-gaming-snow', 1000.00, 9, 'Cadeira gamer com almofadas lombar e de pescoço.'],
                    ['Cadeira Gamer DT3 Sports Elite', 'cadeira-gamer-dt3-sports-elite', 1300.00, 4, 'Cadeira gamer ergonômica com estofado de alta densidade.'],
                ],
            ],
            'cabos-e-adaptadores' => [
                'prefixo'  => 'CAB',
                'produtos' => [
                    ['Cabo HDMI 2.0 4K 60Hz 2 metros', 'cabo-hdmi-2-0-4k-2-metros', 35.00, 100, 'Cabo HDMI 2.0 com suporte a 4K a 60Hz.'],
                    ['Cabo DisplayPort 1.4 8K 1,8 metro', 'cabo-displayport-1-4-1-8-metro', 50.00, 60, 'Cabo DisplayPort 1.4 para monitores de alta taxa de atualização.'],
                    ['Adaptador USB-C para HDMI 4K', 'adaptador-usb-c-para-hdmi-4k', 90.00, 30, 'Adaptador para conectar notebooks e celulares USB-C a monitores e TVs HDMI.'],
                ],
            ],
        ];

        $tabela = $this->db->table('produtos');
        $inseridos = 0;
        $ignorados = 0;

        foreach ($catalogo as $slugCategoria => $grupo) {
            $categoria = $this->db->table('categorias')
                ->select('id')
                ->where('slug', $slugCategoria)
                ->get()
                ->getRowArray();

            if ($categoria === null) {
                CLI::write("Categoria '{$slugCategoria}' não encontrada. Rode o CategoriaSeeder primeiro.", 'yellow');
                continue;
            }

            foreach ($grupo['produtos'] as $indice => $produto) {
                [$nome, $slug, $preco, $estoque, $descricao] = $produto;
                $ativo = $produto[5] ?? true;
                $sku   = sprintf('%s-%04d', $grupo['prefixo'], $indice + 1);

                // Evita erro de chave única ao rodar o seeder mais de uma vez
                $existe = $this->db->table('produtos')
                    ->groupStart()
                        ->where('sku', $sku)
                        ->orWhere('slug', $slug)
                    ->groupEnd()
                    ->countAllResults();

                if ($existe > 0) {
                    $ignorados++;
                    continue;
                }

                $tabela->insert([
                    'categoria_id' => $categoria['id'],
                    'nome'         => $nome,
                    'slug'         => $slug,
                    'descricao'    => $descricao,
                    'preco'        => $preco,
                    'estoque'      => $estoque,
                    'sku'          => $sku,
                    'imagem'       => null,
                    'ativo'        => $ativo,
                    'created_at'   => $agora,
                    'updated_at'   => $agora,
                ]);

                $inseridos++;
            }
        }

        CLI::write("Produtos inseridos: {$inseridos} | Ignorados (já existiam): {$ignorados}", 'green');
    }
}