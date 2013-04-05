<?php ?>
<div class="menu-div" id="menu-div">
    <ul id="menu-list">
        <li<?php if(($sf_request->getParameter('action')=='index')): ?>
            class="active"
            <?php endif; ?>><a href="<?php echo url_for('@homepage') ?>">Home</a></li>
        <?php foreach ($categories as $category): ?>

            <li<?php if(($sf_request->getParameter('action')=='category')&&($sf_request->getParameter('name_slug')==$category->getNameSlug())): ?>
            class="active"
            <?php endif; ?>>
                <a href="<?php echo url_for(array('sf_route' => 'category', 'sf_subject' => $category)) ?>"><?php echo $category->getName() ?>
                </a>
            </li>

        <?php endforeach; ?>

    </ul>
</div>