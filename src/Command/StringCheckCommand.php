<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use App\Service\CheckerService;


class StringCheckCommand extends Command
{
    // the name of the command (the part after "bin/console")
    //protected static $defaultName = 'cron:crawlFeeds';
    private $checkerService;

    public function __construct(CheckerService $checkerService)
    {
        $this->checkerService = $checkerService;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('app:checker')
            ->setDescription('Script to transfer data')
            ->addArgument('method', InputArgument::REQUIRED, 'The method.')
            ->addArgument('value', InputArgument::REQUIRED, 'The value.')
            ->addArgument('value2', InputArgument::OPTIONAL, 'The value2.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $method = $input->getArgument('method');
        $value = $input->getArgument('value');
        $value2 = $input->getArgument('value2');
        
        $validMethods = ['isPalindrome', 'isAnagram', 'isPangram'];
        if (in_array($method, $validMethods)) {
        
            $response = $this->checkerService->{$method}($value, $value2);
        
            $output->writeln($response);
            
            return Command::SUCCESS;
        }
        
        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable
        
        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        //return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }
}
