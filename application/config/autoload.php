<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'session');

$autoload['drivers'] = array();

$autoload['helper'] = array('url');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('bread_model', 'records_model', 'user_model', 'dashboard_model');
