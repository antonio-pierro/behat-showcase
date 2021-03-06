<?php
# features/bootstrap/FeatureContext.php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class BasketContext implements Context, SnippetAcceptingContext
{
    /**
     * @Then the basket price is :arg1
     */
    public function theBasketPriceIs($arg1)
    {
        if ($this->basket->price() != $arg1) {
            throw new Exception("The prize is wrong");  
        }
    }

    /**
     * @Given an empty basket
     */
    public function anEmptyBasket()
    {
        $this->basket = new Basket();
    }

    /**
     * @Given a product which costs :prize is added to the basket
     */
     
    public function aProductWhichCostsIsAddedToTheBasket($prize)
    {
        $product = new Product($prize);

        $this->basket->add($product);
    }

}
