<?php

namespace PvPTeamer;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\EntityDamageEvent;
use pocketmine\event\EntityDamageByEntityEvent;
use pocketmine\event\PlayerJoinEvent;
use pocketmine\event\PlayerPreLoginEvent;
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
  $this->a = $this->c->get("A");
  $this->b = $this->c->get("B");
 }

function onDisable(){
 $this->c->set("A", 0);
 $this->c->set("B", 0);
}

function onPreLogin(PlayerPreLoginEvent $e){
 $p = $e->getPlayer();
 $n = $p->getName();
 }

function onJoin(PlayerJoinEvent $e){
 $p = $p->getPlayer();
 if($p->loggedIn()){
  $n = $p->getName();
  if($this->a < $this->b){
   $p->sendMessage("[PvPTeamer]You are A team!");
   $p->setNameTag("[A]".$n."");
   $p->setDisplayName("[A]".$n."");
 }elseif($this->a > $this->b){
   $p->sendMessage("[PvPTeamer]You are B team!");
   $p->setNameTag("[B]".$n."");
   $p->setDisplayName("[B]".$n."");
 }else{
   $p->sendMessage("[PvPTeamer]You are A team!");
   $p->setNameTag("[A]".$n."");
   $p->setDisplayName("[A]".$n."");
  }
 }
}

function onEntityDamage(EntityDamageEvent $e){
}
}
