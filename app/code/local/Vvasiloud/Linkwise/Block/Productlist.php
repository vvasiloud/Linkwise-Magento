<?php
 /**
 * @package    Vvasiloud_Linkwise
 * @author     Vasilis Vasiloudis
 * @website    http://vvasiloud.github.io
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */
 
class Vvasiloud_Linkwise_Block_Productlist extends Mage_Catalog_Block_Product_List 
{

    public function isEnabled() {
        return Mage::helper('linkwise')->isEnabled();
    }

	public function getRetargetingPages($storeId = null){
		return Mage::helper('linkwise')->getRetargetingPages();
	}
	
	public function getLinkwiseCategoryProducts(){
		$items = $this->getLoadedProductCollection();
		$output = '';
		foreach ($items as $item){	
		$price = Mage::helper('tax')->getPrice($item, $item->getFinalPrice(), false );
$output .= 'lw("addItem", {
id: "' . $item->getId() .'"
,price: "' . $price .'" 
});'; 
		}
		
		return $output;
	}
}