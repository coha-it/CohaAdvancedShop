{extends file="parent:frontend/listing/product-box/button-buy.tpl"}

{block name="frontend_listing_product_box_button_buy_form"}
        {$bUnbuyable    = $sArticle.attributes.core->get('coha_as_unbuyable')}
        {$bReplaceUrl   = $sArticle.attributes.core->get('coha_as_listing_replace_link_active')}
        {$sReplaceUrl   = $sArticle.attributes.core->get('coha_as_listing_replace_link')}
        {$bNewTab       = $sArticle.attributes.core->get('coha_as_listing_new_tab')}

        {if $bReplaceUrl || $bUnbuyable}
            <form class="buybox--form"
                data-add-article="false"
                {if $bReplaceUrl}
                    action="{$sReplaceUrl}"
                {elseif $bUnbuyable}
                    action="{$sArticle.linkDetails}"
                {/if}

                {if $bNewTab}
                target="_blank"
                {/if}
                
                >
        {else}
            <form name="sAddToBasket"
                method="post"
                action="{$url}"
                class="buybox--form"
                data-add-article="true"
                data-eventName="submit"
                {if $theme.offcanvasCart}
                data-showModal="false"
                data-addArticleUrl="{url controller=checkout action=ajaxAddArticleCart}"
                {/if}
                >

            {block name="frontend_listing_product_box_button_buy_order_number"}
                <input type="hidden" name="sAdd" value="{$sArticle.ordernumber}"/>
            {/block}

        {/if}

            {if !$sArticle.attributes.core->get('coha_as_listing_removed_hidden')}
                {block name="frontend_listing_product_box_button_buy_button"}
                    <button 
                    class="buybox--button block btn is--primary is--icon-right is--center is--large {$sArticle.attributes.core->get('coha_as_listing_custom_classes')}" 
                    aria-label="{s namespace="frontend/listing/box_article" name="ListingBuyActionAddText"}{/s}"
                    {if $sArticle.attributes.core->get('coha_as_listing_disabled')}
                    disabled
                    {/if}
                    >
                        {block name="frontend_listing_product_box_button_buy_button_text"}
                            {* Replace Text if Active *}
                            {if $sArticle.attributes.core->get('coha_as_listing_replace_text_active')}
                                {$sArticle.attributes.core->get('coha_as_listing_replace_text')}
                            {else}
                                {s namespace="frontend/listing/box_article" name="ListingBuyActionAdd"}{/s}
                            {/if}            
                            <i class="icon--basket"></i> <i class="icon--arrow-right"></i>
                        {/block}
                    </button>
                {/block}
            {/if}
        
        </form>
{/block}
