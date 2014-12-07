<?php
namespace Financial\V1\Rest\Expenses;

class ExpensesResourceFactory
{
    public function __invoke($services)
    {
        return new ExpensesResource();
    }
}
