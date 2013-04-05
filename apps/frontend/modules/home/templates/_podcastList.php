<?php $mokurl = $url = $sf_data->getRaw('url'); ?>
<div id="podcastcontainer">
    <p>Ordenar Por:</p>
  <?php
       $mokurl['sort'] = 'category';
       echo link_to('category',$mokurl)
?>
  <?php
       $mokurl['sort'] = 'name';
       echo link_to('name',$mokurl)
?>
  <?php
       $mokurl['sort'] = 'owner';
       echo link_to('owner',$mokurl)
?>
    <ul class="productos_listado">
        <?php $i = 1; ?>
        <?php
        foreach ($pager->getResults() as $actual):
            if ($actual->getVisible()):
                ?>
                <li class="musicbox<?php if ($i == 4): ?> last <?php endif; ?>">
                    
                    <a href="<?php echo url_for(array('sf_route' => 'podcast', 'sf_subject' => $actual)) ?>" title="Ver detalles del producto" class="producto_img">
                        <?php if (file_exists(sfConfig::get('sf_upload_dir') . '/podcast_image/thumb/' . $actual->getImage()) && $actual->getImage() ): ?>
                            <?php echo image_tag('/uploads/podcast_image/thumb/' . $actual->getImage(), Array('alt' => 'podcast image for ' . $actual->getName())) ?>
                        <?php else: ?>
                                <?php echo image_tag('/images/no-photo-thumb.jpeg', Array('alt' => 'this podcast has no image')) ?>
                            <?php endif; ?>
                    </a>
                    <div class="producto_info">
                        <h3><a href="<?php echo url_for(array('sf_route' => 'podcast', 'sf_subject' => $actual)) ?>" title="Ver detalles del producto"><?php echo $actual->getName() ?></a></h3>
                        <p>Visit count: <?php echo $actual->getVisitCount() ?></p>
                    </div>
                    <?php if ($i == 4): ?>
                        <div class="clearfix"></div>
                    <?php endif; ?>
                </li>
            <?php endif; ?>


            <?php ($i == 4) ? $i = 1 : $i++; ?>
        <?php endforeach; ?>
    </ul>
    <div class="clearfix"></div>
    <?php include_partial('home/pagination', array('pager' => $pager, 'singleSubject' => 'Podcast', 'url' => $url, 'pruralSubject' => 'Podcast´s')) ?>
</div>
