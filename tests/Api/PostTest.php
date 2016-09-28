<?php

use App\Category;

class PosTest extends TestCase
{

    public function createDummy()
    {
        Category::create(['name' => 'Hello', 'slug' => 'hello']);
        Category::create(['name' => 'Hello', 'slug' => 'hello']);
    }

    public function testLists()
    {
        $this->admin();

        $this->createDummy();

        $this->json('POST', '/api/posts', [
            'title'            => 'Hello world',
            'markdown'         => '# Hello',
            'status'           => 'draft',
            'meta_title'       => 'Hello',
            'meta_description' => 'Hello mas brooo',
            'is_featured'      => true,
            'is_page'          => true,
            'category_id'      => 1,
        ]);

        $this->assertEquals(200, $this->response->status());

        $this->json('GET', '/api/posts');

        $this->seeJson([
            'data' => [
                [
                    'id'               => 1,
                    'title'            => 'Hello world',
                    'markdown'         => '# Hello',
                    'html'             => '<h1>Hello</h1>',
                    'slug'             => 'hello-world',
                    'author_id'        => Auth::user()->id,
                    'is_featured'      => true,
                    'is_page'          => true,
                    'meta_title'       => 'Hello',
                    'meta_description' => 'Hello mas brooo',
                    'status'           => 'draft',
                    'visibility'       => 'public',
                    'category_id'      => 1,
                ],
            ],
        ]);
    }

    public function testCreatePost()
    {
        $this->admin();
        $this->createDummy();

        $this->json('POST', '/api/posts', [
            'title'    => '',
            'markdown' => '',
        ])->seeJson([
            'errors' => [
                'markdown' => ['The markdown field is required.'],
                'title'    => ['The title field is required.'],
            ],
            'meta'   => [
                'code'    => 422,
                'message' => 'VALIDATION_FAILED',
            ],
        ]);

        $this->json('POST', '/api/posts', [
            'title'            => 'Hello world',
            'markdown'         => '# Hello',
            'status'           => 'draft',
            'meta_title'       => 'Hello',
            'meta_description' => 'Hello mas brooo',
            'is_featured'      => true,
            'is_page'          => true,
            'category_id'      => 2,
        ])->seeJson([
            'data' => [
                'id'               => 1,
                'title'            => 'Hello world',
                'markdown'         => '# Hello',
                'html'             => '<h1>Hello</h1>',
                'slug'             => 'hello-world',
                'author_id'        => Auth::user()->id,
                'is_featured'      => true,
                'is_page'          => true,
                'meta_title'       => 'Hello',
                'meta_description' => 'Hello mas brooo',
                'status'           => 'draft',
                'visibility'       => 'public',
                'category_id'      => 2,
            ],
            'meta' => [
                'code'    => 200,
                'message' => 'OK',
            ],
        ]);

        $this->json('POST', '/api/posts', [
            'title'       => 'Hello world',
            'markdown'    => '# Hello',
            'status'      => 'publish',
            'category_id' => 1,
        ])->seeJson([
            'data' => [
                'id'               => 2,
                'title'            => 'Hello world',
                'markdown'         => '# Hello',
                'html'             => '<h1>Hello</h1>',
                'slug'             => 'hello-world',
                'author_id'        => Auth::user()->id,
                'is_featured'      => false,
                'is_page'          => false,
                'meta_title'       => null,
                'meta_description' => null,
                'status'           => 'publish',
                'visibility'       => 'public',
                'category_id'      => 1,
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
        $this->createDummy();

        $this->json('POST', '/api/posts', [
            'title'            => 'Hello world',
            'markdown'         => '# Hello',
            'status'           => 'draft',
            'meta_title'       => 'Hello',
            'meta_description' => 'Hello mas brooo',
            'is_featured'      => true,
            'is_page'          => true,
            'category_id'      => 1,
        ]);

        $this->assertEquals(200, $this->response->status());

        $this->json('PUT', '/api/posts/1', [
            'title'            => 'Hello world 2',
            'slug'             => 'hello-world-2',
            'markdown'         => '# Hello 2',
            'status'           => 'draft',
            'meta_title'       => 'Hello',
            'meta_description' => 'Hello mas brooo',
            'is_featured'      => true,
            'is_page'          => true,
            'category_id'      => 1,
        ])->seeJson([
            'data' => [
                'id'               => 1,
                'title'            => 'Hello world 2',
                'markdown'         => '# Hello 2',
                'html'             => '<h1>Hello 2</h1>',
                'slug'             => 'hello-world-2',
                'author_id'        => Auth::user()->id,
                'is_featured'      => true,
                'is_page'          => true,
                'meta_title'       => 'Hello',
                'meta_description' => 'Hello mas brooo',
                'status'           => 'draft',
                'visibility'       => 'public',
                'category_id'      => 1,
            ],
            'meta' => [
                'code'    => 200,
                'message' => 'OK',
            ],
        ]);
    }

    public function testDestroy()
    {
        $this->admin();

        $this->json('POST', '/api/posts', [
            'title'            => 'Hello world',
            'markdown'         => '# Hello',
            'status'           => 'draft',
            'meta_title'       => 'Hello',
            'meta_description' => 'Hello mas brooo',
            'is_featured'      => true,
            'is_page'          => true,
        ]);

        $this->json('DELETE', '/api/posts/1');
        $this->assertEquals(200, $this->response->status());
    }
}
