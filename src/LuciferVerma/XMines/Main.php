<?php

namespace LuciferVerma\XMines;

use pocketmine\Server;

use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\block\Block;

use pocketmine\level\Level;

use pocketmine\item\Item;

use pocketmine\event\Listener;

use pocketmine\event\block\BlockBreakEvent;

use pocketmine\event\block\BlockPlaceEvent;

use pocketmine\utils\Config;

use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

    public function onEnable(){

        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        $this->saveResource("config.yml");

        $this->config = new Config($this->getDataFolder()."config.yml", Config::YAML);

        

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
