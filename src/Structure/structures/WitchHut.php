<?php
namespace Structure\structures;

use pocketmine\math\Vector3;
use pocketmine\block\{BlockIds, SpruceWoodStairs};

class WitchHut extends BaseStructure{

    public function generate(bool $hasWitch = false) : float
    {
        $time = microtime(true);
        $this->fill(new Vector3(1, 1, 2), new Vector3(5, 4, 7), BlockIds::WOOD, 1); // hut body
        $this->fill(new Vector3(2, 2, 3), new Vector3(4, 3, 6), BlockIds::AIR); // hut body
        $this->fill(new Vector3(1, 1, 1), new Vector3(5, 1, 1), BlockIds::WOOD, 1); // hut steps
        $this->fill(new Vector3(2, 1, 0), new Vector3(4, 1, 0), BlockIds::WOOD, 1); // hut steps
        $this->fill(new Vector3(4, 2, 2), new Vector3(4, 3, 2), BlockIds::AIR); // hut door
        $this->fill(new Vector3(5, 3, 4), new Vector3(5, 3, 5), BlockIds::AIR); // left window
        $this->setBlock(new Vector3(1, 3, 4), BlockIds::AIR);
        $this->setTile(new Vector3(1, 3, 5), BlockIds::FLOWER_POT_BLOCK, 38, 1);
        $this->setBlock(new Vector3(2, 3, 2), BlockIds::FENCE);
        $this->setBlock(new Vector3(3, 3, 7), BlockIds::FENCE);

        $stairsN = new SpruceWoodStairs(Vector3::SIDE_SOUTH);
        $this->fill(new Vector3(0, 4, 1), new Vector3(6, 4, 1), $stairsN);
        $stairsE = new SpruceWoodStairs(Vector3::SIDE_WEST);
        $this->fill(new Vector3(6, 4, 2), new Vector3(6, 4, 7), $stairsE);
        $stairsS = new SpruceWoodStairs(Vector3::SIDE_NORTH);
        $this->fill(new Vector3(0, 4, 8), new Vector3(6, 4, 8), $stairsS);
        $stairsW = new SpruceWoodStairs(Vector3::SIDE_EAST);
        $this->fill(new Vector3(0, 4, 2), new Vector3(0, 4, 7), $stairsW);

        $this->fill(new Vector3(1, 0, 2), new Vector3(1, 3, 2), BlockIds::LOG);
        $this->fill(new Vector3(5, 0, 2), new Vector3(5, 3, 2), BlockIds::LOG);
        $this->fill(new Vector3(1, 0, 7), new Vector3(1, 3, 7), BlockIds::LOG);
        $this->fill(new Vector3(5, 0, 7), new Vector3(5, 3, 7), BlockIds::LOG);

        $this->setBlock(new Vector3(1, 2, 1), BlockIds::FENCE);
        $this->setBlock(new Vector3(5, 2, 1), BlockIds::FENCE);

        $this->setBlock(new Vector3(4, 2, 6), BlockIds::CAULDRON_BLOCK);
        $this->setBlock(new Vector3(3, 2, 6), BlockIds::WORKBENCH);

        $this->setBlock(new Vector3(1, -1, 2), BlockIds::LOG);
        $this->setBlock(new Vector3(5, -1, 2), BlockIds::LOG);
        $this->setBlock(new Vector3(1, -1, 7), BlockIds::LOG);
        $this->setBlock(new Vector3(5, -1, 7), BlockIds::LOG);

        if (!$hasWitch) {
            // TODO: uncomment this later
            // hasWitch = $this->spawnMob(new Vector3(2, 2, 5), EntityType.WITCH);
            // I believe vanilla 1.8 tries to spawn the witch on different floor levels
        }
        return microtime(true) - $time;
    }
}