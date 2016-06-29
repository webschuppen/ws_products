<?php
class tx_ws_products_realurl {
    /**
     * Generates additional RealURL configuration and merges it with provided configuration
     *
     * @param       array $params Default configuration
     * @param       tx_realurl_autoconfgen $pObj Parent object
     * @return      array           Updated configuration
     */
    protected $extname = 'tx_wsproducts_product';

    public function addWsProductsConfig($params, &$pObj)
    {
        return array_merge_recursive($params['config'], array(
            'postVarSets' => array(
                '_DEFAULT' => array(
                    'controller' => array(
                        array(
                            'GETvar' => $this->extname.'[controller]'
                        ),
                    ),
                    'action' => array(
                        array(
                            'GETvar' => $this->extname.'[action]'
                        ),
                    ),
                    'application' => array(
                        array(
                            'GETvar' => $this->extname.'[application]',
                            'lookUpTable' => array(
                                'table' => 'tx_wsproducts_domain_model_application',
                                'id_field' => 'uid',
                                'alias_field' => 'application_name',
                                'addWhereClause' => ' AND NOT deleted',
                                'useUniqueCache' => 1,
                                'useUniqueCache_conf' => array(
                                    'strtolower' => 1,
                                    'spaceCharacter' => '-',
                                ),
                            ),
                        ),
                    ),
                    'product' => array(
                        array(
                            'GETvar' => $this->extname.'[product]',
                            'lookUpTable' => array(
                                'table' => 'tx_wsproducts_domain_model_product',
                                'id_field' => 'uid',
                                'alias_field' => 'product_short_name',
                                'addWhereClause' => ' AND NOT deleted',
                                'useUniqueCache' => 1,
                                'useUniqueCache_conf' => array(
                                    'strtolower' => 1,
                                    'spaceCharacter' => '-',
                                ),
                            ),
                        ),
                    ),
                )
            )
        ));
    }
}
