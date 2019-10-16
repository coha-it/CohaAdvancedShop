<?php 

namespace CohaAdvancedShop;

use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\Common\Collections\ArrayCollection;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Theme\LessDefinition;
use Shopware\Components\Plugin\Context\ActivateContext;

class CohaAdvancedShop extends Plugin
{

    public function install(InstallContext $context)
    {
        $service = $this->container->get('shopware_attribute.crud_service');

        // AS Advanced Shop: Article is unsaleable
        $service->update('s_articles_attributes', 'coha_as_unbuyable', 'boolean', [
            'label' => '[CAS] Basic: Article Unbuyable',
            'helpText' => 'If Active, the Product/Article is not buyable',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 114,
            'custom' => true,
        ]);

        // AS Advanced Shop: Replace Text Active (0/1)
        $service->update('s_articles_attributes', 'coha_as_listing_replace_text_active', 'boolean', [
            'label' => '[CAS] Listing-Button: Replace Text Activated',
            'helpText' => 'If Active, the Cart Button will have a Text Replacing',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 115,
            'custom' => true,
        ]);

        // AS Advanced Shop: Replacing Text ("String")
        $service->update('s_articles_attributes', 'coha_as_listing_replace_text', 'string', [
            'label' => '[CAS] Listing-Button: Replacing Text',
            'helpText' => 'The Text to Replace the Cart Button with',
            'supportText' => 'If Activated, your text will be shown on the listing-pages (instead of the default-text)',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 116,
            'custom' => true,
        ]);

        // AS Advanced Shop: Replace Link Active (0/1)
        $service->update('s_articles_attributes', 'coha_as_listing_replace_link_active', 'boolean', [
            'label' => '[CAS] Listing-Button: Replace Link Activated',
            'helpText' => 'If Active, the Cart Button will have a Text Replacing',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 117,
            'custom' => true,
        ]);

        // AS Advanced Shop: Link Replacing Link ("String")
        $service->update('s_articles_attributes', 'coha_as_listing_replace_link', 'string', [
            'label' => '[CAS] Listing-Button: Replacing Link',
            'helpText' => 'The Cart-Button will have itself replaced with the custom Link in this Text-Field',
            'supportText' => 'If Activated, the button on the details page will guide the user to your custom-url',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 118,
            'custom' => true,
        ]);

        // AS Advanced Shop: New Tab (0/1)
        $service->update('s_articles_attributes', 'coha_as_listing_new_tab', 'boolean', [
            'label' => '[CAS] Listing-Button: New Tab',
            'helpText' => 'If Active - the Cart-Button will open the URL in a new Tab',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 119,
            'custom' => true,
        ]);

        // AS Advanced Shop: removed/hidden (0/1)
        $service->update('s_articles_attributes', 'coha_as_listing_removed_hidden', 'boolean', [
            'label' => '[CAS] Listing-Button: removed/hidden',
            'helpText' => 'If Active, the Cart button will be Removed / Hidden',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 120,
            'custom' => true,
        ]);

        // AS Advanced Shop: disabled (0/1)
        $service->update('s_articles_attributes', 'coha_as_listing_disabled', 'boolean', [
            'label' => '[CAS] Listing-Button: disabled',
            'helpText' => 'If Active, the Cart button will be disabled',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 121,
            'custom' => true,
        ]);

        // - AS Advanced Shop: Custom classes ("String")
        $service->update('s_articles_attributes', 'coha_as_listing_custom_classes', 'string', [
            'label' => '[CAS] Listing-Button: custom classes',
            'helpText' => 'Custom Classes for the Cart Button',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 122,
            'custom' => true,
        ]);


        /*
        * 
        * DETAILS
        *
        */

        // AS Advanced Shop: Replace Text Active (0/1)
        $service->update('s_articles_attributes', 'coha_as_details_replace_text_active', 'boolean', [
            'label' => '[CAS] Details-Button: Replace Text Activated',
            'helpText' => 'If Active, the Cart Button will have a Text Replacing',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 155,
            'custom' => true,
        ]);

        // AS Advanced Shop: Replacing Text ("String")
        $service->update('s_articles_attributes', 'coha_as_details_replace_text', 'string', [
            'label' => '[CAS] Details-Button: Replacing Text',
            'helpText' => 'The Text to Replace the Cart Button with',
            'supportText' => 'If Activated, your text will be shown on the details-page (instead of the default-text)',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 156,
            'custom' => true,
        ]);

        // AS Advanced Shop: Replace Link Active (0/1)
        $service->update('s_articles_attributes', 'coha_as_details_replace_link_active', 'boolean', [
            'label' => '[CAS] Details-Button: Replace Link Activated',
            'helpText' => 'If Active, the Cart Button will have a Text Replacing',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 157,
            'custom' => true,
        ]);

        // AS Advanced Shop: Link Replacing Link ("String")
        $service->update('s_articles_attributes', 'coha_as_details_replace_link', 'string', [
            'label' => '[CAS] Details-Button: Replacing Link',
            'helpText' => 'The Cart-Button will have itself replaced with the custom Link in this Text-Field',
            'supportText' => 'If Activated, the button on the details page will guide the user to your custom-url',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 158,
            'custom' => true,
        ]);

        // AS Advanced Shop: New Tab (0/1)
        $service->update('s_articles_attributes', 'coha_as_details_new_tab', 'boolean', [
            'label' => '[CAS] Details-Button: New Tab',
            'helpText' => 'If Active - the Cart-Button will open the URL in a new Tab',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 159,
            'custom' => true,
        ]);

        // AS Advanced Shop: removed/hidden (0/1)
        $service->update('s_articles_attributes', 'coha_as_details_removed_hidden', 'boolean', [
            'label' => '[CAS] Details-Button: removed/hidden',
            'helpText' => 'If Active, the Cart button will be Removed / Hidden',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 160,
            'custom' => true,
        ]);

        // AS Advanced Shop: disabled (0/1)
        $service->update('s_articles_attributes', 'coha_as_details_disabled', 'boolean', [
            'label' => '[CAS] Details-Button: disabled',
            'helpText' => 'If Active, the Cart button will be disabled',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 161,
            'custom' => true,
        ]);

        // - AS Advanced Shop: Custom classes ("String")
        $service->update('s_articles_attributes', 'coha_as_details_custom_classes', 'string', [
            'label' => '[CAS] Details-Button: custom classes',
            'helpText' => 'Custom Classes for the Cart Button',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 162,
            'custom' => true,
        ]);

        // $this->update();
    }

    public function update(UpdateContext $context) {
        $service = $this->container->get('shopware_attribute.crud_service');
    }

    // On Activation
    public function activate(ActivateContext $context)
    {
        $context->scheduleClearCache(ActivateContext::CACHE_LIST_ALL);
    }

    public function uninstall(UninstallContext $context)
    {
        $service = $this->container->get('shopware_attribute.crud_service');

        // Delete Fields
        $service->delete('s_articles_attributes', 'coha_as_unbuyable');

        // Listing Fields
        $service->delete('s_articles_attributes', 'coha_as_listing_replace_text_active');
        $service->delete('s_articles_attributes', 'coha_as_listing_replace_text');
        $service->delete('s_articles_attributes', 'coha_as_listing_replace_link_active');
        $service->delete('s_articles_attributes', 'coha_as_listing_replace_link');
        $service->delete('s_articles_attributes', 'coha_as_listing_new_tab');
        $service->delete('s_articles_attributes', 'coha_as_listing_removed_hidden');
        $service->delete('s_articles_attributes', 'coha_as_listing_disabled');
        $service->delete('s_articles_attributes', 'coha_as_listing_custom_classes');

        // Details Fields
        $service->delete('s_articles_attributes', 'coha_as_details_replace_text_active');
        $service->delete('s_articles_attributes', 'coha_as_details_replace_text');
        $service->delete('s_articles_attributes', 'coha_as_details_replace_link_active');
        $service->delete('s_articles_attributes', 'coha_as_details_replace_link');
        $service->delete('s_articles_attributes', 'coha_as_details_new_tab');
        $service->delete('s_articles_attributes', 'coha_as_details_removed_hidden');
        $service->delete('s_articles_attributes', 'coha_as_details_disabled');
        $service->delete('s_articles_attributes', 'coha_as_details_custom_classes');
    }

    public function addLessFiles(){
        return new LessDefinition(
            [],
            [
                // __DIR__ . '/Resources/views/frontend/_public/src/less/quoteslider.less',
            ]
        );
    }

    public function onCollectJavascriptFiles()
    {
        $jsFiles = [
            // $this->getPath() . '/Resources/views/frontend/_public/ [...] .js',
        ];
        return new ArrayCollection($jsFiles);
    }

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch_Frontend' => ['onFrontend',-100],
            'Enlight_Controller_Action_PreDispatch_Widgets' => ['onFrontend',-100],
            'Theme_Compiler_Collect_Plugin_Less' => 'addLessFiles',
            'Theme_Compiler_Collect_Plugin_Javascript' => 'onCollectJavascriptFiles',
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     * @throws \Exception
     */
    public function onFrontend(\Enlight_Event_EventArgs $args)
    {
        $this->container->get('Template')->addTemplateDir(
            $this->getPath() . '/Resources/views/'
        );
    }

}
