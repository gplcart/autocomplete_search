<?php

/**
 * @package Autocomplete search 
 * @author Iurii Makukh <gplcart.software@gmail.com> 
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com> 
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+ 
 */

namespace gplcart\modules\autocomplete_search\controllers;

use gplcart\core\models\Search as SearchModel;
use gplcart\core\controllers\frontend\Controller as FrontendController;

/**
 * Handles incoming requests and outputs data related to Autocomplete search module
 */
class Search extends FrontendController
{

    /**
     * Search model instance
     * @var \gplcart\core\models\Search $search
     */
    protected $search;

    /**
     * @param SearchModel $search
     */
    public function __construct(SearchModel $search)
    {
        parent::__construct();

        $this->search = $search;
    }

    /**
     * Route page callback to output JSON for autocomplete suggestions
     */
    public function doSearch()
    {
        if ($this->isPosted('term')) {
            $this->outputJson($this->getProductsSearch());
        }
    }

    /**
     * Returns an array of found products
     * @return array
     */
    protected function getProductsSearch()
    {
        $term = $this->getPosted('term', '', true, 'string');

        $entity_options = array(
            'entity' => 'product',
            'template_item' => 'autocomplete_search|suggestion'
        );

        $search_options = array(
            'status' => true,
            'store_id' => $this->store_id,
            'limit' => array(0, $this->config->getFromModule('autocomplete_search', 'max_result')));

        $products = $this->search->search('product', $term, $search_options);
        return $this->prepareEntityItems($products, $entity_options);
    }

}
