<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Record;

class RecordTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRecords()
    {
    	// Assert that there is 5 records after the seed
    	$this->assertEquals(5, Record::count());

    	// Select the first record
    	$record_1 = Record::find(1)->get_attributes();
    	
    	//fwrite(STDERR, print_r($record_1));

    	// Assert is has all the proper attributes
    	$this->assertEquals(1, $record_1['id']);
    	$this->assertTrue(array_key_exists('description', $record_1));
    	$this->assertTrue(array_key_exists('url', $record_1));
    	$this->assertTrue(array_key_exists('title', $record_1));
    	$this->assertTrue(array_key_exists('created_at', $record_1));
    	$this->assertTrue(array_key_exists('updated_at', $record_1));
    }
}
