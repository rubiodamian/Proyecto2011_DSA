<?php echo'<?xml version="1.0" encoding="utf-8" ?>' ?>
<?php use_helper('Text') ?>
<feed xmlns="http://www.w3.org/2005/Atom">

    <title>Podcast - <?php echo $podcast->getName() ?></title>
    <subtitle><?php echo $podcast->getDescription() ?></subtitle>
    <link rel="self" type="application/atom+xml" title="New Episode" href="<?php echo url_for(array('sf_route' => 'rss', 'sf_subject' => $podcast, 'sf_format' => 'atom'), true) ?>" />
    <link href="<?php echo url_for('@homepage', true) ?>" />
    <id><?php echo url_for(array('sf_route' => 'podcast', 'sf_subject' => $podcast),true) ?></id>
    <updated><?php echo gmstrftime('%Y-%m-%dT%H:%M:%SZ', $podcast->getDateTimeObject('updated_at')->format('U')) ?></updated>
    <?php foreach ($podcast->getOwners() as $owner): ?>
        <author>
            <name><?php
    echo $owner->getFirstName();
    echo " ";
    echo $owner->getLastName();
        ?>
            </name>
            <email><?php echo $owner->getEmailAddress() ?></email>
        </author>
    <?php endforeach; ?>
    <?php foreach ($episodes as $episode): ?>
        <entry>
            <title><?php echo $episode->getTitle() ?></title>
            <link href="<?php echo url_for(array('sf_route' => 'episode', 'sf_subject' => $episode)) ?>" />
            <id><?php echo url_for(array('sf_route' => 'episode', 'sf_subject' => $episode),true) ?></id>
            <updated><?php echo gmstrftime('%Y-%m-%dT%H:%M:%SZ', $episode->getDateTimeObject('updated_at')->format('U')) ?></updated>
            <summary type="xhtml">
                <div xmlns="http://www.w3.org/1999/xhtml">
                    <div>
                        <a href="<?php echo url_for(array('sf_route' => 'podcast', 'sf_subject' => $episode->getPodcast())) ?>" title="Ver detalles del producto" class="producto_img">
                            <?php echo image_tag('/uploads/podcast_image/thumb/' . $episode->getPodcast()->getImage(), Array('alt' => 'podcast image for ' . $episode->getPodcast())) ?>
                        </a>
                    </div>
                    <div>
                        <?php echo simple_format_text($episode->getDescription()) ?>
                    </div>
                    <div>
                        <a href="<?php echo url_for('@homepage') . 'uploads/episodes/' . $episode->getArchivo() ?>">Descargar el episodio</a>
                    </div>
                </div>
            </summary>
        </entry>
    <?php endforeach; ?>
</feed>
