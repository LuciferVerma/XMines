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
    }
    
    public function onDisable(){
        $this->getLogger()->info("XMines Disabled");
    }
    
    public function breakBlock(BlockBreakEvent $event){
        
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $blocks = [14, 15, 16, 21, 56, 73, 129, 153]; //put the IDs of blocks you want players to be able to mine
        if(!in_array($block->getId(), $blocks) && $player->getLevel()->getName() === "The Mines"){
            $event->setCancelled(true);
        }
        
    }
    
}