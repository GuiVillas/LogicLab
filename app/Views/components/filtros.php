<?php
// Variáveis esperadas (todas opcionais):
//   $categorias : array de categorias, cada uma com 'id' e 'nome'
//   $filtros    : array com os filtros ativos (q, categorias, preco_min, preco_max, em_estoque, ordem)
$categorias = $categorias ?? [];
$filtros    = $filtros ?? [];

$selecionadas = (array) ($filtros['categorias'] ?? []);
$ordemAtual   = $filtros['ordem'] ?? '';
?>
<aside class="offcanvas-lg offcanvas-start" tabindex="-1" id="filtros" aria-labelledby="filtrosTitulo">

    <!-- Cabeçalho visível apenas no mobile (offcanvas) -->
    <div class="offcanvas-header border-bottom">
        <h2 class="offcanvas-title h6 fw-bold mb-0" id="filtrosTitulo">
            <i class="bi bi-funnel me-2"></i>Filtros
        </h2>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#filtros" aria-label="Fechar"></button>
    </div>

    <div class="offcanvas-body d-block p-3 p-lg-0">
        <form action="<?= site_url('produtos/buscar') ?>" method="get" class="border bg-white rounded-0">

            <!-- Mantém o termo da busca ao aplicar filtros -->
            <input type="hidden" name="q" value="<?= esc($filtros['q'] ?? '') ?>">

            <div class="px-3 py-3 border-bottom d-none d-lg-block">
                <h2 class="h6 fw-bold text-uppercase mb-0">
                    <i class="bi bi-funnel me-2 text-primary"></i>Filtros
                </h2>
            </div>

            <!-- Ordenação -->
            <div class="px-3 py-3 border-bottom">
                <label for="ordem" class="form-label small fw-semibold text-uppercase text-muted">Ordenar por</label>
                <select name="ordem" id="ordem" class="form-select rounded-0">
                    <option value="" <?= $ordemAtual === '' ? 'selected' : '' ?>>Relevância</option>
                    <option value="menor_preco" <?= $ordemAtual === 'menor_preco' ? 'selected' : '' ?>>Menor preço</option>
                    <option value="maior_preco" <?= $ordemAtual === 'maior_preco' ? 'selected' : '' ?>>Maior preço</option>
                    <option value="nome" <?= $ordemAtual === 'nome' ? 'selected' : '' ?>>Nome (A-Z)</option>
                </select>
            </div>

            <!-- Categorias -->
            <?php if (! empty($categorias)): ?>
                <div class="px-3 py-3 border-bottom">
                    <h3 class="small fw-semibold text-uppercase text-muted mb-2">Categorias</h3>
                    <?php foreach ($categorias as $categoria): ?>
                        <div class="form-check mb-1">
                            <input class="form-check-input rounded-0"
                                   type="checkbox"
                                   name="categorias[]"
                                   value="<?= (int) $categoria['id'] ?>"
                                   id="cat-<?= (int) $categoria['id'] ?>"
                                   <?= in_array((string) $categoria['id'], array_map('strval', $selecionadas), true) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="cat-<?= (int) $categoria['id'] ?>">
                                <?= esc($categoria['nome']) ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Faixa de preço -->
            <div class="px-3 py-3 border-bottom">
                <h3 class="small fw-semibold text-uppercase text-muted mb-2">Faixa de preço</h3>
                <div class="row g-2">
                    <div class="col-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text rounded-0">R$</span>
                            <input type="number" name="preco_min" class="form-control rounded-0"
                                   placeholder="Mín" min="0" step="0.01"
                                   value="<?= esc($filtros['preco_min'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text rounded-0">R$</span>
                            <input type="number" name="preco_max" class="form-control rounded-0"
                                   placeholder="Máx" min="0" step="0.01"
                                   value="<?= esc($filtros['preco_max'] ?? '') ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Disponibilidade -->
            <div class="px-3 py-3 border-bottom">
                <h3 class="small fw-semibold text-uppercase text-muted mb-2">Disponibilidade</h3>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch"
                           name="em_estoque" value="1" id="em_estoque"
                           <?= ! empty($filtros['em_estoque']) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="em_estoque">Somente em estoque</label>
                </div>
            </div>

            <!-- Ações -->
            <div class="p-3 d-grid gap-2">
                <button type="submit" class="btn btn-primary rounded-0">
                    <i class="bi bi-check2 me-1"></i>Aplicar filtros
                </button>
                <a href="<?= site_url('produtos') ?>" class="btn btn-outline-dark rounded-0">
                    <i class="bi bi-x-lg me-1"></i>Limpar
                </a>
            </div>

        </form>
    </div>
</aside>