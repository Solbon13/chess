<?php

class Bishop extends Figure {

    public $force = 30;
    
    public function __construct($color) {
        parent::__construct($color);
    }

    function isMove($xFrom, $yFrom, $xTo, $yTo, $prevY) {
        if (abs($xFrom - $xTo) == abs($yFrom - $yTo))
            return true;
        return false;
    }

    function isMoveAttack($obj, $x, $y){
        $y1 = $y;
        for ($x1 = $x + 1; $x1 < 8; $x1++){  
            $y1++;
            $obj = parent::isAttackBox($obj, $x, $y, $x1, $y1);
            $obj = parent::isTurnBox($obj, $x, $y, $x1, $y1);
            if ($obj -> board[$x1][$y1] != " "){
                break;
            }
        }
        $y1 = $y;
        for ($x1 = $x - 1; $x1 > -1; $x1--){
            $y1++;
            $obj = parent::isAttackBox($obj, $x, $y, $x1, $y1);
            $obj = parent::isTurnBox($obj, $x, $y, $x1, $y1);
            if ($obj -> board[$x1][$y1] != " "){
                break;
            }
        }
        $x1 = $x;
        for ($y1 = $y - 1; $y1 > -1; $y1--){
            $x1++;
            $obj = parent::isAttackBox($obj, $x, $y, $x1, $y1);
            $obj = parent::isTurnBox($obj, $x, $y, $x1, $y1);
            if ($obj -> board[$x1][$y1] != " "){
                break;
            }
        }
        $x1 = $x;
        for ($y1 = $y - 1; $y1 > -1; $y1--){
            $x1--;
            $obj = parent::isAttackBox($obj, $x, $y, $x1, $y1);
            $obj = parent::isTurnBox($obj, $x, $y, $x1, $y1);
            if ($obj -> board[$x1][$y1] != " "){
                break;
            }
        }
        return $obj;
    }
}