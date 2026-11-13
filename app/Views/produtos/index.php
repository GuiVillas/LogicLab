<?= $this->extend('layouts/main') ?>

<?= $this->section('titulo') ?>Produtos<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>

    <div class="row g-4">

    <!-- Coluna dos filtros -->
    <div class="col-lg-3">
        <?= $this->include('components/filtros') ?>
    </div>

    <!-- Coluna dos produtos -->
    <div class="col-lg-9">

        <!-- botão que abre os filtros no mobile -->
        <button class="btn btn-outline-dark rounded-0 d-lg-none mb-3" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#filtros" aria-controls="filtros">
            <i class="bi bi-funnel me-1"></i>Filtros
        </button>

        <?php if (empty($produtos)): ?>

            <div class="text-center text-muted border bg-white py-5">
                <i class="bi bi-inbox display-4 d-block mb-2"></i>
                Nenhum produto encontrado.
            </div>

        <?php else: ?>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
                <?php foreach ($produtos as $produto): ?>
                    <?php
                        $estoque = (int) $produto['estoque'];
                        $ativo   = (int) $produto['ativo'] === 1;
                    ?>
                    <div class="col">
                        <div class="card h-100 rounded-0 border bg-white shadow-none <?= $ativo ? '' : 'opacity-50' ?>">

                            <!-- Imagem -->
                            <div class="ratio ratio-1x1 border-bottom bg-body-secondary">
                                <?php if (! empty($produto['imagem'])): ?>
                                    <img src="<?= base_url(esc($produto['imagem'])) ?>"
                                        alt="<?= esc($produto['nome']) ?>"
                                        class="card-img-top rounded-0"
                                        style="object-fit: cover;">
                                <?php else: ?>
                                    <div class="d-flex align-items-center justify-content-center text-secondary">
                                        <i class="bi bi-image display-4"></i>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Informações -->
                            <div class="card-body d-flex flex-column">

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-uppercase text-muted fw-semibold">
                                        <?= esc($produto['categorias_nome'] ?? 'Sem categoria') ?>
                                    </small>

                                    <?php if (! $ativo): ?>
                                        <span class="badge rounded-0 text-bg-secondary">Inativo</span>
                                    <?php elseif ($estoque === 0): ?>
                                        <span class="badge rounded-0 text-bg-danger">Esgotado</span>
                                    <?php elseif ($estoque <= 5): ?>
                                        <span class="badge rounded-0 text-bg-warning">Últimas unidades</span>
                                    <?php endif; ?>
                                </div>

                                <h2 class="h6 fw-bold mb-1"><?= esc($produto['nome']) ?></h2>
                                <small class="text-muted mb-3">SKU: <?= esc($produto['sku']) ?></small>

                                <div class="mt-auto">
                                    <div class="fs-4 fw-bold text-primary">
                                        R$ <?= number_format((float) $produto['preco'], 2, ',', '.') ?>
                                    </div>
                                    <small class="text-muted">
                                        <i class="bi bi-box me-1"></i><?= $estoque ?> em estoque
                                    </small>
                                </div>
                            </div>

                            <!-- Ações -->
                            <div class="card-footer bg-white border-top rounded-0 p-3">
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-dark rounded-0 flex-grow-1">
                                        <i class="bi bi-eye me-1"></i>Detalhes
                                    </a>
                                    <button type="button"
                                            class="btn btn-primary rounded-0"
                                            title="Adicionar ao carrinho"
                                            <?= ($estoque === 0 || ! $ativo) ? 'disabled' : '' ?>>
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

        <?php if (isset($pager)): ?>
            <div class="d-flex justify-content-center mt-5">
                <?= $pager->links() ?>
            </div>
        <?php endif; ?>
    </div>

<?= $this->endSection() ?>