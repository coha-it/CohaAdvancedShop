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

/*

- is_timeevent (Termin/Ausbildung)

- hightlight_event_from
- hightlight_event_till

- activate_product_at
- deactivate_product_at

- ExtraListingButton 0/1 (fügt einen zweiten Button hinzu als is—secondary)
- ExtraListingButton Text "string"
- ExtraListingButton URL "string"
- ExtraListingButton NewTab 0/1

- ExtraDetailsButton 0/1 (fügt einen zweiten Button hinzu als is—secondary)
- ExtraDetailsButton Text "string"
- ExtraDetailsButton URL "string"
- ExtraDetailsButton NewTab 0/1

*/

    public function getAttributes()
    {
        // Return the Attributes as Array
        return [
            [ 'name' => 'coha_as_unbuyable',                        'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Article unbuyable', 'helpText' => 'If Active, the Product/Article is not buyable' ],
            [ 'name' => 'coha_as_listing_hide_prices',              'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Hide Prices (in Listing)', ],
            [ 'name' => 'coha_as_details_hide_prices',              'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Hide Prices (in Details)', ],
            [ 'name' => 'coha_as_hide_delivery',                    'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Hide Delivery', ],
            [ 'name' => 'coha_as_subtitle_active',                  'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Subtitle Activated', ],
            [ 'name' => 'coha_as_subtitle_content',                 'type' => 'string',             'label' => '[COHA: Advanced Shop] Subtitle Content', ],
            [ 'name' => 'coha_as_shortdesc_active',                 'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Short-Description Activated', ],
            [ 'name' => 'coha_as_shortdesc_content',                'type' => 'html',               'label' => '[COHA: Advanced Shop] Short-Description Content', 'supportText' => 'If Activated, your Shortdescription will be shown on the listing-pages (instead of the default-description)'],
            [ 'name' => 'coha_as_badge_termin',                     'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Termin "Badge"', ],
            [ 'name' => 'coha_as_badge_ausbildung',                 'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Ausbildung "Badge"', ],
            [ 'name' => 'coha_as_listing_replace_text_active',      'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Listing-Button: Replace Text Activated', 'helpText' => 'If Active, the Cart Button will have a Text Replacing',],
            [ 'name' => 'coha_as_listing_replace_text',             'type' => 'string',             'label' => '[COHA: Advanced Shop] Listing-Button: Replacing Text','helpText' => 'The Text to Replace the Cart Button with', 'supportText' => 'If Activated, your text will be shown on the listing-pages (instead of the default-text)',],
            [ 'name' => 'coha_as_listing_replace_link_active',      'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Listing-Button: Replace Link Activated', 'helpText' => 'If Active, the Cart Button will have a Text Replacing',],
            [ 'name' => 'coha_as_listing_replace_link',             'type' => 'string',             'label' => '[COHA: Advanced Shop] Listing-Button: Replacing Link','helpText' => 'The Cart-Button will have itself replaced with the custom Link in this Text-Field', 'supportText' => 'If Activated, the button on the details page will guide the user to your custom-url',],
            [ 'name' => 'coha_as_listing_new_tab',                  'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Listing-Button: New Tab', 'helpText' => 'If Active - the Cart-Button will open the URL in a new Tab',],
            [ 'name' => 'coha_as_listing_removed_hidden',           'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Listing-Button: removed/hidden', 'helpText' => 'If Active, the Cart button will be Removed / Hidden',],
            [ 'name' => 'coha_as_listing_disabled',                 'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Listing-Button: disabled', 'helpText' => 'If Active, the Cart button will be disabled',],
            [ 'name' => 'coha_as_listing_custom_classes',           'type' => 'string',             'label' => '[COHA: Advanced Shop] Listing-Button: custom classes', 'helpText' => 'Custom Classes for the Cart Button',],
            [ 'name' => 'coha_as_details_replace_text_active',      'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Details-Button: Replace Text Activated', 'helpText' => 'If Active, the Cart Button will have a Text Replacing',],
            [ 'name' => 'coha_as_details_replace_text',             'type' => 'string',             'label' => '[COHA: Advanced Shop] Details-Button: Replacing Text','helpText' => 'The Text to Replace the Cart Button with', 'supportText' => 'If Activated, your text will be shown on the details-page (instead of the default-text)',],
            [ 'name' => 'coha_as_details_replace_link_active',      'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Details-Button: Replace Link Activated', 'helpText' => 'If Active, the Cart Button will have a Text Replacing',],
            [ 'name' => 'coha_as_details_replace_link',             'type' => 'string',             'label' => '[COHA: Advanced Shop] Details-Button: Replacing Link','helpText' => 'The Cart-Button will have itself replaced with the custom Link in this Text-Field', 'supportText' => 'If Activated, the button on the details page will guide the user to your custom-url',],
            [ 'name' => 'coha_as_details_new_tab',                  'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Details-Button: New Tab', 'helpText' => 'If Active - the Cart-Button will open the URL in a new Tab',],
            [ 'name' => 'coha_as_details_removed_hidden',           'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Details-Button: removed/hidden', 'helpText' => 'If Active, the Cart button will be Removed / Hidden',],
            [ 'name' => 'coha_as_details_disabled',                 'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Details-Button: disabled', 'helpText' => 'If Active, the Cart button will be disabled',],
            [ 'name' => 'coha_as_details_custom_classes',           'type' => 'string',             'label' => '[COHA: Advanced Shop] Details-Button: custom classes', 'helpText' => 'Custom Classes for the Cart Button',],
            [ 'name' => 'coha_as_test',                             'type' => 'boolean',            'label' => '[COHA: Advanced Shop] Details-Button: disabled', 'helpText' => 'If Active, the Cart button will be disabled',],
        ];
    }



    public function install(InstallContext $context)
    {
        // Get variables
        $service        = $this->container->get('shopware_attribute.crud_service');
        $aAttributes    = $this->getAttributes();

        for ($i=0; $i < count($aAttributes); $i++)
        { 
            // Set Attribute
            $aAttribute = $aAttributes[$i];

            // Collect Advanced Array
            $aAdvanced = [];
            $aAdvanced['label']                     = $aAttribute['label'] ?? '';
            $aAdvanced['translatable']              = $aAttribute['translatable'] ?? true;
            $aAdvanced['displayInBackend']          = $aAttribute['displayInBackend'] ?? true;
            $aAdvanced['custom']                    = $aAttribute['custom'] ?? true;
            $aAdvanced['position']                  = ($i + 150);

            $service->update(
                's_articles_attributes',
                $aAttribute['name'],
                $aAttribute['type'],
                $aAdvanced
            );
        }

        // $this->update();

    }


    public function update(UpdateContext $context) {
        $service = $this->container->get('shopware_attribute.crud_service');

        // $context->scheduleClearCache(ActivateContext::CACHE_LIST_ALL);

    }

    // On Activation
    public function activate(ActivateContext $context)
    {
        $context->scheduleClearCache(ActivateContext::CACHE_LIST_ALL);
    }

    public function uninstall(UninstallContext $context)
    {
        // Get variables
        $service = $this->container->get('shopware_attribute.crud_service');
        $aAttributes    = $this->getAttributes();

        // Delete The Fields Fields
        for ($i=0; $i < count($aAttributes); $i++)
        { 
            // Set Attribute
            $aAttribute = $aAttributes[$i];

            // Delete Attribute
            $service->delete(
                's_articles_attributes',
                $aAttribute['name']
            );
        }
        
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
