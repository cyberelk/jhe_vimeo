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
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$videos = $this->videoRepository->findAll();
		$this->view->assign('videos', $videos);
	}

	/**
	 * action show
	 *
	 * @param Tx_JheVimeo_Domain_Model_Video $video
	 * @return void
	 */
	public function showAction(Tx_JheVimeo_Domain_Model_Video $video) {
		$this->view->assign('video', $video);
	}

	/**
	 * action new
	 *
	 * @param Tx_JheVimeo_Domain_Model_Video $newVideo
	 * @dontvalidate $newVideo
	 * @return void
	 */
	public function newAction(Tx_JheVimeo_Domain_Model_Video $newVideo = NULL) {
		$this->view->assign('newVideo', $newVideo);
	}

	/**
	 * action create
	 *
	 * @param Tx_JheVimeo_Domain_Model_Video $newVideo
	 * @return void
	 */
	public function createAction(Tx_JheVimeo_Domain_Model_Video $newVideo) {
		$this->videoRepository->add($newVideo);
		$this->flashMessageContainer->add('Your new Video was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param Tx_JheVimeo_Domain_Model_Video $video
	 * @return void
	 */
	public function editAction(Tx_JheVimeo_Domain_Model_Video $video) {
		$this->view->assign('video', $video);
	}

	/**
	 * action update
	 *
	 * @param Tx_JheVimeo_Domain_Model_Video $video
	 * @return void
	 */
	public function updateAction(Tx_JheVimeo_Domain_Model_Video $video) {
		$this->videoRepository->update($video);
		$this->flashMessageContainer->add('Your Video was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param Tx_JheVimeo_Domain_Model_Video $video
	 * @return void
	 */
	public function deleteAction(Tx_JheVimeo_Domain_Model_Video $video) {
		$this->videoRepository->remove($video);
		$this->flashMessageContainer->add('Your Video was removed.');
		$this->redirect('list');
	}

}
?>