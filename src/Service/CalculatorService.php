<?php

namespace App\Service;

use App\Enum\CalculationTypesEnum;

class CalculatorService
{
    public function calculateNumbers($first_number, $second_number, $calculation_type)
    {
        if ($calculation_type == CalculationTypesEnum::PLUS_CALCULATION_KEY) {
            $calculation_result = $this->plusFunction($first_number, $second_number);

        } elseif ($calculation_type == CalculationTypesEnum::MINUS_CALCULATION_KEY) {
            $calculation_result = $this->minusFunction($first_number, $second_number);

        } elseif ($calculation_type == CalculationTypesEnum::MULTIPLICATION_CALCULATION_KEY) {
            $calculation_result = $this->multiplicationFunction($first_number, $second_number);

        } elseif ($calculation_type == CalculationTypesEnum::DIVISION_CALCULATION_KEY) {
            $calculation_result = $this->divisionFunction($first_number, $second_number);

        } else {
            $calculation_result = 0;
        }

        return $calculation_result;
    }

    public function plusFunction($first_number, $second_number)
    {
        return floatval($first_number) + floatval($second_number);
    }

    public function minusFunction($first_number, $second_number)
    {
        return floatval($first_number) - floatval($second_number);
    }

    public function multiplicationFunction($first_number, $second_number)
    {
        return floatval($first_number) * floatval($second_number);
    }

    public function divisionFunction($first_number, $second_number)
    {
        return floatval($first_number) / floatval($second_number);
    }
}