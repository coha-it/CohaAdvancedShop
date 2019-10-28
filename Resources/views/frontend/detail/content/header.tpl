{extends file="parent:frontend/detail/content/header.tpl"}

{* Product name *}
{block name='frontend_detail_index_name'}
    {$smarty.block.parent}
    {if $sArticle.coha_as_subtitle_active}
        <div class="subtitle">{$sArticle.coha_as_subtitle_content}</div>
    {/if}
{/block}
