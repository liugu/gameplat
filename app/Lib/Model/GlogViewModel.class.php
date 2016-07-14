<?php

class GlogViewModel extends ViewModel
{
  public $viewFields = array( 	
  'game_log' =>array('username','logintime'),
  		
  'server'=>array('sid','servername','_on'=>'server.sid=game_log.sid'),
  		
  'game' =>array('gid','gamename','game_web','game_payurl','game_guide','gamepic','smallpic','_on'=>'game.gid=game_log.gid'),
 ); 
}
?>