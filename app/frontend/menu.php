
<nav id="main-menu">
    <ul>
        <?php foreach ($menuHierarchy as $i => $parentPage): ?>
        <li class="<?php if ($parentPage["id"] === $currentPage["id"]) echo "selected"; ?>">
            <a href="<?php echo $siteDirectory; ?><?php echo ($config["use_url_rewrite"] ? $parentPage["url_name"] : "index.php?p=".$parentPage["id"]); ?>"><?php echo htmlspecialchars($parentPage["title"]); ?></a>

            <?php if (count($parentPage["children"]) > 0): ?>
                <ul>
                    <?php foreach ($parentPage["children"] as $j => $childPage): ?>
                    <li class="<?php if ($childPage["id"] === $currentPage["id"]) echo "selected"; ?>">
                        <a href="<?php echo $siteDirectory; ?><?php echo ($config["use_url_rewrite"] ? $childPage["url_name"] : "index.php?p=".$childPage["id"]); ?>"><?php echo htmlspecialchars($childPage["title"]); ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        </li>
        <?php endforeach; ?>

        <li class="<?php if ($currentPage["id"] === -2) echo "selected"; ?>">
<?php
$link = $siteDirectory;
if ($isLoggedIn) {
    $link .= "admin";
}
elseif ($config["use_url_rewrite"] === 1) {
    $link .= "login";
}
else {
    $link .= "?p=login";
}
 ?>
            <a href="<?php echo $link; ?>">
                <?php echo ($isLoggedIn ? "Admin" : "Login/Register"); ?>
            </a>
        </li>
    </ul>
</nav>
