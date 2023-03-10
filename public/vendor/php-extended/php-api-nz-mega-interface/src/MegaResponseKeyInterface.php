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
 * MegaResponseKeyInterface class file.
 *
 * This class represents the key and the node id of the node that contains
 * the key to decode this node's key.
 *
 * @author Anastaszor
 */
interface MegaResponseKeyInterface extends Stringable
{
	
	/**
	 * Gets the id of the node able to decrypt this node's key.
	 *
	 * @return MegaNodeIdInterface
	 */
	public function getNodeId() : MegaNodeIdInterface;
	
	/**
	 * Gets the node encrypted key, base64.
	 *
	 * @return MegaStringInterface
	 */
	public function getNodeKey() : MegaStringInterface;
	
}
