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
 * MegaKeyAes256Interface interface file.
 *
 * Generic interface for manipulating 256 bits AES keys.
 *
 * @author Anastaszor
 */
interface MegaKeyAes256Interface extends Stringable
{
	
	/**
	 * Gets a version of that key encoded in an array of eight 32 bits values.
	 *
	 * @return MegaKeyAes256Interface
	 * @throws MegaExceptionInterface
	 */
	public function toArray32() : MegaKeyAes256Interface;
	
	/**
	 * Gets a version of that key in pure form.
	 *
	 * @return MegaKeyAes256Interface
	 * @throws MegaExceptionInterface
	 */
	public function toRawString() : MegaKeyAes256Interface;
	
	/**
	 * Gets the 128 bits key which is hidden in the 256 bits.
	 *
	 * @return MegaKeyAes128Interface
	 * @throws MegaExceptionInterface
	 */
	public function reduceAes128() : MegaKeyAes128Interface;
	
	/**
	 * Gets the initialization vector hidden in the 256 bits.
	 *
	 * @return MegaKeyAes128Interface
	 * @throws MegaExceptionInterface
	 */
	public function getInitializationVector() : MegaKeyAes128Interface;
	
	/**
	 * Gets the meta mac data hidden in the 256 bits.
	 *
	 * @return MegaKeyAes64Interface
	 * @throws MegaExceptionInterface
	 */
	public function getMetaMac() : MegaKeyAes64Interface;
	
}
