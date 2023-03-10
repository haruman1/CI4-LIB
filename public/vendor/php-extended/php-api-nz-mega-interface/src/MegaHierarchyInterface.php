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
 * MegaHierarchyInterface class file.
 *
 * This class represents the hierarchy of nodes that are inside target folder.
 *
 * @author Anastaszor
 */
interface MegaHierarchyInterface extends Stringable
{
	
	/**
	 * Gets the root node of the folder hierarchy.
	 *
	 * @return MegaNodeInterface
	 */
	public function getRoot() : MegaNodeInterface;
	
	/**
	 * Gets the node metadata for the node defined by given node id.
	 *
	 * @param MegaNodeIdInterface $nodeId
	 * @return ?MegaNodeInterface null if the node cannot be found
	 */
	public function get(MegaNodeIdInterface $nodeId) : ?MegaNodeInterface;
	
	/**
	 * Gets the children of the node defined by given node id.
	 *
	 * @param MegaNodeIdInterface $nodeId
	 * @return MegaNodeInterface[] or empty array if there is no children
	 * @throws MegaExceptionInterface if the node cannot be found
	 */
	public function getChildren(MegaNodeIdInterface $nodeId) : array;
	
}
