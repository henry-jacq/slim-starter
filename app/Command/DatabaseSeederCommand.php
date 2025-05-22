<?php

declare(strict_types=1);

namespace App\Command;

use App\Seeders\AppSettingsSeeder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DatabaseSeederCommand extends Command
{
    protected static $defaultName = 'app:seed';

    /**
     * Seeder registry
     * @var array<string, string>
     */
    private array $seeders = [
        'app_settings' => AppSettingsSeeder::class,
    ];

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
        parent::__construct(self::$defaultName);
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Runs all seeders or a specific one if provided.')
            ->setHelp('Usage: app:seed [seeder_name]')
            ->addArgument('seeder', InputArgument::OPTIONAL, 'The specific seeder to run.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $seederKey = $input->getArgument('seeder');

        if ($seederKey !== null) {
            return $this->runSpecificSeeder($seederKey, $io, $input, $output);
        }

        return $this->runAllSeeders($io, $input, $output);
    }

    private function runSpecificSeeder(
        string $seederKey,
        SymfonyStyle $io,
        InputInterface $input,
        OutputInterface $output
    ): int {
        if (!array_key_exists($seederKey, $this->seeders)) {
            $io->error("Seeder '$seederKey' not found. Available: " . implode(', ', array_keys($this->seeders)));
            return Command::FAILURE;
        }

        return $this->runSeeder($input, $output, $this->seeders[$seederKey]);
    }

    private function runAllSeeders(
        SymfonyStyle $io,
        InputInterface $input,
        OutputInterface $output
    ): int {
        $io->title('Running all seeders...');

        foreach ($this->seeders as $key => $seederClass) {
            $io->section("Seeding: $key");

            $result = $this->runSeeder($input, $output, $seederClass);
            if ($result === Command::FAILURE) {
                return Command::FAILURE;
            }
        }

        $io->success('All seeders executed successfully!');
        return Command::SUCCESS;
    }

    private function runSeeder(
        InputInterface $input,
        OutputInterface $output,
        string $seederClass
    ): int {
        $io = new SymfonyStyle($input, $output);

        try {
            $seeder = new $seederClass($this->entityManager);

            if (!method_exists($seeder, 'run')) {
                $io->error("Seeder class '$seederClass' must have a run() method.");
                return Command::FAILURE;
            }

            $seeder->run();

            $io->success("$seederClass completed successfully.");
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $io->error("Error in $seederClass: {$e->getMessage()}");
            return Command::FAILURE;
        }
    }
}
