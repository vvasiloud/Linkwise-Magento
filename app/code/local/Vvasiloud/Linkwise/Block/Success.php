<?php
 /**
 * @package    Vvasiloud_Linkwise
 * @author     Vasilis Vasiloudis
 * @website    http://vvasiloud.github.io
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */
 
class Vvasiloud_Linkwise_Block_Success extends Vvasiloud_Linkwise_Block_AbstractLinkwise
{
	protected $_order = null;
	protected $_orderItems = null;

	private function getOrder(){
		if ($this->_order === null){
			$orderId = $this->getLastRealOrderId();
			$this->_order = Mage::getModel('sales/order')->loadByIncrementId($orderId);
        }
        return $this->_order;
	}

	private function getItems(){
		if ($this->_orderItems === null){
			$order = $this->getOrder();
			$this->_orderItems = $order->getAllVisibleItems();
		}		
		return $this->_orderItems;
	}
	
	public function getNumericCurrency() {
		return Mage::helper('linkwise')->getNumericCurrency();
	}

	public function getLastRealOrderId() {
		return Mage::getSingleton('checkout/session')->getLastRealOrderId();
	}	
	
	public function getLinkwiseProducts(){
		$items = $this->getItems();
		$output = '';
		$productModel = Mage::getModel('catalog/product');
		foreach ($items as $item){	
			$_product = $productModel->loadByAttribute('sku', $item->getSku()); //To fix configurable dublicate ids for children
$output .= 'lw("addItem", {
id: "' . $_product->getId() .'"
,price: "' . $item->getPrice() .'"
,quantity: "' . (int) $item->getQtyOrdered() .'"
,payout: "1"
});'; 
		}
		
		return $output;
	}	
	
	public function getLinkwiseProductsAsUrl(){
		$items = $this->getItems();
		$output = '//go.linkwi.se/delivery/acl.php?program=' . $this->getLinkwiseId() . '&amp;decimal=' .  $this->getDecimalSeparator() . '&amp';
		$productModel = Mage::getModel('catalog/product');
		foreach ($items as $item){	
			$productCounter++; 
			$_product = $productModel->loadByAttribute('sku', $item->getSku()); //To fix configurable dublicate ids for children
			$output .= 'itemid[' . $productCounter . ']=' . $_product->getId() .'&amp;
itemprice[' . $productCounter . ']=' . $item->getPrice() .'&amp;
itemquantity[' . $productCounter . ']=' . (int) $item->getQtyOrdered() .'&amp;
itempayout[' .  $productCounter . ']=1&amp;'; 
		}
		
		$output .= 'status=pending&amp;orderid=' . $this->getLastRealOrderId();
		return $output;
	}		

}
