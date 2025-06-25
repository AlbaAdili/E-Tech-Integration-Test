<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ContactController;
use App\Services\ContactServiceInterface;
use Illuminate\Http\Request;
use Mockery;

class ContactStoreTest extends TestCase
{
    public function test_store_method_calls_service()
    {
 
        $mockService = Mockery::mock(ContactServiceInterface::class);
        $mockService->shouldReceive('storeContact')->once()->with(Mockery::type(Request::class));
    
        $controller = new ContactController($mockService);
    
        $request = Request::create('/contact', 'POST', [
            'name' => 'Test',
            'email' => 'test@example.com',
            'description' => 'This is a test message.',
        ]);
    
        $controller->store($request);
    }
    
    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

}

