{extends file="parent:frontend/paypal_unified/express_checkout/button_cart.tpl"}

{block name='paypal_unified_ec_button_container_cart'}
    JOGHURTMANN 2
    {if !$sArticle.attributes.core->get('coha_as_unbuyable')}
        {$smarty.block.parent}
    {/if}
{/block}


{block name='paypal_unified_ec_button_script_cart'}
    JOGHURTMANN 3
    {if !$sArticle.attributes.core->get('coha_as_unbuyable')}
        {$smarty.block.parent}
    {/if}
{/block}
