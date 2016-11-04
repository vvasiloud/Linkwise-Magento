<?php
 /**
 * @package    Vvasiloud_Linkwise
 * @author     Vasilis Vasiloudis
 * @website    http://vvasiloud.github.io
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */
 
abstract class Vvasiloud_Linkwise_Block_AbstractLinkwise extends Mage_Core_Block_Template
{

    public function isEnabled() {
        return Mage::helper('linkwise')->isEnabled();
    }

	public function getDecimalSeparator() {
		return Mage::helper('linkwise')->getDecimalSeparator();
	}	
	
	public function getLinkwiseId() {
		return Mage::helper('linkwise')->getLinkwiseId();
	}		

	public function getRetargetingPages($storeId = null){
		return Mage::helper('linkwise')->getRetargetingPages();
	}		
	
}