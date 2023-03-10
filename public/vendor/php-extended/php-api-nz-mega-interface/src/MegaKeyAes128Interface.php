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
 * MegaKeyAes128Interface interface file.
 *
 * Generic interface for manipulating 128 bits AES keys.
 *
 * @author Anastaszor
 */
interface MegaKeyAes128Interface extends Stringable
{
	
	/**
	 * Gets a version of that key encoded in an array of four 32 bits values.
	 *
	 * @return MegaKeyAes128Interface
	 * @throws MegaExceptionInterface
	 */
	public function toArray32() : MegaKeyAes128Interface;
	
	/**
	 * Gets a version of that key in pure form.
	 *
	 * @return MegaKeyAes128Interface
	 * @throws MegaExceptionInterface
	 */
	public function toRawString() : MegaKeyAes128Interface;
	
}
