<?php 

namespace CohaCartButton;

use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\Common\Collections\ArrayCollection;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Theme\LessDefinition;
use Shopware\Components\Plugin\Context\ActivateContext;

class CohaCartButton extends Plugin
{

    public function install(InstallContext $context)
    {
        $service = $this->container->get('shopware_attribute.crud_service');

        // CB Cart Button Replace Text Active (0/1)
        $service->update('s_articles_attributes', 'coha_cb_listing_active_replace_text', 'boolean', [
            'label' => '[Cart Button: Listing] Replace Text',
            'helpText' => 'If Active, the Cart Button will have a Text Replacing',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 115,
            'custom' => true,
        ]);

        // CB Cart Button Replacing Text ("String")
        $service->update('s_articles_attributes', 'coha_cb_listing_replacing_text', 'string', [
            'label' => '[Cart Button: Listing] Replacing Text',
            'helpText' => 'The Text to Replace the Cart Button with',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 116,
            'custom' => true,
        ]);

        // CB Cart Button Replace Link Active (0/1)
        $service->update('s_articles_attributes', 'coha_cb_listing_active_replace_link', 'boolean', [
            'label' => '[Cart Button: Listing] Replace Link',
            'helpText' => 'If Active, the Cart Button will have a Text Replacing',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 117,
            'custom' => true,
        ]);

        // CB Cart Button Link Replacing Link ("String")
        $service->update('s_articles_attributes', 'coha_cb_listing_replacing_link', 'string', [
            'label' => '[Cart Button: Listing] Replacing Link',
            'helpText' => 'The Cart-Button will have itself replaced with the custom Link in this Text-Field',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 118,
            'custom' => true,
        ]);

        // CB Cart Button New Tab (0/1)
        $service->update('s_articles_attributes', 'coha_cb_listing_new_tab', 'boolean', [
            'label' => '[Cart Button: Listing] New Tab',
            'helpText' => 'If Active - the Cart-Button will open the URL in a new Tab',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 119,
            'custom' => true,
        ]);

        // CB Cart Button removed/hidden (0/1)
        $service->update('s_articles_attributes', 'coha_cb_listing_removed_hidden', 'boolean', [
            'label' => '[Cart Button: Listing] removed/hidden',
            'helpText' => 'If Active, the Cart button will be Removed / Hidden',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 120,
            'custom' => true,
        ]);

        // CB Cart Button disabled (0/1)
        $service->update('s_articles_attributes', 'coha_cb_listing_disabled', 'boolean', [
            'label' => '[Cart Button: Listing] disabled',
            'helpText' => 'If Active, the Cart button will be disabled',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 121,
            'custom' => true,
        ]);

        // - CB Cart Button Custom classes ("String")
        $service->update('s_articles_attributes', 'coha_cb_listing_custom_classes', 'string', [
            'label' => '[Cart Button: Listing] custom classes',
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

        // CB Cart Button Replace Text Active (0/1)
        $service->update('s_articles_attributes', 'coha_cb_details_active_replace_text', 'boolean', [
            'label' => '[Cart Button: Details] Replace Text',
            'helpText' => 'If Active, the Cart Button will have a Text Replacing',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 155,
            'custom' => true,
        ]);

        // CB Cart Button Replacing Text ("String")
        $service->update('s_articles_attributes', 'coha_cb_details_replacing_text', 'string', [
            'label' => '[Cart Button: Details] Replacing Text',
            'helpText' => 'The Text to Replace the Cart Button with',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 156,
            'custom' => true,
        ]);

        // CB Cart Button Replace Link Active (0/1)
        $service->update('s_articles_attributes', 'coha_cb_details_active_replace_link', 'boolean', [
            'label' => '[Cart Button: Details] Replace Link',
            'helpText' => 'If Active, the Cart Button will have a Text Replacing',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 157,
            'custom' => true,
        ]);

        // CB Cart Button Link Replacing Link ("String")
        $service->update('s_articles_attributes', 'coha_cb_details_replacing_link', 'string', [
            'label' => '[Cart Button: Details] Replacing Link',
            'helpText' => 'The Cart-Button will have itself replaced with the custom Link in this Text-Field',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 158,
            'custom' => true,
        ]);

        // CB Cart Button New Tab (0/1)
        $service->update('s_articles_attributes', 'coha_cb_details_new_tab', 'boolean', [
            'label' => '[Cart Button: Details] New Tab',
            'helpText' => 'If Active - the Cart-Button will open the URL in a new Tab',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 159,
            'custom' => true,
        ]);

        // CB Cart Button removed/hidden (0/1)
        $service->update('s_articles_attributes', 'coha_cb_details_removed_hidden', 'boolean', [
            'label' => '[Cart Button: Details] removed/hidden',
            'helpText' => 'If Active, the Cart button will be Removed / Hidden',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 160,
            'custom' => true,
        ]);

        // CB Cart Button disabled (0/1)
        $service->update('s_articles_attributes', 'coha_cb_details_disabled', 'boolean', [
            'label' => '[Cart Button: Details] disabled',
            'helpText' => 'If Active, the Cart button will be disabled',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 161,
            'custom' => true,
        ]);

        // - CB Cart Button Custom classes ("String")
        $service->update('s_articles_attributes', 'coha_cb_details_custom_classes', 'string', [
            'label' => '[Cart Button: Details] custom classes',
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
        $service->delete('s_articles_attributes', 'coha_cb_listing_active_replace_text');
        $service->delete('s_articles_attributes', 'coha_cb_listing_replacing_text');
        $service->delete('s_articles_attributes', 'coha_cb_listing_active_replace_link');
        $service->delete('s_articles_attributes', 'coha_cb_listing_replacing_link');
        $service->delete('s_articles_attributes', 'coha_cb_listing_new_tab');
        $service->delete('s_articles_attributes', 'coha_cb_listing_removed_hidden');
        $service->delete('s_articles_attributes', 'coha_cb_listing_disabled');
        $service->delete('s_articles_attributes', 'coha_cb_listing_custom_classes');

        $service->delete('s_articles_attributes', 'coha_cb_details_active_replace_text');
        $service->delete('s_articles_attributes', 'coha_cb_details_replacing_text');
        $service->delete('s_articles_attributes', 'coha_cb_details_active_replace_link');
        $service->delete('s_articles_attributes', 'coha_cb_details_replacing_link');
        $service->delete('s_articles_attributes', 'coha_cb_details_new_tab');
        $service->delete('s_articles_attributes', 'coha_cb_details_removed_hidden');
        $service->delete('s_articles_attributes', 'coha_cb_details_disabled');
        $service->delete('s_articles_attributes', 'coha_cb_details_custom_classes');
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
