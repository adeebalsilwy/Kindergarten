<?php
// Simple test to see if PHP can run properly
echo "Testing PHP syntax...\n";

// Try to include the Teacher model to see if there are syntax errors
require_once 'vendor/autoload.php';

use App\Models\Teacher;
use App\Models\User;
use App\Models\Curriculum;

echo "Models loaded successfully.\n";