<?php declare(strict_types=1);

/*
 * This file is part of the php-extended/php-api-nz-mega-interface library
 *
 * (c) Anastaszor
 * This source file is subject to the MIT license that
 * is bundled with this source code in the file LICENSE.
 */

namespace PhpExtended\MegaNzApi;

use Psr\Http\Client\ClientExceptionInterface;
use RuntimeException;
use Stringable;

/**
 * MegaEndpointInterface class file.
 *
 * This class represents the API to get resources and contents from mega urls.
 *
 * @author Anastaszor
 */
interface MegaEndpointInterface extends Stringable
{
	
	/**
	 * Gets the root node of this folder.
	 *
	 * @return MegaNodeInterface
	 * @throws ClientExceptionInterface
	 * @throws MegaExceptionInterface
	 */
	public function getRootNodeInfo() : MegaNodeInterface;
	
	/**
	 * Gets file information from hierarchy, if not found, searches the server.
	 *
	 * @param MegaNodeIdInterface $nodeId the id of target node
	 * @return ?MegaNodeInterface the node with the given id, null if not found
	 * @throws MegaExceptionInterface
	 */
	public function getFileInfo(MegaNodeIdInterface $nodeId) : ?MegaNodeInterface;
	
	/**
	 * Gets the children of given node.
	 *
	 * @param MegaNodeInterface $node
	 * @return MegaNodeInterface[]
	 * @throws ClientExceptionInterface
	 * @throws MegaExceptionInterface
	 */
	public function getChildren(MegaNodeInterface $node) : array;
	
	/**
	 * Gets the raw data for the file represented by given node.
	 *
	 * @param MegaNodeInterface $node
	 * @return string binary raw data for the decoded file
	 * @throws ClientExceptionInterface
	 * @throws MegaExceptionInterface
	 */
	public function downloadFile(MegaNodeInterface $node) : string;
	
	/**
	 * Downloads recursively all the files to the given filesystem, and stores
	 * them in clear, respecting the existing folder and file names that are
	 * stored in the mega data.
	 * 
	 * @param MegaNodeInterface $node
	 * @param string $localPath
	 * @return integer the number of files downloaded
	 * @throws RuntimeException if data cannot be written on the filesystem
	 * @throws ClientExceptionInterface
	 * @throws MegaExceptionInterface
	 */
	public function downloadSynchronize(MegaNodeInterface $node, string $localPath) : int;
	
}
