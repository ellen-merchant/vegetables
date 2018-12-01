<?php

class VegetablesCest
{
    /**
     * @test
     * @param AcceptanceTester $I
     */
    public function testVegetablesPageLoads(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        $I->canSeeResponseCodeIs(200);
    }

    /**
     * @test
     * @param AcceptanceTester $I
     */
    public function testVegetablesRecordsLoad(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        $I->canSeeResponseCodeIs(200);
        $I->see('Broccoli');
        $I->see('Asparagus');
        $I->see('Spinach');
        $I->see('Cauliflower');
        $I->see('Onion');
        $I->see('Peas');
        $I->see('Carrot');
        $I->see('Turnip');
        $I->see('Tomato');
    }
}
