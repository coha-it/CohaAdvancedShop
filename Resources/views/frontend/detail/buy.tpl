{extends file="parent:frontend/detail/buy.tpl"}

{* The Formular *}
{block name="frontend_detail_buy"}
    {if $sArticle.attributes.core->get('coha_cb_details_active_replace_link')}
        {$sUrl      = $sArticle.attributes.core->get('coha_cb_details_replacing_link')}
        {$bNewTab   = $sArticle.attributes.core->get('coha_cb_details_new_tab')}
        <form class="buybox--form"
            data-add-article="false"
            action="{$sUrl}"
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
    {if !$sArticle.attributes.core->get('coha_cb_details_removed_hidden')}
        {$smarty.block.parent}
    {/if}
{/block}

{* "Buy now" button *}
{block name="frontend_detail_buy_button"}
    {if !$sArticle.attributes.core->get('coha_cb_details_removed_hidden')}
        {$bReplaceText      = $sArticle.attributes.core->get('coha_cb_details_active_replace_text')}
        {$sReplaceText      = $sArticle.attributes.core->get('coha_cb_details_replacing_text')}
        {$sExtraClasses     = $sArticle.attributes.core->get('coha_cb_details_custom_classes')}
        {$bDisabled         = $sArticle.attributes.core->get('coha_cb_listing_disabled')}

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
