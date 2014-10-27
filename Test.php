<?php

require 'U.php';

class Test {
    public $description = 'Description of this suite test.';

    public function testOne() {
        U::description('Description of this group test.', function(){
            U::assert('Testando', FALSE);
            U::assert('Testando denovo', TRUE);
            U::assert('Testando 3', false);

            U::description('Description inner.', function(){
                U::assert('Testando', FALSE);
                U::assert('Testando denovo', TRUE);
                U::assert('Testando 3', false);
            });
        });

        U::description('Description 2 of this group test.', function(){
            U::assert('Testando', FALSE);
            U::assert('Testando denovo', TRUE);
            U::assert('Testando 3', false);
        });
    }
}

$className = 'Test';

$test = new $className;
$reflector = new ReflectionClass($className);

U::init();

foreach($reflector->getMethods() as $method) {
    U::description($method->getName(), function () use (&$test, &$method) {
        $test->{$method->getName()}();
    });
}

echo '<pre>';
print_r(U::$_reports);
