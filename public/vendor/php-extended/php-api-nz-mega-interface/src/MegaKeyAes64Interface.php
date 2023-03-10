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
 * MegaKeyAes64Interface interface file.
 *
 * Generic interface for manipulating 64 bits AES keys.
 *
 * @author Anastaszor
 */
interface MegaKeyAes64Interface extends Stringable
{
	
	/**
	 * Gets a version of that key encoded in an array of two 32 bits values.
	 *
	 * @return MegaKeyAes64Interface
	 * @throws MegaExceptionInterface
	 */
	public function toArray32() : MegaKeyAes64Interface;
	
	/**
	 * Gets a version of that key in pure form.
	 *
	 * @return MegaKeyAes64Interface
	 * @throws MegaExceptionInterface
	 */
	public function toRawString() : MegaKeyAes64Interface;
	
}
