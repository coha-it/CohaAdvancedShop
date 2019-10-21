{extends file="parent:frontend/paypal_unified/express_checkout/button_detail.tpl"}

{block name='paypal_unified_ec_button_detail_container'}
    JOGHURTMANN
    {if !$sArticle.attributes.core->get('coha_as_unbuyable')}
        {$smarty.block.parent}
    {/if}
{/block}
