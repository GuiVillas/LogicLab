<?php
helper('url');

// O controller pode enviar $categorias (array com 'nome' e 'slug')
$categorias = $categorias ?? [];
$qtdCarrinho = $qtdCarrinho ?? 0;
?>
<header>
    <!-- Barra superior -->
    <div class="bg-black text-white-50 small py-1 d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <span><i class="bi bi-truck me-1"></i>Frete grátis em compras acima de R$ 299</span>
            <div class="d-flex gap-3">
                <a href="#" class="link-light link-underline-opacity-0 link-underline-opacity-100-hover">
                    <i class="bi bi-headset me-1"></i>Atendimento
                </a>
                <a href="#" class="link-light link-underline-opacity-0 link-underline-opacity-100-hover">
                    <i class="bi bi-geo-alt me-1"></i>Nossas lojas
                </a>
            </div>
        </div>
    </div>

    <!-- Navbar principal -->
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-primary border-3 py-3" data-bs-theme="dark">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center" href="<?= site_url('/') ?>">
                <img src="<?= base_url('assets/img/logo_logiclab.png') ?>"
                    alt="LogicLab"
                    height="40"
                    class="d-inline-block align-text-top">
            </a>

            <button class="navbar-toggler border-0" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarPrincipal"
                    aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarPrincipal">

                <!-- Busca -->
                <form class="d-flex flex-grow-1 my-3 my-lg-0 mx-lg-4" role="search" action="<?= site_url('produtos/buscar') ?>" method="get">
                    <div class="input-group">
                        <input type="search" name="q" class="form-control rounded-0 border-0"
                               placeholder="Buscar produtos..." aria-label="Buscar produtos"
                               value="<?= esc($_GET['q'] ?? '') ?>">
                        <button class="btn btn-primary rounded-0" type="submit" aria-label="Buscar">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Links -->
                <ul class="navbar-nav align-items-lg-center gap-lg-1">
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('/') ? 'active fw-semibold' : '' ?>" href="<?= site_url('/') ?>">
                            <i class="bi bi-house-door me-1"></i>Início
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= url_is('produtos*') ? 'active fw-semibold' : '' ?>"
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-grid me-1"></i>Produtos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end rounded-0 border-0">
                            <li><a class="dropdown-item" href="<?= site_url('produtos') ?>">Todos os produtos</a></li>
                            <?php if (! empty($categorias)): ?>
                                <li><hr class="dropdown-divider"></li>
                                <?php foreach ($categorias as $categoria): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= site_url('produtos?categoria=' . esc($categoria['slug'], 'url')) ?>">
                                            <?= esc($categoria['nome']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person me-1"></i>Entrar
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-primary rounded-0 position-relative" href="#">
                            <i class="bi bi-cart3 me-1"></i>Carrinho
                            <?php if ($qtdCarrinho > 0): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-0 bg-danger">
                                    <?= (int) $qtdCarrinho ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>