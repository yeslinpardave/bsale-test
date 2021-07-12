<nav class="nav__conteiner">
    <div >
        <a href="" class="nav__logo">Bsale Test</a>
    </div>
    <div>
        <form class="nav__search" action="<?php $response ?>" method="get">
            <input class="form__input-search" type="text" name="busqueda" placeholder="Buscar..." value="">
            <input class="form__input-button" type="submit" value="Buscar">
        </form>
    </div>
    <div class="nav__menu-item">
        <a class="nav__menu-a btn-carrito" href=""><i class='bx bxs-cart'></i></a>
        <div id="carrito-container">
            <div id="tabla">
            </div>
        </div>
    </div>
</nav>