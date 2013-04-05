<?php if($isAdmin): ?>
<li><a href="<?php  echo url_for('@pageconfig') ?>" onclick="menu()">Page Config.</a></li>
<li id="user"><a href="<?php  echo url_for('@sfGuardUser') ?>">Users</a></li>
<li><a href="<?php  echo url_for('@category') ?>" onclick="menu()">Categories</a></li>
<?php endif; ?>

