<?php declare(strict_types=1);

/*
 * This file is part of the php-extended/php-api-nz-mega-interface library
 *
 * (c) Anastaszor
 * This source file is subject to the MIT license that
 * is bundled with this source code in the file LICENSE.
 */

namespace PhpExtended\MegaNzApi;

use DateTimeInterface;
use Stringable;

/**
 * MegaResponseNodeInterface class file.
 *
 * This class represents a node, as given by the API.
 *
 * @author Anastaszor
 */
interface MegaResponseNodeInterface extends Stringable
{
	
	/**
	 * Gets this node id.
	 *
	 * @return MegaNodeIdInterface
	 */
	public function getNodeId() : MegaNodeIdInterface;
	
	/**
	 * Gets the parent node id.
	 *
	 * @return MegaNodeIdInterface
	 */
	public function getParentNodeId() : MegaNodeIdInterface;
	
	/**
	 * Gets the owner user id.
	 *
	 * @return MegaUserIdInterface
	 */
	public function getOwnerId() : MegaUserIdInterface;
	
	/**
	 * Gets this node type.
	 *
	 * @return integer
	 */
	public function getNodeType() : int;
	
	/**
	 * Gets the attributes, as encrypted string.
	 *
	 * @return MegaStringInterface
	 */
	public function getNodeAttributes() : MegaStringInterface;
	
	/**
	 * Gets the key, as encrypted string.
	 *
	 * @return MegaResponseKeyInterface
	 */
	public function getNodeKey() : MegaResponseKeyInterface;
	
	/**
	 * Gets the node size, in octets.
	 *
	 * @return integer
	 */
	public function getNodeSize() : int;
	
	/**
	 * Gets the last modified date and time.
	 *
	 * @return DateTimeInterface
	 */
	public function getLastModifiedDatetime() : DateTimeInterface;
	
	/**
	 * Decodes the response node and gives a clear node.
	 *
	 * @param MegaKeyAes128Interface $key
	 * @return MegaNodeInterface
	 * @throws MegaExceptionInterface
	 */
	public function decode(MegaKeyAes128Interface $key) : MegaNodeInterface;
	
}
