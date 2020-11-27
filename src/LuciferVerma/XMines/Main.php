<?php

namespace LuciferVerma\XMines;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;

use pocketmine\item\Item;

use pocketmine\event\Listener;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;

use pocketmine\utils\TextFormat;

class main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder()):
        $this->saveDataFolder();
        $this->getResource("config.yml);
    }
    
    public function onDisable(){
        $this->getLogger()->info("XMines Disabled");
    }
    
    public function breakBlock(BlockBreakEvent $event){
        $world = $this->getConfig()->get("world_name");
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $blocks = $this->getConfig()->get("ore_id");
        if(!in_array($block->getId(), $blocks) && $player->getLevel()->getName() === $world){
            $event->setCancelled(true);
        }
        
    }
    
}
