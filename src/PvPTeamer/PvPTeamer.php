<?php

namespace PvPTeamer;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\EntityDamageEvent;
use pocketmine\event\EntityDamageByEntityEvent;
use pocketmine\event\PlayerJoinEvent;
use pocketmine\event\PlayerQuitEvent;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\Entity\entity;

class PvPTeamer extends PluginBase implements Listener{

function onLoad(){
 $this->getLogger()->info("PvPTeamer Loaded!made by @musaichi1");
}

function onEnable(){
 $this->getServer()->getPluginManager()->registerEvents($this, $this);
 if(!file_exists($this->getDataFolder()))
  @mkdir($this->getDataFolder(), 0755, true);
  $this->c = new Config($this->getDataFolder()."system.yml",Config::YAML,array(
"A" => 0,
"B" => 0,
));
  $this->c->save();
 }

function onDisable(){
 $this->c->set("A", 0);
 $this->c->set("B", 0);
}
}
