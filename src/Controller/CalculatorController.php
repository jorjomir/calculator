<?php

namespace App\Controller;

use App\Service\CalculatorService;
use App\Enum\CalculationTypesEnum;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalculatorController extends AbstractController
{
    private $calculatorService;

    public function __construct(CalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    /**
     * @Route("/calculator", name="calculator")
     */
    public function calculator(Request $request): Response
    {
        $calculation_result = false;
        $calculation_type = $request->request->get('calculation_type');

        if ($request->request->get('calculation_type')) {
            $first_number = $request->request->get('n1');
            $second_number = $request->request->get('n2');

            $calculation_result = $this->calculatorService->calculateNumbers($first_number, $second_number, $calculation_type);
        }

        return $this->render('calculator/calculator.html.twig', [
            'calculation_result' => $calculation_result
        ]);

    }
}