<?php

interface BudgetInterface{
    public function cost(): float;
}

class BasicBudget implements BudgetInterface{
    private float $hours;
    private float $hourlyRate;
    public function __construct(float $hours, float $hourlyRate)
    {
        $this->hours = $hours;
        $this->hourlyRate = $hourlyRate;
    }
    public function cost(): float
    {
        return $this->hours * $this->hourlyRate;
    }
}

class BudgetDecorator implements BudgetInterface{
    private BudgetInterface $budget;
    public function __construct(BudgetInterface $budget)
    {
        $this->budget = $budget;
    }
    public function cost(): float
    {
        return $this->budget->cost();
    }
}

class ForingBudgetDecorator extends BudgetDecorator{
    const EXCHANGE_RATE = 1.5;
    
    public function cost(): float
    {
        return parent::cost() * self::EXCHANGE_RATE;
    }
}

class CustommBudgetDecorator extends BudgetDecorator{
    const DISCOUNT = 0.9;
    
    public function cost(): float
    {
        return parent::cost() * self::DISCOUNT;
    }
}

$budget = new BasicBudget(10, 100);
echo $budget->cost();
echo "<br>";
$budgetForing = new ForingBudgetDecorator($budget);
echo $budgetForing->cost();
echo "<br>";
$budgetCustom = new CustommBudgetDecorator($budget);
echo $budgetCustom->cost();