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
 * MegaStringInterface interface file.
 *
 * Generic interfaces to parse strings given by Mega API.
 *
 * @author Anastaszor
 */
interface MegaStringInterface extends Stringable
{
	
	/**
	 * Gets a version of that string encoded base64.
	 *
	 * @return MegaStringInterface
	 * @throws MegaExceptionInterface
	 */
	public function toBase64() : MegaStringInterface;
	
	/**
	 * Gets a version of that string in pure form.
	 *
	 * @return MegaStringInterface
	 * @throws MegaExceptionInterface
	 */
	public function toClear() : MegaStringInterface;
	
}
