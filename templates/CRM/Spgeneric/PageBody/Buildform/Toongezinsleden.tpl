<div id="spgeneric-buildform-toongezinsleden" class="messages status no-popup">
    <div class="icon inform-icon"></div>
    <p><strong>Gezinsleden</strong></p>

    {foreach from=$relationships item=relationship}
        <p><a href="{$relationship.url}" title="{$relationship.contact_name}">{$relationship.contact_name}</a></p>
    {/foreach}
</div>