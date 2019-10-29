{extends file="parent:frontend/listing/product-box/box-list.tpl"}

{* Product description *}
{block name='frontend_listing_box_article_description'}
    {if $sArticle.attributes.core->get('coha_as_shortdesc_active')}
        <div class="product--description">
            {$sArticle.attributes.core->get('coha_as_shortdesc_content')}
        </div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}
