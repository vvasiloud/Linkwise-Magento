<?php
 /**
 * @package    Vvasiloud_Linkwise
 * @author     Vasilis Vasiloudis
 * @website    http://vvasiloud.github.io
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */
 
class Vvasiloud_Linkwise_Helper_Data extends Mage_Core_Helper_Abstract
{
	
	const XML_PATH_LINKWISE_GENERAL_ENABLED					= 'linkwise/general/enabled';
	const XML_PATH_LINKWISE_GENERAL_LINKWISEID				= 'linkwise/general/linkwise_id';
	const XML_PATH_LINKWISE_GENERAL_DECIMAL_SEPARATOR		= 'linkwise/general/decimal_separator';	
	const XML_PATH_LINKWISE_GENERAL_NUMERIC_CURRENCY		= 'linkwise/general/numeric_currency';	
	const XML_PATH_LINKWISE_GENERAL_RETARGETING_PAGES		= 'linkwise/general/retargeting_pages';	

	public function isEnabled($storeId = null){
		return Mage::getStoreConfig(self::XML_PATH_LINKWISE_GENERAL_ENABLED, $storeId);
	}
	
	public function getLinkwiseId($storeId = null){
		return Mage::getStoreConfig(self::XML_PATH_LINKWISE_GENERAL_LINKWISEID, $storeId);
	}

	public function getDecimalSeparator($storeId = null){
		return Mage::getStoreConfig(self::XML_PATH_LINKWISE_GENERAL_DECIMAL_SEPARATOR, $storeId);
	}

	public function getNumericCurrency($storeId = null){
		return Mage::getStoreConfig(self::XML_PATH_LINKWISE_GENERAL_NUMERIC_CURRENCY, $storeId);
	}
	
	public function getRetargetingPages($storeId = null){
		$pagesConfig = Mage::getStoreConfig(self::XML_PATH_LINKWISE_GENERAL_RETARGETING_PAGES, $storeId);
		$pages = explode(",", $pagesConfig);
		
		return $pages;
	}	


}
	 