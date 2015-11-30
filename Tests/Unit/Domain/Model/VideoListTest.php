<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Jari-Hermann Ernst <jari-hermann.ernst@bad-gmbh.de>, B·AD GmbH
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class Tx_JheVimeo_Domain_Model_VideoList.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Vimeo
 *
 * @author Jari-Hermann Ernst <jari-hermann.ernst@bad-gmbh.de>
 */
class Tx_JheVimeo_Domain_Model_VideoListTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_JheVimeo_Domain_Model_VideoList
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_JheVimeo_Domain_Model_VideoList();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getVideosReturnsInitialValueForObjectStorageContainingTx_JheVimeo_Domain_Model_Video() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getVideos()
		);
	}

	/**
	 * @test
	 */
	public function setVideosForObjectStorageContainingTx_JheVimeo_Domain_Model_VideoSetsVideos() { 
		$video = new Tx_JheVimeo_Domain_Model_Video();
		$objectStorageHoldingExactlyOneVideos = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneVideos->attach($video);
		$this->fixture->setVideos($objectStorageHoldingExactlyOneVideos);

		$this->assertSame(
			$objectStorageHoldingExactlyOneVideos,
			$this->fixture->getVideos()
		);
	}
	
	/**
	 * @test
	 */
	public function addVideoToObjectStorageHoldingVideos() {
		$video = new Tx_JheVimeo_Domain_Model_Video();
		$objectStorageHoldingExactlyOneVideo = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneVideo->attach($video);
		$this->fixture->addVideo($video);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneVideo,
			$this->fixture->getVideos()
		);
	}

	/**
	 * @test
	 */
	public function removeVideoFromObjectStorageHoldingVideos() {
		$video = new Tx_JheVimeo_Domain_Model_Video();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($video);
		$localObjectStorage->detach($video);
		$this->fixture->addVideo($video);
		$this->fixture->removeVideo($video);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getVideos()
		);
	}
	
}
?>