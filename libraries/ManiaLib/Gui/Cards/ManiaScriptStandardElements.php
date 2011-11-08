<?php
/**
 * ManiaLib - Lightweight PHP framework for Manialinks
 * 
 * @copyright   Copyright (c) 2009-2011 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @version     $Revision$:
 * @author      $Author$:
 * @date        $Date$:
 */

namespace ManiaLib\Gui\Cards;

use ManiaLib\Gui\Manialink;
use ManiaLib\Gui\Elements\Bgs1;
use ManiaLib\Gui\Elements\Bgs1InRace;
use ManiaLib\Gui\Elements\Label;
use ManiaLib\Gui\Elements\Button;

/**
 * The ManiaScript framework uses standard UI elements such as dialogs and 
 * tooltips. Someday when we can dyanmically create elements in the page with
 * maniascript we'll do that, in the meantime we just use a card for easy
 * integration...
 */
class ManiaScriptStandardElements extends \ManiaLib\Gui\Elements\Spacer
{

	function preFilter()
	{
		Manialink::beginFrame(320, 0, 4);
		Manialink::setFrameId('manialib-dialog');
		{
			$ui = new Bgs1(320, 200);
			$ui->setAlign('center', 'center');
			$ui->setSubStyle(Bgs1::BgDialogBlur);
			$ui->setScriptEvents();
			$ui->save();

			Manialink::beginFrame(-60, 35, 0.1);
			{
				
				$ui = new Bgs1(123, 63);
				$ui->setSubStyle(Bgs1::Shadow);
				$ui->save();
				
				$ui = new \ManiaLib\Gui\Elements\Quad(120, 60);
				$ui->setPosition(1.5, -1.5, 0.1);
				$ui->setBgcolor('fffd');
				$ui->save();

				$ui = new Label(120);
				$ui->setAlign('center', 'center');
				$ui->setPosition(60, -25, 0.8);
				$ui->enableAutonewline();
				$ui->setId('manialib-dialog-message');
				$ui->setStyle(Label::TextTips);
				$ui->setText('Are you sure?');
				$ui->save();

				$ui = new Button();
				$ui->setHalign('right');
				$ui->setPosition(60 - 5, -47, 0.8);
				$ui->setText('Yes');
				$ui->setId('manialib-dialog-yes');
				$ui->setScriptEvents();
				$ui->save();

				$ui = new Button();
				$ui->setPosition(60 + 5, -47, 0.8);
				$ui->setText('No');
				$ui->setId('manialib-dialog-no');
				$ui->setScriptEvents();
				$ui->save();
			}
			Manialink::endFrame();
		}
		Manialink::endFrame();

		Manialink::beginFrame(300, 0, 0);
		Manialink::setFrameId('manialib-autotip');
		{
			$ui = new Bgs1InRace(75, 11);
			$ui->setSubStyle(Bgs1InRace::BgTitle3_3);
			$ui->save();

			$ui = new Label(67);
			$ui->setValign('center2');
			$ui->setPosition(4, -5.5, 0.1);
			$ui->setStyle(Label::TextTips);
			$ui->setId('manialib-autotip-text');
			$ui->save();
		}
		Manialink::endFrame();
	}

}

?>