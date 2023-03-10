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
 * MegaNodeInterface class file.
 *
 * This class represents a node in mega's file and folders hierarchy. A node
 * represents metadata for a folder, a file, or other specific elements.
 *
 * @author Anastaszor
 */
interface MegaNodeInterface extends Stringable
{
	
	/**
	 * Gets this node's id.
	 *
	 * @return MegaNodeIdInterface
	 */
	public function getNodeId() : MegaNodeIdInterface;
	
	/**
	 * Gets this node parent's id.
	 *
	 * @return MegaNodeIdInterface
	 */
	public function getParentId() : MegaNodeIdInterface;
	
	/**
	 * Gets this node owner's user id.
	 *
	 * @return MegaUserIdInterface
	 */
	public function getOwnerId() : MegaUserIdInterface;
	
	/**
	 * Gets the attributes for this node.
	 *
	 * @return MegaAttributeInterface
	 */
	public function getAttributes() : MegaAttributeInterface;
	
	/**
	 * Gets this node's type. Only one of MegaNodeInterface::TYPE_* constants.
	 *
	 * @return integer
	 */
	public function getNodeType() : int;
	
	/**
	 * Gets the node size. Only set when nodes represents files.
	 *
	 * @return integer
	 */
	public function getNodeSize() : int;
	
	/**
	 * Gets the last modified date of this node.
	 *
	 * @return DateTimeInterface
	 */
	public function getLastModifiedDate() : DateTimeInterface;
	
	/**
	 * Gets the encryption key for this node.
	 *
	 * @return MegaKeyAes128Interface
	 */
	public function getNodeKey() : MegaKeyAes128Interface;
	
	/**
	 * Gets the initialization vector for this node.
	 *
	 * @return MegaKeyAes128Interface
	 */
	public function getInitializationVector() : MegaKeyAes128Interface;
	
	/**
	 * Gets the meta mac for this node.
	 *
	 * @return ?MegaKeyAes64Interface
	 */
	public function getMetaMac() : ?MegaKeyAes64Interface;
	
}
