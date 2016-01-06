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
class Tx_JheVimeo_Controller_VideoController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * videoRepository
	 *
	 * @var Tx_JheVimeo_Domain_Repository_VideoRepository
	 */
	protected $videoRepository;

	/**
	 * injectVideoRepository
	 *
	 * @param Tx_JheVimeo_Domain_Repository_VideoRepository $videoRepository
	 * @return void
	 */
	public function injectVideoRepository(Tx_JheVimeo_Domain_Repository_VideoRepository $videoRepository) {
		$this->videoRepository = $videoRepository;
	}

	/**
	 * action showSingleVideo
	 *
	 * @return void
	 */
	public function showSingleVideoAction() {

		$videoDimensions = NULL;

		$video = $this->videoRepository->findByUid($this->settings['video']);

		$videoDimensions['height'] = round((intval($this->settings['width']) * $video->getHeight()) / $video->getWidth(), 0);
		$videoDimensions['width'] = intval($this->settings['width']);

		$this->view->assign('video', $video);
		$this->view->assign('videoDimensions', $videoDimensions);
		$this->view->assign('settings', $this->settings);
	}
}
?>