<p id="menuHuellas">
    <a href="<?php echo url_for('@homepage') ?>" title="P&aacute;gina principal">Home &raquo;</a> 
    <a href="<?php echo url_for(array('sf_route' => 'category', 'sf_subject' => $episode->getPodcast()->getCategory())) ?>"> <?php echo $episode->getPodcast()->getCategory()->getName() ?> &raquo;</a>
    <a href="<?php echo url_for(array('sf_route' => 'podcast', 'sf_subject' => $episode->getPodcast())) ?>"> <?php echo $episode->getPodcast()->getName() ?> &raquo;</a>

    <?php echo ' ' . $episode->getTitle() ?>
</p>

<div id="content">
    <h2><?php echo $episode->getTitle() ?></h2>
    <div>

        <audio controls="controls">
            <source src="<?php echo url_for('@homepage') . 'uploads/episodes/' . $episode->getArchivo() ?>" type="audio/ogg" />
            Tu navegador no soporta el elemento
            audio.
        </audio>


    </div>
    <div id="producto_desc">
        <br/>
        <h3 class="content_subtitulo">Descripción</h3>
        <p><?php echo $episode->getDescription() ?></p>

    </div>
</div>