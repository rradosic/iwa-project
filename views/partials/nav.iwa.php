<nav id="nav-bar" class="main-nav">
    <span class="menu-button">IZBORNIK</span>
    <ul>
        <li>
            <a href="#intro">Kategorije</a>
        </li>
        <li>
            <a href="#projects">Projekti</a>
        </li>
        <li>
            <a href="#experience">Iskustvo</a>
        </li>
        <li>
            <a href="#contact">Kontakt</a>
        </li>
    </ul>
    <?php if(IWA\Auth::user()) : ?>
        <a href="/logout" title="" class="float-right margin-right" aria-label="English version">Odjava</a>
    <?php else : ?>
        <a href="/login" title="" class="float-right margin-right" aria-label="English version">Prijava</a>
    <?php endif ?>
</nav>