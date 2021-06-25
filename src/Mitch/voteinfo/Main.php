<?php
    
namespace Mitch\voteinfo;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

use jojoe77777\FormAPI;
use _64FF00\PureChat\PureChat;

class Main extends PluginBase
{
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        if ($sender instanceof Player and $command->getName() == "voteinfo") {
            $this->VoteUI($sender);
        }
        return true;
    }
  
  public function VoteUI(Player $player) {
       $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null) {
      		  $result = $data;
        if ($result === null) {
            return;
            }
        });
        $form->setTitle("§2Vote Infomation");
        $form->setContent("§aVote Rewards");
	$form->setContent("§7x1 Vote Key");
        $form->addButton("Close");
        $player->sendForm($form);
    }
}
