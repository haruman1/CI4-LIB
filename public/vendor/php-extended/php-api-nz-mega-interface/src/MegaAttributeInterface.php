<?php declare(strict_types=1);

/*
 * This file is part of the php-extended/php-api-nz-mega-interface library
 *
 * (c) Anastaszor
 * This source file is subject to the MIT license that
 * is bundled with this source code in the file LICENSE.
 */

namespace PhpExtended\MegaNzApi;

use Stringable;

/**
 * MegaAttributeInterface class file.
 *
 * This class represents the attributes of a node.
 *
 * @author Anastaszor
 */
interface MegaAttributeInterface extends Stringable
{
	
	/**
	 * Gets the name of the attribute.
	 *
	 * @return string
	 */
	public function getName() : string;
	
	/**
	 * Gets the data of the attribute.
	 */
	public function getData() : ?string;
	
}
