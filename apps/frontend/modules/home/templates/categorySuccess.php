<?php slot($category->getName()) ?>
class="active"
<?php end_slot(); ?>
<p id="menuHuellas">
    <a href="<?php echo url_for('@homepage') ?>" title="P&aacute;gina principal">Home &raquo;</a> 
    <?php echo ' ' . $category->getName() ?>
</p>
<?php include_partial('home/podcastList', array('pager' => $pager, 'url' => $url)) ?>