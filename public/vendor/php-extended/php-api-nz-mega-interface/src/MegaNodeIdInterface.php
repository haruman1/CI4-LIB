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
 * MegaNodeIdInterface class file.
 *
 * This class represents the id in which all requests are.
 *
 * @author Anastaszor
 */
interface MegaNodeIdInterface extends Stringable
{
	
	/**
	 * Gets the value of the id.
	 *
	 * @return string
	 */
	public function getValue() : string;
	
	/**
	 * Gets whether two ids are equals. They are equals if they share the same
	 * id value.
	 *
	 * @param MegaNodeIdInterface $other
	 * @return boolean
	 */
	public function equals(MegaNodeIdInterface $other) : bool;
	
}
