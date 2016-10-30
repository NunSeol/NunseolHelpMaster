<?php

namespace nunseol;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;

class NunseolHelpMaster extends PluginBase implements Listener {
	private $msg1, $msg2, $msg3, $msg5;
	public function onEnable() {
		@mkdir ( $this->getDataFolder());
		$this->loadConfig();
		$this->getServer()->getPluginManager()->registerEvents( $this, $this );
	}
	public function loadConfig() {
		$this->saveDefaultConfig();
		$this->msg1 = $this->getConfig()->get("message1", "");
		$this->msg2 = $this->getConfig()->get("message2", "");
		$this->msg3 = $this->getConfig()->get("message3", "");
		$this->msg4 = $this->getConfig()->get("message4", "");
		$this->msg5 = $this->getConfig()->get("message5", "");
	}
	public function onCommand(CommandSender $player, Command $command, $label, array $args) {
		$name = $player->getName();
		
		if ($command == "튜토리얼") {
			if ($player->isOP())
			{
				if (! isset ( $args [0] )) {
					$player->sendMessage ( "§6/튜토리얼 [ 서버 | 커뮤니티 | 광질 | 상점 | 문의 ]");
					return true;
				}
			}
			
			if (! $player->isOP())
			{
				if (! isset ( $args [0] )) {
					$player->sendMessage ( "§f==================== §l§6Tutorial§7 - §6SyStem§r§f ====================");
					$player->sendMessage ( "§6[ 플러그인 개발자§7 - §3NunSeol ( 눈설 )§6 ] ");
					$player->sendMessage ( "§6[ $name 님 튜토리얼 꼭 하세요! ] ");
					$player->sendMessage ( "§6[ /튜토리얼 [ 서버 | 커뮤니티 | 광질 | 상점 | 문의 ] ");
					$player->sendMessage ( "§6[ 그럼! $name 님 즐거운 서버 되세요! ] ");
					$player->sendMessage ( "§f==================== §l§6Tutorial§7 - §6SyStem§r§f ====================");
					return true;
				}
			}
			
			switch ($args [0]) {
				case "서버" :
					$player->sendMessage ( "$this->msg1" );
					return true;
					
					case "커뮤니티" :
					$player->sendMessage ( "$this->msg2" );
					return true;
					
					case "광질" :
					$player->sendMessage ( "$this->msg3" );
					return true;
					
					case "상점" :
					$player->sendMessage ( "$this->msg4" );
					return true;
					
					case "문의" :
					$player->sendMessage ( "$this->msg5" );
					return true;
					default:
					return true;
				}
			}
		}
	}