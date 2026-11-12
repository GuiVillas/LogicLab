<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-box-seam me-2"></i>Produtos
        </h1>
        <a href="#" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Novo produto
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <?php if (empty($produtos)): ?>
                <div class="text-center text-muted py-5">
                    <i class="bi bi-inbox display-4 d-block mb-2"></i>
                    Nenhum produto cadastrado.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-center" style="width: 80px;">Imagem</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">SKU</th>
                                <th scope="col" class="text-end">Preço</th>
                                <th scope="col" class="text-center">Estoque</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos as $produto): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php if (! empty($produto['imagem'])): ?>
                                            <img src="<?= base_url(esc($produto['imagem'])) ?>"
                                                 alt="<?= esc($produto['nome']) ?>"
                                                 class="rounded border"
                                                 style="width: 56px; height: 56px; object-fit: cover;">
                                        <?php else: ?>
                                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-subtle text-secondary rounded border"
                                                 style="width: 56px; height: 56px;">
                                                <i class="bi bi-image fs-4"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <div class="fw-semibold"><?= esc($produto['nome']) ?></div>
                                        <small class="text-muted"><?= esc($produto['slug']) ?></small>
                                    </td>

                                    <td>
                                        <?php if (! empty($produto['categorias_nome'])): ?>
                                            <span class="badge text-bg-info">
                                                <i class="bi bi-tag me-1"></i><?= esc($produto['categorias_nome']) ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="text-muted">—</span>
                                        <?php endif; ?>
                                    </td>

                                    <td><code><?= esc($produto['sku']) ?></code></td>

                                    <td class="text-end">
                                        R$ <?= number_format((float) $produto['preco'], 2, ',', '.') ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if ((int) $produto['estoque'] === 0): ?>
                                            <span class="badge text-bg-danger">Esgotado</span>
                                        <?php elseif ((int) $produto['estoque'] <= 5): ?>
                                            <span class="badge text-bg-warning"><?= (int) $produto['estoque'] ?></span>
                                        <?php else: ?>
                                            <span class="badge text-bg-success"><?= (int) $produto['estoque'] ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if ((int) $produto['ativo'] === 1): ?>
                                            <span class="badge text-bg-success">
                                                <i class="bi bi-check-circle me-1"></i>Ativo
                                            </span>
                                        <?php else: ?>
                                            <span class="badge text-bg-secondary">
                                                <i class="bi bi-x-circle me-1"></i>Inativo
                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="#" class="btn btn-outline-secondary" title="Visualizar">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-outline-primary" title="Editar">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="#" class="btn btn-outline-danger" title="Excluir">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php if (isset($pager)): ?>
        <div class="d-flex justify-content-center mt-4">
            <?= $pager->links() ?>
        </div>
    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>