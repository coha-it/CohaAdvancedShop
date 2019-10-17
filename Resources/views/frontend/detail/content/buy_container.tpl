{extends file="parent:frontend/detail/content/buy_container.tpl"}


{block name='frontend_detail_index_data'}
    {if !$sArticle.attributes.core->get('coha_as_details_hide_prices')}
        {$smarty.block.parent}
    {/if}
{/block}

{block name='frontend_detail_index_data_price_currency'}
    {if !$sArticle.attributes.core->get('coha_as_details_hide_prices')}
        {$smarty.block.parent}
    {/if}
{/block}

{block name='frontend_detail_index_data_price_valid_until'}
    {if !$sArticle.attributes.core->get('coha_as_details_hide_prices')}
        {$smarty.block.parent}
    {/if}
{/block}
