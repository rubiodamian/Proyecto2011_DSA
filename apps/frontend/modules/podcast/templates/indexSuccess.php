<?php slot('rss') ?>
<link rel="alternate" type="application/atom+xml" title="RSS 2.0" href="<?php echo url_for(array('sf_route' => 'rss', 'sf_subject' => $podcast, 'sf_format' => 'atom'), true) ?>" />
<?php end_slot(); ?>
<p id="menuHuellas">
    <a href="<?php echo url_for('@homepage') ?>" title="P&aacute;gina principal">Home &raquo;</a> 
    <a href="<?php echo url_for(array('sf_route' => 'category', 'sf_subject' => $podcast->getCategory())) ?>"> <?php echo $podcast->getCategory()->getName() ?> &raquo;</a>
    <?php echo ' ' . $podcast->getName() ?>
</p>
<div id="content">
    <h2><?php echo $podcast->getName() ?></h2>
    <div id="producto_desc">
        <?php if (file_exists(sfConfig::get('sf_upload_dir') . '/podcast_image/' . $podcast->getImage()) && $podcast->getImage()): ?>
            <?php echo image_tag('/uploads/podcast_image/' . $podcast->getImage(), Array('alt' => 'podcast image for ' . $podcast->getName())) ?>
        <?php else: ?>
            <?php echo image_tag('/images/no-photo.jpeg', Array('alt' => 'this podcast has no image')) ?>
        <?php endif; ?>
        <br/>
        <h3 class="content_subtitulo">Descripción</h3>
        <p><?php echo $podcast->getDescription() ?></p>
        <div class="clearfix"></div>
        <h3 class="content_subtitulo">Dueño/s</h3>
        <p><?php foreach ($podcast->getOwners() as $owner): ?>
                <?php echo $owner ?><br/>
            <?php endforeach; ?></p>

    </div>
</div>
<div class="clearfix"></div>
<?php include_partial('podcast/episodesList', array('pager' => $pager, 'style' => $style, 'url' => $url, 'podcast' => $podcast)) ?>