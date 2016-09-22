{literal}
<script type="text/javascript">
CRM.$(function($) {
    var $form = $('form.{/literal}{$form.formClass}{literal}');
    $('[name=template]', $form).on('change', function() {
        var template_id = $(this).val();
        $('#format_id', $form).select2('val', '');
        if (template_id) {
            CRM.api3('MessageTemplate', 'getvalue', {
                'return': 'pdf_format_id',
                'id': template_id
            }).done(function (result) {
                if (result.result) {
                    CRM.api3('OptionValue', 'getvalue', {
                        'return': 'value',
                        'id': result.result
                    }).done(function (optionValue) {
                        $('#format_id', $form).select2('val', optionValue.result);
                        selectFormat(optionValue.result);
                    });
                }
            });
        }
    });
});
</script>
{/literal}