<?php

namespace ASN1\Type\Primitive;

use ASN1\Type\PrimitiveString;
use ASN1\Type\UniversalClass;


/**
 * Implements <i>BMPString</i> type.
 *
 * BMP stands for Basic Multilingual Plane. This is generally an Unicode string
 * with UCS-2 encoding.
 */
class BMPString extends PrimitiveString
{
	use UniversalClass;
	
	/**
	 * Constructor
	 *
	 * @param string $string
	 */
	public function __construct($string) {
		$this->_typeTag = self::TYPE_BMP_STRING;
		parent::__construct($string);
	}
	
	protected function _validateString($string) {
		// UCS-2 has fixed with of 2 octets (16 bits)
		if (strlen($string) % 2 !== 0) {
			return false;
		}
		return true;
	}
}