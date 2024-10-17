<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard.admin') }}">TaLice</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard.admin') }}">TL</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Painel de Controle</li>
            <li class="dropdown {{ activesidebar(['slider.*']) }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Painel</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="index-0.html">Configurações</a></li>
                    <li class="{{ activesidebar(['slider.*']) }}"><a class="nav-link" href="{{ route('slider.index') }}">Slide destaque</a></li>
                </ul>
            </li>
            <li class="menu-header">Categorias</li>
            <li class="dropdown {{ activesidebar([
            'categoria.*',
            'subcategoria.*',
            'categoria-segmento.*'
            ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Gerencie Categorias</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ activesidebar(['categoria.*']) }}"><a class="nav-link" href="{{ route('categoria.index') }}">Categorias</a></li>
                    <li class="{{ activesidebar(['subcategoria.*']) }}"><a class="nav-link" href="{{ route('subcategoria.index') }}">Subcategorias</a></li>
                    <li class="{{ activesidebar(['categoria-segmento.*']) }}"><a class="nav-link" href="{{ route('categoria-segmento.index') }}">Segmento</a></li>
                </ul>
            </li>
            <li class="menu-header">Produtos</li>
            <li class="dropdown {{ activesidebar([
            'marcas.*'
            ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i><span>Gerencie Produtos</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ activesidebar(['marcas.*']) }}"><a class="nav-link" href="{{ route('marcas.index') }}">Marcas</a></li>
                </ul>
            </li>
            <li class="menu-header">Lojas</li>
            <li class="dropdown {{ activesidebar([
                'vendedor-perfil.*'
                ]) }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i><span>Vendedores</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ activesidebar(['vendedor-perfil.*']) }}"><a class="nav-link" href="{{ route('vendedor-perfil.index') }}">Perfil do Vendedor</a></li>
                    </ul>
                </li>
            <li>
                <a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a>
            </li>
        </ul>
    </aside>
</div>
