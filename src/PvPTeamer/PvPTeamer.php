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
 $this->a = 0;
 $this->b = 0;
 }

function onDisable(){
$this->getLogger()->info("PvPTeamer has been disabled.See you:D");
}

function onJoin(PlayerJoinEvent $e){
 $p = $p->getPlayer();
 if($p->loggedIn()){
  $n = $p->getName();
  $a = $this->a;
  $b = $this->b;
  if($a < $b){
   $p->sendMessage("[PvPTeamer]You are A team!");
   $p->setNameTag("[A]".$n."");
   $p->setDisplayName("[A]".$n."");
   $this->a = $a + 1;
 }elseif($a > $b){
   $p->sendMessage("[PvPTeamer]You are B team!");
   $p->setNameTag("[B]".$n."");
   $p->setDisplayName("[B]".$n."");
   $this->b = $b + 1;
 }else{
   $p->sendMessage("[PvPTeamer]You are A team!");
   $p->setNameTag("[A]".$n."");
   $p->setDisplayName("[A]".$n."");
   $this->a = $a + 1;
  }
 }
}

function onQuit(PlayerQuitEvent $e){
 $p = $e->getPlayer();
 if($p->LoggedIn){
  $t = $p->getDisplayName();
  $a = $this->a;
  $b = $this->b;
  $aa = explode("]",$t);
  $bb = str_replace("[","",$aa[0]);
  if($b == "A"){
   $this->a = $a - 1;
  }else{
   $this->b = $b - 1;
  }
 }
}

function onEntityDamage(EntityDamageEvent $event){
 $entity = $event->getEntity();
 if($entity instanceof Player && $event->getCause() == 1){
  if($event->getDamager() instanceof Player){
   $p = $event->getDamager()->getPlayer();
   $e = $event->getEntity();
   $et = $e->getName();
   $pt = $p->getName();
   $pa = explode("]",$pt);
   $pb = str_replace("[","",$pa[0]);
   $ea = explode("]",$et);
   $eb = str_replace("[","",$ea[0]);
  }
 }
}
}
