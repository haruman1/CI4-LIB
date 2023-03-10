<?php declare(strict_types=1);

/*
 * This file is part of the php-extended/php-api-nz-mega-interface library
 *
 * (c) Anastaszor
 * This source file is subject to the MIT license that
 * is bundled with this source code in the file LICENSE.
 */

namespace PhpExtended\MegaNzApi;

use Psr\Http\Message\UriInterface;
use Stringable;

/**
 * MegaResponseLocationInterface interface file.
 * 
 * This interface represents the encrypted response to where a specific file
 * is located.
 * 
 * @author Anastaszor
 */
interface MegaResponseLocationInterface extends Stringable
{
	
	/**
	 * Gets the size of the target file.
	 * 
	 * @return integer
	 */
	public function getSize() : int;
	
	/**
	 * Gets the encrypted file name of the target file.
	 * 
	 * @return MegaStringInterface
	 */
	public function getFileName() : MegaStringInterface;
	
	/**
	 * ???
	 * 
	 * @return integer
	 */
	public function getMsd() : int;
	
	/**
	 * Additional attributes ?
	 * 
	 * @return ?string
	 */
	public function getFa() : ?string;
	
	/**
	 * Gets the time to live ? of the file (to be cached).
	 * 
	 * @return integer
	 */
	public function getTimeToLive() : int;
	
	/**
	 * Gets the target uri of the file.
	 * 
	 * @return UriInterface
	 */
	public function getTargetUri() : UriInterface;
	
	/**
	 * Gets the ip addresses that should be used to resolve the domain of the
	 * target uri.
	 * 
	 * @return string[]
	 */
	public function getIpAddresses() : array;
	
}
