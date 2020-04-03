<nav>
    <ul>
        <?php foreach(glob("*.php") as $file): ?>
            <li><a href="<?=$file?>"><?= $file ?></a></li>
        <?php endforeach ?>
    </ul>
</nav>