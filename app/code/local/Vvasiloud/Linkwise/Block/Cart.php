<?php
 /**
 * @package    Vvasiloud_Linkwise
 * @author     Vasilis Vasiloudis
 * @website    http://vvasiloud.github.io
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */
 
class Vvasiloud_Linkwise_Block_Cart extends Vvasiloud_Linkwise_Block_AbstractLinkwise
{
	
	public function getLinkwiseCartProducts(){
		$items = Mage::getModel('checkout/cart')->getQuote()->getAllVisibleItems();
		$output = '';
		$productModel = Mage::getModel('catalog/product');
		foreach ($items as $item){	
			$_product = $productModel->loadByAttribute('sku', $item->getSku()); //To fix configurable duplicate ids for children
$output .= 'lw("addItem", {
id: "' . $_product->getId() .'"
,price: "' . $item->getPrice() .'"
,quantity: "' . (int) $item->getQty() .'"
});'; 
		}
		
		return $output;
	}
}