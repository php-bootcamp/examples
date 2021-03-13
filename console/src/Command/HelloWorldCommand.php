<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

class HelloWorldCommand extends Command
{
    protected static $defaultName = 'hello';

    protected function configure(): void
    {
        $this->setDescription("Say hello to the user")
            ->addArgument('name', InputArgument::OPTIONAL, "Name of the user.", "World")
            ->addOption('quantity', '-Q', InputOption::VALUE_OPTIONAL, 'Quantity', 1)
            ->setHelp("This command say hello to the user.");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($input->getOption('quantity'));

        $section = $output->section();

        /*
        $table = new Table($section);
        $table->setHeaderTitle("Users");
        $table->setFooterTitle("Total Users: 3");
        $table->setHeaders(["ID", "Name", "E-Mail Address"]);
        $table->setRows([
            [1, "Eray Aydın", "er@yayd.in"],
            [2, "Vedat", "vedat@mail.io"],
            new TableSeparator(),
            [3, "Azad Furkan Şakar", "azad@mail.io"],
        ]);
        $table->setStyle('box-double');
        $table->render();

        $table->setStyle('box');
        $table->render();
        */

        /*
        $progressBar = new ProgressBar($output, 100);
        $progressBar->setMessage("İşlem Başlayacak...");
        $progressBar->setEmptyBarCharacter(' ');
        $progressBar->setProgressCharacter('|');
        $progressBar->setBarCharacter('-');
        $progressBar->setFormat('[%bar%] %percent% - %message%');
        $progressBar->start();
        $i = 0;
        while ($i <= 100) {
            $progressBar->setMessage("{$i}. işlemi yapıyor...");
            $progressBar->advance();
            sleep(1);
            $i++;
        }
        $progressBar->finish();
        */

        /*
        $passQuestion = new Question("Password? ");
        $passQuestion->setHidden(true);
        $password = $questionHelper->ask($input, $output, $passQuestion);
        $output->write("Pass: " . $password);
        */

        /*
        $questionHelper = $this->getHelper('question');
        $userList = ["eray" => "Eray", "vedat" => "Vedat", "ali" => "Ali", "ayse" => "Ayşe"];
        $userQuestion = new ChoiceQuestion(
            "Which user you want to delete? ",
            $userList,
            'eray,vedat'
        );
        $userQuestion->setMultiselect(true);
        $userQuestion->setErrorMessage("Girdiğiniz değer %s yanlış.");
        $users = $questionHelper->ask($input, $output, $userQuestion);
        foreach ($users as $user) {
            $output->writeln("Bittin sen ".$userList[$user]);
        }
        */

        /*
        $confirmQuestion = new ConfirmationQuestion('This will be delete all data, are you sure? ', false);

        if ($questionHelper->ask($input, $output, $confirmQuestion)) {
            $output->writeln("Deleting...");
        }
        */

        /*
        $nameQuestion = new Question("Name? ");

        $name = $questionHelper->ask($input, $output, $nameQuestion);
        $output->writeln("Merhaba <info>{$name}</info>");
        */

        /*
        // <info>, <comment> <question> <error>
        $output->writeln("<info>Hello</info> <comment>" . $input->getArgument('name')."</comment> <error>!</error>");

        $style = new OutputFormatterStyle('red', '#fff', ['blink', 'bold']);
        $output->getFormatter()->setStyle('bootcamp', $style);

        $output->writeln("<fg=green;options=bold,underscore;href=https://vivense.com.tr>Vivense</> <bootcamp>PHP Bootcamp!</bootcamp>");
        */

        /*
        $section1 = $output->section();
        $section2 = $output->section();

        $section1->writeln("Merhaba!");
        $section1->writeln("İkinci!");
        $section2->writeln("Dünya!");
        $section2->writeln("Beni silemezsin!");

        sleep(1);

        $section1->overwrite('Güle güle!');

        sleep(1);

        $section2->clear();
        */

        /*
        $output->write("Merhaba!");
        $output->write("Ben 2. satırdayım!");

        $output->writeln([
            'Merhaba!'.PHP_EOL,
            "Ben 2. satırdayım!".PHP_EOL,
        ]);
        */

        return 0;
    }
}
