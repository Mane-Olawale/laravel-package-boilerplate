<?php

namespace ManeOlawale\Laravel\Package\Tests;

use Illuminate\Support\Facades\File;

class InstallationTest extends TestBench
{
    public function testInstallation()
    {
        // make sure we're starting from a clean state
        (!File::exists(config_path('package.php'))) || unlink(config_path('package.php'));

        $this->assertFalse(File::exists(config_path('package.php')));
        // When we run the install command
        $command = $this->artisan('package:install');

        // execute the command to force override
        $command->execute();
        $command->expectsOutput("Setting up Package");
        $command->expectsOutput("Package installed sucessfully!!");

        // Assert that the original contents are present
        $this->assertEquals(
            file_get_contents(__DIR__ . '/../config/package.php'),
            file_get_contents(config_path('package.php'))
        );

        $this->assertTrue(File::exists(config_path('package.php')));

        // Clean up
        unlink(config_path('package.php'));
    }
}
