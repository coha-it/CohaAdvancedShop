{extends file="parent:frontend/detail/buy.tpl"}

{* The Formular *}
{block name="frontend_detail_buy"}
    {$bReplaceLink  = $sArticle.attributes.core->get('coha_as_details_replace_link_active')}
    {$bUnbuyable    = $sArticle.attributes.core->get('coha_as_unbuyable')}

    {if $bUnbuyable || $bReplaceLink}
        {$sUrl      = $sArticle.attributes.core->get('coha_as_details_replace_link')}
        {$bNewTab   = $sArticle.attributes.core->get('coha_as_details_new_tab')}
        <form class="buybox--form"
            data-add-article="false"
            {if $bReplaceLink}
                action="{$sUrl}"
            {elseif $bUnbuyable}
                action="{$sArticle.linkDetails}"
            {/if}

            {if $bNewTab}
                target="_blank"
                onsubmit="event.preventDefault(); window.open('{$sUrl}','_blank');"
            {else}
                onsubmit="event.preventDefault(); window.location.href='{$sUrl}'; "
            {/if}
            >        
    {else}
        <form 
            name="sAddToBasket" 
            method="post" 
            action="{url controller=checkout action=addArticle}" 
            class="buybox--form" 
            data-add-article="true" 
            data-eventName="submit"
            {if $theme.offcanvasCart} 
            data-showModal="false" 
            data-addArticleUrl="{url controller=checkout action=ajaxAddArticleCart}"
            {/if}
        >
    {/if}
        {$smarty.block.parent}
    </form>
{/block}


{* Quantity selection *}
{block name='frontend_detail_buy_quantity'}
    {$bRemoved      = $sArticle.attributes.core->get('coha_as_details_removed_hidden')}
    {$bUnbuyable    = $sArticle.attributes.core->get('coha_as_unbuyable')}

    {if !$bRemoved && !$bUnbuyable}
        {$smarty.block.parent}
    {/if}

{/block}

{* "Buy now" button *}
{block name="frontend_detail_buy_button"}
    {$bRemoved      = $sArticle.attributes.core->get('coha_as_details_removed_hidden')}
    {$bReplaceLink  = $sArticle.attributes.core->get('coha_as_details_replace_link_active')}

    {if $bRemoved || ($bUnbuyable && !$bReplaceLink) }
        <!-- No Cart Button -->
    {else}
        {$bReplaceText      = $sArticle.attributes.core->get('coha_as_details_replace_text_active')}
        {$sReplaceText      = $sArticle.attributes.core->get('coha_as_details_replace_text')}
        {$sExtraClasses     = $sArticle.attributes.core->get('coha_as_details_custom_classes')}
        {$bDisabled         = $sArticle.attributes.core->get('coha_as_details_disabled')}

        {if $sArticle.sConfigurator && !$activeConfiguratorSelection}
            <button 
                class="buybox--button block btn is--disabled is--icon-right is--large {$sExtraClasses}" 
                disabled="disabled" 
                aria-disabled="true" 
                name="{s name="DetailBuyActionAddName"}{/s}"
                {if $buy_box_display} 
                style="{$buy_box_display}"
                {/if}
                >
                {if $bReplaceText}
                    {$sReplaceText}
                {else}
                    {s name="DetailBuyActionAdd"}{/s} <i class="icon--arrow-right"></i>
                {/if}
            </button>
        {else}
            <button 
                class="buybox--button block btn is--primary is--icon-right is--center is--large {$sExtraClasses}" 
                name="{s name="DetailBuyActionAddName"}{/s}"
                {if $bDisabled}
                    disabled="disabled"
                {/if}
                {if $buy_box_display} 
                style="{$buy_box_display}"
                {/if}
                >
                {if $bReplaceText}
                    {$sReplaceText}
                {else}
                    {s name="DetailBuyActionAdd"}{/s} <i class="icon--arrow-right"></i>
                {/if}
            </button>
        {/if}
    {/if}
{/block}
