<?php
 /**
 * @package    Vvasiloud_Linkwise
 * @author     Vasilis Vasiloudis
 * @website    http://vvasiloud.github.io
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */
 
class Vvasiloud_Linkwise_Model_Adminhtml_System_Config_Source_Pages
{
	public function toOptionArray() {
        $helper = Mage::helper('linkwise');
        return array(
            array('value' => 'homepage', 'label' => $helper->__('Homepage')),
            array('value' => 'product_listing', 'label' => $helper->__('Product listing')),
            array('value' => 'product_page', 'label' => $helper->__('Product page')),
			array('value' => 'cart', 'label' => $helper->__('Shopping cart/basket')),
			array('value' => 'checkout', 'label' => $helper->__('Checkout Start')),
        );
    }
}