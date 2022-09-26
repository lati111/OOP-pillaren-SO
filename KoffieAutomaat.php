<?php
abstract class AlgemeneKoffieMachine {
    abstract protected function maakKoffie(string $soort, float $sterkte);
    abstract protected function vulBonenBij(int $bonen);
    abstract protected function vulMelkBij(int $melk);
    abstract protected function leesBonenUit();
    abstract protected function leesMelkUit();
}

class KoffieAutomaat extends AlgemeneKoffieMachine {
    private int $bonenCount;
    private float $melkCount;
    public array $koffieList = [];
    private $error;

    function __construct(array $koffieList, int $aantalBonen, float $hoeveelheidMeld) {
        $this->koffieList = $koffieList;
        $this->bonenCount = $aantalBonen;
        $this->melkCount = $hoeveelheidMeld;
    }

    public function maakKoffie(string $soort, float $sterkte = 1) {
        if (is_array($this->koffieList[$soort])) {
            $koffieTemplate = $this->koffieList[$soort];
            $bonen = ($koffieTemplate["bonen"] * $sterkte);
            if ($bonen >= $this->bonenCount) {
                $this->error = "Niet genoeg bonen!"; return false;
            } else if ($koffieTemplate["melk"] >= $this->melkCount) {
                $this->error = "Niet genoeg melk!"; return false;
            } else {
                //zet de koffie
                $this->melkCount -= $koffieTemplate["melk"];
                $this->bonenCount -= $bonen;
                return true;
            }
        } else {
            $this->error = "Koffie type bestaat niet"; return false;
        }
    }

    public function vulBonenBij(int $bonen) {
        $this->bonenCount += $bonen;
    }

    public function vulMelkBij(int $melk) {
        $this->melkCount += $melk;
    }

    public function leesBonenUit() {
        return $this->bonenCount;
    }

    public function leesMelkUit() {
        return $this->melkCount;
    }

    public function getError() {
        $error = $this->error;
        $this->error = null;
        return $error;
    }

}

