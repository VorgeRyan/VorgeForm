<?php

namespace VorgeForm;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

class main extends PluginBase implements Listener {

    public function onEnable(){
        $this->getLogger()->info("VorgeForm has been Enabled");
    }

    public function  onDisable(){
        $this->getLogger()->info("VorgeForm has been dissabled");
    }

    public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {

        switch($cmd->getName()){
            case"north":
                $sender->sendMessage("Join NorthPractice Discord->discord.gg/Ajwpncss");
        }
    return true;
    }

    public function form($player){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $player, int $data = null){
            $result = $data;
            if($result === null){
                return true;
            }
            switch($result){
                case 0:
                    $player->sendMessage("1.No swearing 2.No DDOS threats or leaking IP's. 3. Dont be disrespectful towards other players or staff members. 4. Have fun!");
                break;

                case 1:
                    $player->sendMessage("§1North §ePractice §1Discord -> discord.gg/Ajwpncss");
                break;
            }
        });
        $form->setTitle("§1North §eForm");
        $form->setContent("§1North §cPractice §bInfo");
        $form->addButton("§9Rules");
        $form->addButton("§1Discord");
        $form->sendToPlayer($player);
        return $form;
    }

}