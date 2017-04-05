<?php
class Action_Categorie_Block_Topsearch
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    protected function _toHtml()
    {
        $searchCollection = Mage::getModel('catalogsearch/query')
            ->getResourceCollection()
            ->setOrder('popularity', 'desc');
        $searchCollection->getSelect()->limit(3,0);
        $html  = '<div id="widget-topsearch-container">' ;
        $html .= '<div class="widget-topsearch-title">Top Search</div>';
        foreach($searchCollection as $search){
            $html .= '<div class="widget-topsearch-searchtext">' . $search->query_text . "</div>";
        }
        $html .= "</div>";
        return $html;
    }
};