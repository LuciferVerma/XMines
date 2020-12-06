<?php

namespace LuciferVerma\XOreGen;

use pocketmine\block\Block;
use pocketmine\scheduler\Task;

class DelayTask extends Task {

    public $block, $plugin;

    public function __construct(Main $plugin, Block $block) {
        $this->plugin = $plugin;
        $this->block = $block;
    }

    public function onRun(int $currentTick) {
        $this->block->getLevelNonNull()->setBlock($this->block->asVector3(), Block::get($this->block->getId()));
    }
}
