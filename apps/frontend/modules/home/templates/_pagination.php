<?php $url = $sf_data->getRaw('url'); ?>
<div class="pagination">
<?php if ($pager->haveToPaginate()): ?>

            <ul>
                <?php if ($pager->getPage() != 1): ?>
                    <li class="nav left"><a id="first" title="Primer página" href="<?php $url['page'] = '1';
            echo url_for($url) ?> "  >Primeros</a></li>
                    <li class="nav left"><a id="prev" title="Página anterior" href="<?php $url['page'] = $pager->getPreviousPage();
            echo url_for($url) ?> "  >Anteriores</a></li>
                <?php endif; ?>
                <?php foreach ($pager->getLinks() as $page): ?> 
                    <?php if ($page == $pager->getPage()): ?>
                        <li class="no_link"><?php echo $page ?></li> 
                    <?php else: ?> 
                        <li><a href="<?php $url['page'] = $page;
                        echo url_for($url) ?> "  ><?php echo $page ?> </a></li>
        <?php endif; ?> 
            <?php endforeach; ?> 
            <?php if ($pager->getPage() != $pager->getLastPage()): ?>
                    <li class="nav next right"><a id="next" title="Próxima página" href="<?php $url['page'] = $pager->getNextPage();
        echo url_for($url) ?> "  >Siguientes</a></li>
                    <li class="nav last right"><a id="last" title="Última página" href="<?php $url['page'] = $pager->getLastPage();
        echo url_for($url) ?> "  >Últimos</a></li>
                    <?php endif ?>
                
            </ul>
<div class="clearfix"></div>
<?php endif; ?>	
        <div class="pagination_desc">
            <strong><?php if ($pager->getNbResults() == 1): ?>
    <?php echo $pager->getNbResults() ?></strong> <?php echo $singleSubject ?>
<?php else: ?>
    <?php echo $pager->getNbResults() ?></strong> <?php echo $pruralSubject ?>
<?php endif; ?>
<?php if ($pager->haveToPaginate()): ?> - Page <strong><?php echo $pager->getPage() ?> of <?php echo $pager->getLastPage() ?></strong> <?php endif; ?>
        </div>
    
    </div>

