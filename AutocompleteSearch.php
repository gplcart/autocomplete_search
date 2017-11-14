<?php

/**
 * @package Autocomplete search
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\autocomplete_search;

use gplcart\core\Module,
    gplcart\core\Config;

/**
 * Main class for Autocomplete search module
 */
class AutocompleteSearch extends Module
{

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    /**
     * Implements hook "construct.controller.frontend"
     * @param \gplcart\core\controllers\frontend\Controller $controller
     */
    public function hookConstructControllerFrontend($controller)
    {
        $this->setModuleAssets($controller);
    }

    /**
     * Implements hook "route.list"
     * @param array $routes
     */
    public function hookRouteList(array &$routes)
    {
        $routes['admin/module/settings/autocomplete_search'] = array(
            'access' => 'module_edit',
            'handlers' => array(
                'controller' => array('gplcart\\modules\\autocomplete_search\\controllers\\Settings', 'editSettings')
            )
        );

        $routes['autocomplete-search'] = array(
            'handlers' => array(
                'controller' => array('gplcart\\modules\\autocomplete_search\\controllers\\Search', 'doSearch')
            )
        );
    }

    /**
     * Sets module specific assets
     * @param \gplcart\core\controllers\frontend\Controller $controller
     */
    protected function setModuleAssets($controller)
    {
        if (!$controller->isInternalRoute()) {
            $settings = $this->config->getFromModule('autocomplete_search', array());
            $controller->setJsSettings('autocomplete_search', $settings);
            $controller->setJs('system/modules/autocomplete_search/js/common.js');
            $controller->setCss('system/modules/autocomplete_search/css/common.css');
            $controller->addAssetLibrary('jquery_ui');
        }
    }

}
