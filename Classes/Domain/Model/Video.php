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
 *  the Free Software Foundation; either version 3 of the License, or
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
 *
 *
 * @package jhe_vimeo
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_JheVimeo_Domain_Model_Video extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * vimeoid
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $vimeoid;

	/**
	 * width
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $width;

	/**
	 * height
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $height;

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * videoLists
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_JheVimeo_Domain_Model_VideoList>
	 */
	protected $videoLists;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->videoLists = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the vimeoid
	 *
	 * @return string $vimeoid
	 */
	public function getVimeoid() {
		return $this->vimeoid;
	}

	/**
	 * Sets the vimeoid
	 *
	 * @param string $vimeoid
	 * @return void
	 */
	public function setVimeoid($vimeoid) {
		$this->vimeoid = $vimeoid;
	}

	/**
	 * Returns the width
	 *
	 * @return integer $width
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * Sets the width
	 *
	 * @param integer $width
	 * @return void
	 */
	public function setWidth($width) {
		$this->width = $width;
	}

	/**
	 * Returns the height
	 *
	 * @return integer $height
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * Sets the height
	 *
	 * @param integer $height
	 * @return void
	 */
	public function setHeight($height) {
		$this->height = $height;
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Adds a VideoList
	 *
	 * @param Tx_JheVimeo_Domain_Model_VideoList $videoList
	 * @return void
	 */
	public function addVideoList(Tx_JheVimeo_Domain_Model_VideoList $videoList) {
		$this->videoLists->attach($videoList);
	}

	/**
	 * Removes a VideoList
	 *
	 * @param Tx_JheVimeo_Domain_Model_VideoList $videoListToRemove The VideoList to be removed
	 * @return void
	 */
	public function removeVideoList(Tx_JheVimeo_Domain_Model_VideoList $videoListToRemove) {
		$this->videoLists->detach($videoListToRemove);
	}

	/**
	 * Returns the videoLists
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_JheVimeo_Domain_Model_VideoList> $videoLists
	 */
	public function getVideoLists() {
		return $this->videoLists;
	}

	/**
	 * Sets the videoLists
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_JheVimeo_Domain_Model_VideoList> $videoLists
	 * @return void
	 */
	public function setVideoLists(Tx_Extbase_Persistence_ObjectStorage $videoLists) {
		$this->videoLists = $videoLists;
	}

}
?>