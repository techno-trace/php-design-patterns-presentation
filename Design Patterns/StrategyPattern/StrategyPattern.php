<?php

// Define a family of algorithms

interface Logger
{
    public function log($data);
}

class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump('log to file');
    }
}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump('log to database');
    }
}

class LogToXWebservice implements Logger
{
    public function log($data)
    {
        var_dump('log to x web service ');
    }
}


// encapsulate and make them interchangable
// Code To An Interface - Depending upon abstraction rather than concretions

/*
class App
{
    public function log($data)
    {
        $logger = new LogToFile;

        $logger->log($data);
    }
}

$app = new App;

$app->log('Log the info');
 */


class App
{
    public function log($data, Logger $logger)
    {
        $logger = $logger ?: new LogToFile;

        $logger->log($data);
    }
}

$app = new App;

$app->log('Log the info', new LogToFile);


// Same implementation available in mail driver registerSwiftTransport method in mailservice provider;
