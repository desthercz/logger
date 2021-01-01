<?php namespace DestherCZ\Logger\Handlers;

use DestherCZ\Logger\Entry;

interface Handler
{
    public function write(Entry $entry);
}
