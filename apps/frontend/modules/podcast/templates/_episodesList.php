<?php use_helper('Text') ?>
<div id="podcastcontainer">
    <ul class="episode_listado">
        <?php $i = 1; ?>
        <?php foreach ($pager->getResults() as $actual): ?>
            <li class="musicbox<?php if ($i == 4): ?> last <?php endif; ?>">
                <a href="<?php echo url_for(array('sf_route' => 'episode', 'sf_subject' => $actual)) ?>" title="Ver detalles del producto" class="producto_img"><?php echo image_tag('/images/' . $style . '_media_play.png',Array('alt'=>'play button image ')) ?></a>

                <div class="producto_info">
                    <h3><a href="<?php echo url_for(array('sf_route' => 'episode', 'sf_subject' => $actual)) ?>" title="Ver detalles del producto"><?php echo $actual->getTitle() ?></a></h3>
                    <p> <?php echo truncate_text($actual->getDescription(), 40, '...') ?></p>
                </div>
            <?php if ($i == 4): ?>
                <div class="clearfix"></div>
            <?php endif; ?> 
            </li>

            
            <?php ($i == 4) ? $i = 1 : $i++; ?>
        <?php endforeach; ?>
    </ul>
    <?php include_partial('home/pagination', array('pager' => $pager, 'url' => $url, 'singleSubject' => 'Episode', 'pruralSubject' => 'Episodes')) ?>
</div>