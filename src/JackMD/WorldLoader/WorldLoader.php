<?php
declare(strict_types = 1);

namespace JackMD\WorldLoader;

use pocketmine\plugin\PluginBase;
use function array_diff;
use function scandir;

class WorldLoader extends PluginBase{

	public function onEnable(){
		foreach(array_diff(scandir($this->getServer()->getDataPath() . "worlds"), ["..", "."]) as $levelName){
			if($this->getServer()->loadLevel($levelName)){
				$this->getLogger()->debug("Successfully loaded §6${levelName}");
			}
		}
	}
}