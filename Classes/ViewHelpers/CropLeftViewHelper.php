<?php
/*                                                                     *
 * This file is brought to you by Georg Großberger                     *
 * (c) 2013 by Georg Großberger <contact@grossberger-ge.org>           *
 *                                                                     *
 * It is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License, either version 3       *
 * of the License, or (at your option) any later version.              *
 *                                                                     */

namespace TYPO3Community\Devlog\ViewHelpers;

use TYPO3\CMS\Backend\Utility\IconUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Create an icon out of the severity int
 *
 * @package Devlog
 * @author Georg Großberger <georg@grossberger.at>
 * @copyright 2013 by Georg Großberger
 * @license GPL v3 http://www.gnu.org/licenses/gpl-3.0.txt
 */
class CropLeftViewHelper extends AbstractViewHelper {

	/**
	 * @param string $content
	 * @param integer $maxCharacter
	 * @param string $prepend
	 * @return string
	 */
	public function render($content = NULL, $maxCharacter = 30, $prepend = '... ') {
		if (is_null($content)) {
			$content = (string) $this->renderChildren();
		}

		if (strlen($content) < $maxCharacter) {
			return $content;
		}

		$path = preg_split('/[\/\\\\]/', $content);
		$content = '';

		while (count($path) && strlen($content) < $maxCharacter) {
			$content = '/' . array_pop($path) . $content;
		}

		return $prepend . $content;
	}
}
