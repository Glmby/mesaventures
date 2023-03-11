<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Tests\Validations;

use App\Entity\Visite;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Description of VisiteValidationsTest
 *
 * @author bouyg
 */
class VisiteValidationsTest extends KernelTestCase {
    public function GetVisite(): Visite{
        return (new Visite())
        ->setVille("New York")
        ->setPays("USA");
    }
    public function testValidNoteVisite(){
        $visite=$this->GetVisite()-> setNote(10);
        self::bootKernel();
        $this->assertErrors($visite,0);
    }
    public function assertErrors(Visite $visite,int $nbErreursAttendues, string $message=""){
        self::bootKernel();
        $validator=self::getContainer()->get(ValidatorInterface::class);
        $error=$validator->validate($visite);
        return $this->assertCount($nbErreursAttendues, $error, $message);
    }
    public function testNonValidNoteVisite(){
        $visite=$this->GetVisite()->setnote(21);
        $this->assertErrors($visite,1);
    }
    public function testNonValidTempmaxVisite(){
        $visite=$this->GetVisite()
                ->setTempmin(20)
                ->setTempmax(18);
        $this->assertErrors($visite,1, "min=20 et max=18 debrait échouer");
    }
}
