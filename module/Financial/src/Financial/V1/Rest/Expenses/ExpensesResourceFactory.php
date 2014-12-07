<?php
namespace Financial\V1\Rest\Expenses;

class ExpensesResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Financial\V1\Rest\Expenses\ExpensesMapper');
        return new ExpensesResource($mapper);
    }
}
