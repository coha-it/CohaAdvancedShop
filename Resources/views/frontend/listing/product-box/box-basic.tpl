{extends file="parent:frontend/listing/product-box/box-basic.tpl"}

{* Product description *}
{block name='frontend_listing_box_article_description'}
    {if $sArticle.attributes.core->get('coha_as_shortdesc_active')}
        {$sArticle.attributes.core->get('coha_as_shortdesc_content')}
    {else}
        {$smarty.block.parent}
    {/if}
{/block}

{* Product prices *}
{block name='frontend_listing_box_article_price_info'}
    {if !$sArticle.attributes.core->get('coha_as_listing_hide_prices')}
        {$smarty.block.parent}
    {/if}
{/block}
