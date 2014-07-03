<script>
{literal}
cj(function() {
    init_checkGezinsleden();
});

function init_checkGezinsleden() {
    var contactElement = '#contact_1';
    var contactHiddenElement = 'input[name="contact_select_id[1]"]';

    cj(contactElement).blur(function(e) {
        cj('#spgeneric-buildform-toongezinsleden').remove();
        var contactId = cj(contactHiddenElement).val();
        if (contactId > 0) {
            var url = CRM.url('civicrm/ajax/spgeneric/toongezinsleden', {"contact_id": contactId });
            cj.get(url, { }, function(response) {
                if (response.length > 0) {
                    cj('form#Membership > .view-content > .spacer').after(response);
                }
            });
        }
    });
}
{/literal}
</script>