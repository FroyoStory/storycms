<?php

class PosTest extends TestCase
{
    public function testCreatePost()
    {
        $this->admin();

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
            'title'    => 'Hello world',
            'markdown' => '# Hello',
        ])->seeJson([
            'data' => [
                'id'               => 1,
                'title'            => 'Hello world',
                'markdown'         => '# Hello',
                'html'             => '<h1>Hello</h1>',
                'slug'             => 'hello-world',
                'author_id'        => Auth::user()->id,
                'is_featured'      => false,
                'is_page'          => false,
                'meta_title'       => null,
                'meta_description' => null,
                'status'           => 'draft',
                'visibility'       => 'public',
            ],
            'meta' => [
                'code'    => 200,
                'message' => 'OK',
            ],
        ]);
    }

}
