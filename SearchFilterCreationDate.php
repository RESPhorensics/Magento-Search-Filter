$todayDate = Mage::app()->getLocale()->date()->toString(Var_Date::DATETIME_INTERNAL_FORMAT);

$collection = Mage::getModel(‘catalog/product’)
->getCollection()
->addAttributeFilter(‘news_from_date’, array(‘date’ => true, ‘to’ => $todaysDate))
->addAttributeFilter(‘news_to_date’, array(‘or’=> array(
0 => array(‘date’ => true, ‘from’ => $todaysDate),
1 => array(‘is’ => new Zend_Db_Expr(‘null’)))
), ‘left’)
->addAttributeSort(‘news_from_date’, ‘desc’)
->addAttributeSort(‘created_on’, ‘desc’);