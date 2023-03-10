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
 * MegaResponseNodeList class file.
 *
 * This class represents a node list, as given by the API.
 *
 * @author Anastaszor
 */
interface MegaResponseNodelistInterface extends Stringable
{
	
	/**
	 * Gets the node list.
	 *
	 * @return MegaResponseNodeInterface[]
	 */
	public function getNodes() : array;
	
	/**
	 * Gets the node which is the root amongst the nodes given in the list.
	 *
	 * @return MegaResponseNodeInterface
	 */
	public function getRootNode() : MegaResponseNodeInterface;
	
	/**
	 * Gets all the other non-root nodes.
	 *
	 * @return MegaResponseNodeInterface[]
	 */
	public function getNonrootNodes() : array;
	
}
