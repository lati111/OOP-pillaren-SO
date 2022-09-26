<?php
abstract class Person {
    abstract public function getNaam();
}

class Student extends Person {
    private string $naam;
    private string $opleiding;

    function __construct(string $naam, string $opleiding) {
        $this->naam = $naam;
        $this->opleiding = $opleiding;
    }

    public function toonOpleiding() {
        return $this->opleiding;
    }

    public function getNaam()
    {
        return $this->naam;
    }
}

class Leraar  extends Person {
    private string $naam;
    private string $diploma;

    function __construct(string $naam, string $diploma) {
        $this->naam = $naam;
        $this->diploma = $diploma;
    }

    public function toonDiploa() {
        return $this->diploma;
    }

    public function getNaam()
    {
        return $this->naam;
    }
}

class WerkendeStudent extends Student
{
    private $bedrijf;
    private $functie;

    public function __construct($naam, $opleiding, $bedrijf, $functie)
    {
        $this->naam = $naam;
        $this->opleiding = $opleiding;
        $this->bedrijf = $bedrijf;
        $this->functie = $functie;
    }

    public function getBedrijf()
    {
        return $this->bedrijf;
    }

    public function getFunctie()
    {
        return $this->functie;
    }
}