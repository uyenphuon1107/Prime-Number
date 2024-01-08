<?php
function isPrime($number) {
    // Store the sum 
    $n = 0;
   

    // check prime number
    for ($i = 2; $i < ($number/2+1); $i++) {
        if ($number % $i == 0) {
            $n++;
        }
    }
    
    if ($n == 0){
        return true;
    } else {
        return false;
    }
}

function primesInRange($a, $b) {
    $result = array();
    for ($i = max($a, 2); $i <= $b; $i++) {
        if (isPrime($i)) {
            $result[] = $i;
        }
    }
    echo "Prime numbers between $a and $b are " . implode(', ', $result) . "\n";
}

// function testing
function testIsPrime() {
    $testCases = [
        [3, 10, "3, 5, 7"],
        [1, 100, "2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97"],
    ];

    foreach ($testCases as $test) {
        $a = $test[0];
        $b = $test[1];
        
        $expected_output = $test[2];

        ob_start();
        primesInRange($a, $b);
        $actual_output = ob_get_clean();
        
        // Remove whitespace from actual_output
        $actual_output = trim($actual_output);

        // Check if the actual output matches the expected output
        if ($actual_output == "Prime numbers between $a and $b are $expected_output") {
            echo "Test Passed for primesInRange($a, $b).\n";
        } else {
            echo "Test Failed for primesInRange($a, $b).\n";
        }
    }
}
primesInRange(3, 10); 
primesInRange(1, 100);
testIsPrime();
?>



