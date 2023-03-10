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
 * MegaHierarchyNodeInterface class file.
 *
 * This class represents a node in the linked list hierarchy, which encapsulates
 * MegaNode objects.
 *
 * Those objects are double linked lists (tree in fact, as the children part
 * is multiple and not 1-1).
 *
 * @author Anastaszor
 */
interface MegaHierarchyNodeInterface extends Stringable
{
	
	/**
	 * Gets the real node.
	 *
	 * @return MegaNodeInterface
	 */
	public function getNode() : MegaNodeInterface;
	
	/**
	 * Gets the parent node.
	 *
	 * @return ?MegaHierarchyNodeInterface
	 */
	public function getParent() : ?MegaHierarchyNodeInterface;
	
	/**
	 * Gets the children nodes.
	 *
	 * @return MegaHierarchyNodeInterface[]
	 */
	public function getChildren() : array;
	
}
