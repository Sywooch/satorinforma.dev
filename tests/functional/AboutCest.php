<?php

class AboutCest
{
    public function checkAbout(FunctionalTester $I)
    {
        $I->amOnRoute('/about-us');
        $I->see('About us', 'h1');
    }
}
