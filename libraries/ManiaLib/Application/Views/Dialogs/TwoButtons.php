<?php
/**
 * ManiaLib - Lightweight PHP framework for Manialinks
 * 
 * @see         http://code.google.com/p/manialib/
 * @copyright   Copyright (c) 2009-2011 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @version     $Revision$:
 * @author      $Author$:
 * @date        $Date$:
 */

namespace ManiaLib\Application\Views\Dialogs;

use ManiaLib\Gui\Manialink;
use ManiaLib\Gui\Elements\Bgs1;
use ManiaLib\Gui\Elements\Quad;

/**
 * @deprecated
 */
class TwoButtons extends \ManiaLib\Application\View implements DialogInterface
{

	function display()
	{
		$ui = new Bgs1(320, 200);
		$ui->setAlign('center', 'center');
		$ui->setPosition(0, 0, 14);
		$ui->setSubStyle(Bgs1::BgWindow1);
		$ui->save();

		Manialink::beginFrame(0, 0, 15);
		{
			$ui = new \ManiaLib\Gui\Cards\Dialogs\TwoButtons(
					$this->response->dialog->width, $this->response->dialog->height);
			$ui->setAlign('center', 'center');
			$ui->title->setText($this->response->dialog->title);
			$ui->text->setText($this->response->dialog->message);
			$ui->button->setText($this->response->dialog->buttonLabel);
			$ui->button->setManiazone($this->response->dialog->buttonManialink);
			if($this->response->dialog->buttonAddplayerid)
			{
				$ui->button->addPlayerId();
			}
			$ui->button2->setText($this->response->dialog->button2Label);
			$ui->button2->setManiazone($this->response->dialog->button2Manialink);
			if($this->response->dialog->button2Addplayerid)
			{
				$ui->button->addPlayerId();
			}
			$ui->save();
		}
		Manialink::endFrame();
	}

}

?>