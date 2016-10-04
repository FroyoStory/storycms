<?php

class FrontLandingTest extends TestCase
{
    public function testVisitLanding()
    {
        $this->visit('/');
        $this->see('Hello');
    }
}
