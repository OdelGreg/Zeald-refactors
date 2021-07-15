<?php

interface DbInterface
{
    public function connection();
    public function query($sql);
}