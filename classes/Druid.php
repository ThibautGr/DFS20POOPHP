<?php


class Druid extends Character
{
protected $natureForce = 0 ;
protected $rodeDamage = 10;
public function attack($target){
    $diceTen = rand(1,10);
    $diceseven = rand(1,7);


    if ($this->natureForce !=0) {
        $this->natureForce --;
        //first get all hp up
        if ($diceseven == 1){
             $this->bigaheal();
            $status = "$this->name ce soigne de touts ces poitn de vie il lui reste $this->lifePoints, il reste $this->natureForce tour avec appelle de la nature";
        }
        else if ($diceseven > 1){
                $target->setLifePoints($this->rodeDamage*1.5);
             $status = "Druid tape avec son baton magic et inflige, il reste $target->lifePoints pv à $target->name, il reste $this->natureForce tour avec appelle de la nature";
        }
        return $status;
    }


    else{
        if ($diceTen == 1){
             $this->bigaheal();
            $status = "$this->name ce soigne de touts ces poitn de vie il lui reste $this->lifePoints pv à $this->name";
        }
        else if (($diceTen >= 2  or $diceTen <=4)){
             $this->riseTheNatureForce();
            $status = "$this->name lance un appelle a la nature";
        }
        else{
             $target->setLifePoints($this->rodeDamage);
            $status = "balance un coup de baton il reste $target->lifePoints pv à $target->name";
        }
        return $status;
    }
}

private function bigaheal(){
    return $this->lifePoints = 100;
}

private function riseTheNatureForce(){
    $this->natureForce = 3;
}


}