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
class Tx_JheVimeo_Domain_Model_VideoList extends Tx_Extbase_DomainObject_AbstractEntity {

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
	 * videos
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_JheVimeo_Domain_Model_Video>
	 */
	protected $videos;

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
		$this->videos = new Tx_Extbase_Persistence_ObjectStorage();
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
	 * Adds a Video
	 *
	 * @param Tx_JheVimeo_Domain_Model_Video $video
	 * @return void
	 */
	public function addVideo(Tx_JheVimeo_Domain_Model_Video $video) {
		$this->videos->attach($video);
	}

	/**
	 * Removes a Video
	 *
	 * @param Tx_JheVimeo_Domain_Model_Video $videoToRemove The Video to be removed
	 * @return void
	 */
	public function removeVideo(Tx_JheVimeo_Domain_Model_Video $videoToRemove) {
		$this->videos->detach($videoToRemove);
	}

	/**
	 * Returns the videos
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_JheVimeo_Domain_Model_Video> $videos
	 */
	public function getVideos() {
		return $this->videos;
	}

	/**
	 * Sets the videos
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_JheVimeo_Domain_Model_Video> $videos
	 * @return void
	 */
	public function setVideos(Tx_Extbase_Persistence_ObjectStorage $videos) {
		$this->videos = $videos;
	}

}
?>