<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class StatCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:stat')
            ->setDescription('Fetch statistic for commands');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $doc = $this->getContainer()->get('doctrine');

        $gamesR = $doc->getRepository('AppBundle:Game');
        $games = count($gamesR->findAll());
        $gamesOn = $gamesR->countAllGoing();

        $userR = $doc->getRepository('AppBundle:User');
        $users = count($userR->findAll());
        $turnR = $doc->getRepository('AppBundle:Turn');
        $turns = count($turnR->findAll());
        $files = $turnR->countInFiles() + $turnR->countOutFiles();

        $output->writeln('Total games: '.$games);
        $output->writeln('Total games going: '.$gamesOn);
        $output->writeln('Total users: '.$users);
        $output->writeln('Total turns: '.$turns);
        $output->writeln('Total files: '.$files);
    }
}
