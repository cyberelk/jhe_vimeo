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
 * Test case for class Tx_JheVimeo_Domain_Model_Video.
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
class Tx_JheVimeo_Domain_Model_VideoTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_JheVimeo_Domain_Model_Video
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_JheVimeo_Domain_Model_Video();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getVimeoidReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setVimeoidForStringSetsVimeoid() { 
		$this->fixture->setVimeoid('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getVimeoid()
		);
	}
	
	/**
	 * @test
	 */
	public function getWidthReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getWidth()
		);
	}

	/**
	 * @test
	 */
	public function setWidthForIntegerSetsWidth() { 
		$this->fixture->setWidth(12);

		$this->assertSame(
			12,
			$this->fixture->getWidth()
		);
	}
	
	/**
	 * @test
	 */
	public function getHeightReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getHeight()
		);
	}

	/**
	 * @test
	 */
	public function setHeightForIntegerSetsHeight() { 
		$this->fixture->setHeight(12);

		$this->assertSame(
			12,
			$this->fixture->getHeight()
		);
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
	public function getVideoListsReturnsInitialValueForObjectStorageContainingTx_JheVimeo_Domain_Model_VideoList() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getVideoLists()
		);
	}

	/**
	 * @test
	 */
	public function setVideoListsForObjectStorageContainingTx_JheVimeo_Domain_Model_VideoListSetsVideoLists() { 
		$videoList = new Tx_JheVimeo_Domain_Model_VideoList();
		$objectStorageHoldingExactlyOneVideoLists = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneVideoLists->attach($videoList);
		$this->fixture->setVideoLists($objectStorageHoldingExactlyOneVideoLists);

		$this->assertSame(
			$objectStorageHoldingExactlyOneVideoLists,
			$this->fixture->getVideoLists()
		);
	}
	
	/**
	 * @test
	 */
	public function addVideoListToObjectStorageHoldingVideoLists() {
		$videoList = new Tx_JheVimeo_Domain_Model_VideoList();
		$objectStorageHoldingExactlyOneVideoList = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneVideoList->attach($videoList);
		$this->fixture->addVideoList($videoList);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneVideoList,
			$this->fixture->getVideoLists()
		);
	}

	/**
	 * @test
	 */
	public function removeVideoListFromObjectStorageHoldingVideoLists() {
		$videoList = new Tx_JheVimeo_Domain_Model_VideoList();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($videoList);
		$localObjectStorage->detach($videoList);
		$this->fixture->addVideoList($videoList);
		$this->fixture->removeVideoList($videoList);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getVideoLists()
		);
	}
	
}
?>