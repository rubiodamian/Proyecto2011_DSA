<?php

class sfWidgetFormSchemaFormatterDiv extends sfWidgetFormSchemaFormatter {
    protected
    $rowFormat       = '<div class="form_row">
                        %label% %field% 
                        <div class="clearfix"></div>
                        %help% %error% %hidden_fields%
                        </div>',
    $errorRowFormat  = '%errors%',
    $helpFormat      = '<p class="form_help">%help%</p>',
    $decoratorFormat = '<div>\n  %content%</div>';
}
?>
