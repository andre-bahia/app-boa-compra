<?php


namespace App\Infrastructure\Command;


use App\Application\Service\CalculateCostService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CalculateDistanceCostCommand extends Command
{
    protected static $defaultName = 'app:calculate-distance-cost';

    /** @var CalculateCostService $service */
    private CalculateCostService $service;

    public function __construct(CalculateCostService $calculateCostService)
    {
        parent::__construct(self::$defaultName);
        $this->service = $calculateCostService;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     * @throws \App\Domain\Shared\Exception\CalculateCostException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Iniciando cálculo do custo da distância de entrega dos brindes');
        $io->text('Calculando ...');
        $this->service->execute();
        $io->text("\xF0\x9F\x8D\xBA \xF0\x9F\x8D\xBA \xF0\x9F\x8D\xBA \xF0\x9F\x8D\xBA \xF0\x9F\x8D\xBA \xF0\x9F\x8D\xBA \xF0\x9F\x8D\xBA");
        $io->success('Calculos realizados com sucesso!!');
        return 0;
    }

}