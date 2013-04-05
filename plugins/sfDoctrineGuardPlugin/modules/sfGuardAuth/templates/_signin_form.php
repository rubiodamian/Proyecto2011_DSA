<?php use_helper('I18N') ?>
<?php echo $form->renderFormTag(url_for('@sf_guard_signin'), array('id' => 'frmAviso', 'class' => 'frmAdmin frmAviso frmUser')) ?>
<fieldset>
    <?php echo $form['username']->renderRow(array('class' => 'campo')) ?>
    <?php echo $form['password']->renderRow(array('class' => 'campo')) ?>
    <?php if( isset($form['_csrf_token'])): ?>
    <?php echo $form['_csrf_token'] ?>
    <?php endif;?>
    <label for="signin_remember" class="no_close_session" ><?php echo $form['remember']->render(array('class' => 'campo checkbox')) ?>No cerrar sesión</label>

    <input type="submit" class="btn" value="<?php echo __('Signin', null, 'sf_guard') ?>" />

    <div id="login_links">
        <?php $routes = $sf_context->getRouting()->getRoutes() ?>
        <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a class="login" href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
        <?php endif; ?>

        <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a class="login" href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>
</fieldset>
</form>