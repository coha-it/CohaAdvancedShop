{extends file="parent:frontend/listing/product-box/button-detail.tpl"}

{block name="frontend_listing_product_box_button_detail_anchor"}

    {if $sArticle.attributes.core->get('coha_as_listing_replace_link_active')}
        {$url = $sArticle.attributes.core->get('coha_as_listing_replace_link')}
    {/if}

    {if !$sArticle.attributes.core->get('coha_as_listing_removed_hidden')}
        <a 
        href="{$url}" 
        class="buybox--button block btn is--icon-right is--center is--large {if $sArticle.attributes.core->get('coha_as_listing_disabled')} is--disabled {/if} {$sArticle.attributes.core->get('coha_as_listing_custom_classes')}" 
        title="{$label} - {$title}"
        {if $sArticle.attributes.core->get('coha_as_listing_new_tab')}
        target="_blank"
        {/if}
        >
            {block name="frontend_listing_product_box_button_detail_text"}
                {* Replace Text if Active *}
                {if $sArticle.attributes.core->get('coha_as_listing_replace_text_active')}
                    {$label = $sArticle.attributes.core->get('coha_as_listing_replace_text')}
                {/if}
                {$label} <i class="icon--arrow-right"></i>
            {/block}
        </a>
    {/if}
{/block}
