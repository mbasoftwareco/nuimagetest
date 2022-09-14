<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function contact_edit()
    {
        $contact = Contact::first();

        $attributes = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phone,
            'comments' => $this->faker->comments,
            'id' => $contact->id,
        ];

        $this->patchJson('api/contact', $attributes)
            ->assertStatus(200);

        $this->assertDatabaseHas($contact->getTable(), array_merge($attributes, [
            'id' => $contact->id
        ]));
    }
}
