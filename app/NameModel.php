<?php

namespace App;

class NameModel {

    private $inputs;
    public $isAll;
    public $isClone;
    public $category;
    public $name;
    public $names;
    public $description;
    public $title;

    public function __construct( $session ) {
        $this->inputs = $session;

        $this->isAllNames();
        $this->loadAllNames();
        $this->applyConditions();
        $this->loadCategoryDescriptionAndTitle();
    }

    private function loadCategoryDescriptionAndTitle()
    {
        switch( $this->category ) {
            case 'normal':
                $this->title = 'Normal Name';
                $this->description = "Kojima's early work includes lots of characters that have names that are widely considered to be 'normal.' Was this just because, in the early years, he didn't have the power to say 'I'm Hideo Kojima, I can name someone Die-Hardman if I want to' without people questioning him? Probably.";
                break;
            case 'occupational':
                $this->title = 'Occupational Name';
                $this->description = "Kojima's characters tend to be driven by the work that they do. That often carries over to their names. You, too, can be nothing more than your job.";
                break;
            case 'horny':
                $this->title = 'Horny Name';
                $this->description = "Kojima's characters and stories are irrevocably horny. Weirdly horny, sure, but horny nonetheless.";
                break;
            case 'the':
                $this->title = 'The Name';
                $this->description = "Kojima loves to make people have names that start with the word 'The' and they usually symbolize fears or unstoppable forces. You are now that unstoppable force.";
                break;
            case 'cool':
                $this->title = 'Cool Name';
                $this->description = "Kojima loves to be cool. Sometimes, his idea of cool is a bit strange, but it is always cool to Hideo Kojima, and that's what matters.";
                break;
            case 'violent':
                $this->title = 'Violent Name';
                $this->description = "Sometimes a Kojima name can be very threatening and violent, like Sniper Wolf, or The Fury. Now you can also be threatening and violent.";
                break;
            case 'subtext':
                $this->title = 'Name That Lacks Subtext';
                $this->description = "Sometimes, Kojima gives up and just names a character exactly what they are. Congratulations. You are exactly what you do.";
                break;
        }
    }

    private function isAllNames()
    {
        if( $this->inputs['numberOfNames'] != 1 ) {
            $this->isAll = true;
        } else {
            $this->isAll = false;
        }
    }

    private function applyConditions() {
        $names = [];
        foreach( $this->names as $category => $name ) {
            // man condition
            if( $this->inputs['4_1'] == 4 ) {
                $name = $name . 'man';
            }

            // the condition condition
            switch( $this->inputs['4_2'] ) {
                case 6:
                    $name = $this->insertTheNameCondition( $name, 'Big' );
                    break;
                case 7:
                    $name = $this->insertTheNameCondition( $name, 'Old' );
                    break;
                case 8:
                    $name = $this->insertTheNameCondition( $name, $this->inputs['2_11'] );
                    break;
                default:
                    $name = $name;
                    break;
            }

            // the clone condition
            if( $this->inputs['4_3'] == 12 ) {
                $this->isClone = true;
            } else {
                $this->isClone = false;
            }

            $names[$category] = $name;
        }

        $this->names = $names;
    }

    private function insertTheNameCondition( $name, $condition )
    {
        $name = '';
        if( $this->category == 'the' ) {
            $name = str_replace('the','',$name);
            $name = 'The ' . $condition . $name;
        } else {
            $name = $condition . ' ' . $name;
        }
        return $name;
    }

    private function loadAllNames()
    {
        $this->names = [
            'normal' => $this->loadNormalName(),
            'occupational' => $this->loadOccupationalName(),
            'horny' => $this->loadHornyName(),
            'the' => $this->loadTheName(),
            'cool' => $this->loadCoolName(),
            'violent' => $this->loadViolentName(),
            'subtext' => $this->loadSubtextFreeName()
        ];
        $this->loadName();
        unset( $this->names[ $this->category ] );
    }

    private function loadName()
    {
        switch( $this->inputs['5_1'] ) {
            case 1:
                // normal name
                $name = $this->loadNormalName();
                $this->category = 'normal';
                break;
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                // occupational name
                $name = $this->loadOccupationalName();
                $this->category = 'occupational';
                break;
            case 7:
            case 8:
            case 9:
            case 10:
                // horny name
                $name = $this->loadHornyName();
                $this->category = 'horny';
                break;
            case 11:
            case 12:
            case 13:
                // the name
                $name = $this->loadTheName();
                $this->category = 'the';
                break;
            case 14:
            case 15:
            case 16:
            case 17:
                // cool name
                $name = $this->loadCoolName();
                $this->category = 'cool';
                break;
            case 18:
            case 19:
                // violent name
                $name = $this->loadViolentName();
                $this->category = 'violent';
                break;
            case 20:
                $name = $this->loadSubtextFreeName();
                $this->category = 'subtext';
                break;
        }
        $this->name = $name;
    }

    private function loadNormalName()
    {
        $name = $this->inputs['2_1'];
        return $name;
    }

    private function loadOccupationalName()
    {
        $lastName = $this->inputs['2_2'];
        switch( $this->diceRoller( 4 ) ) {
            case 1:
                $firstName = $this->inputs['2_15'];
                break;
            case 2:
                $firstName = $this->inputs['2_6'];
                break;
            case 3:
                $firstName = $this->inputs['2_13'];
                break;
            case 4:
                $firstName = $this->inputs['3_16'];
                break;
        }

        return $firstName . ' ' . $lastName;
    }

    private function loadHornyName()
    {
        $lastName = $this->inputs['2_3'];
        switch( $this->diceRoller( 4 ) ) {
            case 1:
                $firstName = $this->inputs['2_12'];
                break;
            case 2:
                $firstName = 'Naked';
                break;
            case 3:
                $firstName = $this->inputs['2_6'];
                break;
            case 4:
                $firstName = $this->inputs['2_14'];
                break;
        }
        return $firstName . ' ' . $lastName;
    }

    private function loadTheName()
    {
        $firstName = 'The';
        switch( $this->diceRoller( 4 ) ) {
            case 1:
                $lastName = $this->inputs['2_8'];
                break;
            case 2:
                $lastName = $this->inputs['2_9'];
                break;
            case 3:
                $lastName = $this->inputs['2_4'];
                break;
            case 4:
                $lastName = $this->inputs['3_20'];
                break;
        }
        return $firstName . ' ' . $lastName;
    }

    private function loadCoolName()
    {
        $firstName = $this->inputs['3_21'];
        switch( $this->diceRoller( 6 ) ) {
            case 1:
                $lastName = $this->inputs['3_17'];
                break;
            case 2:
                $lastName = $this->inputs['3_18'];
                break;
            case 3:
                $lastName = $this->inputs['3_19'];
                break;
            case 4:
                $lastName = $this->inputs['2_6'];
                break;
            case 5:
                $lastName = $this->inputs['2_8'];
                break;
            case 6:
                $lastName = $this->inputs['2_13'];
                break;
        }
        return $firstName . ' ' . $lastName;
    }

    private function loadViolentName()
    {
        $firstName = $this->inputs['2_5'];
        switch( $this->diceRoller( 4 ) ) {
            case 1:
                $lastName = $this->inputs['3_19'];
                break;
            case 2:
                $lastName = $this->inputs['2_12'];
                break;
            case 3:
                $lastName = $this->inputs['3_20'];
                break;
            case 4:
                $lastName = $this->inputs['2_9'];
                break;
        }
        return $firstName . ' ' . $lastName;
    }

    private function loadSubtextFreeName()
    {
        $name = $this->inputs['2_10'];
        return $name;
    }

    private function diceRoller( $dn )
    {
        return rand( 1, $dn );
    }
}
