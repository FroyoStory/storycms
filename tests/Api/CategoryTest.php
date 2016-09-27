<?php

use App\Category;

class CategoryTest extends TestCase
{
    public function testList()
    {
        Category::create([
            'name' => 'Gila Bola',
            'slug' => 'gila-bola',
        ]);

        Category::create([
            'name' => 'Maniak Motor',
            'slug' => 'maniak-motor',
        ]);

        $this->json('GET', '/api/categories');
        $this->assertEquals(401, $this->response->status());

        $this->admin();

        $this->json('GET', '/api/categories');
        $this->assertEquals(200, $this->response->status());

        if ($this->response->status() == 200) {
            $this->seeJson([
                'data' => [
                    ['id' => 1, 'name' => 'Gila Bola', 'slug' => 'gila-bola'],
                    ['id' => 2, 'name' => 'Maniak Motor', 'slug' => 'maniak-motor'],
                ],
                'meta' => [
                    'code'       => 200,
                    'message'    => 'OK',
                    'pagination' => [
                        'count'        => 2,
                        'current_page' => 1,
                        'links'        => [],
                        'per_page'     => 15,
                        'total'        => 2,
                        'total_pages'  => 1,
                    ],
                ],
            ]);
        }

    }

    public function testCreate()
    {
        $this->admin();

        $this->json('POST', '/api/categories', [
            'name' => '',
            'slug' => '',
        ]);

        $this->assertEquals(422, $this->response->status());

        $this->seeJson([
            'errors' => [
                'name' => ['The name field is required.'],
            ],
            'meta'   => [
                'code'    => 422,
                'message' => 'VALIDATION_FAILED',
            ],
        ]);

        $this->json('POST', '/api/categories', [
            'name' => 'Meal Plan',
            'slug' => 'meal-plan',
        ])->seeJson([
            'data' => [
                'id'   => 1,
                'name' => 'Meal Plan',
                'slug' => 'meal-plan',
            ],
            'meta' => [
                'code'    => 200,
                'message' => 'OK',
            ],
        ]);
    }

    public function testShow()
    {
        $this->admin();

        Category::create([
            'name' => 'Gila Bola',
            'slug' => 'gila-bola',
        ]);

        $this->json('GET', '/api/categories/1')
            ->seeJson([
                'data' => [
                    'id'   => 1,
                    'name' => 'Gila Bola',
                    'slug' => 'gila-bola',
                ],
                'meta' => [
                    'code'    => 200,
                    'message' => 'OK',
                ],
            ]);
    }

    public function testUpdate()
    {
        $this->admin();

        Category::create([
            'name' => 'Gila Bola 2',
            'slug' => 'gila-bola-2',
        ]);

        $this->json('PUT', '/api/categories/1', [
            'name' => 'Gila Bola 3',
            'slug' => 'gila-bola-3',
        ])->seeJson([
            'data' => [
                'id'   => 1,
                'name' => 'Gila Bola 3',
                'slug' => 'gila-bola-3',
            ],
        ]);
    }

    public function testDestroy()
    {
        $this->admin();

        Category::create([
            'name' => 'Gila Bola 2',
            'slug' => 'gila-bola-2',
        ]);

        $this->json('DELETE', '/api/categories/1')
            ->seeJson([
                'meta' => [
                    'code'    => 200,
                    'message' => 'OK',
                ],
            ]);
    }
}
