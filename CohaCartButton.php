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

        // --- Fields
        /*
            - CCB (Coha Cart Button) 
            - CB Cart Button Replace Text Active (0/1)
            - CB Cart Button Text Replacing Text ("String")
            - CB Cart Button Replace Link Active (0/1)
            - CB Cart Button Link Replacing URL ("String")
            - CB Cart Button Target "Parent / new Tab"
            - CB Cart Button removed/hidden (0/1)
            - CB Cart Button disabled (0/1)
        */

        // // Custom URL
        // $service->update('s_articles_supplier_attributes', 'coha_url', 'string', [
        //     'label' => 'URL',
        //     'helpText' => 'When set, it will replace the URL for each Banner-Slider',
        //     'translatable' => true,
        //     'displayInBackend' => true,
        //     'position' => 20,
        //     'custom' => true,
        // ]);

        // // Open URL in New Tab
        // $service->update('s_articles_supplier_attributes', 'coha_url_target_blank', 'boolean', [
        //     'label' => 'URL open in New Tab',
        //     'helpText' => 'Open the clicked URL in a new Window/Tab',
        //     'translatable' => true,
        //     'displayInBackend' => true,
        //     'position' => 21,
        //     'custom' => true,
        // ]);

        $this->update();
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
        // $service->delete('s_articles_supplier_attributes', 'coha_is_quote_person');
        // $service->delete('s_articles_supplier_attributes', 'coha_quote_classes');
        // $service->delete('s_articles_supplier_attributes', 'coha_quote_html_tags');
        // $service->delete('s_articles_supplier_attributes', 'coha_quote_content');
        // $service->delete('s_articles_supplier_attributes', 'coha_url');
        // $service->delete('s_articles_supplier_attributes', 'coha_url_target_blank');
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
